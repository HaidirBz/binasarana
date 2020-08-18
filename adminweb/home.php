<?php
include "../config/connection.php";
session_start();

if (empty($_SESSION['user_id']) && empty($_SESSION['username'])) {
	echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
}
include "layout/header.php";
include "layout/sidebar.php";
include "../route.php";
include "layout/content.php";
include "layout/footer.php";
if(!isset($_SESSION['user_id'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}

?>