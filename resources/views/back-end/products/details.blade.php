@extends('back-end.layouts.master')
@section('content')

    @if (session('message'))
        <script type="text/javascript">
            $(document).ready(function() {
                message('{!! session('message') !!}');
            });
        </script>
    @endif
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row top-content-backend">
            <ol class="breadcrumb">
                <li><a href="{!!url('admin/home')!!}">Trang chủ<use xlink:href="#stroked-home"></use></a></li>
                <li><a href="{!!url('admin/products')!!}" style="text-decoration: none">Quản lý sản phẩm</a></li>
                <?php
                    $breadcrumb = 'Thêm';
                    if ($data->id) {
                        $breadcrumb = 'Cập nhật sản phẩm';
                    }
                ?>
                <li class="active">{!! $breadcrumb; !!}</li>
            </ol>

            <div class="form-group col-xs-12 col-sm-12">
                <button type="button" class="btn btn-primary" style="padding: 5px 25px" onclick="submitFrm()">
                    Lưu lại</button>
                <button type="button" class="btn btn-primary" style="padding: 5px 25px" onclick="createNew()">
                    Thêm sản phẩm mới</button>
            </div>
        </div>
        <form method="POST" role="form" enctype="multipart/form-data" style="margin-top: 100px;">
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

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-model" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Mã SP (model)</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="model" class="form-control" id="product-model" placeholder="Mã SP (model)" value="{!! $data->model !!}" />
                    </div>
                </div>
                
                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-brand-id" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Brand</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <select name="brand_id" class="form-control" id="product-brand-id">
                            <?php foreach ($data->brand as $value) { ?>
                                <option value="{!! $value->id; !!}" {!! $data->brand_id == $value->id ? 'selected' : '' !!}>
                                    {!! $value->name; !!}
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-gender-id" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Kiểu dáng</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <select name="gender_id" class="form-control" id="product-gender-id">
                            <option value="1" {!! $data->gender_id == 1 ? 'selected' : '' !!}>Nam</option>
                            <option value="2" {!! $data->gender_id == 2 ? 'selected' : '' !!}>Nữ</option>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-series-id" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Chủng loại</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <select name="series_id" class="form-control" id="product-series-id">
                            <?php foreach ($data->series as $value) { ?>
                                <option value="{!! $value->id; !!}" {!! $data->series_id == $value->id ? 'selected' : '' !!}>
                                    {!! $value->name; !!}
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-movement-id" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Bộ máy (movement)</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <select name="movement_id" class="form-control" id="product-movement-id">
                            <?php foreach ($data->movement as $value) { ?>
                                <option value="{!! $value->id; !!}" {!! $data->movement_id == $value->id ? 'selected' : '' !!}>
                                    {!! $value->name; !!}
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0;margin-top: 25px;">
                    <label>Vỏ máy</label>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-case-id" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Chất liệu</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <select name="case_id" class="form-control" id="product-case-id">
                            <?php foreach ($data->case as $value) { ?>
                                <option value="{!! $value->id; !!}" {!! $data->case_id == $value->id ? 'selected' : '' !!}>
                                    {!! $value->name; !!}
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-case-shape" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Hình dạng</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="case_shape" class="form-control" id="product-case-shape" value="{!! $data->case_shape !!}"
                            placeholder="Hình tròn, hình vuông..." />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-case-size" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Kích thước (mm)</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="case_size" class="form-control" id="product-case-size" value="{!! $data->case_size !!}"
                            placeholder="Kích thước (mm)" />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0;margin-top: 25px;">
                    <label>Mặt kính</label>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-dial-id" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Chất liệu</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <select name="dial_id" class="form-control" id="product-dial-id">
                            <?php foreach ($data->dial as $value) { ?>
                                <option value="{!! $value->id; !!}" {!! $data->dial_id == $value->id ? 'selected' : '' !!}>
                                    {!! $value->name; !!}
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-dial-color" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Màu sắc</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="dial_color" class="form-control" id="product-dial-color" value="{!! $data->dial_color !!}"
                            placeholder="Màu sắc" />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0;margin-top: 25px;">
                    <label>Dây đeo</label>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-band-id" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Chất liệu</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <select name="band_id" class="form-control" id="product-band-id">
                            <?php foreach ($data->band as $value) { ?>
                                <option value="{!! $value->id; !!}" {!! $data->band_id == $value->id ? 'selected' : '' !!}>
                                    {!! $value->name; !!}
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-band-length" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Chiều dài dây</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="band_length" class="form-control" id="product-band-length" value="{!! $data->band_length !!}"
                            placeholder="Chiều dài dây" />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-band-width" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Độ rộng</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="band_width" class="form-control" id="product-band-width" value="{!! $data->band_width !!}"
                            placeholder="Độ rộng" />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-band-clasp" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Khóa</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="band_clasp" class="form-control" id="product-band-clasp" value="{!! $data->band_clasp !!}"
                            placeholder="Khóa đồng hồ" />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0;margin-top: 25px;">
                    <label>Tính năng</label>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-feature-water-resstance" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Khả năng chống nước</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="feature_water_resstance" class="form-control" id="product-feature-water-resstance" value="{!! $data->feature_water_resstance !!}"
                            placeholder="Chống nước (mét)" />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-feature" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Chức năng</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="feature" class="form-control" id="product-feature" value="{!! $data->feature !!}"
                            placeholder="Lịch..." />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-functions" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Tính năng riêng</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="functions" class="form-control" id="product-functions"  value="{!! $data->functions !!}"
                            placeholder="Chức năng bấm giờ..." />
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0;margin-top: 25px;">
                    <label>Thông tin thêm</label>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-style-id" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Style</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <select name="style_id" class="form-control" id="product-style-id">
                            <?php foreach ($data->style as $value) { ?>
                                <option value="{!! $value->id; !!}" {!! $data->style_id == $value->id ? 'selected' : '' !!}>
                                    {!! $value->name; !!}
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group col-xs-12 col-sm-12" style="padding-left: 0;padding-right: 0">
                    <label for="product-upc-code" class="col-xs-6 col-sm-6 no-padding" style="line-height: 34px; font-weight: normal">Mã xuất xứ (UPC code)</label>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <input type="text" name="upc_code" class="form-control" id="product-upc-code" value="{!! $data->upc_code !!}"
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
                        <span class="input-group-addon">Số lượng</span>
                        <input type="number" name="quantity" id="product-quantity" value="{!! $data->quantity; !!}"
                            class="form-control" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon">Giá bán (VNĐ)</span>
                        <input type="text" name="price" id="product-price" value="{!! number_format($data->price, 0, ',', '.') !!}"
                            class="form-control" onkeyup="currency(this)" maxlength="15" />
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

                <?php foreach ($data->images as $i => $value) { ?>
                    <img class="col-xs-10 col-sm-5" data-index="{!! $i !!}" id="{!! 'image-' . $i !!}"
                        src="{!!url('uploads/products/details/' . $value)!!}" style="margin-bottom: 30px" />
                    <div class="col-xs-2 col-sm-1 no-padding">
                        <div class="glyphicon glyphicon-pencil" onclick="editImage({!! $i !!})"></div>
                        <div class="clearfix"></div>
                        <div class="glyphicon glyphicon-trash" onclick="deleteImage({!! $i !!})"></div>
                    </div>
                <?php } ?>
                <div class="clearfix" id="finish-images"></div>
                <div class="clearfix" id="finish-inputs"></div>

            </div>

            <div class="form-group col-xs-12 col-sm-12" style="margin-top: 15px">
                <label for="product-detail">Giới thiệu</label>
                <textarea name="detail" id="product-detail" class="form-control" rows="5" style="resize: none">{!! $data->detail !!}</textarea>
            </div>
        </form>
    </div>
    <script type="text/javascript">
        var obj = document.getElementById('products');
        if (obj != null && obj != undefined) {
            obj.className = "active";
        }

        var count = {!! count($data->images) !!};

        function submitFrm() {
            if (document.getElementById('product-name').value == '') {
                message('Vui lòng nhập tên sản phẩm!');
                return;
            }
            if (document.getElementById('product-price').value == '' | document.getElementById('product-price').value == 0) {
                message('Vui lòng nhập giá của sản phẩm!');
                return;
            }
            if (count == 0) {
                message('Vui lòng nhập ít nhất 1 hình ảnh của sản phẩm!');
                return;
            }
            document.getElementsByTagName('form')[0].submit();
        }

        function createNew() {
            window.location = '{!! url('admin/products/details') !!}';
        }

        function addmore(el, id = null) {
            if (id == null) {
                id = Date.now();
            }

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
                var id = el.getAttribute('id');

                var exist = document.getElementById('image-' + id);
                if (exist != undefined) {
                    exist.setAttribute('src', e.target.result);
                    if ('{!! $data->id !!}') {
                        if (document.getElementById('image-index-' + id) == undefined) {
                            var hidden = create('input', {
                                'type': 'hidden',
                                'id': 'image-index-' + id, 'name': 'update[]',
                                'value': id
                            });
                            el.parentElement.insertBefore(hidden, document.getElementById('finish-inputs'));
                        }
                    }
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

                var html = "<div class='glyphicon glyphicon-pencil' onclick='editImage(" + id + ")'></div>";
                html += "<div class=\"clearfix\"></div>";
                html += "<div class='glyphicon glyphicon-trash' onclick='deleteImage(" + id + ")'></div>";
                actor.innerHTML = html;

                el.parentElement.insertBefore(actor, document.getElementById('finish-images'));
            }

            reader.readAsDataURL(el.files[0]);
            count++;
        }

        function editImage(id) {
            if (document.getElementById(id) != undefined) {
                document.getElementById(id).click();
            } else {
                addmore(document.getElementById('finish-inputs'), id);
            }
        }

        function deleteImage(id) {
            var el = document.getElementById('image-' + id);
            if (el != undefined) {
                el.nextSibling.remove();
                if (el.nextSibling.tagName == 'DIV') {
                    el.nextSibling.remove();
                }
                el.remove();
                count--;
            }

            el = document.getElementById(id);
            if (el != undefined) {
                el.remove();
            }

            el = document.getElementById('image-index-' + id);
            if (el != undefined) {
                el.setAttribute('name', 'delete[]');
            } else if ('{!! $data->id !!}') {
                var hidden = create('input', {
                    'type': 'hidden',
                    'id': 'image-index-' + id, 'name': 'delete[]', 'value': id
                });
                document.getElementById('finish-inputs')
                    .parentElement.insertBefore(hidden, document.getElementById('finish-inputs'));
            }
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

        function currency(el) {
            el.value = el.value.replace(/\D/g,'').replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1.");
        }
    </script>
@endsection