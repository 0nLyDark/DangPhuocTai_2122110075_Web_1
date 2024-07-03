<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title')</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <title>Đăng Nhập</title>
        <style>
            body{
                background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('image/bg.jpg');
                background-blend-mode: darken;
                background-repeat: no-repeat;
                background-size: 100%;
                background-position: center;


            }
            .background{
                width: 100vw;
                height: 100vh;

                color: white;
            }
            .background >*{
            }
            .frame{
                width: 400px;
                /* background-color: rgb(255, 255, 255,0.2);
                border-radius: 45px; */
                padding: 50px 25px 50px 25px;
                box-sizing: border-box;
            }
            .frame input,.frame button{
                height: 50px;
                border-radius: 25px;
                transition: 0.3s;
            }
            .frame input{
                color: white;
                background-color:rgba(245, 245, 245, 0.15);
                box-shadow: none !important;
            }
            .frame input::placeholder{
                color: white;
            }
            .frame input:hover,.frame input:focus{
                color: white;
                background-color: rgb(0, 0, 0,0);
                border: 1px white solid;

            }
            .frame button{
                background-color:antiquewhite;
                border: none;
            }
            .frame button:hover{
                background-color:skyblue;
            }
            .frame h2{
                opacity: 1;
            }
            .toast-top-center {
                top: 50px !important;
                /* Các thuộc tính khác tùy ý */
            }
        </style>
    </head>
    <body >
        <div class="d-flex justify-content-center align-items-center background" >
            <div class="frame">
                <h2 class="text-center mb-4">Admin</h2>
                <form action="{{ route('admin.dologin') }}" method="post" >
                    @csrf
                    <label for="username">Username:</label><br>
                    <input type="text" id="username" name="username" class="form-control" placeholder="Username or Email" ><br>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password"><br>
                    <div class="text-center">
                        <button class="btn form-control fs-5" >Login</button>
                    </div>
                </form> 
            </div>
        </div>
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
    </body>
</html>
