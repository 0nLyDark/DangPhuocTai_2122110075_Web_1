@section("title",'Quản lý Menu')
@extends('layouts.admin')
@section('content')
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Quản lý Menu</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                  <li class="breadcrumb-item active">Quản lý Menu </li>
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
                      <a href="{{ route('admin.menu.trash') }}" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                        Thùng rác
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
                  <div class="row">
                    <div class="col-md-4">
                        <form action="{{ route('admin.menu.store') }}" method="post" enctype="multipart/form-data" >
                          @csrf
                          <div class="accordion" id="accordionExample">
                              <div class="card p-3">
                                  <label for="position">Vị trí</label>
                                  <select name="position" id="position" class="form-control">
                                      <option value="mainmenu">Mainmenu</option>
                                      <option value="footermenu">Footermenu</option>
                                  </select>
                              </div>

                              <div class="card">
                                  <div class="card-header" id="headingCategory">
                                      <a class="d-block" data-toggle="collapse"
                                          data-target="#collapseCategory" aria-expanded="true"
                                          aria-controls="collapseCategory">
                                          Danh mục
                                      </a>
                                  </div>
                                  <div id="collapseCategory" class="collapse"
                                      aria-labelledby="headingCategory" data-parent="#accordionExample">
                                      <div class="card-body">
                                          <div class="form-check mb-2">
                                              {{-- <input class="form-check-input" type="checkbox" value="" name="categoryId">
                                              <label class="form-check-label" for="categoryId">
                                                Default checkbox
                                              </label></br> --}}
                                              @foreach ($list_category as $item)
                                                <input class="form-check-input" type="checkbox" name="categoryId[]" value={{ $item->id }} id="categoryId[{{ $item->id }}]">
                                                <label class="form-check-label" for="categoryId[{{ $item->id }}]">
                                                  {{ $item->name }}
                                                </label></br>
                                              @endforeach
                                          </div>
                                          <div class="mb-3">
                                              <button type="submit" name="createCategory" class="btn btn-success" value="createCategory">Thêm menu</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- end card -->
                              <div class="card">
                                  <div class="card-header" id="headingBrand">
                                      <a class="d-block" data-toggle="collapse"
                                          data-target="#collapseBrand" aria-expanded="true"
                                          aria-controls="collapseBrand">
                                          Thương hiệu
                                      </a>
                                  </div>
                                  <div id="collapseBrand" class="collapse"
                                      aria-labelledby="headingBrand" data-parent="#accordionExample">
                                      <div class="card-body">
                                          <div class="form-check mb-2">
                                              {{-- <input class="form-check-input" type="checkbox" value="" id="brandId">
                                              <label class="form-check-label" for="brandId">
                                                Default checkbox
                                              </label></br> --}}
                                              @foreach ($list_brand as $item)
                                                <input class="form-check-input" type="checkbox" name="brandId[]" value={{ $item->id }} id="brandId[{{ $item->id }}]">
                                                <label class="form-check-label" for="brandId[{{ $item->id }}]">
                                                  {{ $item->name }}
                                                </label></br>
                                              @endforeach
                                          </div>
                                          <div class="mb-3">
                                              <button type="submit" name="createBrand" class="btn btn-success" value="createBrand" >Thêm menu</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- end card -->
                              <div class="card">
                                  <div class="card-header" id="headingTopic">
                                      <a class="d-block" data-toggle="collapse"
                                          data-target="#collapseTopic" aria-expanded="true"
                                          aria-controls="collapseTopic">
                                         Chủ đề
                                      </a>
                                  </div>
                                  <div id="collapseTopic" class="collapse"
                                      aria-labelledby="headingTopic" data-parent="#accordionExample">
                                      <div class="card-body">
                                          <div class="form-check mb-2">
                                              {{-- <input class="form-check-input" type="checkbox" value="" id="topicId">
                                              <label class="form-check-label" for="topicId">
                                                Default checkbox
                                              </label></br> --}}
                                              @foreach ($list_topic as $item)
                                                <input class="form-check-input" type="checkbox" name="topicId[]" value={{ $item->id }} id="topicId[{{ $item->id }}]">
                                                <label class="form-check-label" for="topicId[{{ $item->id }}]">
                                                  {{ $item->name }}
                                                </label></br>
                                              @endforeach
                                          </div>
                                          <div class="mb-3">
                                              <button type="submit" name="createTopic" class="btn btn-success" value="createTopic">Thêm menu</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- end card -->
                              <div class="card">
                                  <div class="card-header" id="headingPage">
                                      <a class="d-block" data-toggle="collapse"
                                          data-target="#collapsePage" aria-expanded="true"
                                          aria-controls="collapsePage">
                                          Trang đơn
                                      </a>
                                  </div>
                                  <div id="collapsePage" class="collapse"
                                      aria-labelledby="headingPage" data-parent="#accordionExample">
                                      <div class="card-body">
                                          <div class="form-check mb-2">
                                              {{-- <input class="form-check-input" type="checkbox" value="" id="pageId">
                                              <label class="form-check-label" for="pageId">
                                                Default checkbox
                                              </label></br> --}}
                                              @foreach ($list_page as $item)
                                                <input class="form-check-input" type="checkbox" name="pageId[]" value={{ $item->id }} id="pageId[{{ $item->id }}]">
                                                <label class="form-check-label" for="pageId[{{ $item->id }}]">
                                                  {{ $item->title }}
                                                </label></br>
                                              @endforeach
                                          </div>
                                          <div class="mb-3">
                                              <button type="submit" name="createPage" class="btn btn-success" value="createPage">Thêm menu</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- end card -->
                              <div class="card">
                                  <div class="card-header" id="headingCustom">
                                      <a class="d-block" data-toggle="collapse"
                                          data-target="#collapseCustom" aria-expanded="true"
                                          aria-controls="collapseCustom">
                                          Tùy liên kết
                                      </a>
                                  </div>
                                  <div id="collapseCustom" class="collapse"
                                      aria-labelledby="headingCustom" data-parent="#accordionExample">
                                      <div class="card-body">
                                          <div class="mb-3">
                                              <label for="name">Tên menu</label>
                                              <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control">
                                              @error('name')
                                                  <span class="text-danger">{{ $message }}</span>
                                              @enderror
                                          </div>
                                          <div class="mb-3">
                                              <label for="link">Liên kết</label>
                                              <input type="text" value="{{ old('link') }}" name="link" id="link" class="form-control">
                                              @error('link')
                                                  <span class="text-danger">{{ $message }}</span>
                                              @enderror
                                          </div>
                                          <div class="mb-3">
                                              <button type="submit" name="createCustom" class="btn btn-success" value="createCustom">Thêm menu</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <!-- end card -->
                              <div class="card p-3">
                                  <label for="status">Trạng thái</label>
                                  <select name="status" id="status" class="form-control">
                                    <option value="1">Mở</option>
                                    <option value="2">Đóng</option>
                                      
                                  </select>
                              </div>
                          </div>
                      </form>
                    </div>
                    <div class="col-md-8">
                      <table class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                <th style="width: 40px" class="text-center">#</th>
                                <th>Tên Menu</th>
                                <th>Liên kết</th>
                                <th>Vị trí</th>
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
                                  <td>{{ $row->link }}</td>
                                  <td>{{ $row->position }}</td>
                                  @php
                                      $id= ['id'=>$row->id];
                                  @endphp
                                  <td style="width: 180px" class="text-center ">
                                    <a data-url="{{ route('admin.menu.status',$id) }}" name="status" data-id="{{ $row->id }}" class="btn btn-sm ">
                                      @if ($row->status==1)
                                          <i class="fas fa-toggle-on text-success"></i>
                                      @else
                                          <i class="fas fa-toggle-off text-warning"></i>
                                      @endif
                                    </a> 
                                    <a href="{{ route('admin.menu.show',$id) }}" class="btn btn-sm ">
                                        <i class="far fa-eye text-info"></i>
                                    </a> 
                                    <a href="{{ route('admin.menu.edit',$id) }}" class="btn btn-sm ">
                                        <i class="fas fa-edit text-primary"></i>
                                    </a>
                                    <a data-url="{{ route('admin.menu.delete',$id) }}" name="delete" data-id="{{ $row->id }}" class="btn btn-sm ">
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
