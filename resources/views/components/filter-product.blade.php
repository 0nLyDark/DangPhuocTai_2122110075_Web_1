<ul class="list-group py-2">
    <h4  class="py-2"><strong>Danh mục</strong></h4>
    <li  class=""><a href="{{ route('site.product') }}"><strong>Tất cả sản phẩm</strong></a></li>
    @foreach ($list_category as $category)
        <li  class=""><a href="{{ route('site.product.category',['slug'=>$category->slug]) }}"><strong>{{ $category->name }}</strong></a></li>
        <x-filter-product-category :$category />
    @endforeach

</ul>
<ul class="list-group py-2">
    <h4  class="py-2"><strong>Thương hiệu</strong></h4>
    @foreach ($list_brand as $brand)
        <li class=""><a href="{{ route('site.product.brand',['slug'=>$brand->slug]) }}">{{ $brand->name }}</a></li>
    @endforeach
</ul>