<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Orderdetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Order::where('order.status','!=',0)
        ->Join('user','user_id','=','user.id')
        ->select('order.id','user.name as username','order.delivery_name','order.delivery_gender','order.delivery_email','order.delivery_phone','order.type','order.status')
        ->orderBy('order.created_at','desc')
        ->get();
        return view('backend.order.index',compact('list'));
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::find($id);
        if(!$order){
            return redirect()->route('admin.order.index')->with(['message'=>'Không tìm thấy','color'=>'error']);
        }
        $list_orderdetail = Orderdetail::where('order_id','=',$order->id)
        ->leftJoin('product','orderdetail.product_id','=','product.id')
        ->select('orderdetail.id','product.name as productname','product.image','orderdetail.price','orderdetail.qty','orderdetail.discount','orderdetail.amount')
        ->get();
        return view('backend.order.show',compact('order','list_orderdetail'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function trash()
    {
        $list = Order::where('order.status','=',0)
        ->Join('user','user_id','=','user.id')
        ->select('order.id','user.name as username','order.delivery_name','order.delivery_gender','order.delivery_email','order.delivery_phone','order.type','order.status')
        ->orderBy('order.created_at','desc')
        ->get();
        return view('backend.order.trash',compact('list'));
        //
    }
    public function status(string $id)
    {
        $order = Order::find($id);
        if($order==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }

        $order->status = $order->status==1?2:1;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = Auth::id()??1;
        $order->save();
        $data = [
            'message' => 'Thay đổi trạng thái thành công: ' . $id,
            'status' => $order->status,
            'id' => $id
        ];
        return $data;

        //
    }
    public function delete(string $id)
    {
        $order = Order::find($id);
        if($order==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $order->status = 0;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = Auth::id()??1;
        $order->save();
        
        $data = [
            'message' => 'Xóa thành công: ' . $id,
            'status' => $order->status,
            'id' => $id
        ];
        return $data;
    }
    public function restore(string $id)
    {
        $order = Order::find($id);
        if($order==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $order->status = 2;
        $order->updated_at = date('Y-m-d H:i:s');
        $order->updated_by = Auth::id()??1;

        $order->save();
        $data = [
            'message' => 'Khôi phục thành công: ' . $id,
            'status' => $order->status,
            'id' => $id
        ];
        return $data;
        //
    }
    public function destroy(string $id)
    {
        $order = Order::find($id);
        if($order==null){
            $data = [
                'message' => 'Không tìm thấy !!!: ' . $id,
                'status' => 'error',
                'id' => $id
            ];
            return $data;
        }
        $order->delete();

        Orderdetail::whereIn('order_id', [$id])->delete();

        $data = [
            'message' => 'Xóa vĩnh viễn thành công: ' . $id,
            'status' => 1,
            'id' => $id
        ];
        return $data;
        //
    }
}
