<!-- Menu header -->
    <?php $data = App\Http\Controllers\PagesController::getMetaData();?>
    <div class="wrapper">
        <a href="javascript:void(0);" id="menu-trigger" class="menu-trigger ss-icon" onclick="clickButton(this)"><img src="{{ URL::to('/') }}/images/iconMenu/mobile-menu-icon.png" alt="phone menu"></a>
        <div class="head-phone">
            <ul class="hedList">
                <li class="iconCall">
                    <a href="tel:866-735-9116" style="margin-left: 0">866-735-9116</a>
                </li>
            </ul>
        </div>
        <div class="header">
            <div class="container contain-container">
                <div class="row-fluid">
                    <div class="col-xs-2 col-sm-12 col-md-3 no-padding">
                        <ul class="hedList">
                            <li class="iconCall">
                              <a href="tel:866-735-9116">866-735-9116</a>
                            </li>
                            <li class="iconUs">
                              <a href="{!!url('/contact-us/')!!}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="branding header-logo col-xs-7 col-sm-12 col-md-6">
                        <a href="{!!url('')!!}" title="Certified Watch Store" class="logo"> <img id="head_site_logo_desk" src="https://www.certifiedwatchstore.com/skin/frontend/b-responsive/cws/images/cws-logo-black.png" alt="Certified Watch Store"> </a>
                    </div>
                    <div class="mobile-responsive-header skip-links col-xs-2" style="padding-left:30px!important;padding-right:0">
                        <div class="header-minicart">
                            <a href="{!!url('/gio-hang/')!!}" class="myBag skip-link skip-cart  no-count">
                                <span class="badgeIcon">({!!Cart::count();!!})</span>
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
                                              <span class="badgeIcon">({!!Cart::count();!!})</span>
                                              <span class="icon"></span>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    <div class="branding col-xs-12 col-sm-12 col-md-3 no-padding-pc">
                        <div class="skip-links switches col-xs-12 col-sm-12 col-md-12 a-right headerMy">
                            <ul class="customer-menu">
                                <li class="first"> <a href="#">My Account</a>
                                </li>
                                <li class="last">
                                    <div class="header-minicart">
                                        <a href="{!!url('/gio-hang/')!!}" class="myBag skip-link skip-cart  no-count">
                                          <span class="label">My Bag</span>
                                          <span class="badgeIcon">({!!Cart::count();!!})</span>
                                          <span class="icon"></span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <form id="search_mini_form" action="" method="get" class="searchautocomplete UI-SEARCHAUTOCOMPLETE" data-tip="Search by brand or model" data-url="//www.certifiedwatchstore.com/searchautocomplete/ajax/get/" data-minchars="3" data-delay="100">
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
                    </div>
                </div>
            </div>
        </div>
        <div class="navDesk" role="navigation" id="slide-nav">
            <div class="container">
                <nav class="navbar navbar-inverse" style="border-radius: 0 !important;  margin-bottom: 0 !important; border: none">
                    <div class="navbar-header">
                        <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse" style="float: left;">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse js-navbar-collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown mega-dropdown">
                                <a href="{!! url('/thuong-hieu' . '.html')!!}" ><span>Thương hiệu</span></a>
                                <div class="dropdown-menu mega-dropdown-menu off">
                                    <div class="triangle-top">&nbsp;</div>            
                                    <div class="col-xs-8 col-sm-8 col-md-8">
                                        <h2 class="brands-h2">Thương hiệu</h2>
                                        <ul class="mainShop">
                                        </ul>
                                        <div class="nextUl">
                                            <ul class="B hideMe" style="display: block;">
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4">
                                        <ul class="featuredBrand">
                                            <h2>Thương hiệu nổi bật</h2>
                                            <?php $count = 0; ?>
                                            @foreach ($data['brands'] as $value)
                                                @if($count++ == 8)
                                                    @break;
                                                @elseif($value['name'] == '--')
                                                    @continue;
                                                @endif
                                                <li><a href="{!! url('/dong-ho/' . str_slug($value['name']) . '-' . $value['id'] . '.html') !!}">{!!$value['name']!!}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>              
                            </li>
                            <li class="dropdown mega-dropdown men-style">
                                <a href="{!! url('/dong-ho-nam' . '.html')!!}"><span>ĐỒNG HỒ NAM</span></a>                
                                <div class="dropdown-menu mega-dropdown-menu off">
                                    <div class="triangle-top">&nbsp;</div>
                                    <ul class="active-item-menu">
                                        <li class="even">
                                            <div class="nav-blk-1">
                                                <h3>Phân loại theo style</h3>
                                                <ul class="body-1">
                                                    <?php $count = 0; ?>
                                                    @foreach ($data['styles'] as $value)
                                                        @if($count++ == 8)
                                                            @break;
                                                        @elseif($value['name'] == '--')
                                                            @continue;
                                                        @endif
                                                        <li><a href="{!! url('/dong-ho-nam/style-' . str_slug($value['name']) . '-' . $value['id'] . '.html') !!}">{!!$value['name']!!}</a></li>  
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="odd">
                                            <div class="nav-blk-2">
                                                <h3>Phân loại theo thương hiệu</h3>
                                                <?php $count = 0; ?>
                                                <ul class="body-1">
                                                    @for ($i=0; $i < count($data['brands']); $i++)
                                                        @if($count++ == 8)
                                                            @break;
                                                        @elseif($data['brands'][$i]['name'] == '--')
                                                            @continue;
                                                        @endif
                                                        <li><a href="{!! url('/dong-ho-nam/thuonghieu-' . str_slug($data['brands'][$i]['name']) . '-' . $data['brands'][$i]['id'] . '.html') !!}">{!! $data['brands'][$i]['name'] !!}</a></li>  
                                                    @endfor
                                                </ul>
                                                <ul class="body-2">
                                                    <?php $count = 0; ?>
                                                    @if (count($data['brands']) >= 8)
                                                        @for ($i = 8; $i < count($data['brands']); $i++)
                                                            @if($count++ == 8)
                                                                @break;
                                                            @elseif($data['brands'][$i]['name'] == '--')
                                                                @continue;
                                                            @endif
                                                            <li><a href="{!! url('/dong-ho-nam/thuonghieu-' . str_slug($data['brands'][$i]['name']) . '-' . $data['brands'][$i]['id'] . '.html') !!}">{!! $data['brands'][$i]['name'] !!}</a></li>  
                                                        @endfor
                                                    @endif
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>               
                            </li>
                            <li class="dropdown mega-dropdown women-style">
                                <a href="{!! url('/dong-ho-nu' . '.html')!!}"><span>ĐỒNG HỒ NỮ</span></a>                
                                <div class="dropdown-menu mega-dropdown-menu off">
                                    <div class="triangle-top">&nbsp;</div>
                                    <ul class="active-item-menu">
                                        <li class="even">
                                            <div class="nav-blk-1">
                                                <h3>Phân loại theo style</h3>
                                                <ul class="body-1">
                                                    <ul class="body-1">
                                                    <?php $count = 0; ?>
                                                    @foreach ($data['styles'] as $value)
                                                        @if($count++ == 8)
                                                            @break;
                                                        @elseif($value['name'] == '--')
                                                            @continue;
                                                        @endif
                                                        <li><a href="{!! url('/dong-ho-nu/style-' . str_slug($value['name']) . '-' . $value['id'] . '.html') !!}">{!!$value['name']!!}</a></li>  
                                                    @endforeach
                                                </ul>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="odd">
                                            <div class="nav-blk-2">
                                                <h3>Phân loại theo thương hiệu</h3>
                                                <?php $count = 0; ?>
                                                <ul class="body-1">
                                                    @for ($i=0; $i < count($data['brands']); $i++)
                                                        @if($count++ == 8)
                                                            @break;
                                                        @elseif($data['brands'][$i]['name'] == '--')
                                                            @continue;
                                                        @endif
                                                        <li><a href="{!! url('/dong-ho-nu/thuonghieu-' . str_slug($data['brands'][$i]['name']) . '-' . $data['brands'][$i]['id'] . '.html') !!}">{!! $data['brands'][$i]['name'] !!}</a></li>  
                                                    @endfor
                                                </ul>
                                                <ul class="body-2">
                                                    <?php $count = 0; ?>
                                                    @if (count($data['brands']) >= 8)
                                                        @for ($i = 8; $i < count($data['brands']); $i++)
                                                            @if($count++ == 8)
                                                                @break;
                                                            @elseif($data['brands'][$i]['name'] == '--')
                                                                @continue;
                                                            @endif
                                                            <li><a href="{!! url('/dong-ho-nu/thuonghieu-' . str_slug($data['brands'][$i]['name']) . '-' . $data['brands'][$i]['id'] . '.html') !!}">{!! $data['brands'][$i]['name'] !!}</a></li>  
                                                        @endfor
                                                    @endif
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>               
                            </li>
                            <li class="dropdown mega-dropdown sales">
                                <a href="#" class="dropdown">
                                    <span>ĐỒNG HỒ GIẢM GIÁ</span>
                                </a>                
                            </li>
                        </ul>
                    </div><!-- /.nav-collapse -->
                </nav>
            </div>
        </div>
        <div>
            <ul class="icon-items">
                @if(isset($data['website_authentic']) && !empty($data['website_authentic']))
                <li class="item-1">
                    {!! $data['website_authentic'] !!}
                </li>
                @endif
                @if(isset($data['website_ship']) && !empty($data['website_ship']))
                <li class="item-2">
                    {!! $data['website_ship'] !!}
                </li>
                @endif
                @if(isset($data['website_safe']) && !empty($data['website_safe']))
                <li class="item-3">
                    {!! $data['website_safe'] !!}
                </li>
                @endif
                @if(isset($data['website_cash']) && !empty($data['website_cash']))
                <li class="item-4">
                    {!! $data['website_cash'] !!}
                </li>
                @endif
            </ul>
        </div>
    </div>
 <!-- End menu header -->
