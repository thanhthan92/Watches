<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Orders;
use App\Orders_detail;
use App\Products;
use DB;

class OrdersController extends Controller
{
    public function getlist()
    {
    	$data = Orders::paginate(10);
    	return view('back-end.orders.list',['data' => $data]);
    }

    public function getdetail($id)
    {
    	$order = Orders::where('id', $id)->first();
    	$ordersDetail = Orders_detail::where('o_id', $order->id)->get();
        $user = User::find($order->c_id);

        $data = array();
        foreach ($ordersDetail as $value) {
            $product = Products::find($value->pro_id);
            $imgs = unserialize($product->images);
            if (empty($product->discount)) {
                $product->discount = 0;
            }
            $tmp = new \stdClass();
            $tmp->id = $product->id;
            $tmp->name = $product->name;
            $tmp->qty = $value->qty;
            $tmp->price = $product->price * (100 - $product->discount) / 100;
            $img = url('/image/temporary.jpg');
            if (!empty($imgs)) {
                $img = url('uploads/products/details/' . $imgs[0]);
            }
            $tmp->options['image'] = $img;
            $tmp->options['url'] = url('/chi-tiet/' . $product->slug . '-' . $product->id . '.html');
            $data[] = $tmp;
        }
    	return view('back-end.orders.detail',['data' => $data, 'user' => $user, 'order' => $order]);
    }
    
    public function postdetail(Request $rq, $id)
    {
    	$order = Orders::find($id);

    	$order->status = 1;
    	$order->save();

        return $order->status;
    }

    public function getdel($id)
    {
    	$order = Orders::where('id',$id)->first();
        if ($order == null) {
            return redirect('admin/donhang');
        }

    	if ($order->status == 1) {
    		return redirect()->back()
    		->with([
                'flash_level' => 'result_msg',
                'flash_massage' => 'Không thể hủy đơn hàng số: '. $id . ' vì đã được xác nhận!'
            ]);
    	} else {
    		$order = Orders::find($id);
        	$order->delete();
        	return redirect('admin/donhang')
         	->with([
                'flash_level'=>'result_msg',
                'flash_massage'=>'Đã hủy bỏ đơn hàng số:  '.$id.'!'
            ]);
     	}
    }
}
