<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table="products";
    public function product_type(){
        return $this->belongsTo('App\ProductType','type_products_id','id');// Ten model cua ten bang ddc lien ket
        //hasmany bang ddc co khoa ngoai
    }
    public function bill_detail(){
        return $this->hasMany('App\ProductType','bills_id','id');// Ten model cua ten bang ddc lien ket
        //hasmany bang ddc co khoa ngoai
    }
    public function getNewPro(){

        $new_product=Product::where('new',1)->paginate(4);
        return $new_product;
    }
    public function getSanPhamKM(){
        $sanpham_khuyenmai = Product::where('promotion_price','<>',0)->paginate(4);
        return $sanpham_khuyenmai;
    }
    public function getTypePro($type){
        $data['sp_theoloai']= Product::where('id_type',$type) ->limit(3)->get();
        $data['sp_khac']= Product::where('id_type','<>',$type)->limit(3)->get();
        return $data;
    }
}
