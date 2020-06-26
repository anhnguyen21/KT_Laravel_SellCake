<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Session;

class LoginController extends Controller
{
    public $dem;
    public function getLogin(){
        return view('page.login');
    }
    public function postLogin(Request $request)
    { 
        
        $email=$request->input('email');
        $password=$request->input('password');
        $user = User::where('email', '=', $email)->first();
        if($user!=null){
            if($user->email==$email && $user->password==$password){
                $request->session()->put('userName', $user->full_name);
               
                return redirect()->route('trangchu',['name'=>$user->full_name]);
            }else{

                $this->dem=$this->dem+1;
                // return redirect()->back();
            }
        }else{
            $this->dem=$this->dem+1;
            // return redirect()->back();
        }
        if($this->dem==1){
            return redirect()->route('email');
        }else{
            return redirect()->back();
        }

            // echo Auth::get('user');
        // if(Auth::attempt(['email' => $email, 'password' => $password])){

        //     return redirect()->route('trangchu',['name'=>'123']);

        // }else{

        //     return redirect()->back();

        //  }
    }

    public function logOut() {
        Session::forget('userName');
        return redirect()->back();
    }
    public function getDk(){
        return view('page.dangki');
    }
    public function postDk(Request $req){
        $password=$req->input('pass');
        $username=$req->input('last_name');
        $email=$req->input('email');
        $phone=$req->input('phone');
        $adress=$req->input('adress');
        DB::table('users')->insert(
            [
                'full_name'=> $username,
                'email'=> $email,
                'address'=> $adress,
                'phone'=> $phone,
                'password' => $password
            ]);

        return redirect()->route('login')->with(['flash_level' => 'success','flash_message' =>'Đăng kí thành công']);

    }
}
