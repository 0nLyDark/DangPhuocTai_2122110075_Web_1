<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Filter extends Component
{
    /**
     * Create a new component instance.
     */
    public $sort_row=null;
    public $grid_row=null;

    public function __construct($sort,$grid)
    {
        $this->sort_row =$sort;
        $this->grid_row =$grid;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $sort = $this->sort_row;
        $grid = $this->grid_row;

        return view('components.filter',compact('sort','grid'));
    }
}
