<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Menu;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Topic;
use App\Models\Post;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Menu::where('menu.status','!=',0)
        ->select('menu.id','menu.name','menu.link','menu.sort_order','menu.position','menu.type','menu.status')
        ->orderBy('menu.created_at','desc')
        ->get();
        $list_brand = Brand::where('brand.status','!=',0)
        ->select('brand.id','brand.name','brand.status')
        ->orderBy('brand.created_at','desc')
        ->get();
        $list_category = Category::where('category.status','!=',0)
        ->select('category.id','category.name','category.status')
        ->orderBy('category.created_at','desc')
        ->get();
        $list_topic = Topic::where('topic.status','!=',0)
        ->select('topic.id','topic.name','topic.status')
        ->orderBy('topic.created_at','desc')
        ->get();
        $list_page = Post::where([['post.status','!=',0],['post.type','=','page']])
        ->select('post.id','post.title','post.status')
        ->orderBy('post.created_at','desc')
        ->get();
        return view('backend.menu.index',compact('list','list_brand','list_category','list_topic','list_page'));
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        if($request->createCategory){
            if($request->categoryId){
                foreach($request->categoryId as $id){
                    $category = Category::find($id);
                    if(!$category){
                        return redirect()->route('admin.menu.index')->with(['message'=>'Không tìm thấy danh mục cần thêm vào menu','color'=>'error']);
                    }
                    $menu = new Menu();
                    if(!$menu){
                        return redirect()->route('admin.menu.index')->with(['message'=>'Thêm menu thất bại','color'=>'error']);
                    }
                    $menu->name = $category->name;
                    $menu->link = 'danh-muc/'.$category->slug;
                    $menu->sort_order=0;
                    $menu->parent_id=0;
                    $menu->table_id=$id;
                    $menu->type = 'category';
                    $menu->position = $request->position;
                    //
                    $menu->status = $request->status;
                    $menu->created_at = date('Y-m-d H:i:s');
                    $menu->created_by = Auth::id()??1;
                    $menu->save();
                }
                return redirect()->route('admin.menu.index')->with('message','Thêm menu thành công');
            }
        }
        //

        if($request->createBrand){
            if($request->brandId){
                foreach($request->brandId as $id){
                    $brand = Brand::find($id);
                    if(!$brand){
                        return redirect()->route('admin.menu.index')->with(['message'=>'Không tìm thấy thương hiệu cần thêm vào menu','color'=>'error']);
                    }
                    $menu = new Menu();
                    if(!$menu){
                        return redirect()->route('admin.menu.index')->with(['message'=>'Thêm menu thất bại','color'=>'error']);
                    }
                    $menu->name = $brand->name;
                    $menu->link = 'thuong-hieu/'.$brand->slug;
                    $menu->sort_order=0;
                    $menu->parent_id=0;
                    $menu->table_id=$id;
                    $menu->type = 'brand';
                    $menu->position = $request->position;
                    $menu->status = $request->status;
                    $menu->created_at = date('Y-m-d H:i:s');
                    $menu->created_by = Auth::id()??1;
                    $menu->save();
                }
                return redirect()->route('admin.menu.index')->with('message','Thêm menu thành công');
            }
        }
        if($request->createTopic){
            if($request->topicId){
                foreach($request->topicId as $id){
                    $topic = Topic::find($id);
                    if(!$topic){
                        return redirect()->route('admin.menu.index')->with(['message'=>'Không tìm thấy chủ đề cần thêm vào menu','color'=>'error']);
                    }
                    $menu = new Menu();
                    if(!$menu){
                        return redirect()->route('admin.menu.index')->with(['message'=>'Thêm menu thất bại','color'=>'error']);
                    }
                    $menu->name = $topic->name;
                    $menu->link = 'chu-de/'.$topic->slug;
                    $menu->sort_order=0;
                    $menu->parent_id=0;
                    $menu->table_id=$id;
                    $menu->type = 'topic';
                    $menu->position = $request->position;

                    //
                    $menu->status = $request->status;
                    $menu->created_at = date('Y-m-d H:i:s');
                    $menu->created_by = Auth::id()??1;
                    $menu->save();
                    
                }
                return redirect()->route('admin.menu.index')->with('message','Thêm menu thành công');
            }
        }
        if($request->createPage){
            if($request->pageId){
                foreach($request->pageId as $id){
                    $page = Post::find($id);
                    if(!$page){
                        return redirect()->route('admin.menu.index')->with(['message'=>'Không tìm thấy trang đơn cần thêm vào menu','color'=>'error']);
                    }
                    $menu = new Menu();
                    if(!$menu){
                        return redirect()->route('admin.menu.index')->with(['message'=>'Thêm menu thất bại','color'=>'error']);
                    }
                    $menu->name = $page->title;
                    $menu->link = 'trang-don/'.$page->slug;
                    $menu->sort_order=0;
                    $menu->parent_id=0;
                    $menu->table_id=$id;
                    $menu->type = 'page';
                    $menu->position = $request->position;
                    $menu->status = $request->status;
                    $menu->created_at = date('Y-m-d H:i:s');
                    $menu->created_by = Auth::id()??1;
                    $menu->save();
                    
                }
                return redirect()->route('admin.menu.index')->with('message','Thêm menu thành công');
            }
        }
        if($request->createCustom){
                $menu = new Menu();
                if(!$menu){
                    return redirect()->route('admin.menu.index')->with(['message'=>'Thêm menu thất bại','color'=>'error']);
                }
                $menu->name = $request->name;
                $menu->link = $request->link;
                $menu->sort_order=0;
                $menu->parent_id=0;
                $menu->type = 'custom';
                $menu->position = $request->position;
                $menu->status = $request->status;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->created_by = Auth::id()??1;
                $menu->save();

                return redirect()->route('admin.menu.index')->with('message','Thêm menu thành công');
            
        }
        return redirect()->route('admin.menu.index')->with('message','Thêm không thành công!!');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $menu = Menu::find($id);
        if(!$menu){
            return redirect()->route('admin.menu.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        return view('backend.menu.show',compact('menu'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::find($id);
        if(!$menu){
            return redirect()->route('admin.menu.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        $list =  Menu::where([['menu.status','!=',0],['menu.id','!=',$id]])
        ->select('menu.id','menu.name','menu.link','menu.parent_id','menu.sort_order','menu.position','menu.type','menu.status')
        ->orderBy('menu.created_at','desc')
        ->get();
        $htmlparentId="";
        $htmlsortorder="";
        foreach ($list as $item){
            if($menu->parent_id == $item->id){
                $htmlparentId.="<option value = '$item->id' selected > $item->name </option>";
            }else{
                $htmlparentId.="<option value = '$item->id'  > $item->name </option>";
            }
            if($menu->sort_order == $item->sort_order+1){
                $htmlsortorder.="<option value='". $item->sort_order+1 ."' selected >Sau:" . $item->name ."</option>";
            }else{
                $htmlsortorder.="<option value='". $item->sort_order+1 ."' >Sau:" . $item->name ."</option>";
            }
        }
        return view('backend.menu.edit',compact('menu','htmlparentId','htmlsortorder'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, string $id)
    {
        $menu = Menu::find($id);
        if(!$menu){
            return redirect()->route('admin.menu.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->sort_order=$request->sort_order;
        $menu->parent_id=$request->parent_id;

        $menu->type = $request->type;
        $menu->position = $request->position;

        //
        $menu->status = $request->status;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id()??1;
        $menu->save();

        return redirect()->route('admin.menu.index')->with('message','Cập nhật menu thành công');
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function trash()
    {
        $list = Menu::where('menu.status','=',0)
        ->select('menu.id','menu.name','menu.link','menu.sort_order','menu.position','menu.type','menu.status')
        ->orderBy('menu.created_at','desc')
        ->get();
        return view('backend.menu.trash',compact('list'));
        //
    }
    public function status(string $id)
    {
        $menu = Menu::find($id);
        if($menu==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }

        $menu->status = $menu->status==1?2:1;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id()??1;
        $menu->save();
        $data = [
            'message' => 'Thay đổi trạng thái thành công: ' . $id,
            'status' => $menu->status,
            'id' => $id
        ];
        return $data;

        //
    }
    public function delete(string $id)
    {
        $menu = Menu::find($id);
        if($menu==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $menu->status = 0;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id()??1;
        $menu->save();
        
        $data = [
            'message' => 'Xóa thành công: ' . $id,
            'status' => $menu->status,
            'id' => $id
        ];
        return $data;
    }
    public function restore(string $id)
    {
        $menu = Menu::find($id);
        if($menu==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $menu->status = 2;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id()??1;

        $menu->save();
        $data = [
            'message' => 'Khôi phục thành công: ' . $id,
            'status' => $menu->status,
            'id' => $id
        ];
        return $data;
        //
    }
    public function destroy(string $id)
    {
        $menu = Menu::find($id);
        if($menu==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $menu->delete();
        $data = [
            'message' => 'Xóa vĩnh viễn thành công: ' . $id,
            'status' => 1,
            'id' => $id
        ];
        return $data;
        //
    }

}
