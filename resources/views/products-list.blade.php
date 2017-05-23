@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="breadcrumbs"><!-- .breadcrumbs -->
			<ul>
				<li><a href="{!! url('/') !!}" title="Trở về trang chủ">Trang chủ</a><span> / </span></li>
				@if(count($products))
					<li>{!! $products[0]->gender_id == 1 ? 'Đồng hồ nam' : 'Đồng hồ nữ' !!}</li>
				@endif
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