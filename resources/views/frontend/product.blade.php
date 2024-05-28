@section('title','Sản phẩm')
@extends('layouts.site')
@section("header")
    <link rel="stylesheet" href="{{ asset('css/style-product.css') }}">
@endsection
@section('content')
    <section class="content">
        <div class="container py-4">
            <div class="row">
                <div class="filter col-lg-3">
                    <ul class="list-group">
                        <li  class="list-group-item  py-3">Category</li>
                        <li  class="list-group-item list-group-item-action"><a href="">First item</a></li>
                        <li  class="list-group-item list-group-item-action"><a href="">Second item</a></li>
                        <li  class="list-group-item list-group-item-action"><a href="">Second item</a></li>
                        <li  class="list-group-item list-group-item-action"><a href="">Second item</a></li>
                        <li  class="list-group-item list-group-item-action"><a href="">Second item</a></li>
                        <li  class="list-group-item list-group-item-action"><a href="">Third item</a></li>
                    </ul>
                </div>
                <div class="col-lg-9">
                    <div class="row filter-name text-center py-4">
                        <h2>Gấu đặc biệt </h2>
                    </div>
                    <div class="row filter-product pt-2">
                        <p>Sắp xếp theo : 
                        <select>
                            <option>Lọc</option>
                            <option>Mới nhất</option>
                            <option>Giá tăng dần</option>
                            <option>Giá giảm dần</option>

                        </select>
                    </p>
                    </div>
                    <div class="row product">
                        <div class="col-md-3 col-6">
                            <x-product-item />
                        </div>
                        <div class="col-md-3 col-6">
                            <x-product-item />
                        </div>
                        <div class="col-md-3 col-6">
                            <x-product-item />
                        </div>
                        <div class="col-md-3 col-6">
                            <x-product-item />
                        </div>
                        <div class="col-md-3 col-6">
                            <x-product-item />
                        </div>
                        <div class="col-md-3 col-6">
                            <x-product-item />
                        </div>
                        <div class="col-md-3 col-6">
                            <x-product-item />
                        </div>
                        <div class="col-md-3 col-6">
                            <x-product-item />
                        </div>   
                        <div class="col-md-3 col-6">
                            <x-product-item />
                        </div>   
                        <div class="col-md-3 col-6">
                            <x-product-item />
                        </div>   
                        <div class="col-md-3 col-6">
                            <x-product-item />
                        </div>   
                        <div class="col-md-3 col-6">
                            <x-product-item />
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection    



    
    
    