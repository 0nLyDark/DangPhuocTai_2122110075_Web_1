<ul class="navbar-nav">
    {{-- <li class="menu-item">
        <a class=" menu-link" href="{{ asset('/') }}">Trang chủ</a>
    </li> --}}
    @foreach ($list_menu as $row_menu)
            <x-main-menu-item :rowmenu="$row_menu" />
    @endforeach

</ul>