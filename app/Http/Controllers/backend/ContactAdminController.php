<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactAdminController extends Controller
{
    public function index(){
        return view('backend.contact_list');
    }
    //
}
