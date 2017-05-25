@extends('back-end.layouts.master')
@section('content')

<script type="text/javascript">
    var obj = document.getElementById('danhmuc');
    if (obj != null && obj != undefined) {
        obj.className = "active";
    }
</script>
<style scoped>
	.panel-group a {text-decoration:none;font-weight:bold}
</style>

<!-- main content - noi dung chinh trong chu -->
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Danh mục</li>
			</ol>
		</div><!--/.row-->
	
		
	<div class="panel-group" id="accordion">
		<!-- <input type="hidden" name="_token" value="{{csrf_token()}}" /> -->
  		<div class="panel panel-default">
		    <div class="panel-heading">
		      <h4 class="panel-title">
		        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
		        Danh sách Thương hiệu</a>
		      </h4>
		    </div>
		    <div id="collapse1" class="panel-collapse collapse">
		      	<div class="panel-body">
					<div class="panel-heading" id="btnStatusBrand">
						<button id="btnAddBrand" type="button" class="btn btn-primary pull-right" onclick="admore('productBrand', 'Thêm mới thương hiệu', '#brand', '#btnSavebrand')">Thêm mới thương hiệu</button>
						<button id="btnSavebrand" style="display: none" type="button" class="btn btn-primary pull-right" onclick="saveData('productBrand','brand', 'Thêm mới thương hiệu', 'btnSavebrand')">Lưu thương hiệu</button>
					</div>
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					    @elseif (Session()->has('flash_level'))
					    	<div class="alert alert-success">
						        <ul>
						            {!! Session::get('flash_massage') !!}	
						        </ul>
						    </div>
						@endif
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover" id="brand">
								<thead>
									<tr>										
										<th>Tên thương hiệu</th>										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php listBrands ($data, 'productBrand', 'Thêm mới sản phẩm', 'btnSavebrand'); ?>	
									</tr>									
								</tbody>
							</table>
						</div>
					</div>
				</div>
		    </div>
		</div>
  
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
				Chủng loại</a>
				</h4>
			</div>
			<div id="collapse2" class="panel-collapse collapse">
			 	<div class="panel-body">
					<div class="panel-heading">
						<button type="button" class="btn btn-primary pull-right" onclick="admore('productSeries', 'Thêm mới chủng loại', '#series', '#btnSaveSeries')">Thêm mới Chủng loại</button>
						<button id="btnSaveSeries" style="display: none" type="button" class="btn btn-primary pull-right" onclick="saveData('productSeries','series', 'Thêm mới thương hiệu', 'btnSaveSeries')">Lưu Chủng loại</button>
					</div>
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					    @elseif (Session()->has('flash_level'))
					    	<div class="alert alert-success">
						        <ul>
						            {!! Session::get('flash_massage') !!}	
						        </ul>
						    </div>
						@endif
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover" id="series">
								<thead>
									<tr>										
										<th>Tên chủng loại</th>										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php listSeries($data, 'productSeries', 'Thêm mới chủng loại', 'btnSaveSeries'); ?> 
									</tr>									
								</tbody>
							</table>
						</div>
					</div>
				</div>	
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading">
			  	<h4 class="panel-title">
			        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
			        Bộ máy</a>
			  	</h4>
			</div>
			<div id="collapse3" class="panel-collapse collapse">
				<div class="panel-body">
					<div class="panel-heading">
						<button type="button" class="btn btn-primary pull-right" onclick="admore('productMovement', 'Thêm mới bộ máy', '#movement', '#btnSaveMovement')">Thêm mới Bộ máy</button>
						<button id="btnSaveMovement" style="display: none" type="button" class="btn btn-primary pull-right" onclick="saveData('productMovement','movement', 'Thêm mới bộ máy', 'btnSaveMovement')">Lưu Bộ máy</button>
					</div>
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					    @elseif (Session()->has('flash_level'))
					    	<div class="alert alert-success">
						        <ul>
						            {!! Session::get('flash_massage') !!}	
						        </ul>
						    </div>
						@endif
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover" id="movement">
								<thead>
									<tr>										
										<th>Tên bộ máy</th>										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php listMovement($data, 'productMovement', 'Thêm mới bộ máy', 'btnSaveMovement'); ?> 
									</tr>									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
					Vỏ máy</a>
				</h4>
			</div>
			<div id="collapse4" class="panel-collapse collapse">
				<div class="panel-body">
					<div class="panel-heading">
						<button type="button" class="btn btn-primary pull-right" onclick="admore('productCase', 'Thêm mới vỏ máy', '#case', '#btnSaveCase')">Thêm mới thông tin vỏ máy</button>
						<button id="btnSaveCase" style="display: none" type="button" class="btn btn-primary pull-right" onclick="saveData('productCase','case', 'Thêm mới vỏ máy', 'btnSaveCase')">Lưu vỏ máy</button>
					</div>
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					    @elseif (Session()->has('flash_level'))
					    	<div class="alert alert-success">
						        <ul>
						            {!! Session::get('flash_massage') !!}	
						        </ul>
						    </div>
						@endif
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover" id="case">
								<thead>
									<tr>										
										<th>Tên loại vỏ máy</th>										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php listCase($data, 'productCase', 'Thêm mới vỏ máy', 'btnSaveCase'); ?> 
									</tr>									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
		    <div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
					Mặt kính</a>
		      	</h4>
		    </div>
		    <div id="collapse5" class="panel-collapse collapse">
				<div class="panel-body">
					<div class="panel-heading">
						<button type="button" class="btn btn-primary pull-right" onclick="admore('productDial', 'Thêm mới thông tin mặt kính', '#dial', '#btnSaveDial')">Thêm mới thông tin mặt kính</button>
						<button id="btnSaveDial" style="display: none" type="button" class="btn btn-primary pull-right" onclick="saveData('productDial','dial', 'Thêm mới thông tin mặt kính', 'btnSaveDial')">Lưu thông tin</button>
					</div>
					@if (count($errors) > 0)
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					    @elseif (Session()->has('flash_level'))
					    	<div class="alert alert-success">
						        <ul>
						            {!! Session::get('flash_massage') !!}	
						        </ul>
						    </div>
						@endif
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover" id="dial">
								<thead>
									<tr>										
										<th>Tên loại mặt kính</th>										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php listDial($data, 'productDial', 'Thêm mới thông tin mặt kính', 'btnSaveDial'); ?> 
									</tr>									
								</tbody>
							</table>
						</div>
					</div>
				</div>
		    </div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
					Dây đeo</a>
				</h4>
			</div>
			<div id="collapse6" class="panel-collapse collapse">
				<div class="panel-body">
					<div class="panel-heading">
						<button type="button" class="btn btn-primary pull-right" onclick="admore('productBand', 'Thêm mới thông tin dây đeo', '#band', '#btnSaveBand')">Thêm mới thông tin dây đeo</button>
						<button id="btnSaveBand" style="display: none" type="button" class="btn btn-primary pull-right" onclick="saveData('productBand','band', 'Thêm mới thông tin dây đeo', 'btnSaveBand')">Lưu thông tin</button>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover" id="band">
								<thead>
									<tr>										
										<th>Tên loại dây đeo</th>										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php listBand($data, 'productBand', 'Thêm mới thông tin dây đeo', 'btnSaveBand'); ?> 
									</tr>									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
					Thông tin thêm</a>
				</h4>
			</div>
			<div id="collapse7" class="panel-collapse collapse">
				<div class="panel-body">
					<div class="panel-heading">
						<button type="button" class="btn btn-primary pull-right" onclick="admore('productStyle', 'Thêm mới thông tin thêm', '#style', '#btnSaveStyle')">Thêm mới thông tin thêm</button>
						<button id="btnSaveStyle" style="display: none" type="button" class="btn btn-primary pull-right" onclick="saveData('productStyle','style', 'Thêm mới thông tin thêm', 'btnSaveStyle')">Lưu thông tin</button>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover" id="style">
								<thead>
									<tr>										
										<th>Thông tin thêm</th>										
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<?php listStyles($data, 'productStyle', 'Thêm mới thông tin thêm', 'btnSaveStyle'); ?> 
									</tr>									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>	<!--/.main-->
