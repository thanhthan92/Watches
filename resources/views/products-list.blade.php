@extends('layouts.master')
@section('content')
@include('modules.sliderBar')
<div class="container">
	<div style="margin-top:25px">
		<ul class="products-grid row" style="margin-top:25px">
			@foreach ($products as $val)
				{!!  create1productitem($val) !!}
			@endforeach
		</ul>
	</div>
</div>
@endsection