@section("title",'Quản lý chủ đề')
@extends('layouts.admin')
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Quản lý chủ đề</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active">Quản lý chủ đề </li>
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
                      <a href="{{ route('admin.topic.trash') }}" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                        Thùng rác
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
                  <div class="row">
                    <div class="col-md-4">
                        <form action="{{ route('admin.topic.store') }}" method="post" enctype="multipart/form-data">
                          @csrf
                          <label for="name">Tên chủ đề:</label><br>
                          <input type="text" id="name" name="name" placeholder="Nhập tên chủ đề" class="form-control">
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
                          <textarea  id="description" name="description" placeholder="Nhập mô tả chủ đề"  class="form-control">{{ old('description') }}</textarea><br>
                          <label for="status">Trạng thái:</label>
                          <select id="status" name="status" class="form-control">
                              <option value="1">Mở</option>
                              <option value="2">Đóng</option>
                          </select><br>
                          <button type="submit" class="btn btn-success form-control">Thêm</button>
                        </form>
                    </div>
                    <div class="col-md-8">
                      <table class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                <th style="width: 40px" class="text-center">#</th>
                                <th>Tên chủ đề</th>
                                <th>Slug</th>
                                <th>Mô tả</th>
                                <th style="width: 180px" class="text-center">Hành động</th>
                                <th style="width: 40px" class="text-center">Id</th>
                              </tr>
                          </thead>
                          <tbody>
                            @foreach ($list as $row)
                              <tr>
                                  <td style="width: 40px" class="text-center">
                                    <input type="checkbox">
                                  </td>
                             
                                  <td>{{ $row->name }}</td>
                                  <td>{{ $row->slug }}</td>
                                  <td>{{ $row->description }}</td>
                                  @php
                                      $id= ['id'=>$row->id];
                                  @endphp
                                  <td style="width: 180px" class="text-center ">
                                    <a data-url="{{ route('admin.topic.status',$id) }}" name="status" data-id="{{ $row->id }}" class="btn btn-sm ">
                                      @if ($row->status==1)
                                          <i class="fas fa-toggle-on text-success"></i>
                                      @else
                                          <i class="fas fa-toggle-off text-warning"></i>
                                      @endif
                                    </a> 
                                    <a href="{{ route('admin.topic.show',$id) }}" class="btn btn-sm ">
                                        <i class="far fa-eye text-info"></i>
                                    </a> 
                                    <a href="{{ route('admin.topic.edit',$id) }}" class="btn btn-sm ">
                                        <i class="fas fa-edit text-primary"></i>
                                    </a>
                                    <a data-url="{{ route('admin.topic.delete',$id) }}" name="delete" data-id="{{ $row->id }}" class="btn btn-sm ">
                                        <i class="fas fa-trash text-danger"></i>
                                    </a>
                                  </td>
                                  <td style="width: 40px" class="text-center">{{ $row->id }}</td>
                              </tr>
                            @endforeach
                          </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
           
    </div>
      <!-- /.content-wrapper -->  
@endsection
