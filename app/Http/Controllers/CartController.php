<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use DB;
use Cart;
use Datetime;
use App\Products;
use App\Info;
use App\User;
use App\Orders;
use App\Orders_detail;

class CartController extends Controller
{
	public function getoldcart() {
		return redirect()->route('getcart');
	}

	public function getcart()
    {
        return view ('cart.products-cart');
    }

    public function getaddcart($id, Request $rq)
    {
        $pro = Products::find($id);
        $pro->images = unserialize($pro->images);
        if (empty($pro->discount)) {
            $pro->discount = 0;
        }

        if (empty($pro->images)) {
            return redirect()->route('index');
        }
            
        Cart::add([
            'id'        => $pro->id,
            'name'      => $pro->name,
            'qty'       => $rq->quantity,
            'price'     => $pro->price * (100 - $pro->discount) / 100,
            'options'   => [
                'image'     => url('uploads/products/details/' . $pro->images[0]),
                'url'       => url('/chi-tiet/' . $pro->slug . '-' . $pro->id . '.html')
            ]
        ]);
        return redirect()->route('getcart');
    }

    public function getdeletecart($id)
    {
        Cart::remove($id);
        return redirect()->route('getcart');
    }

    public function postupdatecart(Request $rq)
    {
        foreach ($rq->quantity as $id => $value) {
            Cart::update($id, $value);
        }
        return redirect()->route('getcart');
    }

    public function getcheckoutcart()
    {
        if (Cart::count() >= 1) {
            return view('cart.products-cart-checkout');
        }
        else {
            return view ('cart.products-cart');
        }
    }

    public function postcheckoutcart(Request $rq)
    {
        // Get or set user - Start
        $user = User::where('email', $rq->user_email)->orWhere('phone', $rq->user_phone)->first();
        if ($user == null) {
            $user = new User();
        }
        $attrs = array('name', 'phone', 'email', 'address');
        foreach ($attrs as $value) {
            $user->{$value} = $rq->{'user_' . $value};
        }
        $user->save();
        // Get or set user - End

        // Send email - Start
        $admin = DB::table('website_metadata')->where('key', 'website_email')->value('value');
        if (!empty($admin)) {
            Mail::send('cart.mail', ['user' => $user], function($m) use ($user, $admin) {
                $subject = '[Đơn đặt hàng] ' . $user['name'];
                $m->from(env('MAIL_USERNAME'), 'Bộ phận đặt hàng');
                $m->to($admin, 'Bộ phận tiếp nhận đặt hàng')->subject($subject);
                if ($user->email) {
                    $m->cc($user->email, $user->name);
                }
            });
        }
        // Send email - End

        // Saving the order - Start
        $order = new Orders();
        $order->c_id = $user->id;
        $order->qty = Cart::count();
        $order->total = 0;
        $order->save();

        foreach(Cart::content() as $val) {
            $order->total += $val->price * $val->qty;

            $details = new Orders_detail();
            $details->o_id = $order->id;
            $details->pro_id = $val->id;
            $details->qty = $val->qty;
            $details->save();
        }
        $order->save();
        // Saving the order - End

        Cart::destroy();

        return view('cart.products-cart-checkout', ['end' => true, 'user' => $user]);
    }
}