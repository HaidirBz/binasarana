<?php  
  $id = $_SESSION['pelatih_id'];
?>
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../assets/dist/img/no-photo.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $_SESSION['nama_pelatih']; ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li <?php if(!isset($_GET['page'])){ ?> class="active" <?php } ?>>
        <a href="home.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
      </li>
      <li <?php if(isset($_GET['page']) && ($_GET['page']=="jadwal-pelatihan")){ ?> class="active" <?php } ?>><a href="?page=jadwal-pelatihan&id=<?php echo $id; ?>"><i class="fa fa-calendar-check-o"></i><span>Jadwal Pelatihan</span></a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>