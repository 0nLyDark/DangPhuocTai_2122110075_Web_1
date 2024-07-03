@section('title','Giỏ hàng')
@extends('layouts.site')
@section('content')
    <section class="content">
        <div class="container py-4">
            <h2 class="text-center mb-4">Giỏ Hàng Của Tôi</h2>
            <div class="content-cart">
                @if (count(session('carts',[])) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 80px" class="text-center">Mã SP</th>
                            <th style="width: 150px" >Hình</th>
                            <th>Tên sản phẩm</th>
                            <th class="text-center">Số lượng</th>
                            <th>Giá</th>
                            <th>Thành tiền</th>
                            <th style="width: 50px"><a onclick="handleDeleteAllCart()" class="btn text-danger "><i class="fas fa-trash "></i></a></th>
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
                                    <td style="width: 40px" class="text-center">{{ $row_cart['id'] }}</td>
                                    <td style="width: 150px" >
                                        <img class="img-fluid w-100" src="{{ asset('image/products/'. $row_cart['image'] ) }}"  alt="{{ $row_cart['image'] }}"  >
                                    </td>
                                    <td>{{ $row_cart['name'] }}</td>
                                    <td  class="text-center ">
                                        <div class=" quantity-plus-minus input-group d-flex justify-content-center" >
                                            <i  class="fa-solid fa-minus input-group-btn minus"></i><input class="text-center"  type="text" oninput="allowIntegers(event)" pattern="[0-9]*" name="qty[{{ $row_cart['id'] }}]" data-id="{{ $row_cart['id'] }}" min="1" value="{{ $row_cart['qty'] }}" style="width: 42px;"><i  class="fa-solid fa-plus input-group-btn plus"></i>
                                        </div>
                                        {{-- <input style="width: 60px" type="number" min='1' value="{{ $row_cart['qty'] }}" > --}}
                                    </td>
                                    <td>{{ number_format($row_cart['price']) }}</td>
                                    <td name="total" >{{ number_format($row_cart['qty']*$row_cart['price']) }}</td>
                                    <td style="width: 50px"><a onclick="handleDeleteCart(event,{{ $row_cart['id'] }},{{ $row_cart['price']*$row_cart['qty'] }})" class="btn text-danger"><i class="fa-solid fa-x"></i></a></td>
                                </tr>
                                @php
                                    $totalMoney +=$row_cart['price']*$row_cart['qty'];
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4" style="color: white">
                                    <a href="{{ route('site.product') }}" class="btn btn-info" style="color: white">Mua thêm</a>
                                    <button type="submit" class="btn btn-primary" >Cập nhật</button>
                                    <a href="{{ route('site.cart.checkout') }}" class="btn btn-danger">Thanh toán</a>
        
                                </th>
                                <th colspan="3" class="text-end">
                                    <span class="fs-5" >Tổng tiền: <span id="totalMoney">{{ number_format($totalMoney) }}</span><sup>đ</sup></span>
                                </th>
                            </tr>
                        </tfoot>
                    </form>
                </table>
                @else
                    <x-cart-null />
                @endif
            </div>
                
            
        </div>
    </section>
@endsection    
@section('footer')
    <script>
        function handleDeleteCart(event,productid,total){
            var button = event.target;
            
            $.ajax({
              url: "{{ route('site.cart.delete') }}",
              type: 'GET',
              data: {
                productid:productid,
              },
              success: function(result,status,xhr) {
                if(result['showqty'] == 0){
                    document.getElementById('showqty').innerHTML=result['showqty'];
                    document.querySelector('.content-cart').innerHTML=`<x-cart-null />`;
                }else{
                    button.closest('tr').remove(); 
                    document.getElementById('showqty').innerHTML=result['showqty'];
                    totalMoney=document.getElementById('totalMoney');
                    totalMoney.innerHTML = (parseInt(totalMoney.textContent.replace(/,/g,""), 10)-total).toLocaleString();
                }
              },
              error: function(xhr, status, error) {
                    alert(error);
              }
              
          });
        }
        function handleDeleteAllCart(){

            $.ajax({
              url: "{{ route('site.cart.deleteAll') }}",
              type: 'GET',
              success: function(result,status,xhr) {
                if(result == true){
                    document.getElementById('showqty').innerHTML= 0;
                    document.querySelector('.content-cart').innerHTML=`<x-cart-null />`;
                }else{
                    toastr.warning("Giỏ hàng của bạn đang trống");
                }
              },
              error: function(xhr, status, error) {
                    alert(error);
              }
              
          });
        }
        // function handleUpdateCart(){
        //     const inputs = document.querySelectorAll('input[name^="qty["]');
        //     const list_qty = {};
        //     inputs.forEach((input) => {
        //         const id = input.getAttribute('data-id');
        //         list_qty[id] = input.value;
        //     });
        //     // console.log(list_qty);
        //     $.ajax({
        //     url: "{{ route('site.cart.update') }}",
        //     type: 'GET',
        //     data:{
        //         list_qty:list_qty,
        //     },
        //     success: function(result,status,xhr) {
        //         const totals = document.querySelectorAll('td[name="total');
        //         totals.forEach(total => {
        //             const s = 
        //             console.log(s);
        //         });
        //         if(result == true){
        //             toastr.success("Cập nhật giỏ hàng thành công");
        //         }else{
        //             toastr.warning("Giỏ hàng thất bại");
        //         }
        //     },
        //     error: function(xhr, status, error) {
        //             alert(error);
        //     }
            
        //     });
        // }
    </script>
@endsection

