<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderAdminController extends Controller
{
    public function index(){
        return view('backend.order_list');
    }
    //
}
