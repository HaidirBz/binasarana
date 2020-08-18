<aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../assets/dist/img/no-photo.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['nama_lengkap']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li <?php if(!isset($_GET['module'])){ ?> class="active" <?php } ?>>
          <a href="home.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
        </li>
        <li class="treeview <?php if(isset($_GET['module']) && ($_GET['module']=="data-user" || $_GET['module'] == "data-admin" || $_GET['module'] == "data-pelatih" || $_GET['module'] == "data-peserta" || $_GET['module']=="data-program" || $_GET['module']=="data-jadwal")){ ?> active <?php } ?>">
          <a href="#"><i class="fa fa-users"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if((isset($_GET['module']) && $_GET['module']=="data-program") || (isset($_GET['module']) && $_GET['module']=="data-jadwal")){ ?> class="active" <?php }?>><a href="?module=data-program"><i class="fa fa-clipboard"></i> Data Program Kursus</a></li>
            <li <?php if(isset($_GET['module']) && $_GET['module']=="data-user"){ ?> class="active" <?php } ?>><a href="?module=data-user"><i class="fa fa-user"></i> Data User</a></li>
            <li <?php if(isset($_GET['module']) && $_GET['module']=="data-admin"){ ?> class="active" <?php } ?>><a href="?module=data-admin"><i class="fa fa-user-secret"></i> Data Admin</a></li>
            <li <?php if(isset($_GET['module']) && $_GET['module']=="data-pelatih"){ ?> class="active" <?php } ?>><a href="?module=data-pelatih"><i class="fa fa-sitemap"></i> Data Pelatih</a></li>
            <li <?php if(isset($_GET['module']) && $_GET['module']=="data-peserta"){ ?> class="active" <?php } ?>><a href="?module=data-peserta"><i class="fa fa-user-plus"></i> Data Peserta</a></li>
          </ul>
        </li>
        <li class="treeview <?php if(isset($_GET['module']) && ($_GET['module']=="data-pendaftaran" || $_GET['module'] == "data-pelatihan")){ ?> active <?php } ?>">
          <a href="#"><i class="fa fa-tasks"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php if(isset($_GET['module']) && $_GET['module']=="data-pendaftaran"){ ?> class="active" <?php } ?>><a href="?module=data-pendaftaran"><i class="fa fa-calendar"></i> Data Pendaftaran</a></li>
            <li <?php if(isset($_GET['module']) && $_GET['module']=="data-pelatihan"){ ?> class="active" <?php } ?>><a href="?module=data-pelatihan"><i class="fa fa-calendar"></i> Data Pelatihan</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>