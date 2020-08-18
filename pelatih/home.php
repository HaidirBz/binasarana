<?php
include "../config/connection.php";
session_start();
include "layout/header.php";
include "layout/sidebar.php";
include "../route.php";
include "layout/content.php";
include "layout/footer.php";

if(!isset($_SESSION['user_id'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php'>";
}
?>