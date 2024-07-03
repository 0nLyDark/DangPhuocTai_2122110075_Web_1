<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function getlogin(){
        return view('frontend.login');
    }
    public function register(){
        return view('frontend.register');
    }
    public function dologin(Request $request){
        $credentials = [
            'password'=>$request->password,
            'status'=>1
        ];
        if(filter_var($request->username,FILTER_VALIDATE_EMAIL)){
            $credentials['email'] = $request->username;
        }else{
            $credentials['username'] = $request->username;
        }
        if (Auth::attempt($credentials)) {
            return redirect()->route('site.home')->with(['message'=>'Đăng nhập thành công, Xin chào '.Auth::user()->name]);
        }else{
            return redirect()->route('site.customer.getlogin')->with(['message'=>'Đăng nhập không thành công','color'=>'error']);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('site.home');
    }

    //

}
