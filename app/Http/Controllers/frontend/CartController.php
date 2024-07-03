<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class CartController extends Controller
{
    public function index(){
        $list_cart = session('carts',[]);
        return view('frontend.cart',compact('list_cart'));
    }
    public function addcart(){
        $data =[
            'status'=>'THEM',
        ];
        $productid = $_GET['productid'];
        $qty = $_GET['qty'];
        $product = Product::find($productid);
        $cart_item = array(
            'id'=>$productid,
            'image'=>$product->image,
            'name'=>$product->name,
            'qty'=>$qty,
            'price'=>$product->pricesale>0?$product->pricesale:$product->price,
        );
        $carts = session('carts', []);
        if(is_array($carts) && count($carts)==0){
            array_push($carts,$cart_item);
            session(['carts' => $carts]);
        }
        else{
            $check = true;
            foreach($carts as $key=>$item)
            {
                
                if( $item['id'] == $productid ){
                    $carts[$key]['qty']+=$qty;
                    $check = false;
                    $data['status']='TANG';
                    break;
                }
            }
            if($check == true){
                array_push($carts,$cart_item);
            }
            session(['carts' => $carts]);
        }
        $data['showqty']=count($carts);
        return $data;
    }
    public function deletecart(){
        $productid = $_GET['productid'];
        $carts = session('carts', []);
        if(is_array($carts)){
            foreach($carts as $key=>$item)
            { 
                if( $item['id'] == $productid ){
                    unset($carts[$key]);
                    break;
                }
            }

            session(['carts' => $carts]);
            $data['showqty']=count($carts);
            return $data;
        }
    }
    public function deleteAllcart(){
        $carts = session('carts', []);
        if(is_array($carts) && count($carts)>0){
            session(['carts' => []]);
            return true;
        }

        return ;
    }
    public function updatecart(Request $request){
        $carts = session('carts', []);
        $list_qty = $request->qty;
        if(is_array($list_qty) && count($list_qty)>0){
            
            foreach($carts as $key=>$cart)
            {
                foreach($list_qty as $productid=>$qtyvalue)
                {
                    if($carts[$key]['id'] == $productid)
                    {
                        $carts[$key]['qty'] = $qtyvalue;
                    }
                }
            }
            session(['carts' => $carts]);
            return redirect()->route('site.cart.index')->with('message','Cập nhật giỏ hàng thành công');
        }
        return redirect()->route('site.cart.index')->with(['message'=>'Giỏ hàng của bạn đang trống','color'=>'warning']);

    }
    //
    public function checkout(){
        $list_cart = session('carts',[]);
        if(count($list_cart) == 0){
            return redirect()->route('site.cart.index');
        }
        return view('frontend.checkout',compact('list_cart'));
    }
    public function successcheckout(){
        return view('frontend.checkout_success');
    }
    public function docheckout(StoreOrderRequest $request){
      $order = new Order();
      $carts = session('carts',[]);
      if(count($carts)>0){
        $order->user_id = Auth::user()->id;
        $order->delivery_name = $request->delivery_name;
        $order->delivery_email = $request->delivery_email;
        $order->delivery_phone = $request->delivery_phone;
        $order->delivery_address = $request->delivery_address;
        $order->note = $request->note;
        $order->delivery_gender = $request->gender;
        $order->type = 'online';
        $order->created_at = date('Y-m-d H:i:s');
        if($order->save() ){
            foreach ($carts as $key => $cart) {
                $orderdetail = new Orderdetail();
                $orderdetail->order_id = $order->id;
                $orderdetail->product_id = $cart['id'];
                $orderdetail->price = $cart['price'];
                $orderdetail->qty = $cart['qty'];
                $orderdetail->discount = 0;
                $orderdetail->amount = $cart['qty']*$cart['price'];
                $orderdetail->save();
            }
        }
        session(['carts' => []]);
    }else{
        return redirect()->route('site.cart.index');
      }
      return redirect()->route('site.cart.successcheckout');
    }
}
