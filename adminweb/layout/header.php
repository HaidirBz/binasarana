<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="shortcut icon" href="../assets/dist/img/icon.png">
	<title>Aplikasi Pendaftaran & Pelatihan | Bina Sarana Mandiri</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="../assets/plugins/timepicker/bootstrap-timepicker.min.css">
	<link rel="stylesheet" href="../assets/bower_components/select2/dist/css/select2.min.css">
	<link rel="stylesheet" href="../assets/plugins/iCheck/all.css">
	<link rel="stylesheet" href="../assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript">
		function valid(){
			if(document.forgot.password.value != document.forgot.confirmpassword.value){
				alert("Password and Confirm Password Field do not match !");
				document.forgot.confirmpassword.focus();
				return false;
			}
			else if(document.forgot.password.value == ''){
				alert("Password Field is empty !");
				document.forgot.password.focus();
				return false;
			}
			return true;
		}
	</script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<?php  
	date_default_timezone_set('ASIA/JAKARTA');
	?>
	<div class="wrapper">
		<header class="main-header">
			<a href="home.php" class="logo">
				<span class="logo-mini"><b>BSM</b></span>
				<span class="logo-lg"><b>Bina Sarana Mandiri</b></span>
			</a>
			<nav class="navbar navbar-static-top">
				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>

				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="../assets/dist/img/no-photo.png" class="user-image" alt="User Image">
								<span class="hidden-xs"><?php echo $_SESSION['nama_lengkap']; ?></span>
							</a>
							<ul class="dropdown-menu">
								<li class="user-header">
									<img src="../assets/dist/img/no-photo.png" class="img-circle" alt="User Image">
									<p>
										<?php echo $_SESSION['nama_lengkap'] . "<br>" . $_SESSION['level']; ?>
									</p>
								</li>
								<li class="user-footer">
									<div class="pull-right">
										<a href="#" onclick="confirm_logout()" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
									</div>
								</li>
							</ul>
						</li>
						<li>
							<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
						</li>
					</ul>
				</div>
			</nav>
		</header>