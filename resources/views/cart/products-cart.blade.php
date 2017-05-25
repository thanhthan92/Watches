@extends('layouts.master')
@section('content')
<?php
    $data = new \stdClass();
    $data->total = 0;
?>

<script type="text/javascript">
    var tmp = '';
    if (document.title != '') {
        tmp += " | " + document.title;
    } 
    document.title = "Giỏ hàng" + tmp;
</script>

<style scoped>
    .cart-totals-wrapper{width:100%}
    .product-name{font-family:sans-serif;font-size:14px;font-weight:bold;line-height:27px}
    .product-image img{width:60px!important;max-width:none}
    .cart-links button{font-family:sans-serif;font-size:12px;font-weight:bold;text-decoration:none;background-color:#00FF00!important;color:#FFF!important;border-radius:0;text-shadow:none;padding:5px 10px!important;margin:5px!important}
    @media (min-width: 992px){
        .cart-table-box{padding-left: 0}
        .cart-total-box{padding: 0}
    }
    @media (max-width: 992px){
        .cart-table-box,.cart-total-box{padding: 0}
    }
</style>
<div class="cart container display-single-price">
    <div>
        <div>
            <div class="page-title title-buttons">
                <h1>CHI TIẾT GIỎ HÀNG</h1>
                <div class="category-title-label-aleft" onclick="document.location.href='/thuong-hieu.html';">Tiếp tục mua hàng</div>
            </div>
        </div>
    </div>
    <div>
        <div class="col-xs-12 col-sm-12 col-md-8 cart-table-box">
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
                            <th class="a-center" rowspan="1">Xóa</th>
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
                                <input type="text" pattern="\d*" name="quantity[{!! $val->rowId !!}]" style="width:40px!important"
                                    value="{!! $val->qty !!}" size="4" title="Số lượng" class="input-text qty" maxlength="12">
                                <ul class="cart-links">
                                    <li class="text-center">
                                        <button type="submit" title="Cập nhật" class="button btn-update">Cập nhật</button>
                                    </li>
                                </ul>
                            </td>
                            <td class="product-cart-total" data-rwd-label="Subtotal">
                                <span class="cart-price"><span class="price">{!! number_format($val->price*$val->qty, 0, ',', '.') !!} VNĐ</span></span>
                            </td>
                            <td class="a-center product-cart-remove last">
                                <a href="/shopping-cart/delete/{!! $val->rowId !!}" title="Remove Item" class="btn-remove btn-remove2 btn-remove-cart">Remove Item
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
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
                            <button type="button" title="Proceed to Checkout" class="btn btn-success btn-lg" onclick="window.location='{!! url('/shopping-cart/checkout') !!}'">Đặt Hàng</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection