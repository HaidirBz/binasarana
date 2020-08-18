<?php
$jml_user           = mysqli_num_rows(mysqli_query($connect, "SELECT user_id FROM user"));
$jml_admin          = mysqli_num_rows(mysqli_query($connect, "SELECT admin_id FROM admin"));
$jml_peserta        = mysqli_num_rows(mysqli_query($connect, "SELECT peserta_id FROM peserta"));
$jml_pelatih        = mysqli_num_rows(mysqli_query($connect, "SELECT pelatih_id FROM pelatih"));
$jml_program_kursus = mysqli_num_rows(mysqli_query($connect, "SELECT program_id FROM program_kursus"));
$jml_pendaftaran = mysqli_num_rows(mysqli_query($connect, "SELECT pendaftaran_id FROM pendaftaran WHERE status='Non-Aktif'"));
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Dashboard</h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-light-blue">
          <div class="inner">
            <h3><?php echo $jml_user; ?></h3><p>User</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="?module=data-user" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo $jml_admin; ?></h3><p>Admin</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="?module=data-admin" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo $jml_pelatih; ?></h3><p>Pelatih</p>
          </div>
          <div class="icon">
            <i class="ion ion-university"></i>
          </div>
          <a href="?module=data-pelatih" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3><?php echo $jml_peserta; ?></h3><p>Peserta</p>
          </div>
          <div class="icon">
            <i class="ion ion-social-windows"></i>
          </div>
          <a href="?module=data-peserta" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo $jml_program_kursus; ?></h3><p>Program Kursus</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-people"></i>
          </div>
          <a href="?module=data-program" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-xs-6">
        <div class="small-box bg-purple">
          <div class="inner">
            <h3><?php echo $jml_pendaftaran; ?></h3><p>Peserta Belum Dikonfirmasi</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-people"></i>
          </div>
          <a href="?module=data-pendaftaran" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->