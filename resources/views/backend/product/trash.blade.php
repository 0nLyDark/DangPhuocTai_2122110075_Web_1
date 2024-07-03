@section("title",'Thùng rác sản phẩm')
@extends('layouts.admin')
@section('content')
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Thùng rác sản phẩm</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active">Thùng rác sản phẩm</li>
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
                    <a href="{{ route('admin.product.index') }}" class="btn btn-primary">
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
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th style="width: 40px" class="text-center">#</th>
                          <th style="width: 150px" class="text-center">Hình</th>
                          <th>Tên sản phẩm</th>
                          <th>Danh mục</th>
                          <th>Thương hiệu</th>
                          <th style="width: 250px" class="text-center">Hành động</th>
                          <th style="width: 40px" class="text-center">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($list as $row)
                        <tr>
                            <td style="width: 40px" class="text-center">
                              <input type="checkbox">
                            </td>
                            <td style="width: 150px" class="text-center">
                                <img src="{{ asset('image/products/'.$row->image) }}" alt="{{ $row->image }}" class="img-fluid" >
                            </td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->categoryname }}</td>
                            <td>{{ $row->brandname }}</td>
                            @php
                                $id= ['id'=>$row->id];
                            @endphp
                            <td style="width: 250px" class="text-center ">
                              <a data-url="{{ route('admin.product.restore',$id) }}" name="restore" data-id="{{ $row->id }}" class="btn btn-sm bg-primary">
                                  <i class="fas fa-undo"></i> Khôi phục
                              </a>
                              <a data-url="{{ route('admin.product.destroy',$id) }}" name="destroy" data-id="{{ $row->id }}" class="btn btn-sm bg-danger">
                                  <i class="fas fa-trash "></i> Xóa vĩnh viễn    
                              </a>
                                {{-- <form action="{{ route('admin.product.destroy',$id) }}" method="post" style="display: inline-block">
                                @csrf
                                @method('DELETE')                                
                                    <button  type="submit" class="btn btn-sm bg-danger">
                                        <i class="fas fa-trash "></i> Xóa vĩnh viễn    
                                    </button>
                                </form> --}}
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
