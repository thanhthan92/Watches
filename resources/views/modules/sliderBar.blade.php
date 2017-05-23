<?php $data = App\Http\Controllers\PagesController::getMetaData();?>
<div class="container">
    <div class="row">
        <div class="sidebar col-xs-12 col-sm-12 col-md-12">
            <div class="block block-layered-nav amshopby-filters-left">
                <div id="btn-refine-search" class="btn refine-search" onclick="toggleFilters()">Refine Search</div>
                <div class="visible-xs"> <span class="btn btn-default btn-block a-right" href="#filter-list" data-toggle="collapse"> <span class="glyphicon glyphicon-chevron-down"></span> </span>
                </div>
                <div class="selected-filters sf-for-mob">
                    <h3>Filters</h3>
                    <p class="block-subtitle">Currently Shopping by</p>
                    <ol class="currently"> <span class="label">Gender:</span>
                        <li>
                            <a href="https://www.certifiedwatchstore.com/watches/mens-watches/shopby/gender-ladies_.html" rel="nofollow" class="btn-remove"> </a> Men's</li>
                        <li>
                            <a href="https://www.certifiedwatchstore.com/watches/mens-watches/shopby/gender-men_s.html" rel="nofollow" class="btn-remove"> </a> Ladies</li>
                    </ol> <a class="clear-brand-nav" href="https://www.certifiedwatchstore.com/watches/mens-watches.html" rel="nofollow">Clear All</a> </div>
                <div class="block-content" id="filter-list">
                    <p class="block-subtitle">Shopping Options</p>
                    <div id="narrow-by-list" class="list-group">
                        <div class="filter-hearding" onclick="sliderBarMenuClick(this, event)">
                            <div class="list-group-item active a-right" > <span data-toggle="collapse" class=""> <span class="">Thương hiệu</span> </span>
                            </div>
                            <div class="in" id="brand">
                                <ol>
                                    @if (isset($data['brandFilter']) && count($data['brandFilter']) > 0)
                                        @foreach ($data['brandFilter'] as $value)
                                            @if ($value->name == '--')
                                                @continue;
                                            @endif
                                            <li data-text="{!! $value->id!!}"><a class="amshopby-attr" rel="nofollow" href="#">{!! $value->name!!}<span class="count"> ({!! $value->total!!}) </span></a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ol>
                            </div>
                        </div>
                        <div class="filter-hearding" onclick="sliderBarMenuClick(this, event)">
                            <div class="list-group-item active a-right"> <span data-toggle="collapse" class=""> <span class="">Kiểu dáng</span> </span>
                            </div>
                            <div class="collapse" id="gender">
                                <ol>
                                    @if(isset($data['genderFilter'][0]) && count($data['genderFilter'][0]) > 0)
                                        <li data-text="1"><a class="amshopby-attr" rel="nofollow" href="#">Nam<span class="count"> ({!! count($data['genderFilter'][0]) !!}) </span></a>
                                        </li>
                                    @else
                                        <li data-text="1"><a class="amshopby-attr" rel="nofollow" href="#">Nam<span class="count"> (0) </span></a>
                                        </li>
                                    @endif

                                    @if(isset($data['genderFilter'][1]) && count($data['genderFilter'][1]) > 0)
                                        <li data-text="2"><a class="amshopby-attr" rel="nofollow" href="#">Nữ<span class="count"> ({!! count($data['genderFilter'][1]) !!}) </span></a>
                                        </li>
                                    @else
                                        <li data-text="2"><a class="amshopby-attr" rel="nofollow" href="#">Nữ<span class="count"> (0) </span></a>
                                        </li>
                                    @endif
                                </ol>
                            </div>
                        </div>
                        <div class="filter-hearding" onclick="sliderBarMenuClick(this, event)">
                            <div class="list-group-item active a-right"> <span data-toggle="collapse" class=""> <span class="">Phong cách</span> </span>
                            </div>
                            <div class="collapse" id="style">
                                <ol>
                                    @if (isset($data['styleFilter']) && count($data['styleFilter']) > 0)
                                        @foreach ($data['styleFilter'] as $value)
                                            @if ($value->name == '--')
                                                @continue;
                                            @endif
                                            <li data-text="{!! $value->id!!}">
                                                <a class="amshopby-attr" rel="nofollow" href="#">{!! $value->name!!}<span class="count"> ({!! $value->total!!}) </span></a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ol>
                            </div>
                        </div>
                        <div class="filter-hearding" onclick="sliderBarMenuClick(this, event)">
                            <div class="list-group-item active a-right"> <span data-toggle="collapse" class="collapsed"> <span class="">Bộ máy</span> </span>
                            </div>
                            <div class="collapse" id="movement">
                                <ol>
                                    @if (isset($data['movementFilter']) && count($data['movementFilter']) > 0)
                                        @foreach ($data['movementFilter'] as $value)
                                            @if ($value->name == '--')
                                                @continue;
                                            @endif
                                            <li data-text="{!! $value->id!!}">
                                                <a class="amshopby-attr" rel="nofollow" href="#">{!! $value->name!!}<span class="count"> ({!! $value->total!!}) </span></a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ol>
                            </div>
                        </div>
                        <div class="filter-hearding" onclick="sliderBarMenuClick(this, event)">
                            <div class="list-group-item active a-right"> <span data-toggle="collapse" class="collapsed"> <span class="">Giá</span> </span>
                            </div>
                            <div class="collapse" id="price">
                                <ol>
                                    <li>
                                        <a class="amshopby-price" href="#">
                                            @if(isset($data['priceFilter'][0]) && count($data['priceFilter'][0]) > 0)
                                                <span class="price">Dưới 1 triệu</span> &nbsp;<span class="count"> ( {!! count($data['priceFilter'][0])!!} ) </span>
                                            @else
                                                <span class="price">Dưới 1 triệu</span> &nbsp;<span class="count"> (0) </span>
                                            @endif
                                        </a>
                                    </li>
                                    <li>
                                        <a class="amshopby-price" href="#">
                                            @if(isset($data['priceFilter'][1]) && count($data['priceFilter'][1]) > 0)
                                                <span class="price">Từ 1 </span> - <span class="price">3 Triệu</span>&nbsp;<span class="count"> ( {!! count($data['priceFilter'][1])!!} ) </span>
                                            @else
                                                <span class="price">Từ 1 </span> - <span class="price">3 Triệu</span>&nbsp;<span class="count"> (0) </span>
                                            @endif
                                        </a>
                                    </li>
                                    <li>
                                        <a class="amshopby-price" href="#">
                                            @if(isset($data['priceFilter'][2]) && count($data['priceFilter'][2]) > 0)
                                                <span class="price">Trên 3 triệu</span> &nbsp;<span class="count"> ( {!! count($data['priceFilter'][2])!!} ) </span>
                                            @else
                                                <span class="price">Trên 3 triệu</span> &nbsp;<span class="count"> (0) </span>
                                            @endif
                                        </a>
                                    </li>
                                </ol>
                                <ol>
                                    <input type="hidden" size="2" value="From" id="amshopby-price-from">
                                    <input type="hidden" size="2" value="To" id="amshopby-price-to">
                                    <li style="display:none">
                                        <input type="hidden" id="amshopby-price-url" value="https://www.certifiedwatchstore.com/watches/mens-watches/shopby/gender-ladies_-men_s/price-amshopby-price-from-amshopby-price-to.html">
                                    </li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="filter-hearding" onclick="sliderBarMenuClick(this, event)">
                            <div class="list-group-item active a-right"> <span data-toggle="collapse" class="collapsed"> <span class="">Chất liệu dây </span> </span>
                            </div>
                            <div class="collapse" id="band_material">
                                <ol>
                                    @if (isset($data['bandFilter']) && count($data['bandFilter']) > 0)
                                        @foreach ($data['bandFilter'] as $value)
                                            @if ($value->name == '--')
                                                @continue;
                                            @endif
                                            <li data-text="{!! $value->id!!}">
                                                <a class="amshopby-attr" rel="nofollow" href="#">{!! $value->name!!}<span class="count"> ({!! $value->total!!}) </span></a>
                                            </li>
                                        @endforeach
                                    @endif
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="selected-filters sf-for-desk">
                    <p class="block-subtitle">Currently Shopping by</p>
                    <ol class="currently"> <span class="label">Gender:</span>
                        <li>
                            <a href="https://www.certifiedwatchstore.com/watches/mens-watches/shopby/gender-ladies_.html" rel="nofollow" class="btn-remove"> </a> Men's</li>
                        <li>
                            <a href="https://www.certifiedwatchstore.com/watches/mens-watches/shopby/gender-men_s.html" rel="nofollow" class="btn-remove"> </a> Ladies</li>
                    </ol> <a class="clear-brand-nav" href="https://www.certifiedwatchstore.com/watches/mens-watches.html" rel="nofollow">Clear All</a> </div>
                <div style="display:none" class="amshopby-overlay"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {
        muiltiCheckBox('brand');
        muiltiCheckBox('gender');
        muiltiCheckBox('style');
        muiltiCheckBox('movement');
        muiltiCheckBox('band_material');
        
        $('html').click(function() {
            if(clikAll) {clikAll = false; return;}
            $('#narrow-by-list > div.filter-hearding').each(function() {
                $(this).removeClass('active-filter');
                $($(this).children()[0]).removeClass('active-filter');
            }); 
        });
    });


    function sliderBarMenuClick(el, event) {
        if(clikAll) {return;}
        $('#narrow-by-list > div.filter-hearding').each(function() {
            if(this != el) {
                $(this).removeClass('active-filter');
                $($(this).children()[0]).removeClass('active-filter');
            }
        });
        
        if($(el).hasClass('active-filter')) {
            $(el).removeClass('active-filter');
            $($(el).children()[0]).removeClass('active-filter');
        }else{
            $(el).toggleClass('active-filter');
            $($(el).children()[0]).addClass('active active-filter');
            $($(el).children()[1]).attr('class', 'in');
        }
        
        event.stopPropagation();
    }

    var clikAll = false;
    function muiltiCheckBox(param){
        $('div#'+param+' li > a').on('click', function() {
            clikAll = true;
            if($(this).hasClass('amshopby-attr-selected')){
                $(this).attr('class', 'amshopby-attr');
            }else{
                $(this).attr('class', 'amshopby-attr-selected');
            }
        });
        
        
    }


    function toggleFilters() {
        if($('#btn-refine-search').hasClass('btn refine-search open')) {
            $('#btn-refine-search').attr('class', 'btn refine-search');
            $('#narrow-by-list > div.filter-hearding').each(function() {
                $(this).css('display', 'none');
            });
        }else {
            $('#btn-refine-search').attr('class', 'btn refine-search open');
            $('#narrow-by-list > div.filter-hearding').each(function() {
                $(this).css('display', 'block');
            });
        }
    }
</script>