<!-- =====================================main content - noi dung chinh trong chu -->
<script type="text/javascript">

    function admore(inputName, placeholderDisplay, idTables, idBtnSave)
    {
    	var html = "<td><input name=\""+inputName+"\" type=\"text\" placeholder=\""+placeholderDisplay+"\" class=\"form-control input-md\"  /></td>";
		html += "<td class=\"list_td aligncenter\">";
    	html += "<button class=\"glyphicon glyphicon-remove\" onclick=\"removeRow(this, \'"+inputName+"\', \'"+idBtnSave+"\')\"> </button></td>";
		$(idTables+ ' > tbody:last-child').append('<tr>' +html+'</tr>');
	    $(idBtnSave).css('display' , 'block');
    }

    function removeRow(element, inputName, namebtnSave)
    {
    	var statusBtnSave;
		$(element).parent().parent().remove();
		statusBtnSave = $('[name='+ inputName +']').length;
		if(statusBtnSave == 0){
			$(namebtnSave).css('display' , 'none');
		}
    }

    function saveData(inputName, idTable, placeholderDisplay, namebtnSave)
    {
    	var arrayDatas = new Array();
    	var brands = new Array();
    	var jsonBrands;
    	var html = "";
    	var updateBrands;
    	var id;
    	
    	$('[name='+ inputName +']').each(function() {
    		if($(this).val()){
    			id = $(this).attr('data-id');
    			if(id == undefined){
    				brands.push($(this).val());
    			}
    			else{
    				brands.push($(this).val() + '@@@' +id);
    			}
    				
    		}
		});

		arrayDatas.push({
			'name'  : inputName,
			'value' : brands
		});

		$('[name='+ inputName +']').each(function() {
    		if($(this).val())
    		{
    			id = $(this).attr('data-id');
    			if(id == undefined){
    				$(this).parent().parent().remove();
    			}else{
    				$(this).parent().html("<strong style=\"color:blue;\">" + $(this).val() + "</strong>");
    			}
    		}
    		else{
				alert("Bạn chưa nhập thông tin");
				return;
			}
		});

    	if(arrayDatas.length > 0){
    		jsonBrands = JSON.stringify(arrayDatas);
    	}
		else{
			alert("Lưu không thành công");
			return;
		}
    	$.ajax({
    		method: "POST",
	       	url: "/admin/danhmuc/addBrand",
	       	data:{ brands: jsonBrands, _token: "{{csrf_token()}}"}
    	})
		.done(function(msg){
			updateBrands = JSON.parse(msg);
			for(var i=0; i< updateBrands.length; i++)
			{
				if(updateBrands[i]["isUpdate"]){
					continue;
				}
				html = "<tr>";
				html += "<td ><strong style=\"color:blue;\">" + updateBrands[i]["name"]+ "</strong></td>";
				html += '<td class="list_td aligncenter">';
				html += '<a href="javascript:void(0)" onclick=\"edit('+updateBrands[i]["id"]+', this, \''+inputName+'\', \''+placeholderDisplay+'\', \''+namebtnSave+'\')\" title="Sửa"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;';
				html += '<a href="javascript:void(0)" onclick=\"deleteData('+updateBrands[i]["id"]+', this, \''+inputName+'\')\" title="Xóa" onclick="return xacnhan(\'Xóa danh mục này ?\') "><span class="glyphicon glyphicon-remove"></span></a>';
			    html += '</td></tr>';
				$('#'+idTable+' > tbody:last-child').append(html);
				$('#' +namebtnSave).css('display' , 'none');
			}
		});
    }

    function deleteData(id, el, inputName)
    {
    	id = id +","+ inputName;
    	$.ajax({
    		method: "POST",
	       	url: "/admin/danhmuc/del",
	       	data:{ id: id, _token: "{{csrf_token()}}"}
    	})
		.done(function(msg){
			$(el).parent().parent().remove();
			alert('remove success');
		});
    }

    function edit(id, el, inputName, placeholderDisplay, namebtnSave)
    {
    	var thisElement = $(el).parent().prev();
    	var html = "<input name=\""+inputName+"\" type=\"text\" placeholder=\""+placeholderDisplay+"\" class=\"form-control input-md\"  value=\""+thisElement.text()+ "\" data-id="+id+"/>";
    	thisElement.html(html);
    	$('#' + namebtnSave).css('display' , 'block');
    }
</script>
@endsection