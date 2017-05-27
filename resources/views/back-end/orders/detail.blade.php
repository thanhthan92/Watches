<?php
    $total = 0;
?>

@extends('back-end.layouts.master')
@section('content')
<script type="text/javascript">
    var obj = document.getElementById('order');
    if (obj != null && obj != undefined) {
        obj.className = "active";
    }
</script>
<style scoped>
	.cart.display-single-price{font-family:sans-serif;font-size:14px}
	.cart-totals-wrapper{width:100%}
	.product-name{font-weight:700;line-height:inherit}
	.product-image img{width:60px!important;max-width:none}
	.cart-links button{font-size:12px;font-weight:700;text-decoration:none;background-color:#0F0!important;color:#FFF!important;border-radius:0;text-shadow:none;padding:5px 10px!important;margin:5px!important}
	@media(max-width: 992px) {
	.user-information .phone,.user-information .email{padding:0}
	}
	@media(min-width: 992px) {
	.user-information .phone{padding:0}
	}
	.panel-default>.panel-heading{background-image:-webkit-linear-gradient(top,#F5F5F5 0,#E8E8E8 100%);background-image:-o-linear-gradient(top,#F5F5F5 0,#E8E8E8 100%);background-image:linear-gradient(to bottom,#F5F5F5 0,#E8E8E8 100%);color:#333;background-color:#F5F5F5;border-color:#DDD;height:auto!important}
	.panel-title{font-size:16px;color:inherit;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;padding:2px;margin:5px}
	.panel-title>a{display:block;outline:0;text-decoration:none;color:inherit}
	.cart-table.data-table{border-collapse:collapse}
	.data-table.cart-table th{text-transform:uppercase;font-size:13px;background:0;border-top:solid 1px #d4d4d4;border-bottom:solid 1px #d4d4d4!important;color:#333;padding:12px 8px;font-weight:400;border-right:0 solid #c2d3e0;white-space:nowrap;vertical-align:middle}
	h2.product-name{font-size:14px;color:#333;margin:0;font-weight:400}
	h2.product-name a{text-decoration:none;color:inherit}
</style>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row top-content-backend">
            <ol class="breadcrumb">
                <li><a href="{!!url('admin/home')!!}">Trang chủ<use xlink:href="#stroked-home"></use></a></li>
			<li class="active">Chi tiết đơn đặt hàng</li>
		</ol>
	</div>

	<div class="row" style="margin: 50px 0">
	    <div>
	        <div class="col-xs-12 col-sm-12 col-md-8 cart-table-box">
	            <div>
	                <div class="panel panel-default">
	                    <div class="panel-heading">
	                        <h4 class="panel-title">
	                            <a data-toggle="collapse" href=".user-information">
	                            Thông tin người đặt mua</a>
	                        </h4>
	                    </div>
	                    <div class="user-information" class="panel-collapse collapse in">
	                        <div class="panel-body">
	                            <form method="POST" action="/shopping-cart/checkout">
	                                <div class="form-group">
	                                    <label for="user-name">Họ và tên</label>
	                                    <p class="form-control-static">{!! $user->name !!}</p>
	                                </div>
	                                <div class="form-group col-xs-12 col-sm-12 col-md-5 phone">
	                                    <label for="user-phone">Số điện thoại</label>
	                                    <p class="form-control-static">{!! $user->phone !!}</p>
	                                </div>
	                                <div class="form-group col-xs-12 col-sm-12 col-md-7 email">
	                                    <label for="user-email">Email</label>
	                                    <p class="form-control-static">{!! $user->email !!}</p>
	                                </div>
	                                <div class="form-group">
	                                    <label for="user-address">Địa chỉ giao hàng</label>
	                                    <p class="form-control-static">{!! $user->address !!}</p>
	                                </div>
	                            </form>
	                        </div>
	                    </div>
	                </div>

	                <div class="panel panel-default">
	                    <div class="panel-heading">
	                        <h4 class="panel-title">
	                            <a data-toggle="collapse" href=".user-information-details">
	                            Chi tiết đơn hàng</a>
	                        </h4>
	                    </div>
	                    <div class="user-information-details" class="panel-collapse collapse in">
	                        <form>
	                            <table id="shopping-cart-table" class="cart-table data-table table table-striped">
	                                <colgroup>
	                                    <col width="1"><col width="1"><col width="1"><col width="1"><col width="1"><col width="1">
	                                </colgroup>
	                                <thead>
	                                    <tr class="first last">
	                                        <th rowspan="1">&nbsp;</th>
	                                        <th rowspan="1"><span class="nobr">Sản phẩm</span></th>
	                                        <th class="a-center cart-price-head" colspan="1"> <span class="nobr">Giá</span></th>
	                                        <th rowspan="1" class="a-center">Số lượng</th>
	                                        <th class="a-center cart-total-head" colspan="1">Tổng</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                    @foreach($data as $val)
	                                    <?php $total += $val->price * $val->qty; ?>
	                                    <tr class="odd">
	                                        <td class="product-cart-image">
	                                            <a href="{!! $val->options['url'] !!}" title="{!! $val->name !!}" class="product-image">
	                                                <img src="{!! $val->options['image'] !!}" alt="{!! $val->name !!}">
	                                            </a>
	                                        </td>
	                                        <td class="product-cart-info">
	                                            <h2 class="product-name">
	                                                <a href="{!! $val->options['url'] !!}" title="{!! $val->name !!}">
	                                                    {!! $val->name !!}
	                                                </a>
	                                            </h2>
	                                        </td>
	                                        <td class="product-cart-price" data-rwd-label="Price" data-rwd-tax-label="Excl. Tax">
	                                            <span class="cart-price"><span class="price">{!! number_format($val->price, 0, ',', '.') !!} VNĐ</span></span>
	                                        </td>
	                                        <td class="product-cart-actions" data-rwd-label="Qty">
	                                            {!! $val->qty !!}
	                                        </td>
	                                        <td class="product-cart-total" data-rwd-label="Subtotal">
	                                            <span class="cart-price"><span class="price">{!! number_format($val->price*$val->qty, 0, ',', '.') !!} VNĐ</span></span>
	                                        </td>
	                                    </tr>
	                                    @endforeach
	                                </tbody>
	                            </table>
	                        </form>
	                    </div>
	                </div>
	            </div>
	        </div>
	        <div class="col-xs-12 col-sm-12 col-md-4 cart-total-box">
	            <div class="cart-totals-wrapper">
	                <div class="cart-totals">
	                    <table class="table">
	                        <colgroup>
	                            <col>
	                            <col width="1">
	                        </colgroup>
	                        <tfoot>
	                            <tr>
	                                <td style="" class="a-right" colspan="1"><strong>Tổng tiền</strong></td>
	                                <td style="" class="a-right"> <span class="price"><strong>{!! number_format($total, 0, ',', '.') !!} VNĐ</strong></span></td>
	                            </tr>
	                        </tfoot>
	                    </table>
	                    <ul class="checkout-types bottom">
	                        <li class="method-checkout-cart-methods-onepage-bottom">
	                            <button type="button" title="Proceed to Checkout" class="btn btn-success btn-lg" onclick="checkout()">Xác nhận đã giao hàng?</button>
	                        </li>
	                    </ul>
	                    <script type="text/javascript">
	                    function checkout() {

	                    }
	                    </script>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

	
@endsection