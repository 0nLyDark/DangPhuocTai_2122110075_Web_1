@section("title",'Cập nhật Banner')
@extends('layouts.admin')
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Cập nhật Banner</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active">Cập nhật Banner </li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <section class="content">
              <div class="card">
                <div class="card-header">
                  <div class="row">
                    <div class="col-6 text-left">
                        <div class="col-6 text-left">
                            <a href="{{ route('admin.banner.index') }}" class="btn btn-primary">
                                <i class="fas fa-arrow-left"></i> 
                                Quay lại danh sách
                            </a>
                        </div>
                    </div>
                    <div class="col-6 text-right">
                      {{-- <a href="{{ route('admin.banner.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i>
                        Thêm
                      </a> --}}
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.banner.update',['id'=>$banner->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <label for="name">Tên Banner:</label><br>
                        <input type="text" id="name" name="name" placeholder="Nhập tên Banner" class="form-control" value="{{ old('name',$banner->name) }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <label for="link">Link:</label><br>
                        <input type="text" id="link" name="link" placeholder="Nhập link" class="form-control" value="{{ old('link',$banner->link) }}">
                        @error('link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror<br>
                        <label for="image">Hình ảnh:</label><br>
                        <input type="file" id="image"  name="image" onchange="handleFiles(this)" accept="image/*" class="form-control">
                        <div id="displayImg">
                            @if ($banner->image != null)
                              <img src="{{ asset('image/banners/'.$banner->image) }}" style="width: 200px;height:200px" class="mt-4 mx2">
                            @endif
                        </div>
                        </br>
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror<br>
                        <label for="position">Vị trí:</label>
                        <select id="position" name="position" class="form-control">
                            <option value="slideshow" {{ old('position',$banner->position)=="slideshow"?'selected':'' }}>slideshow</option>
                            <option value="slide" {{ old('position',$banner->position)=="slide"?'selected':'' }}>slide</option>
                        </select><br>
                        <label for="description">Mô tả:</label><br>
                        <textarea  id="description" name="description"  class="form-control">{{ old('description',$banner->description) }}</textarea><br>
                        <label for="status">Trạng thái:</label>
                        <select id="status" name="status" class="form-control">
                            <option value="1" {{ old('status',$banner->status)=="1"?'selected':'' }}>Mở</option>
                            <option value="2" {{ old('status',$banner->status)=="2"?'selected':'' }}>Đóng</option>
                        </select><br>
                        <button type="submit" class="btn btn-success form-control">Cập nhật</button>
                      </form>
                </div>
              </div>
           
    </div>
      <!-- /.content-wrapper -->  
@endsection
