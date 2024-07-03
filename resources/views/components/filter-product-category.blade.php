@foreach ($list_category as $category)
    <li  class=""><a href="{{ route('site.product.category',['slug'=>$category->slug]) }}">{{ $category->name }}</a></li>
    <x-filter-product-category :$category />
@endforeach




