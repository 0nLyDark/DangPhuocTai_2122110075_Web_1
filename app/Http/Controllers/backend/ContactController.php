<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Contact::where('contact.status','!=',0)
        ->leftJoin('user','user_id','=','user.id')
        ->select('contact.id','user.name as username','contact.name','contact.email','contact.phone','contact.title','contact.status')
        ->orderBy('contact.created_at','desc')
        ->get();
        return view('backend.contact.index',compact('list'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreContactRequest $request)
    {
        $contact = new Contact();
        if(!$contact){
            return redirect()->route('admin.contact.index')->with(['message'=>'Thêm liên hệ thất bại','color'=>'error']);
        }
        $contact->user_id=Auth::id()??null;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->created_at = date('Y-m-d H:i:s');
        $contact->status = 2;
        $contact->save();
        return redirect()->route('admin.contact.index')->with(['message'=>'Thêm liên hệ thành công','color'=>'success']);
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);
        if(!$contact){
            return redirect()->route('admin.contact.index')->with(['message'=>'Không tìm thấy ','color'=>'error']);
        }
        return view('backend.contact.show',compact('contact'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {        
        $contact = Contact::find($id);
        if(!$contact){
            return redirect()->route('admin.contact.index')->with(['message'=>'Không tìm thấy ','color'=>'error']);
        }
        return view('backend.contact.edit',compact('contact'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateContactRequest $request, string $id)
    {
        $contact = Contact::find($id);
        if(!$contact){
            return redirect()->route('admin.contact.index')->with(['message'=>'Không tìm thấy ','color'=>'error']);
        }
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->title = $request->title;
        $contact->content = $request->content;
        $contact->created_at = date('Y-m-d H:i:s');
        $contact->status = 2;
        $contact->save();
        return redirect()->route('admin.contact.index')->with(['message'=>'Cập nhật liên hệ thành công','color'=>'success']);
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function trash()
    {
        $list = Contact::where('contact.status','=',0)
        ->leftJoin('user','user_id','=','user.id')
        ->select('contact.id','user.name as username','contact.name','contact.email','contact.phone','contact.title','contact.status')
        ->orderBy('contact.created_at','desc')
        ->get();
        return view('backend.contact.trash',compact('list'));
        //
    }
    public function status(string $id)
    {
        $contact = Contact::find($id);
        if($contact==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }

        $contact->status = $contact->status==1?2:1;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id()??1;
        $contact->save();
        $data = [
            'message' => 'Thay đổi trạng thái thành công: ' . $id,
            'status' => $contact->status,
            'id' => $id
        ];
        return $data;

        //
    }
    public function delete(string $id)
    {
        $contact = Contact::find($id);
        if($contact==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $contact->status = 0;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id()??1;
        $contact->save();
        
        $data = [
            'message' => 'Xóa thành công: ' . $id,
            'status' => $contact->status,
            'id' => $id
        ];
        return $data;
    }
    public function restore(string $id)
    {
        $contact = Contact::find($id);
        if($contact==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $contact->status = 2;
        $contact->updated_at = date('Y-m-d H:i:s');
        $contact->updated_by = Auth::id()??1;

        $contact->save();
        $data = [
            'message' => 'Khôi phục thành công: ' . $id,
            'status' => $contact->status,
            'id' => $id
        ];
        return $data;
        //
    }
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        if($contact==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $contact->delete();
        $data = [
            'message' => 'Xóa vĩnh viễn thành công: ' . $id,
            'status' => 1,
            'id' => $id
        ];
        return $data;
        //
    }
}
