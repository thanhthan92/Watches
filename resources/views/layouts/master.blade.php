@include('layouts.header')
<div id="page-content">
	@include('modules.menu')
	    <div class="container">
	      	<div class="row">
				@yield('content')
	      	</div>       <!-- /row -->
	    </div> <!-- /container -->
</div>
<!-- menu mobile -->
<nav id="jPanelMenu-menu" style="width: 250px; z-index: 1;">
	<ul class="nav mega-menu navbar-nav mobile-menu">
		<li class="level0 nav-2 dropdown cat-4">
    		<a class="dropdown" href="{!! url('/thuong-hieu' . '.html')!!}"> <span>THƯƠNG HIỆU</span> </a>      
		</li>
		<li class="level0 nav-2 dropdown cat-4">
    		<a class="dropdown" href="{!! url('/dong-ho-nam' . '.html')!!}"> <span>ĐỒNG HỒ NAM</span> </a>      
		</li>
		<li class="level0 nav-2 dropdown cat-4">
    		<a class="dropdown" href="{!! url('/dong-ho-nu' . '.html')!!}"> <span>ĐỒNG HỒ NỮ</span> </a>      
		</li>
		<li class="level0 nav-2 dropdown cat-8">
    		<a class="dropdown" href="{!! url('/donghogiamgia' . '.html')!!}"> <span>ĐỒNG HỒ GIẢM GIÁ</span> </a>      
		</li>
		<li class="level0 nav-2 dropdown cat-4">
    		<a class="dropdown" href="#"> <span>TÀI KHOẢN CỦA BẠN</span> </a>      
		</li>
	</ul>
</nav>
<!-- end menu mobile -->
@include('layouts.footer')