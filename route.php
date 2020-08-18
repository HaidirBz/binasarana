<?php
if(isset($_GET['page_id'])){
	if($_GET['page_id'] == "login"){
		echo "<meta http-equiv='refresh' content='0; url=login.php'>";
	}
	else if($_GET['page_id'] == "2"){
		include "register.php";
		exit(); 
		
	}	
}

	//ROUTE FOR ALL PRIVILEGES
if(isset($_GET['module'])){
	//Halaman Logout
	if($_GET['module'] == "logout"){ 
		include "logout.php";		
		exit(); 
	}

	//ROUTE FOR ADMIN
	//Data Admin
	if($_GET['module'] == "data-user"){ 
		if(isset($_GET['form'])){
			$form = $_GET['form'];
			if(isset($_GET['userID'])){
				$id = $_GET['userID'];
			}
			include "admin/user_data_form.php";			
			exit();
		}
		else if(isset($_GET['act'])){
			$act = $_GET['act'];
			if(isset($_GET['userID'])){
				$id = $_GET['userID'];
			}
			include "admin/user_data_process.php";			
			exit();
		}
		else{
			include "admin/user_data_view.php";		
			exit();
		}
	}
	//Data Admin
	if($_GET['module'] == "data-admin"){ 
		if(isset($_GET['form'])){
			$form = $_GET['form'];
			if(isset($_GET['adminID'])){
				$id = $_GET['adminID'];
			}
			include "admin/admin_data_form.php";			
			exit();
		}
		else if(isset($_GET['act'])){
			$act = $_GET['act'];
			if(isset($_GET['adminID'])){
				$id = $_GET['adminID'];
			}
			include "admin/admin_data_process.php";			
			exit();
		}
		else{
			include "admin/admin_data_view.php";		
			exit();
		}
	}

	//Data Pelatih
	else if($_GET['module'] == "data-pelatih"){ 
		if(isset($_GET['form'])){
			$form = $_GET['form'];
			if(isset($_GET['pelatihID'])){
				$id = $_GET['pelatihID'];
			}
			include "admin/pelatih_data_form.php";			
			exit();
		}
		else if(isset($_GET['act'])){
			$act = $_GET['act'];
			if(isset($_GET['pelatihID'])){
				$id = $_GET['pelatihID'];
			}
			include "admin/pelatih_data_process.php";			
			exit();
		}
		else{
			include "admin/pelatih_data_view.php";		
			exit();
		}
	}

	//Data Peserta
	else if($_GET['module'] == "data-peserta"){ 
		if(isset($_GET['form'])){
			$form = $_GET['form'];
			if(isset($_GET['pesertaID'])){
				$id = $_GET['pesertaID'];
			}
			include "admin/peserta_data_form.php";			
			exit();
		}
		else if(isset($_GET['act'])){
			$act = $_GET['act'];
			if(isset($_GET['pesertaID'])){
				$id = $_GET['pesertaID'];
			}
			include "admin/peserta_data_process.php";			
			exit();
		}
		else{
			include "admin/peserta_data_view.php";		
			exit();
		}
	}

	
	//Data Ruang
	else if($_GET['module'] == "data-ruang"){ 
		if(isset($_GET['form'])){
			$form = $_GET['form'];
			if(isset($_GET['ruangID'])){
				$id = $_GET['ruangID'];
			}
			include "admin/ruang_data_form.php";			
			exit();
		}
		else if(isset($_GET['act'])){
			$act = $_GET['act'];
			if(isset($_GET['ruangID'])){
				$id = $_GET['ruangID'];
			}
			include "admin/ruang_data_process.php";			
			exit();
		}
		else{
			include "admin/ruang_data_view.php";		
			exit();
		}
	}
	//Data Program Kursus
	if($_GET['module'] == "data-program"){ 
		if(isset($_GET['form'])){
			$form = $_GET['form'];
			if(isset($_GET['programID'])){
				$id = $_GET['programID'];
			}
			include "admin/program_data_form.php";			
			exit();
		}
		else if(isset($_GET['act'])){
			$act = $_GET['act'];
			if(isset($_GET['programID'])){
				$id = $_GET['programID'];
			}
			include "admin/program_data_process.php";			
			exit();
		}
		else{
			include "admin/program_data_view.php";		
			exit();
		}
	}

	//Data Pendaftaran
	else if($_GET['module'] == "data-pendaftaran"){ 
		if(isset($_GET['form'])){
			$form = $_GET['form'];
			if(isset($_GET['regID'])){
				$id = $_GET['regID'];
			}
			include "admin/pendaftaran_data_form.php";			
			exit();
		}
		else if(isset($_GET['act'])){
			$act = $_GET['act'];
			if(isset($_GET['regID'])){
				$id = $_GET['regID'];
			}
			include "admin/pendaftaran_data_process.php";			
			exit();
		}
		else{
			include "admin/pendaftaran_data_view.php";		
			exit();
		}
	}
	//Data Jadwal
	else if($_GET['module'] == "data-jadwal"){
		include "admin/jadwal_data_view.php";		
		exit();
	}

	//Data Pelatihan
	else if($_GET['module'] == "data-pelatihan"){ 
		if(isset($_GET['form'])){
			$form = $_GET['form'];
			if(isset($_GET['programID'])){
				$id = $_GET['programID'];
			}
			include "admin/pelatihan_data_form.php";			
			exit();
		}
		else if(isset($_GET['act'])){
			$act = $_GET['act'];
			if(isset($_GET['pelatihanID'])){
				$id = $_GET['pelatihanID'];
			}
			include "admin/pelatihan_data_process.php";			
			exit();
		}
		else{
			include "admin/pelatihan_data_view.php";
			exit();		
		}
	}

	//Data Pelatihan
	else if($_GET['module'] == "data-pelatihan-per-program"){ 
			include "admin/pelatihan_data_per_program_view.php";
			exit();		
	}
}
if(isset($_GET['page'])){
	if($_GET['page'] == "jadwal-pelatihan"){ 
		if(isset($_GET['id'])){
			$id = $_GET['id'];		
		}
		include "pelatih/pelatihan_view.php";
		exit();
	}
	else if($_GET['page'] == "print-jadwal"){
		$pelatihanID	= $_GET['pelatihanID'];
		echo "<script>document.location='laporan/jadwal_pelatihan_print.php?pelatihanID=$pelatihanID';</script>";
	}
	else if($_GET['page'] == "print-absen"){
		$pelatihanID	= $_GET['pelatihanID'];
		echo "<script>document.location='laporan/absen_pelatihan_print.php?pelatihanID=$pelatihanID';</script>";
	}
	else if($_GET['page'] == "jadwal-pelatihan-peserta"){ 
		if(isset($_GET['id'])){
			$id = $_GET['id'];		
		}
		include "peserta/pelatihan_view.php";
		exit();
	}
	else if($_GET['page'] == "print-jadwal-peserta"){
		$pendaftaranID	= $_GET['pendaftaranID'];
		echo "<script>document.location='laporan/jadwal_pelatihan_print.php?pendaftaranID=$pendaftaranID';</script>";
	}
}
?>