<?php 
    $listBrands = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "Tất cả");
    $listNameBrand = array(); 

    if(isset($data['brands']) && count($data['brands']) > 0)
    {
        foreach ($data['brands'] as $value) {
            $listNameBrand[] = $value;
        }
    }
?>
<script type="text/javascript">

    var arrayFromPHP = <?php echo json_encode($listBrands); ?>;
    var arrayNameBrands = <?php echo json_encode($listNameBrand); ?>;

    $(document).ready(function() {
        $('#jPanelMenu-menu').css('display', 'none');
        $("#slide-nav").toggleClass('slide-active');
        
        for(var i=0; i< arrayFromPHP.length; i++)
        {
            renderTableFiter(arrayFromPHP[i]);
        }

        $('ul.nav.navbar-nav > li.dropdown.mega-dropdown').mouseover(function() {
            $('ul.nav.navbar-nav > li.dropdown.mega-dropdown').each(function() {
                $(this).removeClass('open');
            });
        });
        
    });

    function clickButton(el)
    {
        var selected =  $("#slide-nav").hasClass('slide-active');
        var transformMenu = 'translate3d(250px, 0px, 0px)';
        var statusPanelMenu = 'block';

        if(!selected)
        {
            transformMenu = '';
            statusPanelMenu = 'none';
        }

        $("#slide-nav").toggleClass('slide-active', !selected);
        $('#slidemenu').toggleClass('slide-active');
        $('#page-content').css('transform', transformMenu);
        $('#jPanelMenu-menu').css('display', statusPanelMenu);
    }

    function renderTableFiter(valueRender)
    {
        var html = "<li class=\"shop\" data-fliter=\""+valueRender+"\" onclick=\"filterByAtoZ(this, \'"+valueRender+"\');\">"+valueRender+"</li>";

        $('ul.mainShop').append(html);
    }

    function filterByAtoZ(el, valueInput)
    {
        var count = 0;
        $('ul.mainShop li').each(function() {
            $(this).removeClass('active');
        });
        $('ul.hideMe').html('');
        for(var i = 0; i < arrayNameBrands.length ; i++)
        {
            var html = "<li><a href=\"{!! url('/dong-ho') !!}"+"/"+convertToSlug(arrayNameBrands[i]['name']) + "-" + arrayNameBrands[i]['id']+ ".html"+"\"> "+arrayNameBrands[i]['name']+" </a></li>";
            if(arrayNameBrands[i]['name'][0].toUpperCase() == valueInput.toUpperCase())
            {
                if(count++ == 8) break;
                $('ul.hideMe').append(html);
            }
        }
        
        $(el).toggleClass('active');
    }

    function convertToSlug(Text)
    {
        return Text
            .toLowerCase()
            .replace(/ /g,'-')
            .replace(/[^\w-]+/g,'')
            ;
    }
</script>