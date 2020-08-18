<?php 
if (empty($_SESSION['user_id']) && empty($_SESSION['username'])) {
	echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
}
else{
	include "../config/changedate_function.php";
	if($_GET['act'] == "insert"){
		$pelatih_id		= $_POST["pelatih_id"];
		$username		= $_POST["username"];
		$password 		= "bsm#" . $username;
		$password2		= md5($password);
		$nama_pelatih	= $_POST["nama_pelatih"];
		$jk				= $_POST["jk"];
		$email			= $_POST["email"];
		$no_hp			= $_POST["no_hp"];

		if(empty($username) || empty($nama_pelatih) || empty($jk) || empty($email) || empty($no_hp)){
			echo "<script>alert('Data gagal disimpan.');";
			echo "document.location='home.php?module=data-pelatih&form=add';</script>";
		}
		else{
			$cek_data_username = mysqli_num_rows(mysqli_query($connect, "SELECT username FROM user WHERE username='$username'"));
			if($cek_data_username > 0){
				echo "<script>alert('Username sudah dipakai. Ulangi Lagi');";
				echo "document.location='home.php?module=data-pelatih&form=add';</script>";
			}
			else{
				$save_user	= mysqli_query($connect, "INSERT INTO user VALUES('','$username','$password2','Pelatih')");

				$sql_user = mysqli_fetch_array(mysqli_query($connect, "SELECT user_id FROM user WHERE username='$username'"));

				$save = mysqli_query($connect, "INSERT INTO pelatih SET pelatih_id='$pelatih_id', user_id='$sql_user[user_id]', nama_pelatih='$nama_pelatih', jk='$jk', email='$email', no_hp='$no_hp'");
				if($save){
					echo "<script>alert('Data berhasil disimpan.');";
					echo "document.location='home.php?module=data-pelatih';</script>";
				}
				else{
					echo "<script>alert('Data gagal disimpan.');";
					echo "document.location='home.php?module=data-pelatih&form=add';</script>";
				}
			}
		}
	}
	else if($_GET['act'] == "update"){
		$username		= $_POST["username"];
		$nama_pelatih	= $_POST["nama_pelatih"];
		$jk				= $_POST["jk"];
		$email			= $_POST["email"];
		$no_hp			= $_POST["no_hp"];

		if(empty($username) || empty($nama_pelatih) || empty($jk) || empty($email) || empty($no_hp)){
			echo "<script>alert('Data gagal diedit.');";
			echo "document.location='home.php?module=data-pelatih&form=edit&pelatihID=$id';</script>";
		}
		else{

			$cek_data  	= mysqli_query($connect, "SELECT username FROM user WHERE username='$username'");
			$jml_data	= mysqli_num_rows($cek_data);
			$lihat_data = mysqli_fetch_array($cek_data);

			$cek_data2	= mysqli_fetch_array(mysqli_query($connect, "SELECT b.username FROM pelatih a JOIN user b ON(a.user_id=b.user_id) WHERE a.pelatih_id='$id'"));

			if(($jml_data>0) &&($lihat_data['username'] != $cek_data2['username'])){
				echo "<script>alert('Username sudah dipakai. Ulangi Lagi');";
				echo "document.location='home.php?module=data-pelatih&form=edit&pelatihID=$id';</script>";
			}
			else{
				$sql_user 	= mysqli_fetch_array(mysqli_query($connect, "SELECT user_id FROM pelatih WHERE pelatih_id='$id'"));
				$save_user	= mysqli_query($connect, "UPDATE user SET username='$username' WHERE user_id='$sql_user[user_id]'");
				$save = mysqli_query($connect, "UPDATE pelatih SET nama_pelatih='$nama_pelatih', jk='$jk', email='$email', no_hp='$no_hp' WHERE pelatih_id='$id'");
				if($save && $save_user){
					echo "<script>alert('Data berhasil diedit.');";
					echo "document.location='home.php?module=data-pelatih';</script>";
				}
				else{
					echo "<script>alert('Data gagal diedit.');";
					echo "document.location='home.php?module=data-pelatih&form=edit&pelatihID=$id';</script>";
				}	
			}
		}			
	}
	else if($_GET['act'] == "delete"){
		if(isset($_GET['pelatihID'])){
			$id2 = $_GET['pelatihID'];
			$sql_user = mysqli_fetch_array(mysqli_query($connect, "SELECT user_id FROM pelatih WHERE pelatih_id='$id2'"));

			$delete = mysqli_query($connect, "DELETE FROM user WHERE user_id='$sql_user[user_id]'");
			echo "<script>alert('Data berhasil dihapus.');";
			echo "document.location='home.php?module=data-pelatih';</script>";
		}
	}
	else if($_GET['act'] == "change-password"){
		if(isset($_GET["pelatihID"])){
			$password 	= md5($_POST['password']);
			$sql_user = mysqli_fetch_array(mysqli_query($connect, "SELECT user_id FROM pelatih WHERE pelatih_id='$id'"));
			$change = mysqli_query($connect, "UPDATE user SET password='$password' WHERE user_id='$sql_user[user_id]'");
			echo "<script>alert('Password berhasil diubah.');";
			echo "document.location='home.php?module=data-pelatih';</script>";
		}
	}
} 

?>