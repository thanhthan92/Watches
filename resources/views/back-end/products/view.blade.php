@extends('back-end.layouts.master')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý sản phẩm</li>
			</ol>
		</div
		<div class="col-xs-12 col-sm-12" style="margin-top: 30px">
			<div class="col-xs-12 col-sm-3 no-padding">
				<a class="btn btn-primary" style="margin: 20px 0" href="{!!url('admin/products/details')!!}">
					Thêm mới sản phẩm
				</a>
			</div>
			<div class="col-xs-12 col-sm-9 text-right no-padding">
				{!! $data->render() !!}
			</div>
			<table class="table table-striped">
				<tr>
					<th class="col-sm-5">Tên sản phẩm</th>
					<th>Thương hiệu</th>
					<th>Kiểu dáng</th>
					<th>Giá</th>
					<th>Chiết khấu</th>
					<th>Tình trạng</th>
					<th></th>
				</tr>
				<tbody id="products-table">
					<?php foreach ($data as $val) { ?>
					<tr>
						<td>{!! $val->name !!}</td>
						<td>{!! $val->brand_name !!}</td>
						<td>{!! $val->gender_id == 1 ? 'Nam' : 'Nữ' !!}</td>
						<td>{!! number_format($val->price, 0, ',', '.') . ' VNĐ' !!}</td>
						<td>{!! $val->discount ? ($val->discount . '%') : '' !!}</td>
						<td>{!! $val->status == 1 ? 'Còn hàng' :
							($val->status == 2 ? 'Không còn hàng' :
							($val->status == 3 ? 'Hàng sắp về' : 'Chưa có thông tin về sản phẩm')) !!}</td>
						<td>
							<a href="{!! url('admin/products/details/' . $val->id) !!}"><div class="glyphicon glyphicon-pencil"></div></a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="javascript:void(0)" onclick="del(this, '{!! $val->id !!}')"><div class="glyphicon glyphicon-trash"></div></a>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<a href="{!! url('/chi-tiet/' . $val->slug . '-' . $val->id . '.html') !!}">
								<div class="glyphicon glyphicon-eye-open"></div>
							</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

    <script type="text/javascript">
        var obj = document.getElementById('products');
        if (obj != null && obj != undefined) {
            obj.className = "active";
        }

        function del(el, id) {
        	var cont = confirm("Bạn có muốn xóa sản phẩm này không?");
        	if (!cont) {
        		return;
        	}
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					el.parentElement.parentElement.remove();
					alert("Xóa sản phẩm thành công");
				}
			};
			xhttp.open("GET", "{!! url('admin/products/del/') !!}" + '/' + id, true);
			xhttp.send();
        }
    </script>
@endsection