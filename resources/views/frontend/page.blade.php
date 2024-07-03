@section('title',$page->title)
@extends('layouts.site')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-9" style="box-shadow:8px 8px 8px 8px rgba(0,0,0,0.4)">
            <h1 class="text-center mt-4 ">{{ $page->title }}</h1>
            {{-- <p><i class="fa-solid fa-calendar-days"></i> {{ $page->created_at->format('d/m/y') }}</p> --}}
            <p class="my-4 mx-2 p-2" style="background-color:whitesmoke">{!! $page->description !!}</p>
            <div class="px-4 pb-4 text-center">
                <img class="img-fluid" src="{{ asset('image/posts/'.$page->image) }}" alt="{{ $page->image }}">
            </div>
            {!! $page->detail !!}

        </div>
        <div class="col-md-3">
            <div class="topic">
                <h1 class="text-center py-4">Trang đơn khác</h1>
                <ul>
                    @foreach ($list_page as $item)
                        <li><a href="{{ route('site.page',['slug'=>$item->slug]) }}" >{{ $item->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    
</div>

@endsection

