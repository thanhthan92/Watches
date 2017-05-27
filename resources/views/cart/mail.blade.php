<div><h1>ĐƠN ĐẶT HÀNG</h1></div>

<div><h4>Thông tin người đặt mua</h4></div>
<div>
    <div>
        <label>Họ và tên: {!! $user->name !!}</label>
        
    </div>
    <div>
        <label>Số điện thoại: {!! $user->phone !!}</label>
    </div>
    <div>
        <label>Email: {!! $user->email !!}</label>
    </div>
    <div>
        <label>Địa chỉ giao hàng: {!! $user->address !!}</label>
    </div>
</div>

<div><h4>Chi tiết đơn hàng</h4></div>

<table>
    <colgroup>
        <col width="1"><col width="1"><col width="1"><col width="1"><col width="1"><col width="1">
    </colgroup>
    <thead>
        <tr>
            <th rowspan="1" style="width:45%;text-align:left"><span>Sản phẩm</span></th>
            <th rowspan="1" style="width:20%;text-align:left">Số lượng</th>
            <th colspan="1" style="width:35%;text-align:left">Tổng</th>
        </tr>
    </thead>
    <tbody>
        @foreach(Cart::content() as $val)
        <tr>
            <td style="vertical-align:top">
                <a href="{!! $val->options['url'] !!}" title="{!! $val->name !!}" style="text-decoration:none;color:#000">
                    {!! $val->name !!}
                </a>
            </td>
            <td style="vertical-align:top">
                {!! $val->qty !!}
            </td>
            <td style="vertical-align:top">
                <span><span>{!! number_format($val->price*$val->qty, 0, ',', '.') !!} VNĐ</span></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>