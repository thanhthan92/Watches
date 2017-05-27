@extends('back-end.layouts.master')
@section('content')
    <!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row top-content-backend">
			<ol class="breadcrumb">
				<li class="active">Home</li>
			</ol>
		</div><!--/.row-->
		<?php 
          $order = DB::table('orders')->count('*'); 
          $newOrders = DB::table('orders')->where('status', 0)->count('*'); 
          $mem = DB::table('users')->count('*');            
          $pro = DB::table('products')->count('*');            

        ?>
		<div class="row" style="margin-top: 50px">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{!!$order!!}</div>
							<div class="text-muted"> tổng đơn hàng</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked app-window-with-content"><use xlink:href="#stroked-app-window-with-content"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{!!$newOrders!!}</div>
							<div class="text-muted"> Đơn hàng mới</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked bag"><use xlink:href="#stroked-bag"/></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{!!$pro!!}</div>
							<div class="text-muted">Sản phẩm</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large">{!!$mem!!}</div>
							<div class="text-muted">Khách hàng</div>
						</div>
					</div>
				</div>
			</div>		
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Tổng quan trang cửa hàng</div>
					<div class="panel-body">
						<div class="canvas-wrapper">
							<canvas class="main-chart" id="line-chart" height="100" width="600"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div><!--/.row-->

		<div class="row">
			<div class="col-md-8">
				<small>Coppyright 2016</small>
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
<script type="text/javascript">
    var obj = document.getElementById('trangchu');
    if (obj != null && obj != undefined) {
        obj.className = "active";
        }
</script>
@endsection
