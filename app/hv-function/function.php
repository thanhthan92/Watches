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