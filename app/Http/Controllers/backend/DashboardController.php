<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        $new_order = Order::where('status','=',2)
        ->count();
        $user_registrations = User::where([['status','=',1],['roles','=','customer']])
        ->count();
        return view('backend.dashboard.index',compact('new_order','user_registrations'));
    }
    //
}
