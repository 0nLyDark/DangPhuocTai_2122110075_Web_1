<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index(){
        return view('frontend.contact');
    }
    public function store(StoreContactRequest $request)
    {
        $contact = new Contact();
        $contact->user_id=Auth::id()??null;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->created_at = date('Y-m-d H:i:s');
        $contact->status = 2;
        $contact->save();
        return redirect()->route('site.contact')->with(['message'=>'Gửi liên hệ thành công','color'=>'info']);
        //
    }
}
