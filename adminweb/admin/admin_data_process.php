<?php 
if (empty($_SESSION['user_id']) && empty($_SESSION['username'])) {
	echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
}
else{
	if($_GET['act'] == "insert"){
		$admin_id		= $_POST["admin_id"];
		$username		= $_POST["username"];
		$password 		= md5($username);
		$nama_lengkap	= $_POST["nama_lengkap"];
		$no_hp			= $_POST["no_hp"];

		if(empty($username) || empty($nama_lengkap)){
			echo "<script>alert('Data gagal disimpan.');";
			echo "document.location='home.php?module=data-admin&form=add';</script>";
		}
		else{
			$cek_data_username = mysqli_num_rows(mysqli_query($connect, "SELECT username FROM user WHERE username='$username'"));
			if($cek_data_username > 0){
				echo "<script>alert('Username sudah dipakai. Ulangi Lagi');";
				echo "document.location='home.php?module=data-admin&form=add';</script>";
			}
			else{
				$save_user	= mysqli_query($connect, "INSERT INTO user VALUES('','$username','$password','Admin')");

				if($save_user){
					$sql_user = mysqli_fetch_array(mysqli_query($connect, "SELECT user_id FROM user WHERE username='$username'"));

					$save = mysqli_query($connect, "INSERT INTO admin SET admin_id='$admin_id', user_id='$sql_user[user_id]', nama_lengkap='$nama_lengkap', no_hp='$no_hp'");

					if($save){
						echo "<script>alert('Data berhasil disimpan.');";
						echo "document.location='home.php?module=data-admin';</script>";
					}
					else{
						echo "<script>alert('Data gagal disimpan.');";
						echo "document.location='home.php?module=data-admin&form=add';</script>";
					}
				}
				else{
					echo "<script>alert('Data gagal disimpan.');";
					echo "document.location='home.php?module=data-admin&form=add';</script>";
				}
			}
		}
	}
	else if($_GET['act'] == "update"){
		$username		= $_POST["username"];
		$nama_lengkap	= $_POST["nama_lengkap"];
		$no_hp	= $_POST["no_hp"];

		if(empty($username) || empty($nama_lengkap) || empty($no_hp)){
			echo "<script>alert('Data gagal diedit.');";
			echo "document.location='home.php?module=data-admin&form=edit&adminID=$id';</script>";
		}
		else{
			$cek_data  	= mysqli_query($connect, "SELECT username FROM user WHERE username='$username'");
			$jml_data	= mysqli_num_rows($cek_data);
			$lihat_data = mysqli_fetch_array($cek_data);

			$cek_data2	= mysqli_fetch_array(mysqli_query($connect, "SELECT b.username FROM admin a JOIN user b ON(a.user_id=b.user_id) WHERE a.admin_id='$id'"));

			if(($jml_data>0) &&($lihat_data['username'] != $cek_data2['username'])){
				echo "<script>alert('Username sudah dipakai. Ulangi Lagi');";
				echo "document.location='home.php?module=data-admin&form=edit&adminID=$id';</script>";
			}
			else{
				if($cek_data2['username'] != $username){
					$sql_user 	= mysqli_fetch_array(mysqli_query($connect, "SELECT user_id FROM admin WHERE admin_id='$id'"));
					$save_user	= mysqli_query($connect, "UPDATE user SET username='$username' WHERE user_id='$sql_user[user_id]'");
				}
				$save = mysqli_query($connect, "UPDATE admin SET nama_lengkap='$nama_lengkap', no_hp='$no_hp' WHERE admin_id='$id'");

				if($save){
					echo "<script>alert('Data berhasil diedit.');";
					echo "document.location='home.php?module=data-admin';</script>";
				}
				else{
					echo "<script>alert('Data gagal diedit.');";
					echo "document.location='home.php?module=data-admin&form=edit&adminID=$id';</script>";
				}
			}
		}
	}
	else if($_GET['act'] == "delete"){
		$id2 = $_GET['adminID'];
		$sql_user = mysqli_fetch_array(mysqli_query($connect, "SELECT user_id FROM admin WHERE admin_id='$id2'"));
		$delete = mysqli_query($connect, "DELETE FROM user WHERE user_id='$sql_user[user_id]'");
		if($delete){
			echo "<script>alert('Data berhasil dihapus.');";
			echo "document.location='home.php?module=data-admin';</script>";
			exit();
		}
	}
	else if($_GET['act'] == "change-password"){
		$password 	= md5($_POST['password']);
		$sql_user = mysqli_fetch_array(mysqli_query($connect, "SELECT user_id FROM admin WHERE admin_id='$id'"));
		$change = mysqli_query($connect, "UPDATE user SET password='$password' WHERE user_id='$sql_user[user_id]'");
		if($change){
			echo "<script>alert('Password berhasil diubah.');";
			echo "document.location='home.php?module=data-admin';</script>";
		}
		else{
			echo "<script>alert('Password gagal diubah.');";
			echo "document.location='home.php?module=data-admin&form=change-password&adminID=$id';</script>";
		}
	}
} 
?>