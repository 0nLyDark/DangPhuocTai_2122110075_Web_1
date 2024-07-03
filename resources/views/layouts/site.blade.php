<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">

    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">

    <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" data-purpose="Layout StyleSheet" title="Web Awesome" href="/css/app-wa-a60ddbceb7292f11c9e430d067b1eb9f.css?vsn=d">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.2/css/sharp-light.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield("header")
</head>
<body>
    <section class="header">
        <div class="header-top container-fluid md-0 " >
            <div class="row">
                <div class="col-4 py-1">
                    <p class="">Shop Online</p>
                </div>
                <div class="col-8 py-1 text-end">
                    <p class="">Mua hàng Online: 0378746355</p>
                </div>
            </div>
            
        </div>
        <div class="header-bottom ">
            <div class="container">
                <div class="row">
                    <div class=" col-md-3 col-6">
                        <div class="logo">
                            <a class="navbar-brand" href="{{ route('site.home') }}" ><img src="{{ asset('./image/logo.png') }}" alt="" ></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 d-none d-lg-flex menu">
                        <div class="menu-pig">
                            <nav class="navbar navbar-expand-md">
                                {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                                    <span class="navbar-toggler-icon"></span>
                                </button> --}}
                                <div class="collapse navbar-collapse " id="collapsibleNavbar" >
                                    <x-main-menu />
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-2  col-md-9 col-6 icon-header">
                        <ul >
                            <li class="btn-menu-mobile" onclick="openMenu()">
                                <i class="fa-regular fa-list" ></i>
                            </li>
                            <li class=" search ">
                                    <!-- HTML -->
                                <div class="search-icon" onclick="openSearch()">
                                    <a >
                                        {{-- <img src="./image/search.png"  style="width: 24px;height: 24px;"> --}}
                                        {{-- <i class="fas fa-search fs-4"></i>   --}}
                                        <i class="fa-light fa-magnifying-glass "></i>
                                                                        
                                    </a>
                                    
                                </div>
                            </li>
                            <li class="account-customer ">
                                    <!-- HTML -->
                                <div class="account-customer-icon">
                                    
                                    <a  href="">
                                        {{-- <img src="./image/user.png"  style="width: 24px;height: 24px;"> --}}
                                        {{-- <i class="far fa-user-circle fs-4"></i> --}}
                                        <i class="fa-light fa-circle-user "></i>
                                        <span>
                                            {{ Auth::check()?Auth::user()->name:'Tài khoản' }}
                                        </span> 
                                    </a>
                                    
                                    <div class="account-login-register">
                                        @if (Auth::check())
                                            <a href="{{ url('dang-xuat') }}">Đăng xuất</a>
                                        @else
                                            <a href="{{ url('dang-nhap') }}">Đăng nhập</a>
                                            <a href="{{ url('dang-ky') }}">Đăng ký</a>
                                        @endif
                                    </div>
                                </div>                                    
                            </li>
                            <li class=" shopping-cart">
                                    <!-- HTML -->
                                <div class="shopping-cart-icon">
                                    <a href="{{ route("site.cart.index") }}" >
                                        {{-- <img src="./image/bag.png"  style="width: 24px;height: 24px;"> --}}
                                        {{-- <i class="fas fa-shopping-bag fs-4"></i> --}}
                                        @php
                                            $carts = session('carts', []);
                                            $showqty = is_array($carts)?count($carts):0;
                                        @endphp
                                        <strong class="icon">
                                            <i class="fa-light fa-bag-shopping "></i>
                                            <div class="notification-bubble" id='showqty'>{{ $showqty }}</div>
                                        </strong>
                                        <span >Giỏ hàng</span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <form action="{{ route('site.product.search') }}" method="get">
                    <div class=" search-wrap" >
                        <div class="container">
                            <div class="search-mini ">
                                <div class="input-group">
                                    <input type="text" class="" name="search" style="outline: none;" placeholder="Tìm kiếm"  aria-label="Recipient's username" aria-describedby="basic-addon" >
                                    <button class="btn" type="submit"  class="input-group-text " id="basic-addon">
                                        {{-- <i class="fa fa-search" ></i> --}}
                                        <i class="fa-light fa-magnifying-glass"></i>
                                    </button>
                                    <span class="input-group-text " id="basic-addon">
                                        <i class="fa-light fa-xmark" onclick="closeSearch()"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
           
        </script>
        <x-mobile-menu />
    </section>
    <main>
        @yield('content')
    </main>

    <section class="footer">
        <x-footer-menu />
    </section>
    <section class="copyright">
        <div class="hd1-copyright">
            <h5 class="text-center">webadsadsads.com</h5>
        </div>
    </section>
<script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/style.js') }}"></script>
<script>
    toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": true,
  "progressBar": true,
  "positionClass": "toast-top-center",
  "timeOut": "2000",
  };
</script>
@if (Session::has('message'))
    @if (Session::get('color') == null || Session::get('color')=='success')
        <script>
            toastr.success("{{ Session::get('message') }}");
        </script>
     @endif
    @if (Session::get('color')=='info')
        <script>
            toastr.info("{{ Session::get('message') }}");
        </script> 
    @endif
    @if (Session::get('color')=='warning')
        <script>
            toastr.warning("{{ Session::get('message') }}");
        </script> 
    @endif
    @if (Session::get('color')=='error')
        <script>
            toastr.error("{{ Session::get('message') }}");
        </script> 
    @endif
@endif





@yield('footer')
</body>

</html>