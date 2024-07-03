<section class="product-sale py-4">
    <div class="container">
        <h2 class="text-center my-4">FLASH SALE</h2>
        <div class="row">
            @foreach ($product_sale as $product_item)
                <div class="col-md-3 col-6">
                    <x-product-item :productitem="$product_item" />
                </div>
            @endforeach
            <div class="col-12 text-center">
                <a href="{{ route('site.product',['sort'=>'sale']) }}" class="btn   btnsee-product">XEM TẤT CẢ</a>
            </div>
        </div>
    </div>       
</section>