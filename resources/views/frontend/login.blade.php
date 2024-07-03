@section('title','Đăng nhập')
@extends('layouts.site')
@section('footer')
    <script src="{{ asset('js/style-home.js') }}"></script>
@endsection

@section('content')
    <div class="container d-flex justify-content-center p-4">
        <div class="p-4" style="width: 600px">
            <h2 class="text-center">Đăng Nhập</h2>
            <form action="{{ route('site.customer.dologin') }}" method="post" >
                @csrf
                <label for="username">Tài khoản:</label><br>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username hoặc Email" ><br>
                <label for="password">Mật khẩu:</label><br>
                <input type="password" id="password" name="password" class="form-control" placeholder="Mật khẩu"><br>
                <div class="text-center">
                    <button class="btn btn-info form-control" style="width: 300px">Đăng Nhập</button>
                </div>
            </form> 
        </div>
    </div>

@endsection

