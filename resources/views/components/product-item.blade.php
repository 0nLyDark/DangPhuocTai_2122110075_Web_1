<div class="product-item ">
    <div class="product-item-image">
        <a href="{{ route('site.product.detail',['slug'=>$product->slug]) }}" ><img src="{{ asset('./image/products/'.$product->image) }}" alt="{{ $product->image }}" class="img-1 rounded w-100 h-100">
    <img src="{{ asset('image/products/'.$product->image) }}" alt="{{ $product->image }}" class="img-2 rounded w-100 h-100" ></a>
        {{-- <div class="product-item-action">
            <a href="" class="addcart"><i class="fas fa-shopping-cart"></i></a>
            <a href="" class="showdetail"><i class="fas fa-eye"></i></a>
        </div> --}}
    </div>
    <div class="product-item-name text-center">
        <a href="{{ route('site.product.detail',['slug'=>$product->slug]) }}">{{ Str::upper($product->name) }}</a>
    </div>
    
    <div class="product-item-price text-center">
        @if ($product->pricesale == 0)
            <strong>{{  number_format($product->price) }}<sup>đ</sup></strong>
        @else
            <strong>{{  number_format($product->pricesale) }}<sup>đ</sup></strong>
            <del style="color: rgb(255, 160, 160)">{{ number_format($product->price) }}<sup>đ</sup></del>
        @endif
    </div>
</div>