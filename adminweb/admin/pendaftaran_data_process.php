<?php 
if (empty($_SESSION['user_id']) && empty($_SESSION['username'])) {
	echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
}
else{
	if($_GET['act'] == "insert"){
		include "../config/autoid_function.php";
		if(isset($_POST["Save"])){
			$nama_peserta	= $_POST["nama_peserta"];
			$email			= $_POST["email"];
			$no_hp			= $_POST["no_hp"];
			$jk				= $_POST["jk"];
			$program_id		= $_POST["program_id"];
			$pesan 			= $_POST['pesan'];
			$status 		= "Non-Aktif";
			$pembayaran		= $_POST['pembayaran'];
			$tgl_daftar		= date('Y-m-d H:i:s');
			$regID			= autoreg('pendaftaran_id', 'pendaftaran');
			$password		= md5($regID);

			if(empty($nama_peserta) || empty($email) || empty($no_hp) || empty($program_id)){
				echo "<script>alert('Data gagal disimpan.');";
				echo "document.location='home.php?module=data-pendaftaran&form=add';</script>";
			}
			else{
				$save_user	= mysqli_query($connect, "INSERT INTO user VALUES('','$regID','$password','Peserta')");
				if($save_user){
					$sql_user = mysqli_fetch_array(mysqli_query($connect, "SELECT user_id FROM user WHERE username='$regID'"));
					$save_peserta	= mysqli_query($connect, "INSERT INTO peserta VALUES('','$sql_user[user_id]','$nama_peserta','$email','$no_hp','$jk')");

					if($save_peserta){
						$sql_peserta = mysqli_fetch_array(mysqli_query($connect, "SELECT a.peserta_id FROM peserta a JOIN user b ON(a.user_id=b.user_id) WHERE b.username='$regID'"));

						$save = mysqli_query($connect, "INSERT INTO pendaftaran SET pendaftaran_id='$regID', peserta_id='$sql_peserta[peserta_id]', program_id='$program_id', pesan='$pesan', pembayaran='$pembayaran', status='$status', tgl_daftar='$tgl_daftar'");
						if($save){
							echo "<script>alert('Data berhasil disimpan.');";
							echo "document.location='home.php?module=data-pendaftaran';</script>";
						}
						else{
							echo "<script>alert('Data gagal disimpan.');";
							echo "document.location='home.php?module=data-pendaftaran&form=add';</script>";
						}
					}
				}
			}
		}
	}
	else if($_GET['act'] == "update"){
		$nama_peserta	= $_POST["nama_peserta"];
		$email			= $_POST["email"];
		$no_hp			= $_POST["no_hp"];
		$jk				= $_POST["jk"];
		$program_id		= $_POST["program_id"];
		$pesan 			= $_POST['pesan'];
		$pembayaran		= $_POST['pembayaran'];
		$status 		= $_POST['status'];

		if(empty($nama_peserta) || empty($email) || empty($no_hp) || empty($program_id)){
			echo "<script>alert('Data gagal diedit.');";
			echo "document.location='home.php?module=data-pendaftaran&form=edit&regID=$id';</script>";
		}
		else{
			$sql = mysqli_fetch_array(mysqli_query($connect, "SELECT peserta_id FROM pendaftaran WHERE pendaftaran_id='$id'"));

			$save_peserta = mysqli_query($connect, "UPDATE peserta SET nama_peserta='$nama_peserta', email='$email', no_hp='$no_hp', jk='$jk' WHERE peserta_id='$sql[peserta_id]'");
			
			if($save_peserta){
				$save = mysqli_query($connect, "UPDATE pendaftaran SET program_id='$program_id', pesan='$pesan', pembayaran='$pembayaran', status='$status' WHERE pendaftaran_id='$id'");

				if($save){
					echo "<script>alert('Data berhasil diedit.');";
					echo "document.location='home.php?module=data-pendaftaran';</script>";
				}
				else{
					echo "<script>alert('Data gagal diedit.');";
					echo "document.location='home.php?module=data-pendaftaran&form=edit&regID=$id';</script>";
				}
			}
		}	
	}
	else if($_GET['act'] == "delete"){
		if(isset($_GET['regID'])){
			$id2 = $_GET['regID'];
			$sql_user = mysqli_fetch_array(mysqli_query($connect, "SELECT user_id FROM user WHERE username='$id2'"));
			$delete = mysqli_query($connect, "DELETE FROM user WHERE user_id='$sql_user[user_id]'");
			if($delete){
				echo "<script>alert('Data berhasil dihapus.');";
				echo "document.location='home.php?module=data-pendaftaran';</script>";
				exit();
			}
		}
	}
	else if($_GET['act'] == "konfirmasi"){
		if(isset($_GET['regID'])){
			$id2 = $_GET['regID'];
			$status = mysqli_query($connect, "UPDATE pendaftaran SET status='Aktif' WHERE pendaftaran_id='$id2'");
			if($status){
				echo "<script>alert('Pendaftaran berhasil dikonfirmasi.');";
				echo "document.location='home.php?module=data-pendaftaran';</script>";
				exit();
			}
		}
	}
} 

?>