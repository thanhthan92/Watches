<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Cart;
use Datetime;
use App\Products;

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
        return view('cart.products-cart-checkout');
    }

    public function postcheckoutcart(Request $rq)
    {
        $user = array(
            'name' => $rq->user_name, 'phone' => $rq->user_phone, 'email' => $rq->user_email, 'address' => $rq->user_address
        );

        // Send mail and destroy cart
        Cart::destroy();

        return view('cart.products-cart-checkout', ['end' => true, 'user' => $user]);
    }
}