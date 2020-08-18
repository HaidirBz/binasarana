<?php
function autoid($column, $table){
	include "connection.php";
	$sql 	= "SELECT MAX($column) AS 'Code' FROM $table";
	$hasil	= mysqli_query($connect, $sql);
	$data 	= mysqli_fetch_array($hasil);

	$autoID = $data["Code"];
	++$autoID;

	return $autoID;  
}

function autoreg($column, $table){
	include "connection.php";
	$sql 	= mysqli_query($connect, "SELECT MAX($column) AS 'Code' FROM $table");
	$data 	= mysqli_fetch_array($sql);

	if(is_null($data['Code'])){
		$autoID	= "BSM" . date("Y") . "001";
	}
	else{
		$autoID = $data["Code"];
		++$autoID;
	}
	return $autoID;  
}

function auto_username($level){
	include "connection.php";
	$sql 	= "SELECT MAX(username) AS 'Code' FROM user WHERE level='$level'";
	$hasil	= mysqli_query($connect, $sql);
	$data 	= mysqli_fetch_array($hasil);

	$auto_username = $data["Code"];
	++$auto_username;

	return $auto_username;  
}
?>