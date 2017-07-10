<?php

function isNotEmpty($arr){
	foreach($arr as $val){
		if ($val == null || $val == "")
			return false;
	}
	return true;
}

function sanitise($arr, $conn){
	$ret = array();
	if(!empty($arr)){
		foreach($arr as $key => $val){
			$ret[$key] = trim(htmlentities(mysqli_real_escape_string($conn, $val)));
		}
	}
	return $ret;
}

function eidNotDuplicate($conn, $eid){
	$query = "SELECT * FROM `employee` WHERE `empid`='{$eid}' ";
	$qres = mysqli_query($conn, $query);
	$res = mysqli_fetch_assoc($qres);
	if(empty($res))
		return true;
	else
		return false;
}
?>