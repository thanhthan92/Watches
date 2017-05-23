@extends('layouts.master')
@section('content')
<style scoped>
	@font-face{font-family:'Georgia';src:url({!! url('/font/Georgia-Regular.ttf') !!})}
	@font-face{font-family:'Lato';src:url({!! url('/font/Lato-Regular.ttf') !!})}
	.breadcrumbs{font-family:'Lato';font-size:12px;margin:20px 0}
	.breadcrumbs ul{margin:0;padding:0;list-style:none}
	.breadcrumbs ul li{display:inline-block}
	.breadcrumbs ul li a{color:#2D2D2D;text-decoration:underline}
	.breadcrumbs ul li span.product-name{color:#666;font-weight:400}
	.page-title{background:#F2F2F2;margin-bottom:50px;padding:20px 10px}
	.page-title h1{font-family:'Georgia';font-weight:400;font-size:30px;line-height:36px}
	.product-essential{padding:0}
	.product-essential .img-responsive{display:block;width:100%}
	.product-essential .image-slide{margin:30px 0}
	.product-essential .image-slide a{display:inline-block;padding:0 5px}
	.product-essential .image-slide a img{margin-right:15px;width:70px}
	.product-essential .image-slide a.selected img{-webkit-filter:brightness(60%)!important;filter:brightness(60%)!important}
	.product-essential .product-model{color:#858585;margin-bottom:30px}
	.product-essential .product-description,.product-essential .product-detail{font-family:'Lato',sans-serif;font-weight:400;color:#3B3E41;text-align:justify;word-wrap:break-word;font-size:16px}
	.product-essential .website-information{margin:20px 0;padding:10px 0;border-top:1px solid #D9D9D9}
	.product-essential .website-information td{font-size:12px;color:#3B3E41;font-family:'Lato';vertical-align:middle}
	.order-to-cash{border:solid 1px #D9D9D9;padding:30px}
	.order-to-cash .retail-price span{color:#3B3E41;font-size:14px;padding:0}
	.order-to-cash .retail-price span.label{font-size:14px}
	.order-to-cash .retail-price span.value{font-size:17px;font-weight:700}
	.order-to-cash .discount-price{font-size:30px;font-weight:700;color:#C00}
	.order-to-cash .save{font-size:14px;color:#3b3e41}
	.order-to-cash .add-to-box .availability-in-stock{color:#098205!important;border:solid 1px #e3e3e3;border-left:0;border-right:0;width:100%;padding:7px 0;margin-bottom:15px}
	.order-to-cash .add-to-box label{color:#858585;margin-right:5px}
	.order-to-cash .add-to-box input{display:inline-block;width:50px!important;height:24px;font-size:14px;text-align:center}
	.order-to-cash .add-to-box button{padding:10px 40px;width:100%;background-color:#8B286F!important;background:#3B3E41;color:#FFF;border:0;border-radius:0;margin-top:12px}
	@media (max-width: 768px) {
		.product-essential{margin:0 15px}
		.breadcrumbs,.tab-content,ul.resp-tabs-list{display:none}
		#accordion{display:block}
	}
	ul.resp-tabs-list{list-style:none;margin:0;padding:0;border:solid 1px #D9D9D9;border-bottom:0;height:46px;background:#E6E6E6}
	ul.resp-tabs-list li{font-weight:400;font-size:14px;display:inline-block;padding:15px 34px 10px;margin:0;cursor:pointer}
	ul.resp-tabs-list li.active{border-bottom:0;background-color:#FFF}
	ul.resp-tabs-list li{font-family:'Lato';color:#000;text-decoration:none}
	.tab-content>div,#details-2,#ship-2,#guarantee-2,#reviews-2,#questions-2{padding:20px;border:solid 1px #D9D9D9;border-top:0}
	#details-2,#ship-2,#guarantee-2,#reviews-2,#questions-2{padding:0}
	.tab-content #details label,#accordion #details-2 label{margin:20px 0 5px;font-weight:700;font-size:16px}
	.table td{border-top:none!important}
	@media (min-width: 768px) {
		.tab-content,ul.resp-tabs-list{display:block}
		#accordion{display:none}
	}

	#product-information{margin-top:50px}

</style>

<div class="container">
	<div class="row">
		<div class="breadcrumbs"><!-- .breadcrumbs -->
			<ul>
				<li><a href="{!! url('/') !!}" title="Trở về trang chủ">Trang chủ</a><span> / </span></li>
				@if ($products->gender != '--')<li><a href="{!! url('/' . str_slug($products->gender) . '.html') !!}" title="{!! $products->gender !!}">{!! $products->gender !!}</a><span> / </span></li>@endif
				<li><span class="product-name">{!! $products->name !!}</span></li>
			</ul>
		</div><!-- /.breadcrumbs -->

		<!-- .page-title -->
		<div class="page-title text-center"><h1 itemprop="name">{!! $products->name !!}</h1></div>

		<div class="product-essential row"><!-- .product-essential -->
			<div class="col-xs-12 col-sm-12 col-md-5">
				<img id="main-image" class="img-responsive" src="{!!url('uploads/products/details/' . $products->images[0])!!}" />
				<div class="text-center image-slide">
					@for($i = 0, $len = count($products->images); $i < $len; $i++)
						<a href="javascript:void(0)" onclick="zoomimg(this)" class="{!! !$i ? 'selected' : '' !!}">
							<img src="{!!url('uploads/products/details/'.$products->images[$i])!!}" alt="{!! $products->name !!}" />
						</a>
					@endfor
					
				</div>
				<script type="text/javascript">
						function zoomimg(el) {
							document.getElementById('main-image').setAttribute('src', el.children[0].getAttribute('src'));
							var slides = document.getElementsByClassName('image-slide')[0].children;
							for (var i = 0, len = slides.length; i < len; i++) {
								slides[i].setAttribute('class', '');
							};
							el.setAttribute('class', 'selected');
					}
				</script>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-4">
				@if ($products->model)
				<p class="product-model">Mã sản phẩm (model): {!! $products->model !!}</p>
				@endif
				@if ($products->description)
				<p class="product-description">{!! $products->description !!}</p>
				<a href="#product-information" style="text-decoration: underline; line-height: 35px">Đọc thêm</a>
				@endif
				<div class="clearfix"></div>

				<div class="website-information">
				@if (isset($products->trans['website_warantee_is']) && $products->trans['website_warantee_is'])
					<table class="col-xs-12 col-sm-6" style="height: 50px"><tr>
						<td class="text-center" style="width: 55px"><img src="{!! url('/images/general/icon-1.png') !!}" /></td>
						<td class="text-uppercase">{!! $products->trans['website_warantee'] !!}</td>
					</tr></table>
				@endif

				@if (isset($products->trans['website_authentic_is']) && $products->trans['website_authentic_is'])
					<table class="col-xs-12 col-sm-6" style="height: 50px"><tr>
						<td class="text-center" style="width: 55px"><img src="{!! url('/images/general/icon-2.png') !!}" /></td>
						<td class="text-uppercase">{!! $products->trans['website_authentic'] !!}</td>
					</tr></table>
				@endif

				@if (isset($products->trans['website_cash_is']) && $products->trans['website_cash_is'])
					<table class="col-xs-12 col-sm-6" style="height: 50px"><tr>
						<td class="text-center" style="width: 55px"><img src="{!! url('/images/general/icon-3.png') !!}" /></td>
						<td class="text-uppercase">{!! $products->trans['website_cash'] !!}</td>
					</tr></table>
				@endif

				@if (isset($products->trans['website_safe_is']) && $products->trans['website_safe_is'])
					<table class="col-xs-12 col-sm-6" style="height: 50px"><tr>
						<td class="text-center" style="width: 55px"><img src="{!! url('/images/general/icon-4.png') !!}" /></td>
						<td class="text-uppercase">{!! $products->trans['website_safe'] !!}</td>
					</tr></table>
				@endif

				@if (isset($products->trans['website_ship_is']) && $products->trans['website_ship_is'])
					<table class="col-xs-12 col-sm-6" style="height: 50px"><tr>
						<td class="text-center" style="width: 55px"><img src="{!! url('/images/general/icon-5.png') !!}" /></td>
						<td class="text-uppercase">{!! $products->trans['website_ship'] !!}</td>
					</tr></table>
				@endif

				@if (isset($products->trans['website_support_is']) && $products->trans['website_support_is'])
					<table class="col-xs-12 col-sm-6" style="height: 50px"><tr>
						<td class="text-center" style="width: 55px"><img src="{!! url('/images/general/icon-6.png') !!}" /></td>
						<td class="text-uppercase">{!! $products->trans['website_support'] !!}</td>
					</tr></table>
				@endif
				</div>
			</div>

			<div class="col-xs-12 col-sm-6 col-md-3 text-center">
				<div class="order-to-cash">
					<div>
						@if ($products->discount)
						<p class="retail-price">
							<span class="label">Giá bán lẻ</span>
							<span class="value"><del>{!! number_format($products->price, 0, ',', '.') . ' VNĐ' !!}</del></span>
						</p>
						@endif
						<p class="discount-price">
							{!! number_format($products->price * (100 - $products->discount) / 100, 0, ',', '.') . ' VNĐ' !!}
						</p>
						@if ($products->discount)
						<p class="save">
							Tiết kiệm {!! number_format($products->price * $products->discount / 100, 0, ',', '.') . ' VNĐ' !!}
						</p>
						@endif
					</div>
					<div class="add-to-box">
						<form method="GET" action="/shopping-cart/add/{!! $products->id !!}.html">
						<p class="availability-in-stock text-uppercase text-center">In stock ready to ship</p>
						<label>Số lượng</label>&nbsp;
						<input name="quantity" type="text" maxlength="12" value="1" class="form-control" />
						<button type="submit" title="Buy Now" class="btn btn-success">Mua ngay</button>
					</form>
					</div>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12" id="product-information">
				<ul class="resp-tabs-list" role="tablist">
					<li class="resp-tab-item active" data-toggle="tab" href="#details" role="tab">CHI TIẾT</li>
					<li class="resp-tab-item" data-toggle="tab" href="#ship" role="tab">GIAO HÀNG</li>
					<li class="resp-tab-item" data-toggle="tab" href="#guarantee" role="tab">BẢO HÀNH</li>
					<li class="resp-tab-item" data-toggle="tab" href="#reviews" role="tab">ĐÁNH GIÁ</li>
					<li class="resp-tab-item" data-toggle="tab" href="#questions" role="tab">CÂU HỎI</li>
				</ul>

				<div class="tab-content">
					<div id="details" class="tab-pane fade in active">
						@if ($products->detail)
						<p class="product-detail">{!! $products->detail !!}</p>
						@endif

						<label>THÔNG TIN CHI TIẾT</label>
						<table class="table table-striped">
							@if ($products->model) <tr><td class="col-xs-6 col-sm-5 col-md-3">Mã sản phẩm (model)</td><td>{!! $products->model !!}</td></tr>@endif
							@if ($products->series != '--') <tr><td>Loại</td><td>{!! $products->series !!}</td></tr>@endif
							@if ($products->brand != '--') <tr><td>Thương hiệu</td><td>{!! $products->brand !!}</td></tr>@endif
							@if ($products->gender != '--') <tr><td>Kiểu dáng</td><td>{!! $products->gender !!}</td></tr>@endif
							@if ($products->movement != '--') <tr><td>Bộ máy (movement)</td><td>{!! $products->movement !!}</td></tr>@endif
						</table>

						@if ($products->case != '--')
						<label>VỎ MÁY</label>
						<table class="table table-striped">
							<tr><td class="col-xs-6 col-sm-5 col-md-3">Loại</td><td>{!! $products->case !!}</td></tr>
							@if ($products->case_size)<tr><td>Kích thước</td><td>{!! $products->case_size !!}</td></tr>@endif
							@if ($products->case_shape)<tr><td>Hình dạng</td><td>{!! $products->case_shape !!}</td></tr>@endif
						</table>
						@endif

						@if ($products->dial != '--')
						<label>MẶT KÍNH</label>
						<table class="table table-striped">
							<tr><td class="col-xs-6 col-sm-5 col-md-3">Loại</td><td>{!! $products->dial !!}</td></tr>
							@if ($products->dial_color)<tr><td>Màu sắc</td><td>{!! $products->dial_color !!}</td></tr>@endif
						</table>
						@endif

						@if ($products->band != '--')
						<label>DÂY ĐEO</label>
						<table class="table table-striped">
							<tr><td class="col-xs-6 col-sm-5 col-md-3">Loại</td><td>{!! $products->band !!}</td></tr>
							@if ($products->band_width)<tr><td>Độ rộng</td><td>{!! $products->band_width !!}</td></tr>@endif
							@if ($products->band_length)<tr><td>Chiều dài dây</td><td>{!! $products->band_length !!}</td></tr>@endif
							@if ($products->band_clasp)<tr><td>Loại khóa</td><td>{!! $products->band_clasp !!}</td></tr>@endif
						</table>
						@endif
	
						@if ($products->feature_water_resstance || $products->feature || $products->functions)
						<label>TÍNH NĂNG</label>
						<table class="table table-striped">
							@if ($products->feature_water_resstance)<tr><td class="col-xs-6 col-sm-5 col-md-3">Chống nước</td><td>{!! $products->feature_water_resstance !!}</td></tr>@endif
							@if ($products->feature)<tr><td class="col-xs-6 col-sm-5 col-md-3">Chức năng</td><td>{!! $products->feature !!}</td></tr>@endif
							@if ($products->functions)<tr><td class="col-xs-6 col-sm-5 col-md-3">Chức năng khác</td><td>{!! $products->functions !!}</td></tr>@endif
						</table>
						@endif

						@if ($products->style != '--' || $products->upc_code)
						<label>THÔNG TIN KHÁC</label>
						<table class="table table-striped">
							@if ($products->style != '--')<tr><td class="col-xs-6 col-sm-5 col-md-3">Phong cách</td><td>{!! $products->style !!}</td></tr>@endif
							@if ($products->upc_code)<tr><td class="col-xs-6 col-sm-5 col-md-3">Mã UPC</td><td>{!! $products->upc_code !!}</td></tr>@endif
						</table>
						@endif
					</div>

					<div id="ship" class="tab-pane fade">
						@if (isset($products->trans['website_ship_detail']) && $products->trans['website_ship_detail'])
							{!! $products->trans['website_ship_detail'] !!}
						@endif
					</div>

					<div id="guarantee" class="tab-pane fade">
						@if (isset($products->trans['website_guarantee_detail']) && $products->trans['website_guarantee_detail'])
							{!! $products->trans['website_guarantee_detail'] !!}
						@endif
					</div>

					<div id="reviews" class="tab-pane fade">&nbsp;</div>
					<div id="questions" class="tab-pane fade">&nbsp;</div>
				</div>

				<div class="panel-group" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#details-2">CHI TIẾT</a>
							</h4>
						</div>
						<div id="details-2" class="panel-collapse collapse in">
							<div class="panel-body">
								@if ($products->detail)
								<p class="product-detail">{!! $products->detail !!}</p>
								@endif

								<label>THÔNG TIN CHI TIẾT</label>
								<table class="table table-striped">
									@if ($products->model) <tr><td class="col-xs-6 col-sm-5 col-md-3">Mã sản phẩm (model)</td><td>{!! $products->model !!}</td></tr>@endif
									@if ($products->series != '--') <tr><td>Loại</td><td>{!! $products->series !!}</td></tr>@endif
									@if ($products->brand != '--') <tr><td>Thương hiệu</td><td>{!! $products->brand !!}</td></tr>@endif
									@if ($products->gender != '--') <tr><td>Kiểu dáng</td><td>{!! $products->gender !!}</td></tr>@endif
									@if ($products->movement != '--') <tr><td>Bộ máy (movement)</td><td>{!! $products->movement !!}</td></tr>@endif
								</table>

								@if ($products->case != '--')
								<label>VỎ MÁY</label>
								<table class="table table-striped">
									<tr><td class="col-xs-6 col-sm-5 col-md-3">Loại</td><td>{!! $products->case !!}</td></tr>
									@if ($products->case_size)<tr><td>Kích thước</td><td>{!! $products->case_size !!}</td></tr>@endif
									@if ($products->case_shape)<tr><td>Hình dạng</td><td>{!! $products->case_shape !!}</td></tr>@endif
								</table>
								@endif

								@if ($products->dial != '--')
								<label>MẶT KÍNH</label>
								<table class="table table-striped">
									<tr><td class="col-xs-6 col-sm-5 col-md-3">Loại</td><td>{!! $products->dial !!}</td></tr>
									@if ($products->dial_color)<tr><td>Màu sắc</td><td>{!! $products->dial_color !!}</td></tr>@endif
								</table>
								@endif

								@if ($products->band != '--')
								<label>DÂY ĐEO</label>
								<table class="table table-striped">
									<tr><td class="col-xs-6 col-sm-5 col-md-3">Loại</td><td>{!! $products->band !!}</td></tr>
									@if ($products->band_width)<tr><td>Độ rộng</td><td>{!! $products->band_width !!}</td></tr>@endif
									@if ($products->band_length)<tr><td>Chiều dài dây</td><td>{!! $products->band_length !!}</td></tr>@endif
									@if ($products->band_clasp)<tr><td>Loại khóa</td><td>{!! $products->band_clasp !!}</td></tr>@endif
								</table>
								@endif
			
								@if ($products->feature_water_resstance || $products->feature || $products->functions)
								<label>TÍNH NĂNG</label>
								<table class="table table-striped">
									@if ($products->feature_water_resstance)<tr><td class="col-xs-6 col-sm-5 col-md-3">Chống nước</td><td>{!! $products->feature_water_resstance !!}</td></tr>@endif
									@if ($products->feature)<tr><td class="col-xs-6 col-sm-5 col-md-3">Chức năng</td><td>{!! $products->feature !!}</td></tr>@endif
									@if ($products->functions)<tr><td class="col-xs-6 col-sm-5 col-md-3">Chức năng khác</td><td>{!! $products->functions !!}</td></tr>@endif
								</table>
								@endif

								@if ($products->style != '--' || $products->upc_code)
								<label>THÔNG TIN KHÁC</label>
								<table class="table table-striped">
									@if ($products->style != '--')<tr><td class="col-xs-6 col-sm-5 col-md-3">Phong cách</td><td>{!! $products->style !!}</td></tr>@endif
									@if ($products->upc_code)<tr><td class="col-xs-6 col-sm-5 col-md-3">Mã UPC</td><td>{!! $products->upc_code !!}</td></tr>@endif
								</table>
								@endif
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#ship-2">GIAO HÀNG</a>
							</h4>
						</div>
						<div id="ship-2" class="panel-collapse collapse">
							<div class="panel-body">
							@if (isset($products->trans['website_ship_detail']) && $products->trans['website_ship_detail'])
								{!! $products->trans['website_ship_detail'] !!}
							@endif
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#guarantee-2">BẢO HÀNH</a>
							</h4>
						</div>
						<div id="guarantee-2" class="panel-collapse collapse">
							<div class="panel-body">
							@if (isset($products->trans['website_guarantee_detail']) && $products->trans['website_guarantee_detail'])
								{!! $products->trans['website_guarantee_detail'] !!}
							@endif
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div>
@endsection