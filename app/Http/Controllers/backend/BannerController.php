<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Banner;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Banner::where('banner.status','!=',0)
        ->select('banner.id','banner.image','banner.name','banner.link','banner.position','banner.description','banner.status')
        ->orderBy('banner.created_at','desc')
        ->get();
        return view('backend.banner.index',compact('list'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        $banner = new Banner();
        if(!$banner){
            return redirect()->route('admin.banner.index')->with(['message'=>'thêm banner thất bại','color'=>'error']);
        }
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->position = $request->position;
        $banner->description = $request->description;

        if($request->image)
        {
            $exten = $request->file('image')->extension();
            if(in_array($exten,['jpg','png','gif','webp'])){
                $file_name = date('YmdHis') . "." . $exten;
                $request->image->move(public_path('image/banners'),$file_name);
                $banner->image = $file_name;
            }
        }
        //
        $banner->status = $request->status;
        $banner->created_at = date('Y-m-d H:i:s');
        $banner->created_by = Auth::id()??1;
        $banner->save();
        return redirect()->route('admin.banner.index')->with('message','thêm banner thành công');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner = Banner::find($id);
        if(!$banner){
            return redirect()->route('admin.banner.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        return view('backend.banner.show',compact('banner'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        if(!$banner){
            return redirect()->route('admin.banner.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        return view('backend.banner.edit',compact('banner'));
        
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, string $id)
    {
        $banner = Banner::find($id);
        if(!$banner){
            return redirect()->route('admin.banner.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->position = $request->position;
        $banner->description = $request->description;

        if($request->image)
        {
            $exten = $request->file('image')->extension();
            if(in_array($exten,['jpg','png','gif','webp'])){
                $file_name = date('YmdHis') . "." . $exten;
                $request->image->move(public_path('image/banners'),$file_name);
                $banner->image = $file_name;
            }
        }
        //
        $banner->status = $request->status;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id()??1;
        $banner->save();
        return redirect()->route('admin.banner.index')->with('message','Cập nhật banner thành công');
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function trash()
    {
        $list = Banner::where('banner.status','=',0)
        ->select('banner.id','banner.image','banner.name','banner.link','banner.position','banner.description','banner.status')
        ->orderBy('banner.created_at','desc')
        ->get();
        return view('backend.banner.trash',compact('list'));
        //
    }
    public function status(string $id)
    {
        $banner = Banner::find($id);
        if($banner==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }

        $banner->status = $banner->status==1?2:1;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id()??1;
        $banner->save();
        $data = [
            'message' => 'Thay đổi trạng thái thành công: ' . $id,
            'status' => $banner->status,
            'id' => $id
        ];
        return $data;

        //
    }
    public function delete(string $id)
    {
        $banner = Banner::find($id);
        if($banner==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $banner->status = 0;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id()??1;
        $banner->save();
        
        $data = [
            'message' => 'Xóa thành công: ' . $id,
            'status' => $banner->status,
            'id' => $id
        ];
        return $data;
    }
    public function restore(string $id)
    {
        $banner = Banner::find($id);
        if($banner==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $banner->status = 2;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id()??1;

        $banner->save();
        $data = [
            'message' => 'Khôi phục thành công: ' . $id,
            'status' => $banner->status,
            'id' => $id
        ];
        return $data;
        //
    }
    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        if($banner==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $banner->delete();
        $data = [
            'message' => 'Xóa vĩnh viễn thành công: ' . $id,
            'status' => 1,
            'id' => $id
        ];
        return $data;
        //
    }
}
