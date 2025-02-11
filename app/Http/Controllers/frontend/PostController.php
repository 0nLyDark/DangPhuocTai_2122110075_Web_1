<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Topic;
class PostController extends Controller
{
    public function index(){
        $list_post = Post::where([['status','=',1],['type','=','post']])
        ->orderBy('created_at','desc')
        ->paginate(6);
        return view('frontend.post',compact('list_post'));
    }
    public function detail($slug){
        $post = Post::where([['status','=',1],['type','=','post'],['slug','=',$slug]])->first();
        $list_post = Post::where([['status','=',1],['type','=','post'],['topic_id','=',$post->topic_id],['id','!=',$post->id]])
        ->orderBy('created_at','desc')
        ->limit(3)
        ->get();
        return view('frontend.post_detail',compact('post','list_post'));
    }
    public function topic($slug){
        $topic = Topic::where('slug','=',$slug)->select('id','name')->first();
        $topicname = $topic->name;
        $list_post = Post::where([['status','=',1],['type','=','post'],['topic_id','=',$topic->id]])
        ->orderBy('created_at','desc')
        ->paginate(6);
        return view('frontend.post_topic',compact('list_post','topicname'));
    }
    public function page($slug){
        $page = Post::where([['status','=',1],['type','=','page'],['slug','=',$slug]])->first();
        $list_page = Post::where([['status','=',1],['type','=','page'],['id','!=',$page->id]])
        ->orderBy('created_at','desc')
        ->get();
        return view('frontend.page',compact('list_page','page'));
    }
    //
}
