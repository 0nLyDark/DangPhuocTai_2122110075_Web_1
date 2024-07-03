@section("title",'Cập nhật chủ đề')
@extends('layouts.admin')
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Cập nhật chủ đề</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active">Cập nhật chủ đề </li>
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
                        <a href="{{ route('admin.topic.index') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> 
                            Quay lại danh sách
                        </a>
                    </div>
                    <div class="col-6 text-right">
                      {{-- <a href="{{ route('admin.topic.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i>
                        Thêm
                      </a> --}}
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.topic.update',['id'=>$topic->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <label for="name">Tên chủ đề:</label><br>
                        <input type="text" id="name" name="name" value="{{ old('name',$topic->name) }}" placeholder="Nhập tên chủ đề" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <br>
                        <label for="sort_order">Sắp xếp:</label><br>
                        <select id="sort_order" name="sort_order" class="form-control">
                          <option value="0" selected >None</option>
                          {!! $htmlsortorder !!}
                        </select><br>
                        {{-- <label for="slug">Slug:</label><br>
                        <input type="text" id="slug" name="slug" placeholder="Nhập slug" class="form-control"><br> --}}
                        <label for="description">Mô tả:</label><br>
                        <textarea  id="description" name="description" placeholder="Nhập mô tả chủ đề"  class="form-control">{{ old('description',$topic->description) }}</textarea><br>
                        <label for="status">Trạng thái:</label>
                        <select id="status" name="status" class="form-control">
                            <option value="1" {{ $topic->status == 1?'slected':'' }}>Mở</option>
                            <option value="2" {{ $topic->status == 2?'slected':'' }}>Đóng</option>
                        </select><br>
                        <button type="submit" class="btn btn-success form-control">Cập nhật</button>
                    </form>
                </div>
              </div>
           
    </div>
      <!-- /.content-wrapper -->  
@endsection
