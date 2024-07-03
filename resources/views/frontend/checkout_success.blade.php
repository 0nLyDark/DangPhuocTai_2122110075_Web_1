@section('title','Giỏ hàng')
@extends('layouts.site')
@section('content')
    <section class="content">
        <div class="container py-4 text-center">
            <img class="img-fluid" src="{{ asset('image/cart_success.png') }}" alt="">
            <h2 class="text-center my-4">Bạn đã đặt hàng thành công</h2>
            <a class="btn form-control m-2" href="{{ route('site.home') }}" style="color:white;background: gray;max-width:250px" ><strong >Quay về trang chủ</strong></a>
            <a class="btn form-control m-2" href="{{ route('site.product') }}" style="color:white;background: black;max-width:250px" ><strong >Tiếp tục mua hàng</strong></a>

        </div>
    </section>
@endsection    
@section('footer')

@endsection

