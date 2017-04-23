@include('layouts.header')
@include('modules.menu')
    @include('modules.infoSale')
	@include('modules.slide')
    <div class="container">
      	<div class="row">
			@yield('content')
			@include('modules.gioithieu')
      	</div>       <!-- /row -->
    </div> <!-- /container -->
@include('layouts.footer')