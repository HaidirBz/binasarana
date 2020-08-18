<?php
$jml_pelatihan       = mysqli_num_rows(mysqli_query($connect, "SELECT a.pelatihan_id FROM pelatihan a JOIN pelatih b ON(a.pelatih_id=b.pelatih_id) WHERE b.pelatih_id='$_SESSION[pelatih_id]'"));
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
      <div class="col-lg-4 col-xs-12">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3><?php echo $jml_pelatihan; ?></h3><p>Pelatihan</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-stalker"></i>
          </div>
          <a href="?page=jadwal-pelatihan&id=<?php echo $_SESSION['pelatih_id']; ?>" class="small-box-footer"> More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->