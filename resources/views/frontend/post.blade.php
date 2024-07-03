@section('title','Bài viết')
@extends('layouts.site')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-9" style="box-shadow:8px 8px 8px 8px rgba(0,0,0,0.4)">
            <h1 class="text-center py-4">Tất cả bài viết</h1>
            @foreach ($list_post as $item)
            <div class="row post_row">
                <div class="col-md-4">
                    <div class="image">
                        <a href="{{ route('site.post.detail',['slug'=>$item->slug]) }}" >
                            <img class="img-fluid " src="{{ asset('image/posts/'.$item->image) }}" alt="{{ $item->image }}">
                        </a>
                    </div>
                </div>
                <div class="col-md-8">
                    <a href="{{ route('site.post.detail',['slug'=>$item->slug]) }}" >
                        <h1 style="font-size: 18px">{{ $item->title }}</h1>
                    </a>
                    <p><i class="fa-solid fa-calendar-days"></i> {{ $item->created_at->format('d/m/y') }}</p>
                    <p>{!! $item->description !!}</p>
                </div>
            </div>
            <a href="{{ route('site.post.detail',['slug'=>$item->slug]) }}" class="post-item p-2 my-4"></a>
            @endforeach
            <div class="col-12 d-flex justify-content-center">
                {{ $list_post->links() }}
            </div>
        </div>
        <div class="col-md-3">
            <x-topic-list />
        </div>
    </div>
    
</div>

@endsection

