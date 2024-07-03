<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Topic;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Post::where('post.status','!=',0)
        ->leftJoin('topic','topic_id','=','topic.id')
        ->select('post.id','topic.name as topicname','post.title','post.slug','post.type','post.image','post.status')
        ->orderBy('post.created_at','desc')
        ->get();
        return view('backend.post.index',compact('list'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_topic = Topic::where('topic.status','!=',0)
        ->select('topic.id','topic.name','topic.status')
        ->orderBy('topic.created_at','desc')
        ->get();
        $html_topic='';
        foreach($list_topic as $item){
            $old=old('topic_id')==$item->id?'selected':'';
            $html_topic.="<option value=' $item->id ' $old > $item->name </option>";
        }
        return view('backend.post.create',compact('html_topic'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        if(!$post){
            return redirect()->route('admin.post.index')->with(['message'=>'Thêm bài viết thất bại','color'=>'error']);
        }
        $post->title = $request->title;
        $post->slug = Str::of($request->title)->slug('-');
        $post->description = $request->description;
        $post->detail = $request->detail;
        $post->type = $request->type;
        if($request->topic_id){
            $post->topic_id=$request->topic_id;
        }
        if($request->image)
        {
            $exten = $request->file('image')->extension();
            if(in_array($exten,['jpg','png','gif','webp'])){
                $file_name = $post->slug . "." . $exten;
                $request->image->move(public_path('image/posts'),$file_name);
                $post->image = $file_name;
            }
        }
        //
        $post->status = $request->status;
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = Auth::id()??1;
        $post->save();

        return redirect()->route('admin.post.index')->with('message','Thêm bài viết thành công');  
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        if(!$post){
            return redirect()->route('admin.post.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        return view('backend.post.show',compact('post'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if(!$post){
            return redirect()->route('admin.post.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        $list_topic = Topic::where('topic.status','!=',0)
        ->select('topic.id','topic.name','topic.status')
        ->orderBy('topic.created_at','desc')
        ->get();
        $html_topic='';
        foreach($list_topic as $item){
            if($post->topic_id == $item->id){
                $html_topic.="<option value=' $item->id ' selected > $item->name </option>";
            }else{
                $html_topic.="<option value=' $item->id ' > $item->name </option>";
            }
        }
        return view('backend.post.edit',compact('post','html_topic'));

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::find($id);
        if(!$post){
            return redirect()->route('admin.post.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        $post->title = $request->title;
        $post->slug = Str::of($request->title)->slug('-');
        $post->description = $request->description;
        $post->detail = $request->detail;
        $post->type = $request->type;
        if($request->topic_id){
            $post->topic_id=$request->topic_id;
        }
        if($request->image)
        {
            $exten = $request->file('image')->extension();
            if(in_array($exten,['jpg','png','gif','webp'])){
                $file_name = $post->slug . "." . $exten;
                $request->image->move(public_path('image/posts'),$file_name);
                $post->image = $file_name;
            }
        }
        //
        $post->status = $request->status;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id()??1;
        $post->save();

        return redirect()->route('admin.post.index')->with('message','Cập nhật bài viết thành công');
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function trash()
    {
        $list = Post::where('post.status','=',0)
        ->leftJoin('topic','topic_id','=','topic.id')
        ->select('post.id','topic.name as topicname','post.title','post.slug','post.type','post.image','post.status')
        ->orderBy('post.created_at','desc')
        ->get();
        return view('backend.post.trash',compact('list'));
        //
    }
    public function status(string $id)
    {
        $post = Post::find($id);
        if($post==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }

        $post->status = $post->status==1?2:1;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id()??1;
        $post->save();
        $data = [
            'message' => 'Thay đổi trạng thái thành công: ' . $id,
            'status' => $post->status,
            'id' => $id
        ];
        return $data;

        //
    }
    public function delete(string $id)
    {
        $post = Post::find($id);
        if($post==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $post->status = 0;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id()??1;
        $post->save();
        
        $data = [
            'message' => 'Xóa thành công: ' . $id,
            'status' => $post->status,
            'id' => $id
        ];
        return $data;
    }
    public function restore(string $id)
    {
        $post = Post::find($id);
        if($post==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $post->status = 2;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id()??1;

        $post->save();
        $data = [
            'message' => 'Khôi phục thành công: ' . $id,
            'status' => $post->status,
            'id' => $id
        ];
        return $data;
        //
    }
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if($post==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $post->delete();
        $data = [
            'message' => 'Xóa vĩnh viễn thành công: ' . $id,
            'status' => 1,
            'id' => $id
        ];
        return $data;
        //
    }
}
