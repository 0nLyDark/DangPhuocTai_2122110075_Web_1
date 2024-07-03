@section("title",'Quản lý bài viết')
@extends('layouts.admin')
@section('content')
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Quản lý bài viết</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active">Quản lý bài viết</li>
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
                    <a href="{{ route('admin.post.trash') }}" class="btn btn-danger">
                      <i class="fas fa-trash"></i>
                      Thùng rác
                    </a>
                  </div>
                  <div class="col-6 text-right">
                    <a href="{{ route('admin.post.create') }}" class="btn btn-success">
                      <i class="fas fa-plus"></i>
                      Thêm
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th style="width: 40px" class="text-center">#</th>
                          <th style="width: 150px" class="text-center">Hình</th>
                          <th>Tiêu đề</th>
                          <th>Slug</th>
                          <th>Chủ đề</th>
                          <th>Kiểu</th>

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
                            <td style="width: 150px" class="text-center">
                                <img src="{{ asset('image/posts/'.$row->image) }}" alt="{{ $row->image }}" class="img-fluid" >
                            </td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->slug }}</td>
                            <td>{{ $row->topicname }}</td>
                            <td>{{ $row->type }}</td>
                            @php
                                $id= ['id'=>$row->id];
                            @endphp
                            <td style="width: 180px" class="text-center ">
                              <a data-url="{{ route('admin.post.status',$id) }}" name="status" data-id="{{ $row->id }}" class="btn btn-sm ">
                                @if ($row->status==1)
                                    <i class="fas fa-toggle-on text-success"></i>
                                @else
                                    <i class="fas fa-toggle-off text-warning"></i>
                                @endif
                              </a> 
                              <a href="{{ route('admin.post.show',$id) }}" class="btn btn-sm ">
                                  <i class="far fa-eye text-info"></i>
                              </a> 
                              <a href="{{ route('admin.post.edit',$id) }}" class="btn btn-sm ">
                                  <i class="fas fa-edit text-primary"></i>
                              </a>
                              <a data-url="{{ route('admin.post.delete',$id) }}" name="delete" data-id="{{ $row->id }}" class="btn btn-sm ">
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
        </section>

@endsection
