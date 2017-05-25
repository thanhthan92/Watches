@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="breadcrumbs"><!-- .breadcrumbs -->
			<ul>
				<li><a href="{!! url('/') !!}" title="Trở về trang chủ">Trang chủ</a></li>
			</ul>
		</div><!-- /.breadcrumbs -->
		@include('modules.sliderBar')
		<ul class="products-grid row">
			@foreach ($products as $val)
				{!!  create1productitem($val) !!}
			@endforeach
		</ul>
	</div>
</div>
@endsection