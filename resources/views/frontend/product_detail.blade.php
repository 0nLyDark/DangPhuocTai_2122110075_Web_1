@section('title','Chi tiết sản phẩm')
@extends('layouts.site')
@section('content')
    <section class="content">
        <div class="container p-4">
            <div class="row product-detail">
                <div class="col-md-6 col-12 ">
                    <img src="{{ asset('image/products/'.$product->image) }}" class="img-fluid">
                </div>
                <div class="col-md-6 col-12 ps-4 mt-4">
                    <h1 class="product-detail-name">{{ $product->name }}</h1>
                    <h2 class="product-detail-brand fs-5">Thương hiệu: {{ $product->brandname }} </h2>
                    @if ($product->pricesale>0)
                        <strong><span class="product-detail-price" >{!! number_format($product->pricesale) !!}<sup>đ</sup></span> <span class="ms-2" style="color: grey" ><del>{!! number_format($product->pricesale) !!}</del><sup>đ</sup></span></strong>
                    @else
                        <strong><span class="product-detail-price" >{!! number_format($product->price) !!}<sup>đ</sup></span></strong>
                    @endif
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
                        <i  class="fa-solid fa-minus input-group-btn minus"></i><input class="text-center" type="text" oninput="allowIntegers(event)" pattern="[0-9]*" id="qty" min="1" value="1" style="width: 42px"><i  class="fa-solid fa-plus input-group-btn plus"></i>
                    </div>
                    <button class="btn " onclick="handleAddCart({{ $product->id }})" style="background-color: aqua;">Thêm vào giỏ hàng</button>
                    {{-- <button class="btn  ms-2" style="background-color: rgb(0, 255, 200);">Mua Ngay</button> --}}
                    <div class="mt-4">
                        <h3>Mô tả:</h3>
                        <h3 class="fs-6" >
                            {!! $product->description !!}
                        </h3>

                    </div>
                </div>
                <div class="col-12 mt-4">
                    <h4>Chi tiết:</h4>
                    {!! $product->detail !!}
                </div>
            </div>
            <hr/>
            <nav>
                <div class="nav nav-tabs d-flex justify-content-center" id="nav-tab" role="tablist">
                  <button class="nav-link active" id="nav-product-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">SẢN PHẨM TƯƠNG TỰ</button>
                  <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Đánh giá</button>
                  <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</button>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-product-tab">
                    <h2 class="text-center my-4">SẢN PHẨM TƯƠNG TỰ</h2>
                    <div class="row ">
                        @foreach ($list_product as $productitem)
                            <div class="col-md-3 col-6">
                                <x-product-item :$productitem />
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
              </div>
            

        </div>
    </section>
@endsection    
@section('footer')
    <script>
        function handleAddCart(productid){
            let qty = document.getElementById('qty').value;
            $.ajax({
              url: "{{ route('site.cart.addcart') }}",
              type: 'GET',
              data: {
                productid:productid,
                qty:qty
              },
              success: function(result,status,xhr) {
                // if(result['status'] == 'THEM'){
                //     toastr.success("Thêm vào giỏ hàng thành công");
                // }else{
                //     toastr.info("Tăng số lượng trong giỏ hàng thành công");
                // }
                document.getElementById('showqty').innerHTML=result['showqty'];
              },
              error: function(xhr, status, error) {
                    alert(error);
              }
              
          });
        }
    </script>
@endsection
