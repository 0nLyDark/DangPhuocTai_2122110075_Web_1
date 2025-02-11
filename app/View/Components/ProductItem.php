<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductItem extends Component
{

    public $product_row = null;
    public function __construct($productitem)
    {
        $this->product_row = $productitem;
        //
    }

    public function render(): View|Closure|string
    {
        $product = $this->product_row;
        return view('components.product-item',compact('product'));
    }
}
