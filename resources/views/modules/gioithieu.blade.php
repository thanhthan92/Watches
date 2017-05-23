<div class="col-xs-3 col-sm-6 col-md-3 col-lg-3">
    <div class="block-title newRes" onclick="onclickFooterInfo(this)"><strong><span>THÔNG TIN CÔNG TY </span></strong>
    </div>
    <ul class="links toogle-links">
        <li> <a href="#" title="">Các chính sách</a></li> 
        <li> <a href="#" title="">Câu hỏi thường gặp</a></li> 
        <li> <a href="#" title="">Hệ thống bảo hành</a></li> 
    </ul>
</div>

<div class="col-xs-3 col-sm-6 col-md-3 col-lg-3">
    <div class="block-title newRes" onclick="onclickFooterInfo(this)"><strong><span>TUYỂN DỤNG</span></strong>
    </div>
    <ul class="links toogle-links">
        <li> <a href="#" title="">Tuyển dụng mới nhất</a></li> 
        <li> <a href="#" title="">Hưỡng dẫn mua hàng Online</a></li> 
        <li> <a href="#" title="">Chính sách mua trả góp</a></li>  
    </ul>
</div>

<div class="col-xs-3 col-sm-6 col-md-3 col-lg-3">
    <div class="block-title newRes" onclick="onclickFooterInfo(this)"><strong><span>HỆ THỐNG CỬA HÀNG</span></strong>
    </div>
    <ul class="links toogle-links">
        <li> <a href="#" title="">Kiểm tra hàng chính hãng</a></li> 
        <li> <a href="#" title="">Máy đổi trả</a></li> 
        <li> <a href="#" title="">Hệ thống cửa hàng</a></li> 
    </ul>
</div>

<div class="col-xs-3 col-sm-6 col-md-3 col-lg-3">
    <div class="block-title newRes" onclick="onclickFooterInfo(this)"><strong><span>HỖ TRỢ </span></strong>
    </div>
    <ul class="links toogle-links">
    </ul>
</div>

<script type="text/javascript">

    function onclickFooterInfo(el) {
        
        if($(el).next().css('display') == 'none') {
            $('ul.links').each(function() {
                $(this).css('display', 'none');
            });
            $(el).next().css('display', 'block');
        }else{

            $(el).next().css('display', 'none');
        }
        
    }
</script>