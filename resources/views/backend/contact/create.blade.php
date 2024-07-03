@section("title",'Thêm liên hệ')
@extends('layouts.admin')
@section('content')
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Thêm liên hệ</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active">Thêm liên hệ</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        {{-- <section class="content">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->


            
            <!-- /.row -->
            <!-- Main row -->
          
            <!-- /.row (main row) -->
          </div><!-- /.container-fluid -->
        </section> --}}
        
        <section class="content">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-6 text-left">
                    <a href="{{ route('admin.contact.index') }}" class="btn btn-primary">
                      <i class="fas fa-arrow-left"></i> 
                      Quay lại danh sách
                    </a>
                  </div>
                  <div class="col-6 text-right">
                    {{-- <a href="{{ route('admin.contact.create') }}" class="btn btn-success">
                      <i class="fas fa-plus"></i>
                      Thêm
                    </a> --}}
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.contact.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" >Họ tên</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" placeholder="Nhập họ tên">
                            @error('name')
                                <span class="text-danger" >{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone" >Điện thoại</label>
                            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" oninput="allowNumber(event)" class="form-control" maxlength="10" placeholder="Nhập điện thoại">
                            @error('phone')
                                <span class="text-danger" >{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" >Email</label>
                            <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="Nhập email">
                            @error('email')
                                <span class="text-danger" >{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title" >Tiêu đề</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control" placeholder="Nhập tiêu đề">
                            @error('title')
                                <span class="text-danger" >{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="content" >Nội dung</label>
                            <textarea name="content" id="content" class="form-control"
                            placeholder="Nhập nội dung liên hệ">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="text-danger" >{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success text-end" type="submit" name="GUILIENHE" >Thêm liên hệ</button>
                        </div>
                        
                    </form>
              </div>
            </div>
        </section>

@endsection
