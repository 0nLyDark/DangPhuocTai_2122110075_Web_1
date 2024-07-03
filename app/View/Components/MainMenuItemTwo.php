<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Menu;
class MainMenuItemTwo extends Component
{
    /**
     * Create a new component instance.
     */
    public $row_menu = null;
    public function __construct($rowmenutwo)
    {
        $this->row_menu = $rowmenutwo;
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menu = $this->row_menu;
        $args_menu_sub_two = [
            ['status','=',1],
            ['position','=','mainmenu'],
            ['parent_id','=',$menu->id],

        ];
        $list_menu_sub_two = Menu::where($args_menu_sub_two)->orderBy('sort_order','asc')->get();
        return view('components.main-menu-item-two',compact('menu','list_menu_sub_two'));
    }
}
