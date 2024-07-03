<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $list = Category::where('category.status','!=',0)
        ->leftJoin('category as category2','category.parent_id','=','category2.id')
        ->select('category.id','category.image','category2.name as parentname','category.name','category.slug','category.parent_id','category.sort_order','category.description','category.status')
        ->orderBy('category.created_at','desc')
        ->get();
        $htmlparentId="";
        $htmlsortorder="";
        foreach ($list as $item){
            $old_parent=old('parent_id')==$item->id?'selected':'';
            $old_sort=old('sort_order')==$item->sort_order+1?'selected':'';

            $htmlparentId.="<option value = '$item->id' $old_parent > $item->name </option>";
            $htmlsortorder.="<option value='". $item->sort_order+1 ."' $old_sort >Sau:" . $item->name ."</option>";
        }
        
        return view('backend.category.index',compact('list','htmlparentId','htmlsortorder'));
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        if(!$category){
            return redirect()->route('admin.category.index')->with(['message'=>'thêm danh mục thất bại','color'=>'error']);
        }
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;
        if($request->image)
        {
            $exten = $request->file('image')->extension();
            if(in_array($exten,['jpg','png','gif','webp'])){
                $file_name = $category->slug . "." . $exten;
                $request->image->move(public_path('image/categorys'),$file_name);
                $category->image = $file_name;
            }
        }
        //
        $category->status = $request->status;
        $category->created_at = date('Y-m-d H:i:s');
        $category->created_by = Auth::id()??1;
        $category->save();
        return redirect()->route('admin.category.index')->with('message','Thêm danh mục thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);
        if($category==null){
            return redirect()->route('admin.category.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        return view('backend.category.show',compact('category'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        if($category==null){
            return redirect()->route('admin.category.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        $list =  Category::where([['category.status','!=',0],['category.id','!=',$id]])
        ->leftJoin('category as category2','category.parent_id','=','category2.id')
        ->select('category.id','category.image','category2.name as parentname','category.name','category.slug','category.parent_id','category.sort_order','category.description','category.status')
        ->orderBy('category.created_at','desc')
        ->get();
        $htmlparentId="";
        $htmlsortorder="";
        foreach ($list as $item){
            if($category->parent_id == $item->id){
                $htmlparentId.="<option value = '$item->id' selected > $item->name </option>";
            }else{
                $htmlparentId.="<option value = '$item->id'  > $item->name </option>";
            }
            if($category->sort_order == $item->sort_order+1){
                $htmlsortorder.="<option value='". $item->sort_order+1 ."' selected >Sau:" . $item->name ."</option>";
            }else{
                $htmlsortorder.="<option value='". $item->sort_order+1 ."' >Sau:" . $item->name ."</option>";
            }
        }
        return view('backend.category.edit',compact('category','htmlparentId','htmlsortorder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $category = Category::find($id);
        if($category==null){
            return redirect()->route('admin.category.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;
        if($request->image)
        {
            $exten = $request->file('image')->extension();
            if(in_array($exten,['jpg','png','gif','webp'])){
                $file_name = $category->slug . "." . $exten;
                $request->image->move(public_path('image/categorys'),$file_name);
                $category->image = $file_name;
            }
        }
        //
        $category->status = $request->status;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id()??1;
        $category->save();
        return redirect()->route('admin.category.index')->with('message','Cập nhật danh mục thành công');
    
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash()
    {
        $list = Category::where('category.status','=',0)
        ->leftJoin('category as category2','category.parent_id','=','category2.id')
        ->select('category.id','category.image','category2.name as parentname','category.name','category.slug','category.parent_id','category.sort_order','category.description','category.status')
        ->orderBy('category.created_at','desc')
        ->get();
        return view('backend.category.trash',compact('list'));
        //
    }

    public function status(string $id)
    {
        $category = Category::find($id);
        if($category==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }

        $category->status = $category->status==1?2:1;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id()??1;
        $category->save();
        $data = [
            'message' => 'Thay đổi trạng thái thành công: ' . $id,
            'status' => $category->status,
            'id' => $id
        ];
        return $data;

        //
    }
    public function delete(string $id)
    {
        $category = Category::find($id);
        if($category==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $category->status = 0;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id()??1;
        $category->save();
        
        $data = [
            'message' => 'Xóa thành công: ' . $id,
            'status' => $category->status,
            'id' => $id
        ];
        return $data;
    }
    public function restore(string $id)
    {
        $category = Category::find($id);
        if($category==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $category->status = 2;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id()??1;

        $category->save();
        $data = [
            'message' => 'Khôi phục thành công: ' . $id,
            'status' => $category->status,
            'id' => $id
        ];
        return $data;
        //
    }
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if($category==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $category->delete();
        $data = [
            'message' => 'Xóa vĩnh viễn thành công: ' . $id,
            'status' => 1,
            'id' => $id
        ];
        return $data;
        //
    }
}
