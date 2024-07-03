<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function getlogin(){
        return view('login');
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
            return redirect()->route('admin.dashboard')->with(['message'=>'Đăng nhập thành công, Xin chào '.Auth::user()->name]);
        }else{
            return redirect()->route('admin.getlogin')->with(['message'=>'Đăng nhập không thành công','color'=>'error']);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('admin.getlogin');
    }

    //
}
