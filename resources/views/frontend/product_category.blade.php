@section('title','Sản phẩm')
@extends('layouts.site')
@section("header")
    <link rel="stylesheet" href="{{ asset('css/style-product.css') }}">
@endsection
@section('content')
    <section class="content">
        <div class="container py-4">
            @if ($row->image)
                <div class="row">
                    <div class="col-12">
                        <img src="{{ asset('image/categorys/'.$row->image) }}" class="img-fluid" alt="" >
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="filter col-lg-3">
                    <x-filter-product />
                </div>
                <div class="col-lg-9">
                    <div class="row filter-name text-center py-4">
                        <h2>{{ $row->name }}</h2>
                    </div>
                    <x-filter :sort="$sort" :grid="$grid" />
                    <div class="row product">
                        @if ($grid == '2')
                            @foreach ($list_product as $productitem)
                                <div class="col-6">
                                    <x-product-item :$productitem />
                                </div>
                            @endforeach
                        @else
                            @foreach ($list_product as $productitem)
                                <div class="col-md-4 col-6">
                                    <x-product-item :$productitem />
                                </div>
                            @endforeach
                        @endif
                        <div class="col-12 d-flex justify-content-center">
                            {{ $list_product->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection    



    
    
    