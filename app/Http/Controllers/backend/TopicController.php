<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Topic;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Topic::where('topic.status','!=',0)
        ->select('topic.id','topic.name','topic.slug','topic.description','topic.status')
        ->orderBy('topic.created_at','desc')
        ->get();
        $htmlsortorder='';
        foreach($list as $item){
            $old=old('sort_order') == ($item->sort_order+1)?'selected':'';
            $htmlsortorder.="<option value='". ($item->sort_order+1) ."' $old >Sau:" . $item->name ."</option>";
        }
        return view('backend.topic.index',compact('list','htmlsortorder'));
        //
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTopicRequest $request)
    {
        $topic = new Topic();
        if(!$topic){
            return redirect()->route('admin.topic.index')->with(['message'=>'Thêm chủ đề thất bại','color'=>'error']);
        }
        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->description = $request->description;
        $topic->sort_order = $request->sort_order;
        //
        $topic->status = $request->status;
        $topic->created_at = date('Y-m-d H:i:s');
        $topic->created_by = Auth::id()??1;
        $topic->save();
        return redirect()->route('admin.topic.index')->with('message','Thêm chủ đề thành công');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic = Topic::find($id);
        if(!$topic){
            return redirect()->route('admin.topic.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        return view('backend.topic.show',compact('topic'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic = Topic::find($id);
        if(!$topic){
            return redirect()->route('admin.topic.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        $list = Topic::where('topic.status','!=',0)
        ->select('topic.id','topic.name','topic.slug','topic.description','topic.status')
        ->orderBy('topic.created_at','desc')
        ->get();
        $htmlsortorder='';
        foreach($list as $item){
            if($topic->sort_order == $item->sort_order+1){
                $htmlsortorder.="<option value='". ($item->sort_order+1) ."' selected >Sau:" . $item->name ."</option>";
            }else{
                $htmlsortorder.="<option value='". ($item->sort_order+1) ."' >Sau:" . $item->name ."</option>";
            }
        }
        return view('backend.topic.edit',compact('topic','htmlsortorder'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, string $id)
    {
        $topic = Topic::find($id);
        if(!$topic){
            return redirect()->route('admin.topic.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->description = $request->description;
        $topic->sort_order = $request->sort_order;
        //
        $topic->status = $request->status;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id()??1;
        $topic->save();
        return redirect()->route('admin.topic.index')->with('message','Cập nhật chủ đề thành công');
        //
    }

    /**
     * Remove the specified resource from storage.
     */

    public function trash()
    {
        $list = Topic::where('topic.status','=',0)
        ->select('topic.id','topic.name','topic.slug','topic.description','topic.status')
        ->orderBy('topic.created_at','desc')
        ->get();
        return view('backend.topic.trash',compact('list'));
        //
    }
    public function status(string $id)
    {
        $topic = Topic::find($id);
        if($topic==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }

        $topic->status = $topic->status==1?2:1;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id()??1;
        $topic->save();
        $data = [
            'message' => 'Thay đổi trạng thái thành công: ' . $id,
            'status' => $topic->status,
            'id' => $id
        ];
        return $data;

        //
    }
    public function delete(string $id)
    {
        $topic = Topic::find($id);
        if($topic==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $topic->status = 0;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id()??1;
        $topic->save();
        
        $data = [
            'message' => 'Xóa thành công: ' . $id,
            'status' => $topic->status,
            'id' => $id
        ];
        return $data;
    }
    public function restore(string $id)
    {
        $topic = Topic::find($id);
        if($topic==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $topic->status = 2;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id()??1;

        $topic->save();
        $data = [
            'message' => 'Khôi phục thành công: ' . $id,
            'status' => $topic->status,
            'id' => $id
        ];
        return $data;
        //
    }
    public function destroy(string $id)
    {
        $topic = Topic::find($id);
        if($topic==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $topic->delete();
        $data = [
            'message' => 'Xóa vĩnh viễn thành công: ' . $id,
            'status' => 1,
            'id' => $id
        ];
        return $data;
        //
    }
}
