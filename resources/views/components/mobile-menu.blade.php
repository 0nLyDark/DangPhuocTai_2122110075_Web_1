<div class="menu-mobile">
    <div class="close" onclick="closeMenu()">
        <i class="fa-sharp fa-solid fa-xmark"></i>
    </div>
    <ul>
        {{-- <li>
            <div class="menu-mobile-item">
                <a href="{{ url('/') }}">Trang chủ</a>
            </div>
        </li> --}}
        @foreach ($list_menu as $row_menu)
            <x-mobile-menu-item :rowmenu="$row_menu" />
        @endforeach
        {{-- <li>
            <div class="menu-mobile-item">
                <a href="{{ url('san-pham') }}">Link</a>
            </div>
        </li>
        <li>
            <div class="menu-mobile-item">
                <a href="{{ url('lien-he') }}">Liên hệ</a>
            </div>
        </li> --}}
        <li>
            <div class="menu-mobile-item">
                <a href="{{ url('') }}">Giỏ hàng</a>
            </div>
        </li>
        @if (Auth::user())
            <li>
                <div class="menu-mobile-item">
                    <a href="{{ url('dang-xuat') }}">Đăng xuất</a>
                </div>
            </li>
        @else
            <li>
                <div class="menu-mobile-item">
                    <a href="{{ url('dang-nhap') }}">Đăng nhập</a>
                </div>
            </li>
            <li>
                <div class="menu-mobile-item">
                    <a href="{{ url('dang-ky') }}">Đăng ký</a>
                </div>
            </li>
        @endif
    </ul>
</div>