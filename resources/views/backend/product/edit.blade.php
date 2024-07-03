@section("title",'Cập nhật sản phẩm')
@extends('layouts.admin')
@section('content')
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Cập nhật sản phẩm</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active">Cập nhật sản phẩm</li>
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
                      Cập nhật
                    </a> --}}
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form action="{{ route('admin.product.update',['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('put')
                    <div class="row">
                        <div class="col-md-8">
                                <label for="name">Tên sản phẩm:</label><br>
                                <input type="text" value="{{ old('name',$product->name) }}" id="name" name="name" placeholder="Nhập tên sản phẩm" class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror<br>
                                {{-- <label for="slug">Slug:</label><br>
                                <input type="text" id="slug" name="slug" placeholder="Nhập slug" class="form-control"><br> --}}

                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="brand_id">Thương hiệu:</label>
                                        <select id="brand_id" name="brand_id" class="form-control">
                                            <option value=''>Chọn thương hiệu</option>
                                            {!! $html_brand !!}
                                        </select>
                                        @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <br>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="category_id">Danh mục:</label>
                                        <select id="category_id" name="category_id" class="form-control">
                                            <option value=''>Chọn danh mục</option>
                                            {!! $html_category !!}
                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <br>
                                    </div>
                                </div>
                                
                                <label for="description">Mô tả:</label><br>
                                <textarea id="description" name="description" rows="2" placeholder="Nhập mô tả sản phẩm" class="form-control">{{ old('description',$product->description) }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror<br>
                                <label for="detail">Chi tiết:</label><br>
                                <textarea id="detail" name="detail" rows="5" placeholder="Nhập chi tiết sản phẩm" class="form-control">{{ old('detail',$product->detail) }}</textarea>
                                @error('detail')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror<br>
                        </div>
                        <div class="col-md-4">
                            <label for="price">Giá:</label><br>
                            <input type="number" value="{{ old('price',$product->price) }}" id="price" name="price"  class="form-control">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <br>
                            <label for="pricesale">Giá sale:</label><br>
                            <input type="number" value="{{ old('pricesale',$product->pricesale) }}" min='0' id="pricesale" name="pricesale"  class="form-control">
                            <br>
                            <label for="qty">Số lượng:</label><br>
                            <input type="number" value="{{ old('qty',$product->qty) }}" id="qty" name="qty"  class="form-control" >
                            @error('qty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror</br>
                            <label for="image">Hình ảnh:</label><br>
                            <input type="file" id="image"  name="image" onchange="handleFiles(this)" accept="image/*" class="form-control">
                            <div id="displayImg">
                                @if ($product->image != null)
                                  <img src="{{ asset('image/products/'.$product->image) }}" style="width: 200px;height:200px" class="mt-4 mx2">
                                @endif
                            </div>
                            @error('image')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror<br>
                            <label for="status">Trạng thái:</label><br>
                            <select type="file" id="status" name="status"  class="form-control">
                               <option value="1" {{ $product->status == 1?'selected':'' }} >Mở</option> 
                               <option value="2" {{ $product->status == 2?'selected':'' }}>Đóng</option> 
                            </select><br>
                            <button type="submit" class="btn btn-success form-control">Cập nhật</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
        </section>

@endsection
