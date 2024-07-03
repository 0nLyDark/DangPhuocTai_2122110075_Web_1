@section('title',$post->title)
@extends('layouts.site')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-9" style="box-shadow:8px 8px 8px 8px rgba(0,0,0,0.4)">
            <h1 class="fs-4 mt-4">{{ $post->title }}</h1>
            <p><i class="fa-solid fa-calendar-days"></i> {{ $post->created_at->format('d/m/y') }}</p>
            <p class="my-4 mx-2 p-2" style="background-color:whitesmoke">{{ $post->description }}</p>
            <div class="px-4 pb-4 text-center">
                <img class="img-fluid" src="{{ asset('image/posts/'.$post->image) }}" alt="{{ $post->image }}">
            </div>
            {!! $post->detail !!}

            <div class="row mt-4">
                <h4 class="my-4">Các bài viết liên quan</h4>
                @foreach ($list_post as $item)
                    <div class="col-md-4 post_row my-2">
                        <div class="image">
                            <a href="{{ route('site.post.detail',['slug'=>$item->slug]) }}">
                                <img src="{{ asset('image/posts/'.$item->image) }}" alt="{{ $item->image }}" class="img-fluid w-100">
                            </a>
                        </div>
                        <a href="{{ route('site.post.detail',['slug'=>$item->slug]) }}">
                            <h6 class="my-2">{{ $item->title }}</h6>
                        </a>
                        <p><i class="fa-solid fa-calendar-days"></i> {{ $item->created_at->format('d/m/y') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-3">
            <x-topic-list />
        </div>
    </div>
    
</div>

@endsection

