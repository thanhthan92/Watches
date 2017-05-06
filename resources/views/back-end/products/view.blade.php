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
		<div class="col-xs-12 col-sm-12" style="margin-top: 50px">
			<a class="btn btn-primary" href="{!!url('admin/products/details')!!}">Thêm mới sản phẩm</a>

			<table class="table table-striped" style="margin-top: 25px">
				<tr>
					<th>Tên</th>
					<th>Thương hiệu</th>
					<th>Giới tính</th>
					<th>Giá bán thị trường</th>
					<th>Chiết khấu</th>
					<th>Tình trạng</th>
					<th>Cập nhật</th>
				</tr>
				<?php foreach ($data as $val) { ?>
				<?php } ?>

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