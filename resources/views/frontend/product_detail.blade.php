@section('title','Chi tiết sản phẩm')
@extends('layouts.site')
@section('content')
    <section class="content">
        <div class="container p-4">
            <div class="row product-detail">
                <div class="col-md-6 col-12 ">
                    <img src="{{ asset('image/hinh 2.webp') }}" class="img-fluid">
                </div>
                <div class="col-md-6 col-12 ps-4">
                    <h4 class="product-detail-name">Gấu trúc</h4>
                    <p class="product-detail-brand">Thương hiệu: Gau truc </p>
                    <p><span class="product-detail-price" >142.000 ₫</span> <span class="ms-2"><del>174.000 ₫</del></span></p>
                    <p>Chọn kích thước: <strong id="size_value" style="text-transform: uppercase;">s</strong></p>
                    <div class="size__btn mb-3">
                        <label for="s-btn" class="active ">
                            <input type="radio" name="size_product" id="s-btn"  value="s" checked>
                            s
                        </label>
                        <label for="m-btn">
                            <input type="radio" name="size_product" id="m-btn"  value="m">
                            m
                        </label>
                        <label for="l-btn">
                            <input type="radio" name="size_product" id="l-btn"  value="l">
                            l
                        </label>
                        <label for="xl-btn">
                            <input type="radio" name="size_product" id="xl-btn"  value="xl">
                            xl
                        </label>
                    </div>
                    <div class="mb-4 quantity-plus-minus input-group" style="height:32px">
                        <label for="quantity" class="pe-2">Số lượng:</label>
                        <i  class="fa-solid fa-minus input-group-btn minus"></i><input class="text-center" type="text" id="quantity" value="1" style="width: 32px"><i  class="fa-solid fa-plus input-group-btn plus"></i>
                    </div>
                    <button class="btn " style="background-color: aqua;">Thêm vào giỏ hàng</button>
                    <button class="btn  ms-2" style="background-color: rgb(0, 255, 200);">Mua Ngay</button>
                    <div class="mt-4">
                        <h6>Mô tả:</h6>
                        <p>asdsadfafassfasdfsdfsdfsdf
                            sdfsdfsdfs
                        </p>
                        <p>asdsadfafassfasdfsdfsdfsdf
                            sdfsdfsdfs
                        </p>
                        <p>asdsadfafassfasdfsdfsdfsdf
                            sdfsdfsdfs
                        </p>
                        <p>asdsadfafassfasdfsdfsdfsdf
                            sdfsdfsdfs
                        </p>
                        <p>asdsadfafassfasdfsdfsdfsdf
                            sdfsdfsdfs
                        </p>
                        <p>asdsadfafassfasdfsdfsdfsdf
                            sdfsdfsdfs
                        </p>
                    </div>
                </div>
            </div>
            <hr/>
            <h2 class="text-center my-4">SẢN PHẨM TƯƠNG TỰ</h2>
            <div class="row ">
                <div class="col-md-3 col-6">
                    <div class="product-item border">
                        <div class="product-item-image">
                            <a href="" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                        <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                        <button class="btn form-control">Add to Cart</button>

                        </div>
                        <div class="product-item-name">
                            <a href=""><h5>Gau truc </h5></a>
                        </div>
                        <div class="product-item-price">
                            <p><strong>142.000 đ</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="product-item border">
                        <div class="product-item-image">
                            <a href="" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                        <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                        <button class="btn form-control">Add to Cart</button>

                        </div>
                        <div class="product-item-name">
                            <a href=""><h5>Gau truc </h5></a>
                        </div>
                        <div class="product-item-price">
                            <p><strong>142.000 đ</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="product-item border">
                        <div class="product-item-image">
                            <a href="" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                        <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                        <button class="btn form-control">Add to Cart</button>

                        </div>
                        <div class="product-item-name">
                            <a href=""><h5>Gau truc </h5></a>
                        </div>
                        <div class="product-item-price">
                            <p><strong>142.000 đ</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="product-item border">
                        <div class="product-item-image">
                            <a href="" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                        <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                        <button class="btn form-control">Add to Cart</button>

                        </div>
                        <div class="product-item-name">
                            <a href=""><h5>Gau truc </h5></a>
                        </div>
                        <div class="product-item-price">
                            <p><strong>142.000 đ</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="product-item border">
                        <div class="product-item-image">
                            <a href="" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                        <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                        <button class="btn form-control">Add to Cart</button>

                        </div>
                        <div class="product-item-name">
                            <a href=""><h5>Gau truc </h5></a>
                        </div>
                        <div class="product-item-price">
                            <p><strong>142.000 đ</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="product-item border">
                        <div class="product-item-image">
                            <a href="" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                        <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                        <button class="btn form-control">Add to Cart</button>

                        </div>
                        <div class="product-item-name">
                            <a href=""><h5>Gau truc </h5></a>
                        </div>
                        <div class="product-item-price">
                            <p><strong>142.000 đ</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="product-item border">
                        <div class="product-item-image">
                            <a href="" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                        <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                        <button class="btn form-control">Add to Cart</button>

                        </div>
                        <div class="product-item-name">
                            <a href=""><h5>Gau truc </h5></a>
                        </div>
                        <div class="product-item-price">
                            <p><strong>142.000 đ</strong></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="product-item border">
                        <div class="product-item-image">
                            <a href="" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                        <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                        <button class="btn form-control">Add to Cart</button>

                        </div>
                        <div class="product-item-name">
                            <a href=""><h5>Gau truc </h5></a>
                        </div>
                        <div class="product-item-price">
                            <p><strong>142.000 đ</strong></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection    
    
