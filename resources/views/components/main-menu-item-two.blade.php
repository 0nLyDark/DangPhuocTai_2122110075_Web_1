
@if (count($list_menu_sub_two) == 0)
        <li>
            <a class=" menu-link" href="{{ url($menu->link) }}"><span style="font-size: 14px">{{ $menu->name }}</span></a>
        </li>
@else
    <li class="menu-item  menu-end dropend">
        <a class="menu-link " href="{{ url($menu->link) }}" ><span style="font-size: 14px">{{ $menu->name }}</span>
            <i class="fa-light fa-chevron-right"></i>
        </a>

        <ul class="dropdown-menu">
            @foreach ($list_menu_sub_two as $row_menu_item)
                <x-main-menu-item-two :rowmenutwo="$row_menu_item" />
            @endforeach
        </ul>
    </li>
@endif