@extends('back-end.layouts.master')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Quản lý sản phẩm</li>
			</ol>
		</div>
		@include('products-filters')
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
					<th class="col-sm-5">Name</th>
					<th>Brand</th>
					<th>Gender</th>
					<th>Price</th>
					<th>Discount</th>
					<th>Status</th>
					<th></th>
				</tr>
				<tbody id="products-table">
					<?php foreach ($data as $val) { ?>
					<tr>
						<td>{!! $val->name !!}</td>
						<td>{!! $val->brand_name !!}</td>
						<td>{!! $val->gender_name !!}</td>
						<td>{!! $val->price !!}</td>
						<td>{!! $val->discount !!}</td>
						<td>{!! $val->status !!}</td>
						<td>Chỉnh sửa | Xóa</td>
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
    </script>
@endsection