@section("title",'Chi tiết banner')
@extends('layouts.admin')
@section('content')
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Chi tiết banner</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active">Chi tiết banner</li>
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
                      <a href="{{ route('admin.banner.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> 
                        Quay lại danh sách
                      </a>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route('admin.banner.edit',$banner->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit "></i>
                            Sửa
                        </a>
                        @if ($banner->status == 0)
                            <a data-url="{{ route('admin.banner.restore',$banner->id) }}" data-id='{{ $banner->id }}' name="restore" class="btn btn-info">
                                <i class="fas fa-undo"></i> Khôi phục
                            </a>
                        @else
                            <a data-url="{{ route('admin.banner.delete',$banner->id) }}" data-id='{{ $banner->id }}' name="delete" class="btn btn-danger ">
                                <i class="fas fa-trash "></i>
                                Xóa
                            </a>
                        @endif
                    </div>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                          <th style="width: 35%" class="text-center"><strong>Tên trường</strong></th>
                          <th style="width: 65%" class="text-center"><strong>Giá trị</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="width: 35%" class="px-5 py-3">
                                ID
                            </td>
                            <td style="width: 65%" class="px-5 py-3">
                                <span>{{ $banner->id }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%" class="px-5 py-3">
                                Name
                            </td>
                            <td style="width: 65%" class="px-5 py-3">
                                <span>{{ $banner->name }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%" class="px-5 py-3">
                                Image
                            </td>
                            <td style="width: 65%" class="px-5 py-3">
                                <img src="{{ asset('image/banners/'.$banner->image) }}" style="width: 200px" class="img-fluid">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%" class="px-5 py-3">
                                Link
                            </td>
                            <td style="width: 65%" class="px-5 py-3">
                                <span>{{ $banner->link }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%" class="px-5 py-3">
                                Position
                            </td>
                            <td style="width: 65%" class="px-5 py-3">
                                <span>{{ $banner->position }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%" class="px-5 py-3">
                                Description
                            </td>
                            <td style="width: 65%" class="px-5 py-3">
                                <span>{{ $banner->description }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%" class="px-5 py-3">
                                Created_at
                            </td>
                            <td style="width: 65%" class="px-5 py-3">
                                <span>{{ $banner->created_at }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%" class="px-5 py-3">
                                Updated_at
                            </td>
                            <td style="width: 65%" class="px-5 py-3">
                                <span>{{ $banner->updated_at }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%" class="px-5 py-3">
                                Created_by
                            </td>
                            <td style="width: 65%" class="px-5 py-3">
                                <span>{{ $banner->created_by }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%" class="px-5 py-3">
                                Updated_by
                            </td>
                            <td style="width: 65%" class="px-5 py-3">
                                <span>{{ $banner->updated_by }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 35%" class="px-5 py-3">
                                Status
                            </td>
                            <td style="width: 65%" class="px-5 py-3">
                                <span>{{ $banner->status }}</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
              </div>
            </div>
        </section>

@endsection
