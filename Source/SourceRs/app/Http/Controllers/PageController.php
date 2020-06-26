<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
use App\Product;
use App\ProductType;
use Illuminate\Support\Facades\Session;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\Mail\DemoEmail;
use Mail;
use Excel;
use App\Exports\UsersExport;
use App\Imports\UsersImport;

class PageController extends Controller
{
    public function getIndex(){
        $slide=slide::all();
        $pro= new Product();
        // $new_product=$pro->getNewPro();
        // $sanpham_khuyenmai = $pro->getSanPhamKM();
        return view('page.trangchu',compact('slide','pro'));
    }
    public function getTypeProduct($type){
        $sp_theoloai= Product::where('id_type',$type) ->limit(3)->get();
        $sp_khac= Product::where('id_type','<>',$type)->limit(3)->get();
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id',$type)->first();
        return view('page.loai_san_pham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    public function getChitiet(Request $req){
        $sanpham=Product::where('id',$req->id)->first();
        $sp_tuongtu = Product::where('id_type',$sanpham->id_type)->paginate(3);
        $sp_banchay = Product::where('promotion_price','=',0) ->paginate(3);
        $sp_new = Product::select('id', 'name', 'id_type', 'description', 'unit_price', 'promotion_price', 'image', 'unit', 'new', 'created_at', 'updated_at')->where('new','>',0)->orderBy('updated_at','ASC')->paginate(3);
        return view('page.chi_tiet',compact('sanpham','sp_tuongtu','sp_banchay','sp_new'));
    }
    public function getLienHe(){
        return view('page.lienhe');
    }
    public function getAbout(){
        return view('page.about');
    }
    public function getAddtoCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart', $cart);
        return redirect()->back();
    }
    public function getDelItemCart(Request $req,$id){
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart= new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart',$cart);
        return redirect()->back();
    }
    public function getCheckout(){
        $oldCart=Session('cart')?Session::get('cart'):null;
        $cart= new Cart($oldCart);
        return view('page.dathang',compact('cart'));
    }
    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $req->input('name');
        $customer->gender = $req->input('gender');
        $customer->email = $req->input('email');
        $customer->address = $req->input('adress');
        $customer->phone_number = $req->input('phone');
        $customer->note = $req->input('notes');

        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();
        echo  $customer->payment;

        foreach($cart->items as $key=>$value){
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;//$value['item']['id'];
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price']/$value['qty'];
            $bill_detail->save();
        }
        Session::forget('cart');
        return redirect()->route('trangchu');
    }
    public function getSearch(Request $req){
        $name=$req->input('sear');
        $proSear=Product::where('name','like', '%'.$name.'%' )->paginate(8);
        // echo json_encode($proSear);
        if(count($proSear)>0){
            return view('page.search',compact('proSear'));
        }else{
            return redirect()->back();
        }

    }
    public function getSear(){
        return view('page.search');
    }
    // public function getEmail(){
    // }
    public function postEmail(Request $req){
        $code=rand(100,999);
        $req->session()->push('code', $code);
        $detail=[
                'title'=>'Mail password retrieval',
                'body'=> $code
                ];
        \Mail::to($req->input('email'))->send(new DemoEmail($detail));
            echo "email has been send!";
    }
    public function getEmail(){
        return view('page.email');
    }

    public function importExportView()
    {
       return view('import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new UsersImport,request()->file('file'));
           
        return back();
    }
}
