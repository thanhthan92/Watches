<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Products;
use App\Category;
use App\Pro_detail;
use App\News;
use App\Oders;
use App\Oders_detail;
use DB,Cart,Datetime;
use App\Product_brand;
use App\Product_style;
use App\Info;

class PagesController extends Controller
{
    const MALE   = '1';
    const FEMALE = '2';

    public static function getMetaData() {
        $data['brands']            = Product_brand::all();
        $data['styles']            = Product_style::all();
        $data['brandFilter']       = self::getProductById('product_brand', 'products.brand_id', 'product_brand.id');
        $data['styleFilter']       = self::getProductById('product_style', 'products.style_id', 'product_style.id');
        $data['movementFilter']    = self::getProductById('product_movement', 'products.movement_id', 'product_movement.id');
        $data['bandFilter']        = self::getProductById('product_band', 'products.band_id', 'product_band.id');
        $data['priceFilter']       = self::getProductByPrice();
        $data['genderFilter']      = self::getAllProductByGender();
        Info::all()->map(function($item) use (&$data) {
            $data[$item->key] = $item->value;
        });
        return $data;
    }
    public function index()
    {
        $data  = Products::all();
    	return view('products-list',['products'=>$data]);
    }
    public function addcart($id)
    {
        $pro = Products::where('id',$id)->first();
        Cart::add(['id' => $pro->id, 'name' => $pro->name, 'qty' => 1, 'price' => $pro->price,'options' => ['img' => $pro->images]]);
        return redirect()->route('getcart');
    }

    public function getupdatecart($id,$qty,$dk)
    {
      if ($dk=='up') {
         $qt = $qty+1;
         Cart::update($id, $qt);
         return redirect()->route('getcart');
      } elseif ($dk=='down') {
         $qt = $qty-1;
         Cart::update($id, $qt);
         return redirect()->route('getcart');
      } else {
         return redirect()->route('getcart');
      }
    }
    public function getdeletecart($id)
    {
     Cart::remove($id);
     return redirect()->route('getcart');
    }
    public function xoa()
    {
        Cart::destroy();   
        return redirect()->route('index');   
    }
    public function getcart()
    {   
    	return view ('detail.card')
        ->with('slug','Chi tiết đơn hàng');
    }
    public function getoder()
    {
        if (Auth::guest()) {
            return redirect('login');
        } else {

            return view ('detail.oder')
            ->with('slug','Xác nhận');
        }        
    }
    public function postoder(Request $rq)
    {
        $oder = new Oders();
        $total =0;
        foreach (Cart::content() as $row) {
            $total = $total + ( $row->qty * $row->price);
        }
        $oder->c_id = Auth::user()->id;
        $oder->qty = Cart::count();
        $oder->sub_total = floatval($total);
        $oder->total =  floatval($total);
        $oder->note = $rq->txtnote;
        $oder->status = 0;
        $oder->type = 'cod';
        $oder->created_at = new datetime;
        $oder->save();
        $o_id =$oder->id;

        foreach (Cart::content() as $row) {
           $detail = new Oders_detail();
           $detail->pro_id = $row->id;
           $detail->qty = $row->qty;
           $detail->o_id = $o_id;
           $detail->created_at = new datetime;
           $detail->save();
        }
        Cart::destroy();   
        return redirect()->route('getcart')
        ->with(['flash_level'=>'result_msg','flash_massage'=>' Đơn hàng của bạn đã được gửi đi !']);    
        
    }
    public function getcate($cat)
    {
    	if ($cat == 'mobile') {
            // mobile
            $mobile = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','1')
                ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
                ->paginate(12);
    		return view('category.mobile',['data'=>$mobile]);
    	} 
        elseif ($cat == 'laptop') {
            // mobile
            $lap = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','2')
                ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
                ->paginate(12);
            return view('category.laptop',['data'=>$lap]);
        }
        elseif ($cat == 'pc') {
            // mobile
        $pc = DB::table('products')
                ->join('category', 'products.cat_id', '=', 'category.id')
                ->join('pro_details', 'pro_details.pro_id', '=', 'products.id')
                ->where('category.parent_id','=','19')
                ->select('products.*','pro_details.cpu','pro_details.ram','pro_details.screen','pro_details.vga','pro_details.storage','pro_details.exten_memmory','pro_details.cam1','pro_details.cam2','pro_details.sim','pro_details.connect','pro_details.pin','pro_details.os','pro_details.note')
                ->paginate(8);
            return view('category.pc',['data'=>$pc]);
        }
        elseif ($cat == 'tin-tuc') {
            $new =  DB::table('news')
                    ->orderBy('created_at', 'desc')
                    ->paginate(3);
            $top1 = $new->shift();
             $all =  DB::table('news')
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
            return view('category.news',['data'=>$new,'hot1'=>$top1,'all'=>$all]);
        } 
        // else{
        //     return redirect()->route('index');
        // }
    }
    public function detail($slug)
    {
        $tmp = explode('-', $slug);
        $data = DB::table('products')
                ->join('product_brand', 'products.brand_id', '=', 'product_brand.id')
                ->join('product_series', 'products.series_id', '=', 'product_series.id')
                ->join('product_movement', 'products.movement_id', '=', 'product_movement.id')
                ->join('product_case', 'products.case_id', '=', 'product_case.id')
                ->join('product_dial', 'products.dial_id', '=', 'product_dial.id')
                ->join('product_band', 'products.band_id', '=', 'product_band.id')
                ->join('product_style', 'products.style_id', '=', 'product_style.id')
                ->where('products.id', '=', $tmp[count($tmp) - 1])
                ->select('products.*', 'product_brand.name as brand', 'product_series.name as series',
                    'product_movement.name as movement', 'product_case.name as case', 'product_dial.name as dial',
                    'product_band.name as band', 'product_style.name as style')->first();

        $data->gender = $data->gender_id == 1 ? 'Đồng hồ nam' : 'Đồng hồ nữ';
        $data->images = unserialize($data->images);
        
        $trans = array();
        Info::all()->map(function($item) use (&$trans) {
            $trans[$item->key] = $item->value;
        });
        $data->trans = $trans;

        return view('products', ['products' => $data]);
    }

