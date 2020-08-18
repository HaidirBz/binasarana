<?php  
	$host	= "localhost";
	$user	= "root";
	$pass	= "";
	$db		= "binasarana";
	$connect= mysqli_connect($host, $user, $pass, $db);

	if(!$connect){
		echo "Database Tidak Terkoneksi";
	}
	else {
		mysqli_select_db($connect, $db);
	}
?>