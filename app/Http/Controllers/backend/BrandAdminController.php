<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BrandAdminController extends Controller
{
    public function index(){
        return view('backend.brand_list');
    }
    //
}
