<?php  
include "config/connection.php";
session_start();
$username = $_POST['username'];
$password = md5($_POST['password']);

$cek_user 	= mysqli_query($connect, "SELECT * FROM user WHERE username='$username' AND password='$password'");
$hasil		= mysqli_fetch_array($cek_user);

if($username == $hasil['username'] && $password == $hasil['password']) {
	$_SESSION['user_id']		= $hasil['user_id'];
	$_SESSION['username']		= $hasil['username'];
	$_SESSION['level']			= $hasil['level'];

	if($_SESSION['level']=="Admin"){
		$nama = mysqli_fetch_array(mysqli_query($connect, "SELECT nama_lengkap FROM admin WHERE user_id='$_SESSION[user_id]'"));
		$_SESSION['nama_lengkap'] = $nama['nama_lengkap'];

		echo "<script>alert('Hai $_SESSION[nama_lengkap], Anda Berhasil Login!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=adminweb/home.php'>";
	}
	elseif($_SESSION['level']=="Peserta"){
		$nama = mysqli_fetch_array(mysqli_query($connect, "SELECT b.pendaftaran_id, a.nama_peserta,b.status FROM peserta a JOIN pendaftaran b ON(a.peserta_id=b.peserta_id) WHERE a.user_id='$_SESSION[user_id]'"));
		$_SESSION['pendaftaran_id']	= $nama['pendaftaran_id'];
		$_SESSION['nama_peserta'] 	= $nama['nama_peserta'];
		$_SESSION['status']			= $nama['status'];

		if ($_SESSION['status'] == "Non-aktif") {
			echo "<script>alert('Pendaftaran anda belum dikonfirmasi!');</script>";
			echo "<meta http-equiv='refresh' content='0; url=login.php'>";
		}
		else{
			echo "<script>alert('Hai $_SESSION[nama_peserta], Anda Berhasil Login!!');</script>";
			echo "<meta http-equiv='refresh' content='0; url=peserta/home.php'>";
		}
	}
	elseif($_SESSION['level']=="Pelatih"){
		$nama = mysqli_fetch_array(mysqli_query($connect, "SELECT pelatih_id, nama_pelatih FROM pelatih WHERE user_id='$_SESSION[user_id]'"));
		$_SESSION['pelatih_id'] 	= $nama['pelatih_id'];
		$_SESSION['nama_pelatih'] 	= $nama['nama_pelatih'];

		echo "<script>alert('Hai $_SESSION[nama_pelatih], Anda Berhasil Login!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=pelatih/home.php'>";
	}
	else{
		echo "<script>alert('Username atau Password yang Anda Masukan Salah!!!');</script>";
		echo "<meta http-equiv='refresh' content='0; url=login.php'>";
	}	
}
else{
	echo "<script>alert('Username atau Password yang Anda Masukan Salah!!!');</script>";
	echo "<meta http-equiv='refresh' content='0; url=login.php'>";
}
?>