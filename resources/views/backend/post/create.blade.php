@section("title",'Thêm bài viết')
@extends('layouts.admin')
@section('content')
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Thêm bài viết</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active">Thêm bài viết</li>
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
                    <a href="{{ route('admin.post.index') }}" class="btn btn-primary">
                      <i class="fas fa-arrow-left"></i> 
                      Quay lại danh sách
                    </a>
                  </div>
                  <div class="col-6 text-right">
                    {{--  --}}
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.post.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                    <div class="row">
                        <div class="col-md-8">
                                <label for="title">Tiêu đề bài viết:</label><br>
                                <input type="text" value="{{ old('title') }}" id="title" name="title" placeholder="Nhập tiêu đề bài viết" class="form-control" >
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <br>
                                {{-- <label for="slug">Slug:</label><br>
                                <input type="text" id="slug" name="slug" placeholder="Nhập slug" class="form-control"><br> --}}

                                <label for="description">Mô tả:</label><br>
                                <input type="text" value="{{ old('description') }}" id="description" name="description" placeholder="Nhập mô tả bài viết" class="form-control"><br>
                                <label for="detail">Chi tiết:</label><br>
                                <textarea id="detail" name="detail" rows="5" placeholder="Nhập chi tiết bài viết" class="form-control">{{ old('detail') }}</textarea>
                                @error('detail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror<br>
                        </div>
                        <div class="col-md-4">
                            <label for="topic_id">Chủ đề:</label>
                            <select id="topic_id" name="topic_id" class="form-control">
                                <option value='0'>Chọn chủ đề</option>
                                {!! $html_topic !!}
                            </select><br>
                            <label for="type">Kiểu bài viết:</label><br>
                            <select  id="type" name="type"  class="form-control">
                               <option value="post">Post</option> 
                               <option value="page">Page</option> 
                            </select><br>
                            <label for="image">Hình ảnh:</label><br>
                            <input type="file" id="image" name="image" onchange="handleFiles(this)" accept="image/*" class="form-control">
                            <div id="displayImg"></div>
                            <br>
                            <label for="status">Trạng thái:</label><br>
                            <select type="file" id="status" name="status"  class="form-control">
                               <option value="1">Mở</option> 
                               <option value="2">Đóng</option> 
                            </select><br>
                            <button type="submit" class="btn btn-success form-control">Thêm</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </section>

@endsection
