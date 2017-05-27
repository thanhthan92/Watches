<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Products;
use Auth;
use DateTime,File,Input,DB;


class ProductsController extends Controller
{
    private static $foreignAttrs = array('brand', 'series', 'movement', 'case', 'dial', 'band', 'style');
    private static $attrs = array(
        'name', 'slug', 'description', 'discount', 'detail', 'status', 'price', 'quantity',
        'model', 'series_id', 'brand_id', 'gender_id', 'movement_id',
        'case_id', 'case_shape', 'case_size',
        'dial_id', 'dial_color',
        'band_id', 'band_length', 'band_width', 'band_clasp',
        'style_id',
        'feature_water_resstance', 'feature', 'functions', 'upc_code'
    );

    // Get the list of products
    public function getlist()
    {
        $data = DB::table('products')
            ->join('product_brand', 'products.brand_id', '=', 'product_brand.id')
            ->select('products.*', 'product_brand.name as brand_name')
            ->paginate(10);
        return view('back-end.products.view',['data' => $data]);
    }

    // Get the detail of 1 product
    public function getdetails($id = null)
    {
        $data = null;
        if ($id) {
            $data = Products::find($id);
        }
        if (!$data) {
            $data = new Products;
            $data->images = array();
        }
        else {
            $data->images = unserialize($data->images);
        }

        foreach (self::$foreignAttrs as $key => $value) {
            $data->{$value} = DB::table('product_' . $value)->get();
        }

        return view('back-end.products.details',['data'  => $data]);
    }

    // Saving detail of 1 product
    public function postdetails(Request $rq, $id = null)
    {
        $data = new Products();

        if ($id) {
            $data = Products::find($id);

            if (!$data)
            {
                return redirect()->action('ProductsController@getdetails', ['id' => null]);
            }
            $data->images = unserialize($data->images);
            if (!$data->images) {
                $data->images = array();
            }
        }

        // Saving data to attribute
        $rq->price = str_replace(".", "", $rq->price);
        foreach (self::$attrs as $value) {
            if ($value == 'slug') {
                $data->{$value} = str_slug($rq->name, '-');
                continue;
            }
            $data->{$value} = $rq->{$value};
        }

        // Getting the name of upload images
        $tmp = array();
        if ($rq->hasFile('images')) {
            $list = $rq->file('images');
            foreach ($list as $row) {
                if (isset($row)) {
                    $name = time() . '-' . $row->getClientOriginalName();
                    $row->move('uploads/products/details/', $name);
                    $tmp[] = $name;
                }
            }
        }

        // In case of update the available images
        if (!empty($rq->update) && !empty($tmp) && !empty($data->images)) {
            $i = 0;
            foreach ($rq->update as $value) {
                unlink('uploads/products/details/' . $data->images[$value]);
                $data->images[$value] = $tmp[$i];
                unset($tmp[$i++]);
            }
        }

        // In case of detele the available images
        if (!empty($rq->delete) && !empty($data->images)) {
            foreach ($rq->delete as $value) {
                unlink('uploads/products/details/' . $data->images[$value]);
                unset($data->images[$value]);
            }
        }

        $images = $data->images;
        // Add new images to images list
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
        
        return redirect()->action('ProductsController@getdetails', ['id' => $data->id])
            ->with(['message'=>'Cập nhật thành công!']);
    }

    // Delete a product by ID
    public function getdel($id)
    {
        $data = Products::find($id);
        if ($data) {
            $data->delete();
            return 'Đã xóa sản phẩm thành công!';
        }
    }
}
