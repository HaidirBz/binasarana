<?php 
if (empty($_SESSION['user_id']) && empty($_SESSION['username'])) {
	echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
}
else{
	include "../config/autoid_function.php";
	include "../config/changedate_function.php";
	if($_GET['act'] == "insert"){
		$program_id		= $_POST["program_id"];
		$ruangan		= $_POST["ruangan"];
		$nama_program	= $_POST["nama_program"];
		$hari2			= implode(',', $_POST["hari"]);
		$jam_mulai		= $_POST["jam_mulai"];
		$jam_akhir		= $_POST["jam_akhir"];
		$kapasitas		= $_POST["kapasitas"];
		$jml_pertemuan	= $_POST["jml_pertemuan"];
		$rupiah			= $_POST["harga"];
		$harga 			= substr(str_replace(".", "", $rupiah),3);
		$tgl_mulai		= ubahTanggal($_POST['tgl_mulai']);

		if(empty($nama_program) || empty($ruangan) || empty($hari2) || empty($jam_mulai) || empty($jam_akhir)|| empty($kapasitas) || empty($jml_pertemuan) || empty($rupiah) || empty($_POST['tgl_mulai'])){

			echo "<script>alert('Data gagal disimpan.');";
			echo "document.location='home.php?module=data-program&form=add';</script>";
		}
		else{
			$save_program = mysqli_query($connect, "INSERT INTO program_kursus SET program_id='$program_id', ruangan='$ruangan', nama_program='$nama_program',hari='$hari2', jam_mulai='$jam_mulai', jam_akhir='$jam_akhir', kapasitas='$kapasitas',jml_pertemuan='$jml_pertemuan',harga='$harga',tgl_mulai='$tgl_mulai'");
		$count_hari = COUNT($_POST['hari']);
		$hari3 = $_POST['hari'];
		if($save_program){

			for($k=0; $k<$count_hari; $k++){
				$save_pelatihan = mysqli_query($connect, "INSERT pelatihan SET program_id='$program_id', hari='$hari3[$k]'");
			}
			

			$jml_pertemuan = mysqli_fetch_array(mysqli_query($connect, "SELECT jml_pertemuan,hari AS 'hari2' FROM program_kursus WHERE program_id='$program_id'"));
			for($i=0; $i<$jml_pertemuan['jml_pertemuan']; $i++){
				for($j=0; $j<7; $j++){
					$hari[$i] = ($j)+($i*7);
					$data2 = mysqli_fetch_array(mysqli_query($connect, "
						SELECT 
						date_add(tgl_mulai, interval +$hari[$i] day) AS 'tgl',
						dayname(date_add(tgl_mulai, interval +$hari[$i] day)) AS 'hari' 
						FROM 
						program_kursus 
						WHERE 
						program_id='$program_id'"));
					$data_hari = ubahHari($data2['hari']);
					$day2 = explode(',', $jml_pertemuan['hari2']);
					for($k=0; $k<count($day2); $k++){
						if($day2[$k] == $data_hari){
							$save = mysqli_query($connect, "INSERT INTO jadwal VALUES('','$program_id','$data_hari','$data2[tgl]')");
						}
					}
				}
			}
			if($save){
				echo "<script>alert('Data berhasil disimpan.');";
				echo "document.location='home.php?module=data-program';</script>";
			}
			else{
				$delete = mysqli_query($connect, "DELETE FROM program_kursus WHERE program_id='$program_id'");

				echo "<script>alert('Data gagal disimpan.');";
				echo "document.location='home.php?module=data-program&form=add';</script>";
			}
		}

		}	
	}
	else if($_GET['act'] == "update"){
		$programID 		= $_GET["programID"];
		$ruangan		= $_POST["ruangan"];
		$nama_program	= $_POST["nama_program"];
		$hari2			= implode(',', $_POST["hari"]);
		$jam_mulai		= $_POST["jam_mulai"];
		$jam_akhir		= $_POST["jam_akhir"];
		$kapasitas		= $_POST["kapasitas"];
		$jml_pertemuan	= $_POST["jml_pertemuan"];
		$rupiah			= $_POST["harga"];
		$harga 			= substr(str_replace(".", "", $rupiah),3);
		$tgl_mulai		= ubahTanggal($_POST['tgl_mulai']);

		if(empty($nama_program) || empty($ruangan) || empty($hari2) || empty($jam_mulai) || empty($jam_akhir) || empty($kapasitas) || empty($jml_pertemuan) || empty($rupiah) || empty($_POST['tgl_mulai'])){
			
			echo "<script>alert('Data gagal diedit.');";
			echo "document.location='home.php?module=data-program&form=edit&programID=$programID';</script>";
		}
		else{
			$save = mysqli_query($connect, "UPDATE program_kursus SET nama_program='$nama_program', ruangan='$ruangan', hari='$hari2', jam_mulai='$jam_mulai',jam_akhir='$jam_akhir', kapasitas='$kapasitas', jml_pertemuan='$jml_pertemuan', harga='$harga', tgl_mulai='$tgl_mulai' WHERE program_id='$programID'");

			$lihat_data = mysqli_fetch_array(mysqli_query($connect, "SELECT hari, jml_pertemuan FROM program_kursus WHERE program_id='$programID'"));
			if($lihat_data['hari'] != $hari2 || $lihat_data['jml_pertemuan'] != $jml_pertemuan){
				$delete = mysqli_query($connect, "DELETE FROM jadwal WHERE program_id='$programID'");
				if($delete){
					$jml_pertemuan = mysqli_fetch_array(mysqli_query($connect, "SELECT jml_pertemuan,hari AS 'hari2' FROM program_kursus WHERE program_id='$programID'"));
					for($i=0; $i<$jml_pertemuan['jml_pertemuan']; $i++){
						for($j=0; $j<7; $j++){
							$hari[$i] = ($j)+($i*7);
							$data2 = mysqli_fetch_array(mysqli_query($connect, "
								SELECT 
								date_add(tgl_mulai, interval +$hari[$i] day) AS 'tgl',
								dayname(date_add(tgl_mulai, interval +$hari[$i] day)) AS 'hari' 
								FROM 
								program_kursus 
								WHERE 
								program_id='$programID'"));
							$data_hari = ubahHari($data2['hari']);
							$day2 = explode(',', $jml_pertemuan['hari2']);
							for($k=0; $k<count($day2); $k++){
								if($day2[$k] == $data_hari){
									$save = mysqli_query($connect, "INSERT INTO jadwal VALUES('','$programID','$data_hari','$data2[tgl]')");
								}
							}
						}
					}
				}
			}
			if($save){					
				echo "<script>alert('Data berhasil diedit.');";
				echo "document.location='home.php?module=data-program';</script>";
			}
			else{
				echo "<script>alert('Data gagal diedit.');";
				echo "document.location='home.php?module=data-program&form=edit&programID=$programID';</script>";
			}
		}
	}
	else if($_GET['act'] == "delete"){
		$id2 = $_GET['programID'];
		$delete = mysqli_query($connect, "DELETE FROM program_kursus WHERE program_id='$id2'");
		if($delete){
			echo "<script>alert('Data berhasil dihapus.');";
			echo "document.location='home.php?module=data-program';</script>";
			exit();
		}
	}
} 

?>