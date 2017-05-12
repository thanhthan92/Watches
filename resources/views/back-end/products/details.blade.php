@extends('back-end.layouts.master')
@section('content')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li><a href="{!!url('admin/products')!!}" style="text-decoration: none">Quản lý sản phẩm</a></li>
                <?php
                    $breadcrumb = 'Thêm';
                    if ($data->id) {
                        $breadcrumb = 'Cập nhật';
                    }
                ?>
                <li class="active">{!! $breadcrumb; !!}</li>
            </ol>
        </div>
        <form method="post" role="form" enctype="multipart/form-data" style="margin-top: 50px;">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />

            <div class="form-group col-xs-12 col-sm-12">
                <label for="product-name">Tên của sản phẩm</label>
                <input type="text" name="name" id="product-name" value="{!! $data->name; !!}"
                    class="form-control" placeholder="Tên của sản phẩm" />
            </div>

            <div class="form-group col-xs-12 col-sm-12" style="margin-top: 10px;">
                <label for="product-description">Mô tả</label>
                <textarea name="description" id="product-description" rows="3" placeholder="Mô tả ngắn gọn về sản phẩm"
                    class="form-control" style="resize: none">{!! $data->description; !!}</textarea>
            </div>

            <div class="col-xs-12 col-sm-5" style="margin-top: 10px;">
                <label>Thông tin về sản phẩm</label>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-model" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Mã SP (model)</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="model" class="form-control" id="product-model" placeholder="Mã SP (model)" />
                    </div>
                </div>
                
                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-brand-id" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Brand</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <select name="brand_id" class="form-control" id="product-brand-id">
                            <?php foreach ($brands as $value) { ?>
                                <option value="{!! $value->id; !!}" {!! $data->brand_id == $value->id ? 'selected' : '' !!}>
                                    {!! $value->name; !!}
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-gender-id" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Gender</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <select name="gender_id" class="form-control" id="product-gender-id">
                            <?php foreach ($genders as $value) { ?>
                                <option value="{!! $value->id; !!}" {!! $data->gender_id == $value->id ? 'selected' : '' !!}>
                                    {!! $value->name; !!}
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-series-id" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Chủng loại</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <select name="series_id" class="form-control" id="product-series-id">
                            <?php foreach ($series as $value) { ?>
                                <option value="{!! $value->id; !!}" {!! $data->series_id == $value->id ? 'selected' : '' !!}>
                                    {!! $value->name; !!}
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-movement-id" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Bộ máy (movement)</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <select name="movement_id" class="form-control" id="product-movement-id">
                            <?php foreach ($movements as $value) { ?>
                                <option value="{!! $value->id; !!}" {!! $data->movement_id == $value->id ? 'selected' : '' !!}>
                                    {!! $value->name; !!}
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row" style="margin-top: 25px;">
                    <label>Vỏ máy</label>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-case-id" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Chất liệu</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <select name="case_id" class="form-control" id="product-case-id">
                            <?php foreach ($cases as $value) { ?>
                                <option value="{!! $value->id; !!}" {!! $data->case_id == $value->id ? 'selected' : '' !!}>
                                    {!! $value->name; !!}
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-case-shape" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Hình dạng</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="case_shape" class="form-control" id="product-case-shape"
                            placeholder="Hình tròn, hình vuông..." />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-case-size" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Kích thước (mm)</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="case_size" class="form-control" id="product-case-size"
                            placeholder="Kích thước (mm)" />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row" style="margin-top: 25px;">
                    <label>Mặt kính</label>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-dial-id" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Chất liệu</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <select name="dial_id" class="form-control" id="product-dial-id">
                            <?php foreach ($dials as $value) { ?>
                                <option value="{!! $value->id; !!}" {!! $data->dial_id == $value->id ? 'selected' : '' !!}>
                                    {!! $value->name; !!}
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-dial-color" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Màu sắc</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="dial_color" class="form-control" id="product-dial-color"
                            placeholder="Màu sắc" />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row" style="margin-top: 25px;">
                    <label>Dây đeo</label>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-band-id" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Chất liệu</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <select name="band_id" class="form-control" id="product-band-id">
                            <?php foreach ($bands as $value) { ?>
                                <option value="{!! $value->id; !!}" {!! $data->band_id == $value->id ? 'selected' : '' !!}>
                                    {!! $value->name; !!}
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-band-length" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Chiều dài dây</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="band_length" class="form-control" id="product-band-length"
                            placeholder="Chiều dài dây" />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-band-width" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Độ rộng</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="band_width" class="form-control" id="product-band-width"
                            placeholder="Độ rộng" />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-band-clasp" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Khóa</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="band_clasp" class="form-control" id="product-band-clasp"
                            placeholder="Khóa đồng hồ" />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row" style="margin-top: 25px;">
                    <label>Tính năng</label>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-feature-water-resstance" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Khả năng chống nước</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="feature_water_resstance" class="form-control" id="product-feature-water-resstance"
                            placeholder="Chống nước (mét)" />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-feature" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Chức năng</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="feature" class="form-control" id="product-feature"
                            placeholder="Lịch..." />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-functions" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Tính năng riêng</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="functions" class="form-control" id="product-functions"
                            placeholder="Chức năng bấm giờ..." />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row" style="margin-top: 25px;">
                    <label>Thông tin thêm</label>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-style-id" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Style</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <select name="style_id" class="form-control" id="product-style-id">
                            <?php foreach ($styles as $value) { ?>
                                <option value="{!! $value->id; !!}" {!! $data->style_id == $value->id ? 'selected' : '' !!}>
                                    {!! $value->name; !!}
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12 row">
                    <label for="product-upc-code" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Mã xuất xứ (UPC code)</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="upc_code" class="form-control" id="product-upc-code"
                            placeholder="Mã xuất xứ" />
                    </div>
                </div>

            </div>

            <div class="col-xs-12 col-sm-3" style="margin-top: 10px;">
            </div>

            <div class="col-xs-12 col-sm-4" style="margin-top: 10px;">
                <label for="product-status">Tình trạng</label>

                <div class="form-group">
                    <select name="status" class="form-control" id="product-status">
                        <option value="1" {!! $data->status == 1 ? 'selected' : '' !!}>Còn hàng</option>
                        <option value="2" {!! $data->status == 2 ? 'selected' : '' !!}>Không còn hàng</option>
                        <option value="3" {!! $data->status == 3 ? 'selected' : '' !!}>Hàng sắp về</option>
                        <option value="4" {!! $data->status == 4 ? 'selected' : '' !!}>Chưa có thông tin về sản phẩm</option>
                    </select>
                </div>

                <label for="product-price" style="margin-top: 25px;">Giá bán lẻ và chiết khấu thương mại</label>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Giá bán (VNĐ)</span>
                        <input type="number" name="price" id="product-price" value="{!! $data->price; !!}"
                            class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Chiết khấu thương mại (%)</span>
                        <input type="number" name="discount" id="product-discount" value="{!! $data->discount; !!}"
                            class="form-control" min="0" max="100" />
                    </div>
                </div>

                <label style="margin-top: 25px; margin-bottom: 10px">Hình ảnh của sản phẩm</label>
                <div class="clearfix"></div>

                <label class="form-group col-xs-12 col-sm-12" style="cursor: pointer; font-weight: normal"
                    onclick="addmore(this)">
                    <span class="glyphicon glyphicon-plus"></span> Thêm hình ảnh
                </label>
                <div class="clearfix" id="finish-images"></div>
                <div class="clearfix" id="finish-inputs"></div>

            </div>

            <div class="form-group col-xs-12 col-sm-12" style="margin-top: 15px">
                <label for="product-detail">Giới thiệu</label>
                <textarea name="detail" id="product-detail" class="form-control" rows="5">
                {!! old('detail', $data->detail) !!}
                </textarea>
                <script type="text/javascript">
                    var editor = CKEDITOR.replace('detail',{
                        language:'en',
                        filebrowserImageBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Images',
                        filebrowserFlashBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Flash',
                        filebrowserImageUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                    });
                </script>
            </div>

            <div class="form-group col-xs-12 col-sm-12">
                <button type="submit" class="btn btn-primary">{!! $breadcrumb; !!}</button>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        var obj = document.getElementById('products');
        if (obj != null && obj != undefined) {
            obj.className = "active";
        }

        function addmore(el) {
            var id = Date.now();
            var input = create('input', {
                'type': 'file', 'accept': 'image/*',
                'style': 'display: none',
                'name': 'images[]',
                'id': id,
                'onchange': 'showImage(this)'
            });
            el.parentElement.insertBefore(input, document.getElementById('finish-inputs'));
            input.click();
        }

        function showImage(el) {
            if (!(el.files && el.files[0])) {
                return;
            }

            var reader = new FileReader();
            reader.onload = function (e) {
                var exist = document.getElementById('image-' + el.getAttribute('id'));
                if (exist != undefined) {
                    exist.setAttribute('src', e.target.result);
                    return;
                }

                var image = create('img', {
                    'class': 'col-xs-10 col-sm-5',
                    'style': 'margin-bottom: 30px',
                    'id': 'image-' + el.getAttribute('id'),
                    'src': e.target.result
                });
                el.parentElement.insertBefore(image, document.getElementById('finish-images'));

                var actor = create('div', {
                    'class': 'col-xs-2 col-sm-1 no-padding'
                });

                var html = "<div class='glyphicon glyphicon-pencil' onclick='editImage(" +
                    el.getAttribute('id') + ")'></div>";
                html += "<div class='glyphicon glyphicon-trash' onclick='deleteImage(" +
                    el.getAttribute('id') + ")'></div>";
                actor.innerHTML = html;

                el.parentElement.insertBefore(actor, document.getElementById('finish-images'));
            }

            reader.readAsDataURL(el.files[0]);
        }

        function editImage(id) {
            if (document.getElementById(id) != undefined)
                document.getElementById(id).click();
        }

        function deleteImage(id) {
            if (document.getElementById('image-' + id) != undefined) {
                document.getElementById('image-' + id).nextSibling.remove();
                document.getElementById('image-' + id).remove();
            }
            if (document.getElementById(id) != undefined)
                document.getElementById(id).remove();
        }

        function create(name, attr) {
            if(typeof(name) === "undefined") {
                return false;
            }
            var element = document.createElement(name);
            if(typeof(attr) === 'object') {
                for(var key in attr) {
                    element.setAttribute(key,attr[key]);
                }
            }
            return element;
        }
    </script>
@endsection