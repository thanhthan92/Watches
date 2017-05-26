<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('/bootstrap/css/bootstrap.min.css') }}" />
    <link rel='stylesheet' id='test-css' href="{{ asset('/css/header-custom.css')}}" type='text/css' media='all'>
    <style>
	    .cart-totals-wrapper{width:100%}
	    .product-name{font-family:sans-serif;font-size:14px;font-weight:bold;line-height:27px}
	    .product-image img{width:60px!important;max-width:none}
	    .cart-links button{font-family:sans-serif;font-size:12px;font-weight:bold;text-decoration:none;background-color:#00FF00!important;color:#FFF!important;border-radius:0;text-shadow:none;padding:5px 10px!important;margin:5px!important}
	    #user-information{font-family:sans-serif;font-size:14px}
	    .cart-table-box{padding:0}
	    .cart.container.display-single-price .page-title.title-buttons{margin-top:0}
	    @media (min-width: 992px){
	        #user-information .telephone-number{padding-left: 0}
	    }
	    @media (max-width: 992px){
	        #user-information .telephone-number{padding: 0}
	    }
	</style>
    <script type='text/javascript' src="{{ asset('/js/jquery.min.js')}}"></script>
    <script src="{!!url('/bootstrap/js/bootstrap.min.js')!!}"></script>
</head>
<body>
<div class="cart container display-single-price">
    <div>
        <div>
            <div class="page-title title-buttons">
                <h1>ĐƠN ĐẶT HÀNG</h1>
            </div>
        </div>
    </div>
    <div>
        <div class="col-xs-12 col-sm-12 col-md-12 cart-table-box">
            <div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#user-information">
                            Thông tin người đặt mua</a>
                        </h4>
                    </div>
                    <div id="user-information" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <form method="POST" action="/shopping-cart/checkout">
                                <input type="hidden" name="_token" value="{{csrf_token()}}" />
                                <div class="form-group">
                                    <label for="user-name">Họ và tên</label>
                                    <input readonly type="text" class="form-control" value="{!! $user['name'] !!}" id="user-name" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-12 col-md-5 telephone-number">
                                    <label for="user-phone">Số điện thoại</label>
                                    <input readonly type="text" class="form-control" value="{!! $user['phone'] !!}" id="user-phone" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-12 col-md-7" style="padding:0">
                                    <label for="user-email">Email</label>
                                    <input readonly type="email" class="form-control" value="{!! $user['email'] !!}" id="user-email" />
                                </div>
                                <div class="form-group">
                                    <label for="user-address">Địa chỉ giao hàng</label>
                                    <textarea readonly rows="3" class="form-control" style="resize: none"
                                        class="form-control" id="user-address">{!! $user['address'] !!}</textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#user-information-details">
                            Chi tiết đơn hàng</a>
                        </h4>
                    </div>
                    <div id="user-information-details" class="panel-collapse collapse in">
                        <form action="/shopping-cart/update" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            <table id="shopping-cart-table" class="cart-table data-table">
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
                                    @foreach(Cart::content() as $val)
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
    </div>
</div>
</body>
</html>