<?php 
	function MenuMulti($data,$parent_id ,$str='---| ',$select)
	{
		foreach ($data as $val) {
			$id = $val["id"];
			$ten= $val["name"];
			if ($val['parent_id'] == $parent_id) {
				// print_r($select);  exit();
				if ($select!=0 && $id == $select) {
					echo '<option value="'.$id.'" selected >'.$str." ".$ten.'</option>';
				}	else {
					echo '<option value="'.$id.'">'.$str." ".$ten.'</option>';
				}			
				MenuMulti($data,$id,$str.'---|',$select);
			}			
		}
	}
	
	function listcate ($data,$parent_id =0,$str="")
	{
		foreach ($data as $val) {
			$id = $val["id"];
			$ten= $val["name"];
			if ($val['parent_id'] == $parent_id) {
				echo '<tr>';
				if ($str =="") {
						echo '<td ><strong>'.$id.'</strong></td>';
						echo '<td ><strong style="color:blue;">'.$str.'- '.$ten.'</strong></td>';
					} else {
						echo '<td ><strong>'.$id.'</strong></td>';
						echo '<td style="color:green;">'.$str.'--|'.$ten.'</td>';
					}	
			echo '<td class="list_td aligncenter">
		            <a href="../admin/danhmuc/edit/'.$id.'" title="Sửa"><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;&nbsp;
		            <a href="../admin/danhmuc/del/'.$id.'" title="Xóa" onclick="return xacnhan(\'Xóa danh mục này ?\') "> <span class="glyphicon glyphicon-remove"></span> </a>
			      </td>    
			    </tr>';
			    listcate ($data,$id,$str." ---| ");
			}
		}		
	}

	function listBrands($data, $nameModel, $placeholderDisplay, $namebtnSave)
	{	
		if(isset($data['brands']))
		{
			addDataToTable($data['brands'], $nameModel, $placeholderDisplay, $namebtnSave);
		}
	}

	function listSeries($data, $nameModel, $placeholderDisplay, $namebtnSave)
	{	
		if(isset($data['series']))
		{	
			addDataToTable($data['series'], $nameModel, $placeholderDisplay, $namebtnSave);
		}	
	}

	function listMovement($data, $nameModel, $placeholderDisplay, $namebtnSave)
	{	
		if(isset($data['movements']))
		{	
			addDataToTable($data['movements'], $nameModel, $placeholderDisplay, $namebtnSave);
		}	
	}

	function listCase($data, $nameModel, $placeholderDisplay, $namebtnSave)
	{	
		if(isset($data['cases']))
		{	
			addDataToTable($data['cases'], $nameModel, $placeholderDisplay, $namebtnSave);
		}	
	}

	function listDial($data, $nameModel, $placeholderDisplay, $namebtnSave)
	{	
		if(isset($data['dials']))
		{	
			addDataToTable($data['dials'], $nameModel, $placeholderDisplay, $namebtnSave);
		}	
	}

	function listBand($data, $nameModel, $placeholderDisplay, $namebtnSave)
	{	
		if(isset($data['bands']))
		{	
			addDataToTable($data['bands'], $nameModel, $placeholderDisplay, $namebtnSave);
		}	
	}

	function listStyles($data, $nameModel, $placeholderDisplay, $namebtnSave)
	{	
		if(isset($data['styles']))
		{	
			addDataToTable($data['styles'], $nameModel, $placeholderDisplay, $namebtnSave);
		}	
	}

	function addDataToTable($dataChild, $nameModel, $placeholderDisplay, $namebtnSave)
	{	
		
		foreach($dataChild as $val) {
			if(isset($val["name"]) && !empty($val["name"]))
			{
				$id  = $val["id"];
				$ten = $val["name"];
				echo '<tr>';
				echo '<td ><strong style="color:blue;">' . $ten . '</strong></td>';
				echo '<td class="list_td aligncenter">
			            <a href="javascript:void(0)" onclick="edit('.$id.', this, \''.$nameModel.'\', \''.$placeholderDisplay.'\', \''.$namebtnSave.'\')" title="Sửa" onclick=""><span class="glyphicon glyphicon-edit"></span></a>&nbsp;&nbsp;&nbsp;
			            <a href="javascript:void(0)" onclick="deleteData('.$id.', this, \''.$nameModel.'\')" title="Xóa" onclick="return xacnhan(\'Xóa danh mục này ?\') "> <span class="glyphicon glyphicon-remove"></span> </a>
		      		  </td>    
			    	</tr>';
			}
		}
	}

?>

<?php
	function create1productitem($data) {
		$images = unserialize($data->images);
		if(empty($images)) {
			return;
		}
		
		$url = url('/chi-tiet/' . $data->slug . '-' . $data->id . '.html');

		$html  = '<li class="col-xs-6 col-sm-6 col-md-3" style="margin-bottom: 50px">';
    	$html .= '<div class="productImg">';
        $html .= '<a href="' . $url . '" title="' . $data->name . '" class="product-image">';
        $html .= '<img src="' . url('uploads/products/details/' . $images[0]) . '" class="images-list-item">';
        $html .= '</a>';
	    $html .= '<h2 class="product-name">';
	    $html .= '<a href="' . $url . '" title="' . $data->name . '"><strong></strong><span>' . $data->name . '</span></a>';
	    $html .= '</h2>';
	    $html .= '<div class="price-box">';

	    if (!$data->discount) {
	    	$data->discount = 0;
	    }
    	$html .= '<span class="regular-price">';
    	$html .= '<span id="product-price-1" class="price">' . number_format($data->price * (100 - $data->discount) / 100, 0, ',', '.') . ' VNĐ</span>';
    	$html .= '</span>';
	    if ($data->discount) {
		    $html .= '<span class="old_price">' . number_format($data->price, 0, ',', '.') . ' VNĐ</span>';
		    $html .= '<span class="save">';
		    $html .= '<span class="savePr">Tiết kiệm ' . number_format($data->price * $data->discount / 100, 0, ',', '.') . 'VNĐ (' . $data->discount . '%)</span>';
		    $html .= '</span>';
		}
	    $html .= '</div>';
		$html .= '</li>';

		echo $html;
	}
?>