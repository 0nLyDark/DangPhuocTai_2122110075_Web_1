<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Brand::where('brand.status','!=',0)
        ->select('brand.id','brand.image','brand.name','brand.slug','brand.sort_order','brand.description','brand.status')
        ->orderBy('brand.created_at','desc')
        ->get();
        $htmlsortorder="";
        foreach ($list as $item){
            $old_sort=old('sort_order')==$item->sort_order+1?'selected':'';

            $htmlsortorder.="<option value='". $item->sort_order+1 ."' $old_sort >Sau:" . $item->name ."</option>";
        }
        return view('backend.brand.index',compact('list','htmlsortorder'));
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request)
    {
        $brand = new Brand();
        if(!$brand){
            return redirect()->route('admin.brand.index')->with(['message'=>'thêm thương hiệu thất bại','color'=>'error']);
        }
        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;
        if($request->image)
        {
            $exten = $request->file('image')->extension();
            if(in_array($exten,['jpg','png','gif','webp'])){
                $file_name = $brand->slug . "." . $exten;
                $request->image->move(public_path('image/brands'),$file_name);
                $brand->image = $file_name;
            }
        }
        //
        $brand->status = $request->status;
        $brand->created_at = date('Y-m-d H:i:s');
        $brand->created_by = Auth::id()??1;
        $brand->save();
        return redirect()->route('admin.brand.index')->with('message','Thêm thương hiệu thành công');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::find($id);
        if(!$brand){
            return redirect()->route('admin.brand.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        return view('backend.brand.show',compact('brand'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        if(!$brand){
            return redirect()->route('admin.brand.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        $list = Brand::where('brand.status','!=',0)
        ->select('brand.id','brand.image','brand.name','brand.slug','brand.sort_order','brand.description','brand.status')
        ->orderBy('brand.created_at','desc')
        ->get();
        $htmlsortorder="";
        foreach ($list as $item){
            if($brand->sort_order == $item->sort_order+1){
                $htmlsortorder.="<option value='". $item->sort_order+1 ."' selected >Sau:" . $item->name ."</option>";
            }else{
                $htmlsortorder.="<option value='". $item->sort_order+1 ."' >Sau:" . $item->name ."</option>";
            }
        }
        return view('backend.brand.edit',compact('brand','htmlsortorder'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, string $id)
    {
        $brand = Brand::find($id);
        if(!$brand){
            return redirect()->route('admin.brand.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }

        $brand->name = $request->name;
        $brand->slug = Str::of($request->name)->slug('-');
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;
        if($request->image)
        {
            $exten = $request->file('image')->extension();
            if(in_array($exten,['jpg','png','gif','webp'])){
                $file_name = $brand->slug . "." . $exten;
                $request->image->move(public_path('image/brands'),$file_name);
                $brand->image = $file_name;
            }
        }
        //
        $brand->status = $request->status;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id()??1;
        $brand->save();
        return redirect()->route('admin.brand.index')->with('message','Cập nhật thương hiệu thành công');;

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $brand = Brand::find($id);
        if($brand==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }

        $brand->delete();
        $data = [
            'message' => 'Xóa vĩnh viễn thành công: ' . $id,
            'status' => 1,
            'id' => $id
        ];
        return $data;
        //
    }
    public function trash()
    {
        $list = Brand::where('brand.status','=',0)
        ->select('brand.id','brand.image','brand.name','brand.slug','brand.sort_order','brand.description','brand.status')
        ->orderBy('brand.created_at','desc')
        ->get();
        return view('backend.brand.trash',compact('list'));
        //
    }
    public function status(string $id)
    {
        $brand = Brand::find($id);
        if($brand==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $brand->status = $brand->status==1?2:1;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id()??1;

        $brand->save();

        $data = [
            'message' => 'Thay đổi trạng thái thành công: ' . $id,
            'status' => $brand->status,
            'id' => $id
        ];
        return $data;    

        //
    }
    public function delete(string $id)
    {
        $brand = Brand::find($id);
        if($brand==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }

        $brand->status = 0;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id()??1;

        $brand->save();
        $data = [
            'message' => 'Xóa thành công: ' . $id,
            'status' => $brand->status,
            'id' => $id
        ];
        return $data;
        //
    }
    public function restore(string $id)
    {
        $brand = Brand::find($id);
        if($brand==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $brand->status = 2;
        $brand->updated_at = date('Y-m-d H:i:s');
        $brand->updated_by = Auth::id()??1;

        $brand->save();
        $data = [
            'message' => 'Khôi phục thành công: ' . $id,
            'status' => $brand->status,
            'id' => $id
        ];
        return $data;
        //
    }
}
