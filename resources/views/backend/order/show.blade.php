@section("title",'Chi tiết đơn hàng')
@extends('layouts.admin')
@section('content')
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Chi tiết đơn hàng</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active">Chi tiết đơn hàng</li>
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
                      <a href="{{ route('admin.order.index') }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> 
                        Quay lại danh sách
                      </a>
                    </div>
                    <div class="col-6 text-right">
                        {{-- <a href="{{ route('admin.order.edit',$order->id) }}" class="btn btn-primary">
                            <i class="fas fa-edit "></i>
                            Sửa
                        </a> --}}
                        @if ($order->status == 0)
                            <a data-url="{{ route('admin.order.restore',$order->id) }}" data-id='{{ $order->id }}' name="restore" class="btn btn-info">
                                <i class="fas fa-undo"></i> Khôi phục
                            </a>
                        @else
                            <a data-url="{{ route('admin.order.delete',$order->id) }}" data-id='{{ $order->id }}' name="delete" class="btn btn-danger ">
                                <i class="fas fa-trash "></i>
                                Xóa
                            </a>
                        @endif
                    </div>
                </div>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-hover">
                    
                    <tbody>
                        <tr>
                            <td style="width: 20%" class="px-5 py-3">
                                <strong>ID</strong>
                            </td>
                            <td style="width: 30%" class="px-5 py-3">
                                <span>{{ $order->id }}</span>
                            </td>
                        </tr>
                        <tr>
                            <th style="width: 20%" class="px-5 py-3">
                                <strong>User_id</strong>
                            </th>
                            <td style="width: 30%" class="px-5 py-3">
                                <span>{{ $order->user_id }}</span>
                            </td>
                            {{-- # --}}
                            <td style="width: 20%" class="px-5 py-3">
                                <strong>Ghi chú</strong>
                            </td>
                            <td style="width: 30%" class="px-5 py-3">
                                <span>{{ $order->note }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%" class="px-5 py-3">
                                <strong>Tên khách hàng</strong>
                            </td>
                            <td style="width: 30%" class="px-5 py-3">
                                <span>{{ $order->delivery_name }}</span>
                            </td>
                            {{-- # --}}
                            <td style="width: 20%" class="px-5 py-3">
                                <strong>Kiểu</strong>
                            </td>
                            <td style="width: 30%" class="px-5 py-3">
                                <span>{{ $order->type }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%" class="px-5 py-3">
                                <strong>Giới tính</strong>
                            </td>
                            <td style="width: 30%" class="px-5 py-3">
                                <span>{{ $order->delivery_gender==0?'Nữ':'Nam' }}</span>    
                            </td>
                            {{-- # --}}
                            <td style="width: 20%" class="px-5 py-3">
                                <strong>Ngày tạo</strong>
                            </td>
                            <td style="width: 30%" class="px-5 py-3">
                                <span>{{ $order->created_at }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%" class="px-5 py-3">
                                <strong>Email</strong>
                            </td>
                            <td style="width: 30%" class="px-5 py-3">
                                <span>{{ $order->delivery_email }}</span>
                            </td>
                            {{-- # --}}
                            <td style="width: 20%" class="px-5 py-3">
                                <strong>Ngày cập nhật</strong>
                            </td>
                            <td style="width: 30%" class="px-5 py-3">
                                <span>{{ $order->updated_at }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%" class="px-5 py-3">
                                <strong>Số điện thoại</strong>
                            </td>
                            <td style="width: 30%" class="px-5 py-3">
                                <span>{{ $order->delivery_phone }}</span>
                            </td>
                            {{-- # --}}
                            <td style="width: 20%" class="px-5 py-3">
                                <strong>Updated_by</strong>
                            </td>
                            <td style="width: 30%" class="px-5 py-3">
                                <span>{{ $order->updated_by }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 20%" class="px-5 py-3">
                                <strong>Địa chỉ</strong>
                            </td>
                            <td style="width: 30%" class="px-5 py-3">
                                <span>{{ $order->delivery_address }}</span>
                            </td>
                            {{-- # --}}
                            <td style="width: 20%" class="px-5 py-3">
                                <strong>Status</strong>
                            </td>
                            <td style="width: 30%" class="px-5 py-3">
                                <span>{{ $order->status }}</span>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
                <table class="table table-bordered table-hover mt-4">
                    <thead>
                        <tr>
                            <th colspan="8" class="text-center py-4 ">
                                <h4>Danh sách sản phẩm của đơn hàng</h4>
                            </th>
                        </tr>
                        <tr>
                            <th style="width: 40px" class="text-center">#</th>
                            <th style="width: 150px" class="text-center">Hình</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Giảm giá</th>
                            <th>Tổng</th>
                            <th style="width: 40px" class="text-center">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($list_orderdetail as $row)
                        <tr>
                            <td style="width: 40px" class="text-center">
                              <input type="checkbox">
                            </td>
                            <td style="width: 150px" class="text-center">
                                <img src="{{ asset('image/products/'.$row->image) }}" alt="{{ $row->image }}" class="img-fluid" >
                            </td>
                            <td>{{ $row->productname }}</td>
                            <td>{{ $row->price }}</td>
                            <td>{{ $row->qty }}</td>
                            <td>{{ $row->discount }}</td>
                            <td>{{ $row->amount }}</td>
                            <td style="width: 40px" class="text-center">{{ $row->id }}</td>
                        </tr>
                      @endforeach
                        
                    </tbody>
                </table>

              </div>
            </div>
        </section>

@endsection
