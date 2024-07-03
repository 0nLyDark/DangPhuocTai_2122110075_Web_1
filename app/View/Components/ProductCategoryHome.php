<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductCategoryHome extends Component
{
    /**
     * Create a new component instance.
     */
    public $category_name = null;
    public function __construct($category)
    {
        $this->category_name=$category;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {     
        $category=$this->category_name;
        $slug = Str::of($category)->slug('-');
        $category_id = Category::where('category2.slug','=',$slug)
        ->leftJoin('category as category2','category.parent_id','=','category2.id')
        ->select('category.id',)
        ->get();
        $category_id= collect($category_id)->pluck('id')->toArray();
        $product_category_home = Product::whereIn('category_id',$category_id)
        ->where('product.status','=',1)
        ->select('product.id','product.image','product.name','product.slug','product.price','product.pricesale','product.status')
        ->orderBy('product.created_at','desc')
        ->limit(4)
        ->get();
        $category=Str::upper($category);
        return view('components.product-category-home',compact('category','slug','product_category_home'));
    }
}
