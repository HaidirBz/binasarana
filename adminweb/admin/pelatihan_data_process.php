<?php 
if (empty($_SESSION['user_id']) && empty($_SESSION['username'])) {
	echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
}
else{
	include "../config/autoid_function.php";
	if($_GET['act'] == "edit"){
		if(isset($_POST["Save"])){
			$programID 			= $_GET['programID'];
			$pelatihan_id		= $_POST['pelatihan_id'];
			$pelatih_id			= $_POST['pelatih_id'];

			$jml = count($pelatihan_id);
			for($i=0; $i<$jml; $i++){
				$save = mysqli_query($connect, "UPDATE pelatihan SET pelatih_id='$pelatih_id[$i]' WHERE pelatihan_id='$pelatihan_id[$i]'");

				if($save){
					echo "<script>alert('Data berhasil disimpan.');";
					echo "document.location='home.php?module=data-pelatihan&programID=$programID';</script>";
				}
				else{
					echo "<script>alert('Data gagal disimpan.');";
					echo "document.location='home.php?module=data-pelatihan&form=edit&programID=$programID';</script>";
				}
			}	
		}
	}
}
?>
