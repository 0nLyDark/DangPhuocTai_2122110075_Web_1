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
        <div class="container py-4">
            <div class="row">
                <div class="filter col-md-3">
                    <ul class="list-group">
                        <li  class="list-group-item  py-3">Category</li>
                        <li  class="list-group-item list-group-item-action"><a href="">First item</a></li>
                        <li  class="list-group-item list-group-item-action"><a href="">Second item</a></li>
                        <li  class="list-group-item list-group-item-action"><a href="">Second item</a></li>
                        <li  class="list-group-item list-group-item-action"><a href="">Second item</a></li>
                        <li  class="list-group-item list-group-item-action"><a href="">Second item</a></li>
                        <li  class="list-group-item list-group-item-action"><a href="">Third item</a></li>
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="row filter-name text-center">
                        <h4>Gấu đặc biệt </h4>
                    </div>
                    <div class="row filter-product pt-2">
                        <p>Sắp xếp theo : 
                        <select>
                            <option>Lọc</option>
                            <option>Mới nhất</option>
                            <option>Giá tăng dần</option>
                            <option>Giá giảm dần</option>

                        </select>
                    </p>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="product-item ">
                                <div class="product-item-image">
                                    <a href="./product_detail.html" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                                   <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                                   <button class="btn form-control">Add to Cart</button>
        
                                </div>
                                <div class="product-item-name">
                                    <a href=""><h5>Gau truc </h5></a>
                                </div>
                                <div class="product-item-price">
                                    <p><strong>142.000 đ</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-item ">
                                <div class="product-item-image">
                                    <a href="./product_detail.html" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                                   <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                                   <button class="btn form-control">Add to Cart</button>
        
                                </div>
                                <div class="product-item-name">
                                    <a href=""><h5>Gau truc </h5></a>
                                </div>
                                <div class="product-item-price">
                                    <p><strong>142.000 đ</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-item ">
                                <div class="product-item-image">
                                    <a href="./product_detail.html" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                                   <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                                   <button class="btn form-control">Add to Cart</button>
        
                                </div>
                                <div class="product-item-name">
                                    <a href=""><h5>Gau truc </h5></a>
                                </div>
                                <div class="product-item-price">
                                    <p><strong>142.000 đ</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-item ">
                                <div class="product-item-image">
                                    <a href="./product_detail.html" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                                   <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                                   <button class="btn form-control">Add to Cart</button>
        
                                </div>
                                <div class="product-item-name">
                                    <a href=""><h5>Gau truc </h5></a>
                                </div>
                                <div class="product-item-price">
                                    <p><strong>142.000 đ</strong></p>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="product-item ">
                                <div class="product-item-image">
                                    <a href="./product_detail.html" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                                   <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                                   <button class="btn form-control">Add to Cart</button>
        
                                </div>
                                <div class="product-item-name">
                                    <a href=""><h5>Gau truc </h5></a>
                                </div>
                                <div class="product-item-price">
                                    <p><strong>142.000 đ</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-item ">
                                <div class="product-item-image">
                                    <a href="./product_detail.html" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                                   <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                                   <button class="btn form-control">Add to Cart</button>
        
                                </div>
                                <div class="product-item-name">
                                    <a href=""><h5>Gau truc </h5></a>
                                </div>
                                <div class="product-item-price">
                                    <p><strong>142.000 đ</strong></p>
                                </div>
                            </div>
                        </div> 
                        <div class="col-md-3">
                            <div class="product-item ">
                                <div class="product-item-image">
                                    <a href="./product_detail.html" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                                   <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                                   <button class="btn form-control">Add to Cart</button>
        
                                </div>
                                <div class="product-item-name">
                                    <a href=""><h5>Gau truc </h5></a>
                                </div>
                                <div class="product-item-price">
                                    <p><strong>142.000 đ</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-item ">
                                <div class="product-item-image">
                                    <a href="./product_detail.html" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                                   <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                                   <button class="btn form-control">Add to Cart</button>
        
                                </div>
                                <div class="product-item-name">
                                    <a href=""><h5>Gau truc </h5></a>
                                </div>
                                <div class="product-item-price">
                                    <p><strong>142.000 đ</strong></p>
                                </div>
                            </div>
                        </div>    
                        <div class="col-md-3">
                            <div class="product-item border">
                                <div class="product-item-image">
                                    <a href="" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                                   <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                                   <button class="btn form-control">Add to Cart</button>
        
                                </div>
                                <div class="product-item-name">
                                    <a href=""><h5>Gau truc </h5></a>
                                </div>
                                <div class="product-item-price">
                                    <p><strong>142.000 đ</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-item border">
                                <div class="product-item-image">
                                    <a href="" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                                   <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                                   <button class="btn form-control">Add to Cart</button>
        
                                </div>
                                <div class="product-item-name">
                                    <a href=""><h5>Gau truc </h5></a>
                                </div>
                                <div class="product-item-price">
                                    <p><strong>142.000 đ</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-item border">
                                <div class="product-item-image">
                                    <a href="" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                                   <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                                   <button class="btn form-control">Add to Cart</button>
        
                                </div>
                                <div class="product-item-name">
                                    <a href=""><h5>Gau truc </h5></a>
                                </div>
                                <div class="product-item-price">
                                    <p><strong>142.000 đ</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-item border">
                                <div class="product-item-image">
                                    <a href="" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                                   <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                                   <button class="btn form-control">Add to Cart</button>
        
                                </div>
                                <div class="product-item-name">
                                    <a href=""><h5>Gau truc </h5></a>
                                </div>
                                <div class="product-item-price">
                                    <p><strong>142.000 đ</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-item border">
                                <div class="product-item-image">
                                    <a href="" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                                   <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                                   <button class="btn form-control">Add to Cart</button>
        
                                </div>
                                <div class="product-item-name">
                                    <a href=""><h5>Gau truc </h5></a>
                                </div>
                                <div class="product-item-price">
                                    <p><strong>142.000 đ</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-item border">
                                <div class="product-item-image">
                                    <a href="" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                                   <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                                   <button class="btn form-control">Add to Cart</button>
        
                                </div>
                                <div class="product-item-name">
                                    <a href=""><h5>Gau truc </h5></a>
                                </div>
                                <div class="product-item-price">
                                    <p><strong>142.000 đ</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-item border">
                                <div class="product-item-image">
                                    <a href="" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                                   <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                                   <button class="btn form-control">Add to Cart</button>
        
                                </div>
                                <div class="product-item-name">
                                    <a href=""><h5>Gau truc </h5></a>
                                </div>
                                <div class="product-item-price">
                                    <p><strong>142.000 đ</strong></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="product-item border">
                                <div class="product-item-image">
                                    <a href="" ><img src="./image/hinh 1.webp" class="img-1 rounded img-fluid">
                                   <img src="./image/hinh 2.webp" class="img-2 rounded img-fluid"></a>
                                   <button class="btn form-control">Add to Cart</button>
        
                                </div>
                                <div class="product-item-name">
                                    <a href=""><h5>Gau truc </h5></a>
                                </div>
                                <div class="product-item-price">
                                    <p><strong>142.000 đ</strong></p>
                                </div>
                            </div>
                        </div>   
                    </div>
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