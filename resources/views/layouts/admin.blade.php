<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('css/style-admin.css') }}">
  @yield('header')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('admin.contact.index') }}" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="#">
          <i class="far fa-user"></i> Quản lý
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.logout') }}">
          <i class="fas fa-power-off"></i> Thoát
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        @php
            $user = Auth::user();
        @endphp
        <div class="image">
          <img src="{{ asset($user->image?'image/users/'.$user->image:'dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ $user?$user->name:'' }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('admin.dashboard') }}" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                {{-- <i class="right fas fa-angle-left"></i> --}}
              </p>
            </a>
            
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.product.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tất cả sản phẩm</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.brand.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thương hiệu</p>
                </a>
              </li>
            </ul>
          </li>        
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Bài viết
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.post.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tất cả bài viết</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.topic.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Chủ đề</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.order.index') }}" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>Đơn hàng</p>
            </a>
          </li>
         
          <li class="nav-item">
            <a href="{{ route('admin.contact.index') }}" class="nav-link">
              <i class="nav-icon fas fa-id-card"></i>
              <p>Liên hệ</p>
            </a>
            
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Giao diện
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.menu.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.banner.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Thành viên
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.user.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tất cả thành viên</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('admin.user.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm thành viên</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



  <!-- Content Wrapper. Contains page content -->
    <main>
      <div class="content-wrapper">
        @yield('content')
      </div>
    </main>




  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.js') }}"></script>
  
<script type="text/javascript">
  function handleFiles(fileInput) {
    var filesSelected = fileInput.files;
    if (filesSelected.length > 0) {
      var fileToLoad = filesSelected[0];
      var fileReader = new FileReader();
      fileReader.onload = function(fileLoadedEvent) {
        var srcData = fileLoadedEvent.target.result; // <string> của hình ảnh
        var newImage = document.createElement('img');
        newImage.src = srcData;
        newImage.style.width='200px';
        newImage.style.height='200px';
        newImage.classList.add('mt-4');
        newImage.classList.add('mx-2');
        document.getElementById("displayImg").innerHTML = newImage.outerHTML;
      }
      fileReader.readAsDataURL(fileToLoad);
    }
  }
</script>
@yield('footer')
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
<script type="text/javascript">
  $(document).ready(function() {
      $('a[name="status"]').click(function() {
        var button = $(this);
        var id = button.data('id');
        var url = button.data('url');            
          $.ajax({
              url: url,
              type: 'GET',
              data: {
                  _token: $('meta[name="csrf-token"]').attr('content')
              },
              
              success: function(response) {
                if (response.status == 1) {
                    button.html('<i class="fas fa-toggle-on text-success"></i>');
                } else {
                    button.html('<i class="fas fa-toggle-off text-warning"></i>');
                }
                
                  toastr.success(response.message);
              },
              error: function(xhr, status, error) {
                  var errorMessage = 'An error occurred: ' + xhr.status + ' ' + xhr.statusText + '\n' + xhr.responseText;
                  toastr.error(errorMessage);
                  console.log(errorMessage);
              }
              
          });
      });
      $('a[name="delete"]').click(function() {
        var button = $(this);
        var id = button.data('id');
        var url = button.data('url');
        
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            
            success: function(response) {
              
              var currentUrl = window.location.href; // Lấy URL hiện tại
              var segments = currentUrl.split('/'); // Chia URL thành các phần
              var desiredSegment = segments[segments.length - 2];
              var route = segments.slice(0, segments.length - 2).join('/');
              if(desiredSegment === 'show'){
                console.log(route);
                localStorage.setItem('toastMessage', response.message);
                localStorage.setItem('color','success');
                window.location.href=route;
              }
              else{
                if (response.status == 0) {
                  button.closest('tr').empty(); 
                  button.closest('tr').remove(); // Xóa thẻ <tr> chứa nút
                }
                toastr.success(response.message);
              }
            },
            error: function(xhr, status, error) {
                var errorMessage = 'An error occurred: ' + xhr.status + ' ' + xhr.statusText + '\n' + xhr.responseText;
                toastr.error(errorMessage);
                console.log(errorMessage);
            }
            
        });
      });
      $('a[name="restore"]').click(function() {
        var button = $(this);
        var id = button.data('id');
        var url = button.data('url');            
          $.ajax({
              url: url,
              type: 'GET',
              data: {
                  _token: $('meta[name="csrf-token"]').attr('content')
              },
              
              success: function(response) {
                if (response.status != 0) {
                  button.closest('tr').empty(); 
                  button.closest('tr').remove(); // Xóa thẻ <tr> chứa nút
                }
                
                  toastr.info(response.message);
              },
              error: function(xhr, status, error) {
                  var errorMessage = 'An error occurred: ' + xhr.status + ' ' + xhr.statusText + '\n' + xhr.responseText;
                  toastr.error(errorMessage);
                  console.log(errorMessage);
              }
              
          });
      });
      $('a[name="destroy"]').click(function() {
        var button = $(this);
        var id = button.data('id');
        var url = button.data('url');            
          $.ajax({
              url: url,
              type: 'DELETE',
              data: {
                  _token: $('meta[name="csrf-token"]').attr('content')
              },
              
              success: function(response) {
                if (response.status != 0) {
                  button.closest('tr').empty(); 
                  button.closest('tr').remove(); // Xóa thẻ <tr> chứa nút
                }
                
                  toastr.warning(response.message);
              },
              error: function(xhr, status, error) {
                  var errorMessage = 'An error occurred: ' + xhr.status + ' ' + xhr.statusText + '\n' + xhr.responseText;
                  alert(errorMessage);
                  console.log(errorMessage);
              }
              
          });
      });
  });
</script>

{{-- // --}}
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
<script>
    // Wait for the page to load
    $(document).ready(function() {

            // Kiểm tra nếu có thông báo trong localStorage
        var toastMessage = localStorage.getItem('toastMessage');
        var color = localStorage.getItem('color');

        if (toastMessage) {
            // Hiển thị thông báo toast
            if(color == 'success'){
              toastr.success(toastMessage);
            }
            // Xóa thông báo khỏi localStorage để nó không hiển thị lại
            localStorage.removeItem('toastMessage');
            localStorage.removeItem('color');
        }
      });
</script>
{{-- // --}}

</body>
</html>
