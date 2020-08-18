<?php 
if (empty($_SESSION['user_id']) && empty($_SESSION['username'])) {
	echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
}
else{
	include "../config/changedate_function.php";
	if($_GET['act'] == "update"){
		$username		= $_POST["username"];
		$nama_peserta	= $_POST["nama_peserta"];
		$jk				= $_POST["jk"];
		$email			= $_POST["email"];
		$no_hp			= $_POST["no_hp"];

		if(empty($username) || empty($nama_peserta) || empty($jk) || empty($email) || empty($no_hp)){
			echo "<script>alert('Data gagal diedit.');";
			echo "document.location='home.php?module=data-peserta&form=edit&pesertaID=$id';</script>";
		}
		else{
			$cek_data  	= mysqli_query($connect, "SELECT username FROM user WHERE username='$username'");
			$jml_data	= mysqli_num_rows($cek_data);
			$lihat_data = mysqli_fetch_array($cek_data);

			$cek_data2	= mysqli_fetch_array(mysqli_query($connect, "SELECT b.username FROM peserta a JOIN user b ON(a.user_id=b.user_id) WHERE a.peserta_id='$id'"));

			if(($jml_data>0) &&($lihat_data['username'] != $cek_data2['username'])){
				echo "<script>alert('Username sudah dipakai. Ulangi Lagi');";
				echo "document.location='home.php?module=data-peserta&form=edit&pesertaID=$id';</script>";
			}
			else{
				if($cek_data2['username'] != $username){
					$sql_user 	= mysqli_fetch_array(mysqli_query($connect, "SELECT user_id FROM peserta WHERE peserta_id='$id'"));
					$save_user	= mysqli_query($connect, "UPDATE user SET username='$username' WHERE user_id='$sql_user[user_id]'");
				}
				$save = mysqli_query($connect, "UPDATE peserta SET nama_peserta='$nama_peserta', email='$email', no_hp='$no_hp',jk='$jk' WHERE peserta_id='$id'");
				if($save){
					echo "<script>alert('Data berhasil diedit.');";
					echo "document.location='home.php?module=data-peserta';</script>";
				}
				else{
					echo "<script>alert('Data gagal diedit.');";
					echo "document.location='home.php?module=data-peserta&form=edit&pesertaID=$id';</script>";
				}	
			}
		}			
	}
	else if($_GET['act'] == "delete"){
		$id2 = $_GET['pesertaID'];
		$sql_user = mysqli_fetch_array(mysqli_query($connect, "SELECT user_id FROM peserta WHERE peserta_id='$id2'"));

		$delete = mysqli_query($connect, "DELETE FROM user WHERE user_id='$sql_user[user_id]'");
		if($delete){
			echo "<script>alert('Data berhasil dihapus.');";
			echo "document.location='home.php?module=data-peserta';</script>";
			exit();
		}
	}
	else if($_GET['act'] == "change-password"){
		$password 	= md5($_POST['password']);
		$sql_user = mysqli_fetch_array(mysqli_query($connect, "SELECT user_id FROM peserta WHERE peserta_id='$id'"));
		$change = mysqli_query($connect, "UPDATE user SET password='$password' WHERE user_id='$sql_user[user_id]'");
		if($change){
			echo "<script>alert('Password berhasil diubah.');";
			echo "document.location='home.php?module=data-peserta';</script>";
		}
		else{
			echo "<script>alert('Password gagal diubah.');";
			echo "document.location='home.php?module=data-peserta&form=change-password&pesertaID=$id';</script>";
		}
	}
} 

?>