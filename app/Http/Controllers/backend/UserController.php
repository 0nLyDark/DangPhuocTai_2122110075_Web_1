<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = User::where('user.status','!=',0)
        ->select('user.id','user.name','user.email','user.phone','user.image','user.roles','user.status')
        ->orderBy('user.created_at','desc')
        ->get();
        return view('backend.user.index',compact('list'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.user.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        if(!$user){
            return redirect()->route('admin.user.index')->with(['message'=>'Thêm tài khoản thất bại','color'=>'error']);
        }
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->roles = $request->roles;

        if($request->address){
            $user->address = $request->address;
        }

        if($request->image)
        {
            $exten = $request->file('image')->extension();
            if(in_array($exten,['jpg','png','gif','webp'])){
                $file_name = substr($user->email, 0, 5) . substr($user->phone, 0, 5) . "." . $exten;
                $request->image->move(public_path('image/users'),$file_name);
                $user->image = $file_name;
            }
        }
        //
        $user->status = $request->status;
        $user->created_at = date('Y-m-d H:i:s');
        $user->created_by = Auth::id()??1;
        $user->save();
        return redirect()->route('admin.user.index')->with('message','Thêm tài khoản thành công');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.user.index')->with(['message'=>'không tìm thấy','color'=>'error']);
        }
        return view('backend.user.show',compact('user'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.user.index')->with(['message'=>'không tìm thấy','color'=>'error']);
        }
        return view('backend.user.edit',compact('user'));

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::find($id);
        if(!$user){
            return redirect()->route('admin.user.index')->with(['message'=>'không tìm thấy','color'=>'error']);
        }
        $user->name = $request->name;
        $user->username = $request->username;
        if($request->password){
            $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        }
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->roles = $request->roles;

        if($request->address){
            $user->address = $request->address;
        }

        if($request->image)
        {
            $exten = $request->file('image')->extension();
            if(in_array($exten,['jpg','png','gif','webp'])){
                $file_name = substr($user->email, 0, 5) . substr($user->phone, 0, 5) . "." . $exten;
                $request->image->move(public_path('image/users'),$file_name);
                $user->image = $file_name;
            }
        }
        //
        $user->status = $request->status;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id()??1;
        $user->save();
        return redirect()->route('admin.user.index')->with('message','Cập nhật tài khoản thành công');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash()
    {
        $list = User::where('user.status','=',0)
        ->select('user.id','user.name','user.email','user.phone','user.image','user.roles','user.status')
        ->orderBy('user.created_at','desc')
        ->get();
        return view('backend.user.trash',compact('list'));
        //
    }
    public function status(string $id)
    {
        $user = User::find($id);
        if($user==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }

        $user->status = $user->status==1?2:1;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id()??1;
        $user->save();
        $data = [
            'message' => 'Thay đổi trạng thái thành công: ' . $id,
            'status' => $user->status,
            'id' => $id
        ];
        return $data;

        //
    }
    public function delete(string $id)
    {
        $user = User::find($id);
        if($user==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $user->status = 0;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id()??1;
        $user->save();
        
        $data = [
            'message' => 'Xóa thành công: ' . $id,
            'status' => $user->status,
            'id' => $id
        ];
        return $data;
    }
    public function restore(string $id)
    {
        $user = User::find($id);
        if($user==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $user->status = 2;
        $user->updated_at = date('Y-m-d H:i:s');
        $user->updated_by = Auth::id()??1;

        $user->save();
        $data = [
            'message' => 'Khôi phục thành công: ' . $id,
            'status' => $user->status,
            'id' => $id
        ];
        return $data;
        //
    }
    public function destroy(string $id)
    {
        $user = User::find($id);
        if($user==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $user->delete();
        $data = [
            'message' => 'Xóa vĩnh viễn thành công: ' . $id,
            'status' => 1,
            'id' => $id
        ];
        return $data;
        //
    }
}
