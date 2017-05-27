@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row" style="margin-top:25px">
		@include('modules.sliderBar')
		<ul class="products-grid row" style="margin-top:25px">
			@foreach ($products as $val)
				{!!  create1productitem($val) !!}
			@endforeach
		</ul>
	</div>
</div>
@endsection