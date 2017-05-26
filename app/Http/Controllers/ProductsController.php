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
        $data = DB::table('products')
            ->join('product_brand', 'products.brand_id', '=', 'product_brand.id')
            ->select('products.*', 'product_brand.name as brand_name')
            ->paginate(15);
        return view('back-end.products.view',['data' => $data]);
    }

    public function getdetails($id = null)
    {
        $data = new Products;

        if ($id) {
            $data = Products::find($id);

            if (!$data) {
                return redirect()->action('ProductsController@getdetails', ['id' => null]);
            }
        }

        $brands = DB::table('product_brand')->get();
        $series = DB::table('product_series')->get();
        $movements = DB::table('product_movement')->get();
        $cases = DB::table('product_case')->get();
        $dials = DB::table('product_dial')->get();
        $bands = DB::table('product_band')->get();
        $styles = DB::table('product_style')->get();

        return view('back-end.products.details',[
            'data'  => $data, 'brands' => $brands, 'series' => $series,
            'movements' => $movements, 'cases' => $cases, 'dials' => $dials,
            'bands' => $bands, 'styles' => $styles
        ]);
    }

    public function postdetails(ProductsRequest $rq, $id = null)
    {
        $data = new Products;
        $images = array();

        if ($id) {
            $data = Products::find($id);

            if (!$data)
            {
                return redirect()->action('ProductsController@getdetails', ['id' => null]);
            }
            $images = unserialize($data->images);
        }

        $attr = array('model', 'name', 'slug', 'description', 'discount', 'detail', 'status', 'price', 'quantity',
            'series_id', 'brand_id', 'gender_id', 'movement_id',
            'case_id', 'case_shape', 'case_size',
            'dial_id', 'dial_color',
            'band_id', 'band_length', 'band_width', 'band_clasp',
            'style_id',
            'feature_water_resstance', 'feature', 'functions', 'upc_code'
        );

        foreach ($attr as $value) {
            if ($value == 'slug')
            {
                $data->{$value} = str_slug($rq->name, '-');
                continue;
            }
            if ($value == 'price') {
                $rq->{$value} = str_replace(".", "", $rq->{$value});
            }
            $data->{$value} = $rq->{$value};
        }

        $tmp = array();
        if ($rq->hasFile('images')) {
            $list = $rq->file('images');
            foreach ($list as $row) {
                if (isset($row)) {
                    $name = time() . '-' . $row->getClientOriginalName();
                    $tmp[] = $name;
                    $row->move('uploads/products/details/', $name);
                }
            }
        }
        $i = 0;
        if (!empty($rq->update) && !empty($tmp) && !empty($images)) {
            foreach ($rq->update as $value) {
                unlink('uploads/products/details/' . $images[$value]);
                $images[$value] = $tmp[$i];
                unset($tmp[$i++]);
            }
        }
        if (!empty($rq->delete) && !empty($images)) {
            foreach ($rq->delete as $value) {
                unlink('uploads/products/details/' . $images[$value]);
                unset($images[$value]);
            }
        }
        if (!empty($tmp)) {
            foreach ($tmp as $val) {
                $images[] = $val;
            }
        }
        
        $data->images = serialize(array_values($images));

        try {
            $data->save();
        }
        catch(\Exception $e) { }
        
        return redirect()->action('ProductsController@getdetails', ['id' => $data->id]);
    }

    public function getdel($id)
    {
        $data = Products::find($id);
        if ($data) {
            $data->delete();
        }
    }
}
