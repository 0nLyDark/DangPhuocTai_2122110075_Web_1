<div class="hd1-footer ">
    <div class="container p-4">
        <div class="row">
            <div class="col-md-3 col-12">
                <h5>THÔNG TIN</h5>
                <p>Công ty thời trang Your Fashion</p>
                <p>Địa chỉ: Store: 999 Tăng Nhơn Phú,
                     Phường 99, Quận 9 , Tp.Hcm.</p>
                <p>Số điện thoại: <a href="">0585115932</a></p>
                <p>Email: <a href="">Light@gmail.com</a></p>
            </div>
            @foreach ($list_menu as $rowmenu)
                <div class="col-md-3 col-12">
                    <h5><a href="{{ asset($rowmenu->link) }}" >{{ $rowmenu->name }}</a></h5>
                    <x-footer-menu-item :$rowmenu />
                </div>
            @endforeach
            <div class="col-md-3 col-12 text-center p-4">
                <ul>
                    <li class="d-inline"><a href="" ><i class="fa-brands fa-facebook m-2" style="font-size: 40px"></i></a></li>
                    <li class="d-inline"><a href="" ><i class="fa-brands fa-facebook-messenger m-2" style="font-size: 40px"></i></a></li>
                    <li class="d-inline"><a href="" ><i class="fa-brands fa-instagram m-2" style="font-size: 40px"></i></a></li>

                </ul>
            </div>
        </div>
    </div>
</div>