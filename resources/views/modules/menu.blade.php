 <!-- Menu header -->
 <div class="wrapper">
   <div class="page">
      <header class="phone-menu">
        <div class="head-phone">
          <ul class="hedList">
            <li class="iconCall">
              <a href="tel:866-735-9116">866-735-9116</a>
            </li>
            </ul>
          </div>
        <div class="header">
            <div class="container contain-container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <ul class="hedList">
                            <li class="iconCall">
                              <a href="tel:866-735-9116">866-735-9116</a>
                            </li>
                            <li class="iconUs">
                              <a href="{!!url('/contact-us/')!!}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="branding header-logo col-xs-12 col-sm-12 col-md-6">
                        <a href="{!!url('')!!}" title="Certified Watch Store" class="logo"> <img id="head_site_logo_desk" src="https://www.certifiedwatchstore.com/skin/frontend/b-responsive/cws/images/cws-logo-black.png" alt="Certified Watch Store"> </a>
                    </div>
                    <div class="mobile-responsive-header skip-links">
                        <div class="header-minicart">
                            <a href="{!!url('/gio-hang/')!!}" class="myBag skip-link skip-cart  no-count">
                              <span class="label">My Bag</span>
                              <span class="badgeIcon">{!!Cart::count();!!}</span>
                              <span class="icon"></span>
                            </a>
                        </div>
                    </div>
                    <div class="ipad-responsive-header skip-links">
                        <div class="skip-links switches">
                            <ul class="customer-menu">
                                <li class="last">
                                    <div class="header-minicart">
                                        <a href="{!!url('/gio-hang/')!!}" class="myBag skip-link skip-cart  no-count">
                                          <span class="label">My Bag</span>
                                          <span class="badgeIcon">{!!Cart::count();!!}</span>
                                          <span class="icon"></span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="branding col-xs-12 col-sm-12 col-md-3">
                        <div class="skip-links switches col-xs-12 col-sm-12 col-md-12 a-right headerMy">
                            <ul class="customer-menu">
                                <li class="first"> <a href="https://www.certifiedwatchstore.com/customer/account/">My Account</a>
                                </li>
                                <li class="last">
                                    <div class="header-minicart">
                                        <a href="{!!url('/gio-hang/')!!}" class="myBag skip-link skip-cart  no-count">
                                          <span class="label">My Bag</span>
                                          <span class="badgeIcon">{!!Cart::count();!!}</span>
                                          <span class="icon"></span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <form id="search_mini_form" action="https://www.certifiedwatchstore.com/catalogsearch/result/" method="get" class="searchautocomplete UI-SEARCHAUTOCOMPLETE" data-tip="Search by brand or model" data-url="//www.certifiedwatchstore.com/searchautocomplete/ajax/get/" data-minchars="3" data-delay="100">
                            <input id="search" type="text" autocomplete="off" name="q" value="" class="input-text UI-SEARCH UI-NAV-INPUT" maxlength="128"> <span class="input-group-btn"> <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                            <div class="searchautocomplete-loader UI-LOADER">
                                <div id="g01"></div>
                                <div id="g02"></div>
                                <div id="g03"></div>
                                <div id="g04"></div>
                                <div id="g05"></div>
                                <div id="g06"></div>
                                <div id="g07"></div>
                                <div id="g08"></div>
                            </div>
                            <div style="display:none" id="search_autocomplete" class="UI-PLACEHOLDER search-autocomplete searchautocomplete-placeholder">trt</div>
                        </form>
                        <script type="text/javascript">
                            var brandsJson = '[{"name":"Ball Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/ball.html?ref=catalogsearch"},{"name":"Baume & Mercier Watches ","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/baume-mercier.html?ref=catalogsearch"},{"name":"Bulova Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/bulova.html?ref=catalogsearch"},{"name":"Daniel Wellington Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/daniel-wellington.html?ref=catalogsearch"},{"name":"ESQ Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/esq-by-movado.html?ref=catalogsearch"},{"name":"Frederique Constant Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/frederique-constant.html?ref=catalogsearch"},{"name":"Gucci Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/gucci.html?ref=catalogsearch"},{"name":"Lacoste Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/lacoste.html?ref=catalogsearch"},{"name":"Michael Kors Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/michael-kors.html?ref=catalogsearch"},{"name":"Michele Watches ","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/michele.html?ref=catalogsearch"},{"name":"Movado Watches ","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/movado.html?ref=catalogsearch"},{"name":"Philip Stein Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/philip-stein.html?ref=catalogsearch"},{"name":"Raymond Weil Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/raymond-weil.html?ref=catalogsearch"},{"name":"Seiko Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/seiko.html?ref=catalogsearch"},{"name":"Tissot Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/tissot.html?ref=catalogsearch"},{"name":"Victorinox Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/victorinox.html?ref=catalogsearch"},{"name":"Citizen Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/citizen.html?ref=catalogsearch"},{"name":"Guess Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/guess.html?ref=catalogsearch"},{"name":"Hamilton Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/hamilton.html?ref=catalogsearch"},{"name":"Longines Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/longines.html?ref=catalogsearch"},{"name":"Mido Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/mido.html?ref=catalogsearch"},{"name":"Nautica Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/nautica.html?ref=catalogsearch"},{"name":"Mulco Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/mulco.html?ref=catalogsearch"},{"name":"Montblanc Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/montblanc.html?ref=catalogsearch"},{"name":"Nixon Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/nixon.html?ref=catalogsearch"},{"name":"Oris Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/oris.html?ref=catalogsearch"},{"name":"Rado Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/rado.html?ref=catalogsearch"},{"name":"Skagen Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/skagen.html?ref=catalogsearch"},{"name":"Tommy Hilfiger Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/tommy-hilfiger.html?ref=catalogsearch"},{"name":"U-Boat Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/u-boat.html?ref=catalogsearch"},{"name":"Wenger Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/wenger.html?ref=catalogsearch"},{"name":"Zodiac Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/zodiac.html?ref=catalogsearch"},{"name":"Armani Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/armani.html?ref=catalogsearch"},{"name":"Alex & Ani Jewelry","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/alex-ani.html?ref=catalogsearch"},{"name":"Suunto Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/suunto.html?ref=catalogsearch"},{"name":"Glam Rock Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/glam-rock.html?ref=catalogsearch"},{"name":"Burberry Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/burberry.html?ref=catalogsearch"},{"name":"Calvin Klein Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/calvin-klein.html?ref=catalogsearch"},{"name":"Casio Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/casio.html?ref=catalogsearch"},{"name":"Diesel Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/diesel.html?ref=catalogsearch"},{"name":"Accutron Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/accutron.html?ref=catalogsearch"},{"name":"DKNY Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/dkny.html?ref=catalogsearch"},{"name":"Ferrari Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/ferrari.html?ref=catalogsearch"},{"name":"Fossil Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/fossil.html?ref=catalogsearch"},{"name":"Hugo Boss Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/hugo-boss.html?ref=catalogsearch"},{"name":"Invicta Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/invicta.html?ref=catalogsearch"},{"name":"Juicy Couture Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/juicy-couture.html?ref=catalogsearch"},{"name":"Kate Spade Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/kate-spade.html?ref=catalogsearch"},{"name":"Marc Jacobs Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/marc-jacobs.html?ref=catalogsearch"},{"name":"Rue Du Rhone Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/rue-du-rhone.html?ref=catalogsearch"},{"name":"Tag Heuer Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/tag-heuer.html?ref=catalogsearch"},{"name":"TW Steel Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/tw-steel.html?ref=catalogsearch"},{"name":"Vince Camuto Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/vince-camuto.html?ref=catalogsearch"},{"name":"Luminox Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/luminox.html?ref=catalogsearch"},{"name":"Puma Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/puma.html?ref=catalogsearch"},{"name":"Coach Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/coach.html?ref=catalogsearch"},{"name":"Coach Handbags","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/coach-handbags.html?ref=catalogsearch"},{"name":"Adrienne Vittadini Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/adrienne-vittadini-watches.html?ref=catalogsearch"},{"name":"English Laundry Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/english-laundry-watches.html?ref=catalogsearch"},{"name":"Rocawear Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/rocawear-watches.html?ref=catalogsearch"},{"name":"Catherine Malandrino Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/catherine-malandrino-watches.html?ref=catalogsearch"},{"name":"Alpina Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/alpina-watches.html?ref=catalogsearch"},{"name":"Caravelle Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/caravelle.html?ref=catalogsearch"},{"name":"Swarovski Jewelry","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/swarovski.html?ref=catalogsearch"},{"name":"Shinola Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/shinola.html?ref=catalogsearch"},{"name":"Ray-Ban Sunglasses","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/ray-ban-sunglasses.html?ref=catalogsearch"},{"name":"Wittnauer Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/wittnauer.html?ref=catalogsearch"},{"name":"Montblanc Pens","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/montblanc-pens.html?ref=catalogsearch"},{"name":"Fossil Handbags","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/fossil-handbags.html?ref=catalogsearch"},{"name":"Arnette Sunglasses","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/arnette-sunglasses.html?ref=catalogsearch"},{"name":"Oakley Sunglasses","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/oakley-sunglasses.html?ref=catalogsearch"},{"name":"Pulsar Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/pulsar-watches.html?ref=catalogsearch"},{"name":"Michael Kors Handbags","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/michael-kors-handbags.html?ref=catalogsearch"},{"name":"Swarovski Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/swarovski-watches.html?ref=catalogsearch"},{"name":"Guess Handbags","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/guess-handbags.html?ref=catalogsearch"},{"name":"Tory Burch Handbags","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/tory-burch-handbags.html?ref=catalogsearch"},{"name":"IWC Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/iwc-watches.html?ref=catalogsearch"},{"name":"Pandora Jewelry","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/pandora-jewelry.html?ref=catalogsearch"},{"name":"Kenneth Cole Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/kenneth-cole.html?ref=catalogsearch"},{"name":"Swatch Watches","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/swatch.html?ref=catalogsearch"},{"name":"Coach Accessories","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/coach-accessories.html?ref=catalogsearch"},{"name":"Rebecca Minkoff Handbags","url":"https:\/\/www.certifiedwatchstore.com\/watch-brands\/rebecca-minkoff-handbags.html?ref=catalogsearch"}]';
                        </script>
                    </div>
                </div>
            </div>
        </div>
      </header>
    </div>
  </div>
 <!-- End menu header -->
 <!-- main menu  navbar -->
 <div class="navDesk">
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation" id="main-Nav" style="background-color: #16a085;margin-bottom: 5px;font-size: 13px;">
      <div class="container">
        <div class="row">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
             <span  class="visible-xs pull-left" style="font-size:30px;cursor:pointer; padding-left: 10px; color: #ecf0f1;" onclick="openNav()">&#9776; </span>
             <span  class="visible-xs pull-right" style="font-size:20px;cursor:pointer; padding-right: 10px; padding-top: 8px; color: #FFFFFF;" >
              <!-- Authentication Links -->
                @if (Auth::guest())
                    <a class="top-a" href="{{ url('/') }}" > Home </a>  &nbsp;
                    <a href="#" data-toggle="modal" data-target="#login-modal" style="color:#e67e22;"> Đăng nhập </a>
                    {{-- <a class="top-a" href="{{ url('/login') }}">Login</a> --}}
                @else
                    <a class="top-a" href="{{ url('/user') }}" style="color:#c0392b;"><strong>{!!Auth::user()->name!!}</strong></a>
                    <a class="top-a" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i><small>Thoát</small></a>
                @endif
                </span>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="main-mav-top">
            <ul class="nav navbar-nav">
              <li> <a href="{!!url('')!!}" title="" style="color: #FFFFFF;background-color: #2c3e50;"><b class="glyphicon glyphicon-home"></b> Trang chủ </a> </li>
              <li>
                <a href="{!!url('mobile')!!}" >Điện Thoại </a>
              </li>
              <li >
                <a href="{!!url('laptop')!!}" > Laptop </a>
              </li>
              <li>
                <a href="{!!url('pc')!!}" > Máy Tính </a>
              </li>
              <li>
               <a href="{!!url('tin-tuc')!!}" > Tin Tức - Khuyễn Mãi </a>
              </li>
            </ul>
             <ul class="nav navbar-nav pull-right">
              {{-- <li><a href="{{ url('/admin/home') }}">Vào trang quản trị</a></li> --}}
              <!-- <li class="dropdown">
                <a  class="dropdown-toggle" data-toggle="dropdown"> <span class="glyphicon glyphicon-shopping-cart"><span class="badge">{!!Cart::count();!!}</span></span> Giỏ Hàng <b class="caret"></b></a>
                <ul class="dropdown-menu" style="right:0; left: auto; min-width: 350px;">
                @if(Cart::count() !=0)
                  <div class="table-responsive">
                     <table class="table table-hover" >
                      <thead>
                      <tr>
                        <th>Ảnh</th>
                        <th>LS</th>
                        <th>Tên <SPAN></SPAN></th>
                        <th>Giá</th>
                      </tr>
                    </thead>
                       <tbody>
                      @foreach(Cart::content() as $row)
                         <tr>
                           <td> {!!$row->images!!} <img class="card-img img-circle" src="{!!url('uploads/products/'.$row->options->img)!!}" alt="dell"></td>
                           <td>{!!$row->qty!!}</td>
                           <td>{!!$row->name!!}</td>
                           <td>{!!$row->price!!} Vnd</td>
                         </tr>
                        @endforeach
                       </tbody>
                     </table>
                     <a href="{!!url('/gio-hang/')!!}" type="button" class="btn btn-success"> Chi Tiết Giỏ Hàng </a>
                     <a href="{!!url('/gio-hang/xoa')!!}" type="button" class="btn btn-danger pull-right"> Xóa </a>
                  </div>
                  @else
                    <div class="table-responsive">
                     <table class="table table-hover" >
                      <thead>
                      <tr>
                        <th>Ảnh</th>
                        <th>LS</th>
                        <th>Tên <SPAN></SPAN></th>
                        <th>Giá</th>
                      </tr>
                    </thead>
                       <tbody>
                        <td colspan="3">Hện đang trống</td>
                       </tbody>
                     </table>
                  </div>
                  @endif
                </ul>
              </li> -->
              <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Đăng nhập</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/user') }}">Thông tin cá nhân</a></li>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
          </div><!-- /.navbar-collapse -->
        </div> <!-- /row -->
      </div><!-- /container -->
    </nav>    <!-- /main nav -->
  </div>
  <!-- left slider bar nav -->
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; Đóng</a>
    <a href="{!!url('mobile')!!}">Điện Thoại</a>
    <a href="{!!url('laptop')!!}">Laptop</a>
    <a href="{!!url('pc')!!}">Máy Tính</a>
    <a href="{!!url('tin-tuc')!!}">Tin Tức</a>
    <a href="{!!url('gio-hang')!!}"> <span class="glyphicon glyphicon-shopping-cart"><span class="badge">{!!Cart::count()!!}</span></span> Giỏ Hàng </a>
  </div>
  <!-- /left slider bar nav -->
  <!--  child menu -->
  <div>
    <ul class="icon-items">
      <li class="item-1">100% new &amp; authentic</li>
      <li class="item-2">free shipping on orders over $99</li>
      <li class="item-3">safe &amp; secure shopping</li>
      <li class="item-4">30 day money back</li>
    </ul>
  </div>
  <!-- /child menu -->
  {{-- loginform --}}
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
      <div class="modal-dialog">
      <div class="loginmodal-container">
        <h1>Đăng nhập</h1><br>
        <form class="form-horizontal" role="form" method="POST" id="login-form" action="{{ url('/login') }}">
          {{ csrf_field() }}
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <input id="email" type="email" class="form-control" name="email" placeholder="Nhập địa chỉ Email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <input id="password" type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
             @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group">
            <div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="remember"> Ghi nhớ
                    </label>
                </div>
            </div>
        </div>
          <input type="submit" name="login" class="btn btn-primary" value="Đăng nhập">
        </form>
        <div class="login-help">
          <a class="btn btn-link" href="{!!url('/register')!!}"> <strong style="color:red;"> Đăng ký </strong> </a> - <a class="btn btn-link" href="{{ url('/password/reset') }}">Bạn đã quên mật khẩu?</a>
        </div>
      </div>
    </div>
  </div>