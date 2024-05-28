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
    @yield("header")
</head>
<body>
    <section class="header">
        <div class="header-top container-fluid" >
            <p class="header-top-start">Shop Online</p>
            <p class="header-top-end">Mua hàng Online: 0378746355</p>

        </div>
        <div class="header-bottom ">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4 col-5">
                        <div class="logo">
                            <a class="navbar-brand" href="#" ><img src="{{ asset('./image/logo.jpg') }}" alt="" ></a>
                        </div>

                    </div>
                    <div class="col-md-9 col-sm-8 col-7 ">
                        <div class="row my-3">
                            <div class="col-lg-8  menu">
                                <div class="menu-pig">
                                    <nav class="navbar navbar-expand-md">
                                        {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                                            <span class="navbar-toggler-icon"></span>
                                        </button> --}}
                                        <div class="collapse navbar-collapse " id="collapsibleNavbar" >
                                            <ul class="navbar-nav">
                                                <li class="menu-item">
                                                    <a class=" menu-link" href="{{ asset('/') }}">Trang chủ</a>
                                                </li>
                                                <li class=" menu-item dropdown">
                                                    <a class="menu-link " href="#" role="button" data-bs-toggle="dropdown">Sản Phẩm </a>
                                                    <i class="fa-light fa-chevron-down"></i>                                                                    
                                                    <ul class="dropdown-menu">
                                                        <li><a class="dropdown-item" href="#">Link</a></li>
                                                        <li class="menu-item dropdown menu-end dropend">
                                                            <a class="menu-link " role="button" data-bs-toggle="dropdown">
                                                              Dropend
                                                              <i class="fa-light fa-chevron-right"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Normal</a></li>
                                                                <li class="menu-item dropdown menu-end dropend">
                                                                    <a class="menu-link " role="button" data-bs-toggle="dropdown">
                                                                      Dropend
                                                                      <i class="fa-light fa-chevron-right"></i>
                                                                    </a>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="#">Normal</a></li>
                                                                        <li><a class="dropdown-item " href="#">Active</a></li>
                                                                        <li><a class="dropdown-item " href="#">Disabled</a></li>
                                                                    </ul>
                                                                </li>   
                                                                <li><a class="dropdown-item " href="#">Disabled</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">A third link</a></li>
                                                        <li class="menu-item dropdown menu-end dropend">
                                                            <a class="menu-link " role="button" data-bs-toggle="dropdown">
                                                              Dropend
                                                              <i class="fa-light fa-chevron-right"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li><a class="dropdown-item" href="#">Normal</a></li>
                                                                <li><a class="dropdown-item " href="#">Active</a></li>
                                                                <li><a class="dropdown-item " href="#">Disabled</a></li>
                                                            </ul>
                                                        </li>
                                                        <li><a class="dropdown-item" href="#">A third link</a></li>
                                                    </ul>
                                                </li>
                                                <li class=" menu-item">
                                                    <a class=" menu-link" href="{{ asset('san-pham') }}">Link</a>
                                                </li>
                                                <li class=" menu-item">
                                                    <a class=" menu-link" href="{{ asset('san-pham') }}">Link</a>
                                                </li>
                                                <li class=" menu-item">
                                                    <a class=" menu-link" href="{{ asset('lien-he') }}">Liên hệ</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                            
                            <div class="col-lg-4   col-12 icon-header ">
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
                                    <li class=" account-customer">
                                            <!-- HTML -->
                                        <div class="account-customer-icon">
                                            
                                            <a  >
                                                {{-- <img src="./image/user.png"  style="width: 24px;height: 24px;"> --}}
                                                {{-- <i class="far fa-user-circle fs-4"></i> --}}
                                                <i class="fa-light fa-circle-user "></i>
                                                <span>Tài khoản</span> 
                                            </a>
                                            
                                            <div class="account-login-register">
                                                <a href="">Đăng nhập</a>
                                                <a href="">Đăng ký</a>
                                            </div>
                                        </div>                                    
                                    </li>
                                    <li class=" shopping-cart">
                                            <!-- HTML -->
                                        <div class="shopping-cart-icon">
                                            <a  >
                                                {{-- <img src="./image/bag.png"  style="width: 24px;height: 24px;"> --}}
                                                {{-- <i class="fas fa-shopping-bag fs-4"></i> --}}
                                                <strong class="icon">
                                                    <i class="fa-light fa-bag-shopping "></i>
                                                    <div class="notification-bubble">0</div>
                                                </strong>
                                                <span >Giỏ hàng</span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class=" search-wrap" >
                    <div class="container">
                        <div class="search-mini ">
                            <div class="input-group">
                                <input type="text" class="form-" style="outline: none;" placeholder="Tìm kiếm"  aria-label="Recipient's username" aria-describedby="basic-addon" >
                                <span class="input-group-text " id="basic-addon">
                                    {{-- <i class="fa fa-search" ></i> --}}
                                    <i class="fa-light fa-magnifying-glass"></i>
                                </span>
                                <span class="input-group-text " id="basic-addon">
                                    <i class="fa-light fa-xmark" onclick="closeSearch()"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="menu-mobile">
            <div class="close" onclick="closeMenu()">
                <i class="fa-sharp fa-solid fa-xmark"></i>
            </div>
            <ul>
                <li>
                    <div class="menu-mobile-item">
                        <a href="{{ asset('/') }}">Trang chủ</a>
                    </div>
                </li>
                <li>
                    <div class="menu-mobile-item">
                        <a href="{{ asset('san-pham') }}" class="">Sản phẩm</a>
                        <div class="icon-menu-mobile ">
                            <i class="fa-light fa-chevron-right " style="display: inline-block"></i> 
                            <i class="fa-light fa-chevron-down " style="display: none" ></i> 
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="menu-mobile-item" >
                                <a href="" class="">Dropend</a>
                                <div class="icon-menu-mobile ">
                                    <i class="fa-light fa-chevron-right " style="display: inline-block"></i> 
                                    <i class="fa-light fa-chevron-down " style="display: none" ></i> 
                                </div>
                            </div>
                            <ul>
                                <li>
                                    <div class="menu-mobile-item">
                                        <a href="" class="">Dropend</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="menu-mobile-item">
                                        <a href="" class="">Dropend</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="menu-mobile-item">
                                        <a href="" class="">Dropend</a>
                                    </div>
                                </li>
                                <li>
                                    <div class="menu-mobile-item">
                                        <a href="" class="">Dropend</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="menu-mobile-item">
                        <a href="{{ asset('san-pham') }}">Link</a>
                    </div>
                </li>
                <li>
                    <div class="menu-mobile-item">
                        <a href="{{ asset('lien-he') }}">Liên hệ</a>
                    </div>
                </li>
                <li>
                    <div class="menu-mobile-item">
                        <a href="{{ asset('') }}">Giỏ hàng</a>
                    </div>
                </li>
                <li>
                    <div class="menu-mobile-item">
                        <a href="{{ asset('') }}">Đăng nhập</a>
                    </div>
                </li>
                <li>
                    <div class="menu-mobile-item">
                        <a href="{{ asset('') }}">Đăng ký</a>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <main>
        @yield('content')
    </main>
    <section class="footer">
        <div class="hd1-footer ">
            <div class="container p-4">
                <div class="row">
                    <div class="col-md-3 col-12">
                        <h5>THÔNG TIN</h5>
                        <p>Công ty TNHH fdsfsdf</p>
                        <p>Địa chỉ: Store: 999 Tăng Nhơn Phú,
                             Phường 99, Quận 9 , Tp.Hcm.</p>
                        <p>Số điện thoại: <a href="">0911571166</a></p>
                        <p>
                            Email: <a href="">Light@gmail.com</a></p>
                    </div>
                    <div class="col-md-3 col-6">
                        <h5>LIÊN HỆ</h5>
                        <ul>
                            <li><a href="">Giới thiệu</a></li>
                            <li><a href="">Bolg</a></li>
                            <li><a href="">Hotline</a></li>
                            <li><a href="">Zalo</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-6">
                        <h5>CHÍNH SÁCH </h5>
                        <ul>
                            <li><a href="">Chính sách đổi trả</a></li>
                            <li><a href="">Giao hàng - Thanh toán</a></li>
                            <li><a href="">Ưu đãi khách hàng thân thiết</a></li>
                            <li><a href="">Quy định bảo hành và sửa chữa</a></li>
                            <li><a href="">Bảo mật thông tin</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-12">
                        asd
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="copyright">
        <div class="hd1-copyright">
            <h5 class="text-center">webadsadsads.com</h5>
        </div>
    </section>
</body>
<script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/style.js') }}"></script>
</html>