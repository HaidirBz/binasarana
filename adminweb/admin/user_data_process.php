<?php 
if (empty($_SESSION['user_id']) && empty($_SESSION['username'])) {
  echo "<meta http-equiv='refresh' content='0; url=../login.php'>";
}
else{
  if($_GET['act'] == "update"){
    $username = $_POST["username"];
    $level    = $_POST["level"];

    if(empty($username)){
      echo "<script>alert('Data gagal diedit.');";
      echo "document.location='home.php?module=data-user&form=edit&userID=$id';</script>";

    }
    else{
      $cek_data   = mysqli_query($connect, "SELECT user_id, username FROM user WHERE username='$username'");
      $jml_data = mysqli_num_rows($cek_data);
      $lihat_data = mysqli_fetch_array($cek_data);

      if(($jml_data) > 0 && ($lihat_data["user_id"] != $id)){
        echo "<script>alert('Username sudah dipakai. Ulangi Lagi');";
        echo "document.location='home.php?module=data-user&form=edit&userID=$id';</script>";
      }
      else{
        $save = mysqli_query($connect, "UPDATE user SET username='$username', level='$level' WHERE user_id='$id'");
        if($save){
          echo "<script>alert('Data berhasil diedit.');";
          echo "document.location='home.php?module=data-user';</script>";
        }
        else{
          echo "<script>alert('Data gagal diedit.');";
          echo "document.location='home.php?module=data-user&form=edit&userID=$id';</script>";
        }
      }
    }    
  }
  else if($_GET['act'] == "delete"){
    $id2 = $_GET['userID'];
    $delete = mysqli_query($connect, "DELETE FROM user WHERE user_id='$id2'");
    if($delete){
      echo "<script>alert('Data berhasil dihapus.');";
      echo "document.location='home.php?module=data-user';</script>";
      exit();
    }
  }
  else if($_GET['act'] == "reset-password"){
    $sql    = mysqli_fetch_array(mysqli_query($connect, "SELECT user_id, username, level FROM user WHERE user_id='$id'"));
    
    if($sql['level'] == "Admin" || $sql['level'] == "Peserta"){
      $username = $sql['username'];
    }
    else if($sql['level'] == "Pelatih"){
      $username = "bsm#" . $sql['username'];
    }

    $password     = md5($username);
    $change = mysqli_query($connect, "UPDATE user SET password='$password' WHERE user_id='$sql[user_id]'");
    if($change){
      echo "<script>alert('Password berhasil direset.');";
      echo "document.location='home.php?module=data-user';</script>";
    }
  }
} 
?>