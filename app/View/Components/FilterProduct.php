<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Brand;
use App\Models\Category;

class FilterProduct extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $list_category = Category::where([['status','=',1],['parent_id','=',0]])
        ->orderBy('created_at','asc')
        ->select('id','name','slug')
        ->get();
        $list_brand = Brand::where('status','=',1)
        ->orderBy('created_at','asc')
        ->select('id','name','slug')
        ->get();
        return view('components.filter-product',compact('list_category','list_brand'));
    }
}