    public function getProductByGender($gender, $slug)
    {
        $listStyle_brands = explode('-', $slug);
        $data = array();
        switch ($gender) {
            case 'nam':
                // check by brands
                if($this->checkStyleOrBrands($listStyle_brands[0])) {
                    $data = $this->getProductByStyleOrBrands(self::MALE, null, end($listStyle_brands));
                }else{
                    $data = $this->getProductByStyleOrBrands(self::MALE, end($listStyle_brands), null);
                }

                break;
            case 'nu':
                if($this->checkStyleOrBrands($listStyle_brands[0])) {
                    $data = $this->getProductByStyleOrBrands(self::FEMALE, null, end($listStyle_brands));
                }else{
                    $data = $this->getProductByStyleOrBrands(self::FEMALE, end($listStyle_brands), null);
                }

                break;
            
            default:
                break;
        }
        return view('products-list',['products'=>$data]);
    }

    public function getProductByStyleOrBrands($idGender = null, $style = null, $brands = null) {
        $data = null;
        if(!empty($idGender) && !is_null($idGender)){
            if(isset($style)){
                $data =  DB::table('products')
                        ->join('product_style', 'products.style_id', '=', 'product_style.id')
                        ->where('gender_id', '=', $idGender)
                        ->where('style_id', '=', $style)
                        ->get(); 
            }

            if(isset($brands)){
                $data =  DB::table('products')
                        ->join('product_brand', 'products.brand_id', '=', 'product_brand.id')
                        ->where('gender_id', '=', $idGender)
                        ->where('brand_id', '=', $brands)
                        ->get(); 
            }
        }
        return $data;
    }

    public function checkStyleOrBrands($slug) {
        if($slug == 'thuonghieu'){
            return true;
        }elseif ($slug == 'style') {
            return false;
        }
        return false;
    }

    public function productByBrands($slug) {
        $listStyle_brands = explode('-', $slug);
        $data = null;
        if(isset($listStyle_brands) && !empty($listStyle_brands)){
            $data = DB::table('products')
                    ->join('product_brand', 'products.brand_id', '=', 'product_brand.id')
                    ->where('brand_id', '=', end($listStyle_brands))
                    ->get();    
        }
        return view('products-list',['products'=>$data]);
    }

    public function productsByParam($param) {
        $data = null;
        switch ($param) {
            case 'thuong-hieu':
                $data = $this->getDataBytable('products', 'product_brand', 'products.brand_id', 'product_brand.id');
                break;
            case 'dong-ho-nam' :
                $data =  DB::table('products')
                        ->where('gender_id', '=', self::MALE)
                        ->get(); 
                break;
            case 'dong-ho-nu' :
                $data =  DB::table('products')
                        ->where('gender_id', '=', self::FEMALE)
                        ->get(); 
                break;
            default:
                # code...
                break;
        }
        return view('products-list',['products'=>$data]);
    }

    public function getDataBytable($nameTable, $nameTableJoin, $tableId, $tableJoinId) {
        $data = null;
        $data = DB::table($nameTable)
                ->join($nameTableJoin, $tableId, '=', $tableJoinId)
                ->select($nameTable . '.*')
                ->get();
        return $data; 
    }

    public static function getProductById($nameTableJoin, $tableId, $tableJoinId)
    {
        $data = null;
        $data = DB::table('products')
                ->join($nameTableJoin, $tableId, '=', $tableJoinId)
                ->select($tableId. ' as id', $nameTableJoin. '.name', DB::raw('count(*) as total'))
                ->groupBy($tableId, $nameTableJoin. '.name')
                ->get();
        return $data; 
    }

    public static function getProductByPrice() {
        $data = array();

        $data[0] = DB::table('products')
                ->whereBetween('price', array('1', '1000000'))
                ->get();
        $data[1] = DB::table('products')
                ->whereBetween('price', array('1000000', '3000000'))
                ->get();
        $data[2] = DB::table('products')
                ->where('price', '>', '3000000')
                ->get();
        return $data;
    }

    public static function getAllProductByGender() {
        $data = array();

        $data[0] = DB::table('products')
                 ->where('gender_id', '=', self::MALE)
                 ->get();
        $data[1] = DB::table('products')
                 ->where('gender_id', '=', self::FEMALE)
                 ->get();
        return $data;
    }

}
