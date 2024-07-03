
@if (count($list_menu_sub) == 0)
    <li>
        <div class="menu-mobile-item">
            <a href="{{ url($menu->link) }}">{{ $menu->name }}</a>
        </div>
    </li>
@else
    <li>
        <div class="menu-mobile-item">
            <a href="{{ url($menu->link) }}" class="">{{ $menu->name }}</a>
            <div class="icon-menu-mobile ">
                <i class="fa-light fa-chevron-right " style="display: inline-block"></i> 
                <i class="fa-light fa-chevron-down " style="display: none" ></i> 
            </div>
        </div>
        <ul>
            @foreach ($list_menu_sub as $row_menu_item)
                <x-mobile-menu-item :rowmenu="$row_menu_item" />
            @endforeach
        </ul>
    </li>
@endif




