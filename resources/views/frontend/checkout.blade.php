@section('title','Thanh toán')
@extends('layouts.site')
@section('content')
    <section class="content">
        <div class="container py-4">
            
            <div class="row">
                <div class="col-md-6 my-2">
                    <h2 class="text-center mb-4">Thông tin đơn hàng</h2>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 150px" class="text-center" >Hình</th>
                                <th>Tên sản phẩm</th>
                                {{-- <th class="text-center">Số lượng</th>
                                <th>Giá</th> --}}
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <form action="{{ route('site.cart.update') }}" method="post">
                            @csrf
                            <tbody>
                                @php
                                    $totalMoney=0;
                                @endphp
                                @foreach ($list_cart as $row_cart)
                                    <tr>
                                        <td style="width: 150px" >
                                            <img class="img-fluid w-100" src="{{ asset('image/products/'. $row_cart['image'] ) }}"  alt="{{ $row_cart['image'] }}"  >
                                        </td>
                                        <td><strong>{{ $row_cart['name'] }}</strong>
                                            <p style="margin-bottom: 0px " >Mã sp: {{ $row_cart['id'] }}</p>
                                            <p>{{ $row_cart['qty'] }} * {{ number_format($row_cart['price']) }}<sup>đ</sup></p>
                                        </td>
                                        {{-- <td class="text-center ">{{ $row_cart['qty'] }} </td>
                                        <td>{{ number_format($row_cart['price']) }}</td> --}}
                                        <td name="total" >{{ number_format($row_cart['qty']*$row_cart['price']) }}<sup>đ</sup></td>
                                    </tr>
                                    @php
                                        $totalMoney +=$row_cart['price']*$row_cart['qty'];
                                    @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5" class="text-end">
                                        <span class="fs-5" >Tổng tiền: <span id="totalMoney">{{ number_format($totalMoney) }}</span><sup>đ</sup></span>
                                    </th>
                                </tr>
                            </tfoot>
                        </form>
                    </table>
                </div>
                <div class="col-md-6 my-2">
                    <h2 class="text-center mb-4">Thông tin vận chuyển</h2>
                    @if (Auth::check())
                        @php
                            $user = Auth::user();
                        @endphp
                        <form action="{{ route('site.cart.docheckout') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="delivery_name" >Họ tên:</label>
                                <input type="text" name="delivery_name" id="delivery_name" value="{{ old('delivery_name',$user->name) }}" class="form-control" placeholder="Nhập họ tên">
                                @error('delivery_name')
                                    <span class="text-danger" >{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-7 mb-3">
                                    <label for="delivery_email" >Email:</label>
                                    <input type="text" name="delivery_email" id="delivery_email" value="{{ old('delivery_email',$user->email) }}" class="form-control" placeholder="Nhập email">
                                    @error('delivery_email')
                                        <span class="text-danger" >{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-5 mb-3">
                                    <label for="delivery_phone" >Điện thoại:</label>
                                    <input type="text" name="delivery_phone" id="delivery_phone" oninput="allowNumber(event)"  value="{{ old('delivery_name',$user->phone) }}" class="form-control" maxlength="10" placeholder="Nhập điện thoại">
                                    @error('delivery_phone')
                                        <span class="text-danger" >{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="delivery_address" >Địa chỉ:</label>
                                <input type="text" name="delivery_address" id="delivery_address" value="{{ old('delivery_name',$user->address) }}" class="form-control" placeholder="Nhập địa chỉ">
                                @error('delivery_address')
                                    <span class="text-danger" >{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="note" >Ghi chú:</label>
                                <textarea type="text" name="note" id="note" rows="4" class="form-control" placeholder="Nhập ghi chú">{{ old('note') }}</textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-12 my-4">
                                    <input id="nam" name="gender" type="radio" value="1" {{ $user->gender == 1?'checked':'' }}>
                                    <label for="nam">Nam</label>
                                    <input id="nu" name="gender" type="radio" value="0" {{ $user->gender == 0?'checked':'' }}>    
                                    <label for="nu">Nữ</label>
                                </div>
                                <div class="col-md-6 col-12 my-4 text-end">
                                    <button type="submit" class="btn bg-black text-white fROm-control" style="width:100%;max-width: 250px" ><strong>ĐẶT HÀNG</strong></button>
                                </div>
                            </div>
                            
                            
                        </form>
                    @else
                        <p>Bạn đã có tài khoản? <a href="{{ route('site.customer.getlogin') }}">Đăng Nhập</a></p>
                    @endif
                    
                </div>
                
                
            </div>
        </div>
    </section>
@endsection    
@section('footer')
    <script>
    </script>
@endsection

