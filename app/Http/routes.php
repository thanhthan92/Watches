<?php

Route::auth();
Route::get('/user', 'HomeController@index');
Route::get('/user/edit', 'HomeController@edit');
Route::get('/dong-ho-{gender}/{slug}.html', ['as'  => 'getgetProductByGender', 'uses' =>'PagesController@getProductByGender']);
Route::get('/dong-ho/{slug}.html', ['as'  => 'getproductByBrands', 'uses' =>'PagesController@productByBrands']);
Route::get('/{param}.html', ['as'  => 'getproductsByParam', 'uses' =>'PagesController@productsByParam']);
Route::get('/chi-tiet/{slug}.html', ['as'  => 'getdetail', 'uses' =>'PagesController@detail']);

// admin route 
Route::get('admin/login', ['as'  => 'getlogin', 'uses' =>'Admin\AuthController@showLoginForm']);
Route::post('admin/login', ['as'  => 'postlogin', 'uses' =>'Admin\AuthController@login']);
Route::get('admin/password/reset', ['as'  => 'getreser', 'uses' =>'Admin\AuthController@email']);
Route::get('admin/logout', ['as'  => 'getlogin', 'uses' =>'Admin\AuthController@logout']);

Route::get('/', ['as'  => 'index', 'uses' =>'PagesController@index']);

// shopping cart
Route::get(  '/gio-hang',					['as'  => 'getoldcart',			'uses' =>'CartController@getoldcart']);
Route::get(  '/shopping-cart',				['as'  => 'getcart',			'uses' =>'CartController@getcart']);
Route::get(  '/shopping-cart/add/{id}',		['as'  => 'getaddcart',			'uses' =>'CartController@getaddcart']);
Route::get(  '/shopping-cart/delete/{id}',	['as'  => 'getdeletecart',		'uses' =>'CartController@getdeletecart']);
Route::post( '/shopping-cart/update',		['as'  => 'postupdatecart',		'uses' =>'CartController@postupdatecart']);
Route::get(  '/shopping-cart/checkout',		['as'  => 'getcheckoutcart',	'uses' =>'CartController@getcheckoutcart']);
Route::post( '/shopping-cart/checkout',		['as'  => 'postcheckoutcart',	'uses' =>'CartController@postcheckoutcart']);

// --------------------------------cac cong viec trong admin (back-end)--------------------------------------- 
Route::group(['middleware' => 'admin'], function () {
	Route::group(['prefix' => 'admin'], function() {
		Route::get('/home', function() {
			return view('back-end.home');
	});
	// -------------------- quan ly danh muc----------------------
	Route::group(['prefix' => 'danhmuc'], function() {
		Route::get('/',['as'       =>'getcat','uses' => 'CategoryController@getlist']);
		Route::post('addBrand',['as'        =>'addBrand','uses' => 'CategoryController@addBrand']);
		Route::post('del',['as'   =>'deleteBrand','uses' => 'CategoryController@deleteBrand']);
	});
	// ---------------------quản lý sản phẩm------------------------
	Route::group(['prefix' => '/products'], function() {
		Route::get('/',             ['as' => 'getlist',         'uses' => 'ProductsController@getlist']);
		Route::get('/details',      ['as' => 'getdetails',      'uses' => 'ProductsController@getdetails']);
		Route::get('/details/{id}', ['as' => 'getdetailsedit',  'uses' => 'ProductsController@getdetails'])->where('id','[0-9]+');
		Route::post('/details',     ['as' => 'postdetails',     'uses' => 'ProductsController@postdetails']);
		Route::post('/details/{id}',['as' => 'postdetailsedit', 'uses' => 'ProductsController@postdetails'])->where('id','[0-9]+');
		Route::get('/del/{id}',     ['as' => 'getdell',         'uses' => 'ProductsController@getdel'])->where('id','[0-9]+');
	});
	// ---------------------quản lý thong tin chung ve website------
	Route::group(['prefix' => '/information'], function() {
		Route::get('/',  ['as' =>'getinformation',  'uses' => 'InfoController@getinformation']);
		Route::post('/', ['as' =>'postinformation', 'uses' => 'InfoController@postinformation']);
	});
	// -------------------- quản lý đơn đặt hàng--------------------
	Route::group(['prefix' => '/donhang'], function() {;

		Route::get('',['as'       =>'getpro','uses' => 'OrdersController@getlist']);
		Route::get('/del/{id}',['as'   =>'getdeloder','uses' => 'OrdersController@getdel'])->where('id','[0-9]+');
		 
		Route::get('/detail/{id}',['as'  =>'getdetail','uses' => 'OrdersController@getdetail'])->where('id','[0-9]+');
		Route::post('/detail/{id}',['as' =>'postdetail','uses' => 'OrdersController@postdetail'])->where('id','[0-9]+');
	});
	// ---------------van de khac ----------------------
});     
});