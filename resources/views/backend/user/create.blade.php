@section("title",'Thêm thành viên')
@extends('layouts.admin')
@section('content')
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Thêm thành viên</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active">Thêm thành viên</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>

        
        <section class="content">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-6 text-left">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> 
                        Quay lại danh sách
                    </a>
                  </div>
                  <div class="col-6 text-right">
                    {{-- <a href="{{ route('admin.product.create') }}" class="btn btn-success">
                      <i class="fas fa-plus"></i>
                      Thêm
                    </a> --}}
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <label for="name">Tên thành viên:</label><br>
                            <input type="text" value="{{ old('name') }}" id="name" name="name" placeholder="Nhập tên thành viên" class="form-control">
                            @error('name')
                                <span class="text-danger" >{{ $message }}</span>
                            @enderror<br>
                            <label for="email">Email:</label><br>
                            <input type="text" value="{{ old('email') }}" id="email" name="email" placeholder="Nhập email" class="form-control">
                            @error('email')
                                <span class="text-danger" >{{ $message }}</span>
                            @enderror<br>
                            <label for="address">Địa chỉ:</label><br>
                            <input type="text" value="{{ old('address') }}" id="address" name="address" placeholder="Nhập địa chỉ" class="form-control"><br>
                            <label for="username">Tên đăng nhập:</label><br>
                            <input type="text" value="{{ old('username') }}" id="username" name="username" placeholder="Nhập username" class="form-control">
                            @error('username')
                                <span class="text-danger" >{{ $message }}</span>
                            @enderror<br>
                            <label for="password">Mật khẩu:</label><br>
                            <input type="password" id="password" name="password" placeholder="Nhập password" class="form-control">
                            @error('password')
                                <span class="text-danger" >{{ $message }}</span>
                            @enderror<br>
                            <label for="password_re">Xác nhận mật khẩu:</label><br>
                            <input type="password" id="password_re" name="password_re" placeholder="Nhập password" class="form-control">
                            @error('password_re')
                                <span class="text-danger" >{{ $message }}</span>
                            @enderror<br>
                        </div>
                        <div class="col-md-4">
                            
                            <label for="phone">Số điên thoại:</label><br>
                            <input type="text" value="{{ old('phone') }}" id="phone" name="phone" maxlength="10" placeholder="Nhập số điện thoại" class="form-control">
                            @error('phone')
                                <span class="text-danger" >{{ $message }}</span>
                            @enderror<br>
                            <label for="gender">Giới tính:</label><br>
                            <select id="gender" name="gender"  class="form-control">
                                <option value="0" {{ old('gender')=='0'?'selected':'' }}>Nữ</option> 
                                <option value="1" {{ old('gender')=='1'?'selected':'' }}>Nam</option> 
                            </select><br>
                            <label for="roles">Quyền:</label><br>
                            <select id="roles" name="roles"  class="form-control">
                                <option value="customer" {{ old('roles')=='customer'?'selected':'' }}>Customer</option> 
                                <option value="admin" {{ old('roles')=='admin'?'selected':'' }}>Admin</option> 
                            </select><br>
                            <label for="image">Hình ảnh:</label><br>
                            <input type="file" id="image" name="image" onchange="handleFiles(this)" accept="image/*" class="form-control">
                            <div id="displayImg"></div>
                            <br>
                            <label for="status">Trạng thái:</label><br>
                            <select id="status" name="status"  class="form-control">
                               <option value="1" {{ old('status')=='1'?'selected':'' }}>Mở</option> 
                               <option value="2" {{ old('status')=='2'?'selected':'' }}>Đóng</option> 
                            </select><br>
                            <button type="submit" class="btn btn-success form-control">Thêm</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </section>

@endsection
