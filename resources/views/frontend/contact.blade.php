<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="./node_modules/bootstrap-icons/font/bootstrap-icons.css">
    
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    
        <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <script src="{{ asset('bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    </head>
<body>
    <section class="header">
        <div class="header-top container-fluid" >
            <p class="header-top-start">Shop Online</p>
            <p class="header-top-end">Mua hàng Online: 0378746355</p>

        </div>
        <div class="header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-12 text-center">
                            <div class="row container">
                                <div class="col-md-3 col-5">
                                    <a class="navbar-brand" href="#"><img src="./image/logo.jpg" class="logo " alt="" ></a>
    
                                </div>
                                <div class="col-md-9 col-7 menu">
                                    <nav class="navbar navbar-expand-sm fs-5 ">
                                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                                            <span class="navbar-toggler-icon"></span>
                                        </button>
                                        <div class="collapse navbar-collapse " id="collapsibleNavbar" >
                                            <ul class="navbar-nav">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="./index.html">Trang chủ</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="./product.html">Link</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="./product.html">Link</a>
                                                </li>
                                        
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Dropdown</a>
                                                    <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">Link</a></li>
                                                    <li><a class="dropdown-item" href="#">Another link</a></li>
                                                    <li><a class="dropdown-item" href="#">A third link</a></li>
                                                    </ul>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="./contact.html">Contact</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                    </div>
                    <div class="col-md-2 col-12 icon-header">
                        <div class="row">
                            <div class="col-4 search">
                                    <!-- HTML -->
                                <div class="search-icon">
                                    <a >
                                        <img src="./image/search.png"  style="width: 24px;height: 24px;">
                                    </a>
                                    <div class=" search-mini">
                                        <div class="input-group ">
                                            <input type="text" class="form-control" placeholder="Nhập nội dung tìm kiếm" aria-label="Recipient's username" aria-describedby="basic-addon2" fdprocessedid="vf44o">
                                            <span class="input-group-text bg-main" id="basic-addon2">
                                                <i class="fa fa-search" aria-hidden="true"></i>
                                            </span>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-4 account-customer">
                                    <!-- HTML -->
                                <div class="account-customer-icon">
                                    <a  >
                                        <img src="./image/user.png"  style="width: 24px;height: 24px;">
                                    </a>
                                    <div class="account-login-register">
                                        <a href="">Đăng nhập</a>
                                        <a href="">Đăng ký</a>
                                    </div>
                                </div>                                    
                            </div>
                            <div class="col-4 shopping-cart">
                                    <!-- HTML -->
                                <div class="shopping-cart-icon">
                                    <a href="" >
                                        <img src="./image/bag.png"  style="width: 24px;height: 24px;">
                                        <div class="notification-bubble">0</div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container p-4">
            <div class="row">
                <div class="col-md-6 col-12">
                    <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.746776096385!2d106.77242407468411!3d10.830680489321376!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317526ffdc466379%3A0x89b09531e82960d!2zMjAgVMSDbmcgTmjGoW4gUGjDuiwgUGjGsOG7m2MgTG9uZyBCLCBRdeG6rW4gOSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oIDcwMDAwMCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1692683712719!5m2!1svi!2s"
                  width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6 col-12">
                    <form >
                        <div class="mb-3">
                           <label for="name" >Họ tên</label>
                           <input type="text" name="name" id="name" class="form-control" placeholder="Nhập họ tên">
                        </div>
                        <div class="mb-3">
                           <label for="phone" >Điện thoại</label>
                           <input type="text" name="phone" id="phone" class="form-control" placeholder="Nhập điện thoại">
                        </div>
                        <div class="mb-3">
                           <label for="email" >Email</label>
                           <input type="text" name="email" id="email" class="form-control" placeholder="Nhập email">
                        </div>
                        <div class="mb-3">
                           <label for="title" >Tiêu đề</label>
                           <input type="text" name="title" id="title" class="form-control" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="mb-3">
                           <label for="content" >Nội dung</label>
                           <textarea name="content" id="content" class="form-control"
                              placeholder="Nhập nội dung liên hệ"></textarea>
                        </div>
                        <div class="mb-3">
                           <button class="btn btn-info text-start" type="submit" name="GUILIENHE" onclick="" >Gửi liên hệ</button>
                        </div>
                        
                        </form>
                </div>
            </div>
        </div>
    </section>

    <section class="footer">
        <div class="hd1-footer ">
            <div class="container p-4">
                <div class="row">
                    <div class="col-md-3 col-6">
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
                    <div class="col-md-3 col-6">
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
<script src="{{ asset('js/style.js') }}"></script>

</html>