
@if (count($list_menu_sub) == 0)
    <li class=" menu-item">
        <a class=" menu-link" href="{{ url($menu->link) }}"><strong style="font-size: 14px">{{ $menu->name }}</strong></a>
    </li>
@else
    <li class=" menu-item dropdown">
        <a class="menu-link " href="{{ url($menu->link) }}"  ><strong style="font-size: 14px">{{ $menu->name }}</strong></a>
        <i class="fa-light fa-chevron-down"></i>                                                                    
        <ul class="dropdown-menu">
            @foreach ($list_menu_sub as $row_menu_item)
                <x-main-menu-item-two :rowmenutwo="$row_menu_item" />
            @endforeach
        </ul>
    </li>
@endif