<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;
use DateTime;
use App\Product_brand;
use App\Product_movement;
use App\Product_series;
use App\Product_case;
use App\Product_dial;
use App\Product_band;
use App\Product_style;



class CategoryController extends Controller
{
   public function getlist()
   {
		$data = Category::all();
      $data['brands']    = Product_brand::all();
      $data['series']    = Product_series::all();
      $data['movements'] = Product_movement::all();
      $data['cases']     = Product_case::all();
      $data['dials']     = Product_dial::all();
      $data['bands']     = Product_band::all();
      $data['styles']    = Product_style::all();
		return View ('back-end.category.cat-list',['data'=>$data]);
   }

   public function getadd()
   {	
		$data = Category::all();
		return View ('back-end.category.add',['data'=>$data]);
   }
   public function insertUpdateByModel($nameModel, $data)
   {
      $nameModel = "App\\".$nameModel;
      $arr = explode('@@@', $data);
      $brand = null;
      if(isset($arr) && count($arr) > 1)
      {
         $brand = $nameModel::find($arr[1]);
         $brand->name = $arr[0];
         $brand->updated_at = new DateTime;
         $brand->save();
         $brand->isUpdate = true;
      }
      else
      {
         $brand = new $nameModel();
         $brand->name = $data;
         $brand->desc = "";
         $brand->save();
         $brand->isUpdate = false;
      }
      return $brand;
   }

   public function browsData($datas, $nameModel)
   {  
      $dataChange = array();
      foreach ($datas as $value) {
         $dataChange[] = $this->insertUpdateByModel($nameModel, $value);  
      }
      return $dataChange;
   }
   public function addBrand(Request $rq)
   {
      $brands = json_decode($rq->brands);
      $brandsUpdate = array();
      if($brands != null)
      {
         foreach ($brands as $value) {
            switch ($value->name) {
               case 'productBrand':
                  $brandsUpdate = array_merge($this->browsData($value->value, "Product_brand"), $brandsUpdate);
                  break;
               case 'productSeries':
                  $brandsUpdate = array_merge($this->browsData($value->value, "Product_series"), $brandsUpdate);
                  break;
               case 'productMovement':
                  $brandsUpdate = array_merge($this->browsData($value->value, "Product_movement"), $brandsUpdate);
                  break;
               case 'productCase':
                  $brandsUpdate = array_merge($this->browsData($value->value, "Product_case"), $brandsUpdate);
                  break;
               case 'productDial':
                  $brandsUpdate = array_merge($this->browsData($value->value, "Product_dial"), $brandsUpdate);
                  break;
               case 'productBand':
                  $brandsUpdate = array_merge($this->browsData($value->value, "Product_band"), $brandsUpdate);
                  break;
               case 'productStyle':
                  $brandsUpdate = array_merge($this->browsData($value->value, "Product_style"), $brandsUpdate);
                  break;
               default:
                  # code...
                  break;
            }
         }
      }
      return json_encode($brandsUpdate);
   }

   public function deleteBrand(Request $rq)
   {
      $arr = explode(',', $rq->id);
      switch ($arr[1]) {
         case 'productBrand':
            $brand = Product_brand::find($arr[0]);
            $brand->delete();
            break;
         case 'productSeries':
            $brand = Product_series::find($arr[0]);
            $brand->delete();
            break;
         case 'productMovement':
            $brand = Product_Movement::find($arr[0]);
            $brand->delete();
            break;
         case 'productCase':
            $brand = Product_case::find($arr[0]);
            $brand->delete();
            break;
         case 'productDial':
            $brand = Product_dial::find($arr[0]);
            $brand->delete();
            break;
         case 'productBand':
            $brand = Product_band::find($arr[0]);
            $brand->delete();
            break;
         case 'productStyle':
            $brand = Product_style::find($arr[0]);
            $brand->delete();
            break;
         default:
            # code...
            break;
      }
      
      
      return;
   }

   public function postadd(AddCategoryRequest $rq)
   {
		$cat = new Category();
      $cat->parent_id= $rq->sltCate;
      $cat->name= $rq->txtCateName;
      $cat->slug = str_slug($rq->txtCateName,'-');
         $cat->created_at = new DateTime;
      $cat->save();
      return redirect()->route('getcat')
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã thêm thành công !']);
         
   }
   public function getedit($id)   {
      $cat = Category::all();
      $data = Category::findOrFail($id)->toArray();
      return View ('back-end.category.edit',['cat'=>$cat,'data'=>$data]);
   }
   public function postedit($id,AddCategoryRequest $request)
   {
      $cat = category::find($id);
      $cat->name = $request->txtCateName;
      $cat->slug = str_slug($request->txtCateName,'-');
      $cat->parent_id = $request->sltCate;
      $cat->updated_at = new DateTime;
      $cat->save();
      return redirect()->route('getcat')
      ->with(['flash_level'=>'result_msg','flash_massage'=>' Đã sửa']);

   }
   public function getdel($id)
   {
      $parent_id = category::where('parent_id',$id)->count();
      if ($parent_id==0) {
         $category = category::find($id);
         $category->delete();
         return redirect()->route('getcat')
         ->with(['flash_level'=>'result_msg','flash_massage'=>'Đã xóa !']);
      } else{
         echo '<script type="text/javascript">
                  alert("Không thể xóa danh mục này !");                
                window.location = "';
                echo route('getcat');
            echo '";
         </script>';
      }
   }
}
