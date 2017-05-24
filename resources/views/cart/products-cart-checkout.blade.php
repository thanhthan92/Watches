@extends('layouts.master')
@section('content')
<?php
    $data = new \stdClass();
    $data->total = 0;

    if (!isset($end)) {
        $end = false;
    }
?>
<style scoped>
    .cart-totals-wrapper{width:100%}
    .product-name{font-family:sans-serif;font-size:14px;font-weight:bold;line-height:27px}
    .product-image img{width:60px!important;max-width:none}
    .cart-links button{font-family:sans-serif;font-size:12px;font-weight:bold;text-decoration:none;background-color:#00FF00!important;color:#FFF!important;border-radius:0;text-shadow:none;padding:5px 10px!important;margin:5px!important}
    #user-information{font-family:sans-serif;font-size:14px}
    .thankyou{font-family:sans-serif;font-size:18px;padding:0 25px;line-height:30px;text-align:justify}
    @media (min-width: 992px){
        .cart-table-box{padding-left: 0}
        .cart-total-box{padding: 0}
        #user-information .telephone-number{padding-left: 0}
    }
    @media (max-width: 992px){
        .cart-table-box,.cart-total-box{padding: 0}
        #user-information .telephone-number{padding: 0}
    }
</style>
<div class="cart container display-single-price">
    <div>
        <div>
            <div class="page-title title-buttons">
                <h1>{!! $end ? 'KẾT THÚC ' : '' !!}ĐẶT HÀNG</h1>
                <div class="category-title-label-aleft" onclick="document.location.href='/thuong-hieu.html';">Tiếp tục mua hàng</div>
            </div>
        </div>
    </div>
    <div>
        @if (!$end)
        <div class="col-xs-12 col-sm-12 col-md-8 cart-table-box">
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
                                    <input type="text" class="form-control" name="user_name" id="user-name" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-12 col-md-5 telephone-number">
                                    <label for="user-phone">Số điện thoại</label>
                                    <input type="text" class="form-control" name="user_phone" id="user-phone" />
                                </div>
                                <div class="form-group col-xs-12 col-sm-12 col-md-7" style="padding:0">
                                    <label for="user-email">Email</label>
                                    <input type="email" class="form-control" name="user_email" id="user-email" />
                                </div>
                                <div class="form-group">
                                    <label for="user-address">Địa chỉ giao hàng</label>
                                    <textarea rows="3" class="form-control" style="resize: none" name="user_address"
                                        class="form-control" id="user-address"></textarea>
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
                                    <?php $data->total += $val->price * $val->qty; ?>
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
                    <table id="shopping-cart-totals-table" class="table">
                        <colgroup>
                            <col>
                            <col width="1">
                        </colgroup>
                        <tfoot>
                            <tr>
                                <td style="" class="a-right" colspan="1"><strong>Tổng tiền</strong></td>
                                <td style="" class="a-right"> <span class="price"><strong>{!! number_format($data->total, 0, ',', '.') !!} VNĐ</strong></span></td>
                            </tr>
                        </tfoot>
                    </table>
                    <ul class="checkout-types bottom">
                        <li class="method-checkout-cart-methods-onepage-bottom">
                            <button type="button" title="Proceed to Checkout" class="btn btn-success btn-lg" onclick="checkout()">Đặt Mua</button>
                        </li>
                    </ul>
                    <p id="error"></p>
                    <script type="text/javascript">
                        function checkout() {
                            var isKeep = false;
                            var html = '';

                            if (!document.getElementById('user-name').value) {
                                isKeep = true;
                                html += '<li style="list-style:disc">Vui lòng nhập họ và tên!</li>';
                            }
                            if (!document.getElementById('user-phone').value) {
                                isKeep = true;
                                html += '<li style="list-style:disc">Vui lòng nhập số điện thoại!</li>';
                            }
                            if (!document.getElementById('user-address').value) {
                                isKeep = true;
                                html += '<li style="list-style:disc">Vui lòng nhập địa chỉ giao hàng!</li>';
                            }

                            if (isKeep) {
                                document.getElementById('error').innerHTML = '<ul style="font-family:sans-serif;margin: 15px">' + html + '</ul>';
                                return;
                            }

                            document.querySelector("#user-information form").submit();
                        }
                    </script>
                </div>
            </div>
        </div>
        @else
        <p class="thankyou">Cảm ơn bạn {!! $user['name'] !!} đã tin tưởng lựa chọn dịch vụ của website!</p>
        <p class="thankyou">Đơn đặt hàng của bạn đã được gửi về bộ phận tiếp nhận của chúng tôi. Chúng tôi sẽ liên hệ xác nhận qua số điện thoại {!! $user['phone'] !!}.</p>
        <p class="thankyou">Đơn hàng của bạn sẽ được giao đến địa chỉ {!! $user['address'] !!}</p>
        @endif
    </div>
</div>
@endsection