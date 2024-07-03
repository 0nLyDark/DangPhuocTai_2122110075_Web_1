<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Product::where('product.status','!=',0)
        ->join('category','product.category_id','=','category.id')
        ->join('brand','product.brand_id','=','brand.id')
        ->select('product.id','product.image','product.name','category.name as categoryname','brand.name as brandname','product.status')
        ->orderBy('product.created_at','desc')
        ->get();
        return view('backend.product.index',compact('list'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_brand = Brand::where('brand.status','!=',0)
        ->select('brand.id','brand.name','brand.status')
        ->orderBy('brand.created_at','desc')
        ->get();
        $list_category = Category::where('category.status','!=',0)
        ->select('category.id','category.name','category.status')
        ->orderBy('category.created_at','desc')
        ->get();
        $html_brand='';
        $html_category='';
        foreach ($list_brand as $item){
            $old=old('brand_id')==$item->id?'selected':'';
            $html_brand.="<option value='$item->id' $old > $item->name </option>";
        }
        foreach ($list_category as $item){
            $old=old('category_id')==$item->id?'selected':'';
            $html_category.="<option value='$item->id' $old > $item->name </option>";
        }

        return view('backend.product.create',compact('html_brand','html_category'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product();
        if(!$product){
            return redirect()->route('admin.product.index')->with(['message'=>'Thêm sản phẩm thất bại','color'=>'error']);
        }
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->detail = $request->detail;
        $product->price = $request->price;
        if($request->pricesale){
            $product->pricesale = $request->pricesale;
        }
        $product->qty = $request->qty;
        if($request->image)
        {
            $exten = $request->file('image')->extension();
            if(in_array($exten,['jpg','png','gif','webp'])){
                $file_name = $product->slug . "." . $exten;
                $request->image->move(public_path('image/products'),$file_name);
                $product->image = $file_name;
            }
        }
        //
        $product->status = $request->status;
        $product->created_at = date('Y-m-d H:i:s');
        $product->created_by = Auth::id()??1;
        $product->save();

        return redirect()->route('admin.product.index')->with('message','Thêm sản phẩm thành công');        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        if(!$product){
            return redirect()->route('admin.product.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        return view('backend.product.show',compact('product'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        if(!$product){
            return redirect()->route('admin.product.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        $list_brand = Brand::where('brand.status','!=',0)
        ->select('brand.id','brand.name','brand.status')
        ->orderBy('brand.created_at','desc')
        ->get();
        $list_category = Category::where('category.status','!=',0)
        ->select('category.id','category.name','category.status')
        ->orderBy('category.created_at','desc')
        ->get();
        $html_brand='';
        $html_category='';
        foreach ($list_brand as $item){
            if($product->brand_id == $item->id){
                $html_brand.="<option value='$item->id' selected > $item->name </option>";
            }else{
                $html_brand.="<option value='$item->id'  > $item->name </option>";
            }
        }
        foreach ($list_category as $item){
            if($product->category_id == $item->id){
                $html_category.="<option value='$item->id' selected > $item->name </option>";
            }else{
                $html_category.="<option value='$item->id'  > $item->name </option>";
            }
        }

        return view('backend.product.edit',compact('product','html_brand','html_category'));

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $product = Product::find($id);
        if(!$product){
            return redirect()->route('admin.product.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->detail = $request->detail;
        $product->price = $request->price;
        if($request->pricesale){
            $product->pricesale = $request->pricesale;
        }
        $product->qty = $request->qty;
        if($request->image)
        {
            $exten = $request->file('image')->extension();
            if(in_array($exten,['jpg','png','gif','webp'])){
                $file_name = $product->slug . "." . $exten;
                $request->image->move(public_path('image/products'),$file_name);
                $product->image = $file_name;
            }
        }
        //
        $product->status = $request->status;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id()??1;
        $product->save();

        return redirect()->route('admin.product.index')->with('message','Cập nhật sản phẩm thành công');;
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $product = Product::find($id);
        if($product == null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }

        $product->delete();
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
        $list = Product::where('product.status','=',0)
        ->join('category','product.category_id','=','category.id')
        ->join('brand','product.brand_id','=','brand.id')
        ->select('product.id','product.image','product.name','category.name as categoryname','brand.name as brandname','product.status')
        ->orderBy('product.created_at','desc')
        ->get();
        return view('backend.product.trash',compact('list'));
        //
    }
    public function status(string $id)
    {
        $product = Product::find($id);
        if($product==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $product->status = $product->status==1?2:1;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id()??1;

        $product->save();
        $data = [
            'message' => 'Thay đổi trạng thái thành công: ' . $id,
            'status' => $product->status,
            'id' => $id
        ];
        return $data;        //
    }
    public function delete(string $id)
    {
        $product = Product::find($id);
        if($product==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        
        $product->status = 0;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id()??1;

        $product->save();
        $data = [
            'message' => 'Xóa thành công: ' . $id,
            'status' => $product->status,
            'id' => $id
        ];
        return $data;
        //
    }
    public function restore(string $id)
    {
        $product = Product::find($id);
        if($product==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $product->status = 2;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id()??1;

        $product->save();
        $data = [
            'message' => 'Khôi phục thành công: ' . $id,
            'status' => $product->status,
            'id' => $id
        ];
        return $data;
        //
    }
}
