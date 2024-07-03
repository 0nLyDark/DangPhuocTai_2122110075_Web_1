@section('title','Trang chủ')
@extends('layouts.site')
@section('footer')
    <script src="{{ asset('js/style-home.js') }}"></script>
@endsection

@section('content')
    <x-slider />
    <x-product-sale/>
    <x-product-new />
    <x-product-category-home :category="$name='Nam'"/>
    <x-product-category-home :category="$name='Nữ'"/>
    <x-post-new />
    <section style="border-top: 1px grey solid">
        <div class="container " >
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 col-12 py-4" >
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ asset('image/icon__1.webp') }}" alt="{{ asset('image/icon__1') }}"  class="img-fluid w-100">
                        </div>
                        <div class="col-9">
                            <h6>Miễn phí vận chuyển</h6>
                            <p>Miễn phí đơn hàng từ 699.000đ</p>                
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-12 py-4 " >
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ asset('image/icon__2.webp') }}" alt="{{ asset('image/icon__1') }}"  class="img-fluid w-100">
                        </div>
                        <div class="col-9">
                            <h6>Miễn phí cước đổi hàng</h6>
                            <p>Đổi trả hàng sau 7 ngày nếu không vừa ý</p>                
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-12 py-4 " >
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ asset('image/icon__3.webp') }}" alt="{{ asset('image/icon__1') }}"  class="img-fluid w-100">
                        </div>
                        <div class="col-9">
                            <h6>Tổng Đài Bán Hàng Miễn Phí</h6>
                            <p>Gọi 1800.0000 để được tư vấn</p>                
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 col-12 py-4 " >
                    <div class="row">
                        <div class="col-3">
                            <img src="{{ asset('image/icon__4.webp') }}" alt="{{ asset('image/icon__1') }}"  class="img-fluid w-100">
                        </div>
                        <div class="col-9">
                            <h6>Thanh toán đa dạng</h6>
                            <p>Phương thức thanh toán đa dạng</p>                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

