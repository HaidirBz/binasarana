<?php  
if(isset($_POST['Save'])){
  include "config/autoid_function.php";

  $nama_peserta = $_POST["nama_peserta"];
  $email        = $_POST["email"];
  $no_hp        = $_POST["no_hp"];
  $jk           = $_POST["jk"];
  $program_id   = $_POST["program_id"];
  $pesan        = $_POST['pesan'];
  $status       = "Non-Aktif";
  $pembayaran   = $_POST['pembayaran'];
  $tgl_daftar   = date('Y-m-d H:i:s');
  $regID        = autoreg('pendaftaran_id', 'pendaftaran');
  $password     = md5($regID);

  $save_user  = mysqli_query($connect, "INSERT INTO user VALUES('','$regID','$password','Peserta')");
  if($save_user){
    $sql_user = mysqli_fetch_array(mysqli_query($connect, "SELECT user_id FROM user WHERE username='$regID'"));
    $save_peserta = mysqli_query($connect, "INSERT INTO peserta VALUES('','$sql_user[user_id]','$nama_peserta','$email','$no_hp','$jk')");

    if($save_peserta){
      $sql_peserta = mysqli_fetch_array(mysqli_query($connect, "SELECT a.peserta_id FROM peserta a JOIN user b ON(a.user_id=b.user_id) WHERE b.username='$regID'"));

      $save = mysqli_query($connect, "INSERT INTO pendaftaran SET pendaftaran_id='$regID', peserta_id='$sql_peserta[peserta_id]', program_id='$program_id', pesan='$pesan', pembayaran='$pembayaran', status='$status', tgl_daftar='$tgl_daftar'");
      if($save){
        echo "<script>alert('Pendaftaran berhasil dilakukan. Anda bisa login 1 jam setelah melakukan pembayaran. Harap Catat Username dan Password anda : $regID');";
        echo "document.location='index.php';</script>";
      }
      else{
        echo "<script>alert('Pendaftaran gagal. Silahkan Coba Lagi!');";
        echo "document.location='index.php?page_id=2';</script>";
      }
    }
  }
}
?>
<div id="content col-sm-12">
  <h2 class="title widgettitle">FORM PENDAFTARAN</h2>
  <div class="alert alert-info">
    <h5><i class="glyphicon glyphicon-info-sign"></i> INFORMASI : </h5>
    <p>
      <ul>
        <li>Pastikan data yang anda isi sudah benar.</li>
      </ul>
    </p>
  </div>
  <div class="entry clearfix">
    <br>
    <form class="form-horizontal" method="POST">
      <div class="box-body">
        <div class="form-group">
          <label class="col-sm-2 control-label">Nama</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="nama_peserta" placeholder="Nama">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">E-Mail</label>
          <div class="col-sm-9">
            <input type="email" name="email" class="form-control" placeholder="E-Mail">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">No HP</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" name="no_hp" placeholder="No Handphone">
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Jenis Kelamin</label>
          <div class="col-sm-7">
            <label class="control-label">
              <input type="radio" name="jk" class="minimal" value="L" checked=""> &nbsp;Laki-Laki&nbsp;&nbsp;
              <input type="radio" name="jk" class="minimal" value="P"> &nbsp;Perempuan
            </label>
          </div>
        </div>
        <div class="form-group">
          <style>
            option:disabled{
              color: red;
            }
          </style>
          <label class="col-sm-2 control-label">Program Kursus</label>
          <div class="col-sm-9">
            <select  onchange="ambilData()" id="program_id" name="program_id" class="form-control select2" style="width: 100%;">
              <option disabled="" selected="">=== Pilih Program Kursus ===</option>
              <?php 
              $sql = mysqli_query($connect, "SELECT program_id,nama_program,hari,kapasitas FROM program_kursus ORDER BY tgl_mulai DESC");
              while($dataProgram = mysqli_fetch_array($sql)){
                $sql2 = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(pendaftaran_id) AS 'kuota' FROM pendaftaran WHERE program_id='$dataProgram[program_id]'"));
                $jml = $dataProgram['kapasitas'] - $sql2['kuota']; ?>
                <option value="<?php echo $dataProgram['program_id']; ?>" <?php if($jml == 0) { ?> disabled <?php } ?>><?php echo $dataProgram['nama_program'] . "&nbsp;|&nbsp;" . $dataProgram['hari'] . "&nbsp;|&nbsp;" . $jml . " Orang"; ?></option><?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Pembayaran</label>
          <div class="col-sm-9">
            <label class="control-label">
              <input type="radio" name="pembayaran" class="minimal" value="Tunai" checked=""> &nbsp;Tunai&nbsp;&nbsp;
              <input type="radio" name="pembayaran" class="minimal" value="Transfer"> &nbsp;Transfer
            </label>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-2 control-label">Pesan</label>
          <div class="col-sm-9">
            <textarea name="pesan" class="form-control" rows="3" placeholder="Pesan"></textarea>
          </div>
        </div>
        <div class="box-footer col-sm-3 pull-right">
          <button type="submit" name="Save" class="btn btn-primary"><i class="fa fa-save fa-fw"></i>  Daftar</button>
          <a href="index.php" class="btn btn-danger">Batal</a>
        </div>
      </div>
    </form>
  </div>
</div><!-- #content -->
</div>
<div id="footer">
  <div id="copyrights">
    <a>Copyright &copy; 2019 Bina Sarana Mandiri.</a> All rights reserved.
  </div>
</div>
</div>