@extends('back-end.layouts.master')
@section('content')

@if (session('message'))
    <script type="text/javascript">alert("Cập nhật thành công!");</script>
@endif

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li>Một số thông tin chung</li>
            </ol>
        </div>

        <form method="post" style="margin-top: 50px;">
            <input type="hidden" name="_token" value="{{csrf_token()}}" />

            <div class="form-group col-xs-12 col-sm-12">
                <label for="website-name">Tên của website</label>
                <input type="text" name="website_name" id="website-name" value="{!! $data['website_name'] !!}" 
                    class="form-control" placeholder="Tiêu đề của webiste" />
            </div>

            <div class="form-group"  style="margin-top: 15px" id ="website-transaction">
                <div class="col-xs-12 col-sm-12">
                    <label for="website-name">Thông tin chung về uy tín giao dịch</label>
                </div>
                <div class="col-xs-12 col-sm-5 no-padding">
                    <div class="col-xs-5 col-sm-4">
                        <label class="switch-checkbox">
                            <input type="checkbox" name="website_warantee_is" {!! $data['website_warantee_is'] !!}
                                onclick="checkbox('website_warantee_is', 'website_warantee')" />
                            <div class="nob"></div>
                        </label>
                        <div class="col-xs-5 col-sm-5 website-warantee"></div>
                    </div>
                    <div class="col-xs-7 col-sm-8">
                        <input type="text" name="website_warantee" class="form-control" value="{!! $data['website_warantee'] !!}" />
                    </div>
                </div>
                <div class="col-sm-1"></div>

                <div class="col-xs-12 col-sm-5 no-padding">
                    <div class="col-xs-5 col-sm-4">
                        <label class="switch-checkbox">
                            <input type="checkbox" name="website_authentic_is" {!! $data['website_authentic_is'] !!}
                                onclick="checkbox('website_authentic_is', 'website_authentic')" />
                            <div class="nob"></div>
                        </label>
                        <div class="col-xs-5 col-sm-5 website-authentic"></div>
                    </div>
                    <div class="col-xs-7 col-sm-8">
                        <input type="text" name="website_authentic" class="form-control" value="{!! $data['website_authentic'] !!}" />
                    </div>
                </div>
                <div class="col-sm-1"></div>

                <div class="col-xs-12 col-sm-5 no-padding">
                    <div class="col-xs-5 col-sm-4">
                        <label class="switch-checkbox">
                            <input type="checkbox" name="website_cash_is" {!! $data['website_cash_is'] !!}
                                onclick="checkbox('website_cash_is', 'website_cash')" />
                            <div class="nob"></div>
                        </label>
                        <div class="col-xs-5 col-sm-5 website-cash"></div>
                    </div>
                    <div class="col-xs-7 col-sm-8">
                        <input type="text" name="website_cash" class="form-control" value="{!! $data['website_cash'] !!}" />
                    </div>
                </div>
                <div class="col-sm-1"></div>

                <div class="col-xs-12 col-sm-5 no-padding">
                    <div class="col-xs-5 col-sm-4">
                        <label class="switch-checkbox">
                            <input type="checkbox" name="website_safe_is" {!! $data['website_safe_is'] !!}
                                onclick="checkbox('website_safe_is', 'website_safe')" />
                            <div class="nob"></div>
                        </label>
                        <div class="col-xs-5 col-sm-5 website-safe"></div>
                    </div>
                    <div class="col-xs-7 col-sm-8">
                        <input type="text" name="website_safe" class="form-control" value="{!! $data['website_safe'] !!}" />
                    </div>
                </div>
                <div class="col-sm-1"></div>

                <div class="col-xs-12 col-sm-5 no-padding">
                    <div class="col-xs-5 col-sm-4">
                        <label class="switch-checkbox">
                            <input type="checkbox" name="website_ship_is" {!! $data['website_ship_is'] !!}
                                onclick="checkbox('website_ship_is', 'website_ship')" />
                            <div class="nob"></div>
                        </label>
                        <div class="col-xs-5 col-sm-5 website-ship"></div>
                    </div>
                    <div class="col-xs-7 col-sm-8">
                        <input type="text" name="website_ship" class="form-control" value="{!! $data['website_ship'] !!}" />
                    </div>
                </div>
                <div class="col-sm-1"></div>

                <div class="col-xs-12 col-sm-5 no-padding">
                    <div class="col-xs-5 col-sm-4">
                        <label class="switch-checkbox">
                            <input type="checkbox" name="website_support_is" {!! $data['website_support_is'] !!}
                                onclick="checkbox('website_support_is', 'website_support')" />
                            <div class="nob"></div>
                        </label>
                        <div class="col-xs-5 col-sm-5 website-support"></div>
                    </div>
                    <div class="col-xs-7 col-sm-8">
                        <input type="text" name="website_support" class="form-control" value="{!! $data['website_support'] !!}" />
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>

            <div class="form-group col-xs-12 col-sm-12" style="margin-top: 15px">
                <label for="website-guarantee-detail">Chính sách bảo hành</label>
                <textarea name="website_guarantee_detail" id="website-guarantee-detail" class="form-control" rows="25">
                {!! old('website_guarantee_detail', $data['website_guarantee_detail']) !!}
                </textarea>
                <script type="text/javascript">
                    var editor = CKEDITOR.replace('website_guarantee_detail',{
                        language:'en',
                        filebrowserImageBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Images',
                        filebrowserFlashBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Flash',
                        filebrowserImageUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                    });
                </script>
            </div>

            <div class="form-group col-xs-12 col-sm-12" style="margin-top: 25px">
                <label for="website-ship-detail">Phương thức vận chuyển</label>
                <textarea name="website_ship_detail" id="website-ship-detail" class="form-control" rows="25">
                    {!! old('website_ship_detail', $data['website_ship_detail']) !!}
                </textarea>
                <script type="text/javascript">
                    var editor = CKEDITOR.replace('website_ship_detail',{
                        language:'en',
                        filebrowserImageBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Images',
                        filebrowserFlashBrowseUrl : '../../plugin/ckfinder/ckfinder.html?Type=Flash',
                        filebrowserImageUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                        filebrowserFlashUploadUrl : '../../plugin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
                    });
                </script>
            </div>

            <div class="form-group col-xs-12 col-sm-12">
                <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
            </div>
        </form>

    </div>

    <script type="text/javascript">
        var obj = document.getElementById('metadata');
        if (obj != null && obj != undefined) {
            obj.className = "active";
        }

        function checkbox(checkName, triggerName) {
            document.getElementsByName(triggerName)[0].disabled = !(document.getElementsByName(checkName)[0].checked);
        }

        checkbox('website_warantee_is', 'website_warantee');
        checkbox('website_authentic_is', 'website_authentic');
        checkbox('website_cash_is', 'website_cash');
        checkbox('website_safe_is', 'website_safe');
        checkbox('website_ship_is', 'website_ship');
        checkbox('website_support_is', 'website_support');
    </script>
@endsection