<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Category;
class FilterProductCategory extends Component
{
    public $row_category =null;
    public function __construct($category)
    {
        //
        $this->row_category = $category;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $category = $this->row_category;
        $list_category = Category::where([['status','=',1],['parent_id','=',$category->id]])
        ->orderBy('created_at','asc')
        ->select('id','name','slug')
        ->get();
        return view('components.filter-product-category',compact('list_category'));
    }
}
