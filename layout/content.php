<body class="home page page-template-default custom-background">
  <div id="container">
    <div id="header">
      <div class="logo">
        <h1 class="site_title"><a href="index.php">Kursus Komputer Bina Sarana Mandiri</a></h1><br>
        <h2 class="site_description">Ruko Pondok Cabe Mutiara, Jl. RE Martadinata, Pd. Cabe Udik, Kec. Pamulang</h2>
      </div><!-- .logo -->
      <div class="header-right">
      </div><!-- .header-right -->
    </div><!-- #header -->
    <div class="clearfix">
      <div class="menu-secondary-container">
        <ul id="menu-menu-bawah" class="menus menu-secondary">
          <li <?php if(!isset($_GET['page_id'])) { ?> class="current-menu-item" <?php }?>><a href="index.php">HOME</a></li>
          <li><a href="?page_id=login">LOGIN</a></li>
          <li <?php if(isset($_GET['page_id']) AND $_GET['page_id']==2) { ?> class="current-menu-item" <?php }?>><a href="?page_id=2">DAFTAR</a></li>
        </ul>
      </div>              <!--.secondary menu-->   
    </div>
    <div id="main">
      <!-- Main content -->
      <div class="fp-slider clearfix">
        <div class="fp-slides-container clearfix">
          <div class="fp-slides">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
              </ol>
              <div class="carousel-inner">
                <div class="item active">
                  <img src="assets/dist/img/slider-1.jpeg" style="width: 100%; height: 100%;" alt="First slide">
                </div>
                <div class="item">
                  <img src="assets/dist/img/slider-2.jpeg" style="width: 100%; height: 100%;" alt="Second slide">            
                </div>
                <div class="item">
                  <img src="assets/dist/img/slider-3.jpeg" style="width: 100%; height: 100%;" alt="Third slide">
                </div>
              </div>
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="fp-prev"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="fp-next"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
      