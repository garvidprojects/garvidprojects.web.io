<?php
	function isEmpty($arr){
		foreach($arr as $val){
			if($val == null || $val == "")
				return true;
			return false;
		}
	}
$empid = $_SESSION['empid'];

	if(isset($_POST['psubmit'])){
		$error = array();
		$data = $_POST;
		// print_r($data);
		if(!empty($data)){
			$stype = ['jpeg', 'jpg', 'png', 'bitmap', 'svg'];
			$img = $_FILES['uimg'];
			$img_name = $img['name'];
            $tag = explode('.', $img_name);
			$imgext = end($tag);
			$img_tname = $img['tmp_name'];
			$img_size = $img['size'];
			$img_error = $img['error'];
			if($img_size > 5120){
				if(in_array($imgext, $stype)){
					if($img_error == null || $img_error == ""){
						if(!file_exists("uploads/".basename($img_name))){
							if(move_uploaded_file($img_tname, "uploads/".$img_name)){  //"uploads/".$empid."".$imgext
								extract($data);
								require 'connect.php';
								$query = "UPDATE `employee` SET `name`='{$name}',`designation`='{$desig}',`hqualification`='{$qfc}',`mno`='{$num}',`jdate`='{$starting}',`company`='{$cname}',`details`='{$dis}',`img_name`='{$img_name}' WHERE `empid`= '{$empid}' "; //
								if(mysqli_query($conn, $query)){
									$error[] = "Your profile is updated";
								} else $error[] = "Error uploading file";
							}else $error[] = "Error uploading file";
						} else $error[] = "File with same name already uploaded";
					} else $error[] = "Error has occurred";
				} else $error[] = "File type not supported";
			} else $error[] = "Too small photo";
		}
	}else {
//		header("Location:index.html");
}
?>