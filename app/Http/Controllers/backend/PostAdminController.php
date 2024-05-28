<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostAdminController extends Controller
{
    public function index(){
        return view('backend.post_list');
    }
    //
}
