@section("title",'Cập nhật menu')
@extends('layouts.admin')
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Cập nhật menu</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active">Cập nhật menu </li>
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
                        <a href="{{ route('admin.menu.index') }}" class="btn btn-primary">
                            <i class="fas fa-arrow-left"></i> 
                            Quay lại danh sách
                        </a>
                    </div>
                    <div class="col-6 text-right">
                      {{-- <a href="{{ route('admin.menu.create') }}" class="btn btn-success">
                        <i class="fas fa-plus"></i>
                        Thêm
                      </a> --}}
                    </div>
                  </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.menu.update',['id'=>$menu->id]) }}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6">
                                <label for="name">Tên menu:</label><br>
                                <input type="text" id="name" name="name" value="{{ old('name',$menu->name) }}" placeholder="Nhập tên menu" class="form-control">
                                @error('name')
                                    <span class="text-danger" >{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="link">Đường dẫn:</label><br>
                                <input type="text" id="link" name="link" value="{{ old('link',$menu->link) }}" placeholder="Nhập tên menu" class="form-control">
                                @error('link')
                                    <span class="text-danger" >{{ $message }}</span>
                                @enderror
                                <br>
                                <label for="parent_id">Menu cha:</label>
                                <select id="parent_id" name="parent_id" class="form-control"  >
                                  <option value="0">Không có menu cha</option>
                                  {!! $htmlparentId !!}
                                </select><br>
                                <label for="sort_order">Sắp xếp:</label>
                                <select id="sort_order" name="sort_order" class="form-control">
                                  <option value="0" selected >None</option>
                                  {!! $htmlsortorder !!}
                                </select><br>
                            </div>
                            <div class="col-md-6">
                                <label for="type">Kiểu:</label>
                                <select id="type" name="type" class="form-control">
                                    <option value="category" {{ $menu->type == 'category'?'selected':'' }} >Danh mục</option>
                                    <option value="brand" {{ $menu->type == 'brand'?'selected':'' }}>Thương hiệu</option>
                                    <option value="topic" {{ $menu->type == 'topic'?'selected':'' }}>Chủ đề</option>
                                    <option value="page" {{ $menu->type == 'page'?'selected':'' }}>Trang đơn</option>
                                    <option value="custom" {{ $menu->type == 'custom'?'selected':'' }}>Custom</option>
                                </select><br>
                                <label for="position">Vị trí:</label>
                                <select id="position" name="position" class="form-control">
                                    <option value="mainmenu" {{ $menu->position == 'mainmenu'?'selected':'' }} >Main Menu</option>
                                    <option value="footermenu" {{ $menu->position == 'footermenu'?'selected':'' }}>Footer Menu</option>
                                </select><br>
                                {{-- <label for="tabble_id">Table_id:</label>
                                <select id="tabble_id" name="tabble_id" class="form-control">
                                    <option value="1" {{ $menu->tabble_id == 1?'selected':'' }} >Mở</option>
                                    <option value="2" {{ $menu->tabble_id == 2?'selected':'' }}>Đóng</option>
                                </select><br> --}}
                                <label for="status">Trạng thái:</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="1" {{ $menu->status == 1?'selected':'' }} >Mở</option>
                                    <option value="2" {{ $menu->status == 2?'selected':'' }}>Đóng</option>
                                </select><br>
                                <button type="submit" class="btn btn-success form-control ">Cập nhập</button>
                            </div>
                        </div>
                    </form>
                </div>
              </div>
           
    </div>
      <!-- /.content-wrapper -->  
@endsection
