@section("title",'Cập nhật danh mục')
@extends('layouts.admin')
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Cập nhật danh mục</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active">Cập nhật danh mục </li>
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
                        <a href="{{ route('admin.category.index') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> 
                            Quay lại danh sách
                        </a>
                    </div>
                    <div class="col-6 text-right">
                      {{-- <a href="{{ route('admin.category.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i>
                        Thêm
                      </a> --}}
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.update',['id'=>$category->id]) }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('put')
                        <label for="name">Tên danh mục:</label><br>
                        <input type="text" id="name" name="name" value="{{ old('name',$category->name) }}" placeholder="Nhập tên danh mục" class="form-control">
                        @error('name')
                            <span class="text-danger" >{{ $message }}</span>
                        @enderror
                        <br>
                        {{-- <label for="slug">Slug:</label><br>
                        <input type="text" id="slug" name="slug" placeholder="Nhập slug" class="form-control"><br> --}}
                        <label for="parent_id">Danh mục cha:</label>
                        <select id="parent_id" name="parent_id" class="form-control"  >
                          <option value="0">Không có danh mục cha</option>
                          {!! $htmlparentId !!}
                        </select><br>
                        <label for="sort_order">Sắp xếp:</label>
                        <select id="sort_order" name="sort_order" class="form-control">
                          <option value="0" selected >None</option>
                          {!! $htmlsortorder !!}
                        </select><br>
                        <label for="image">Hình ảnh:</label><br>
                        <input type="file" id="image"  name="image" onchange="handleFiles(this)" accept="image/*" class="form-control">
                        <div id="displayImg">
                            @if ($category->image != null)
                              <img src="{{ asset('image/categorys/'.$category->image) }}" style="width: 200px;height:200px" class="mt-4 mx2">
                            @endif
                        </div>
                        <br>

                        <label for="description">Mô tả:</label><br>
                        <textarea rows="4" id="description" name="description"  class="form-control">{{ old('description',$category->description) }}</textarea><br>
                        <label for="status">Trạng thái:</label>
                        <select id="status" name="status" class="form-control">
                            <option value="1" {{ $category->status == 1?'selected':'' }} >Mở</option>
                            <option value="2" {{ $category->status == 2?'selected':'' }}>Đóng</option>
                        </select><br>
                        <button type="submit" class="btn btn-success form-control w-50">Cập nhập</button>
                    </form>
                </div>
              </div>
           
    </div>
      <!-- /.content-wrapper -->  
@endsection
