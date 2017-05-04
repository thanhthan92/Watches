<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\ProductsRequest;
use App\Products;
use Auth;
use DateTime,File,Input,DB;


class ProductsController extends Controller
{
	public function getlist()
	{
        $data = DB::table('products')->paginate(25);
        return view('back-end.products.view',['data' => $data]);
	}

    public function getdetails($id = null)
    {
        $data = new Products;
        if ($id != null) {
            $data = Products::find($id);
        }
        return view('back-end.products.details',['data' => $data]);
    }

    public function postdetails(ProductsRequest $rq, $id = null)
    {
        $data = new Products;
        return view('back-end.products.details',['data' => $data]);
    }

    public function getdel($id)
    {
    }
}
