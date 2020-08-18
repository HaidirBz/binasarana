<div class="content-wrapper">
  <?php
  if($_GET['form'] == "add"){
    include "../config/autoid_function.php";
    ?>
    <section class="content-header">
      <h1>Data Pelatih</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="?module=data-pelatih"><i class="fa fa-sitemap"></i> Pelatih</a></li>
        <li class="active">Add Pelatih</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Form</h3>
            </div>
            <form class="form-horizontal" method="POST" action="?module=data-pelatih&act=insert">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Pelatih ID</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="pelatih_id" value="<?php echo autoid('pelatih_id','pelatih'); ?>" readonly="" placeholder="Pelatih ID">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Pelatih</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_pelatih" placeholder="Nama Pelatih">
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
                  <div class="col-sm-9">
                    <input type="radio" name="jk" class="minimal col-sm-2" value="L" checked=""> Laki-Laki&nbsp;&nbsp;
                    <input type="radio" name="jk" class="minimal col-sm-2" value="P"> Perempuan
                  </div>
                </div>
                <div class="box-footer">
                  <a href="?module=data-pelatih" class="btn btn-danger">Cancel</a>
                  <button type="submit" name="Save" class="btn btn-primary pull-right"><i class="fa fa-save fa-fw"></i>  Add Data</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <?php
  }
  else if($_GET['form'] == "edit"){ 
    ?>
    <section class="content-header">
      <h1>Data Pelatih</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="?module=data-pelatih"><i class="fa fa-sitemap"></i> Pelatih</a></li>
        <li class="active">Edit Pelatih</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Form</h3>
            </div>
            <form class="form-horizontal" method="POST" action="?module=data-pelatih&act=update&pelatihID=<?php echo $id; ?>">
              <?php
              $sql = mysqli_query($connect, "SELECT a.pelatih_id, b.username, a.nama_pelatih, a.jk, a.email, a.no_hp FROM pelatih a JOIN user b ON(a.user_id=b.user_id) WHERE pelatih_id='$id'");
              $data = mysqli_fetch_array($sql);
              ?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Pelatih ID</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="pelatih_id" readonly="" value="<?php echo $data['pelatih_id']; ?>" placeholder="Pelatih ID">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Pelatih</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_pelatih" value="<?php echo $data['nama_pelatih']; ?>" placeholder="Nama Pelatih">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">E-Mail</label>
                  <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>" placeholder="E-Mail">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">No HP</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="no_hp" value="<?php echo $data['no_hp']; ?>" placeholder="No Handphone">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    <input type="radio" name="jk" class="minimal col-sm-2" value="L" <?php if($data['jk']=="L") { ?> checked="" <?php } ?>> Laki-Laki&nbsp;&nbsp;
                    <input type="radio" name="jk" class="minimal col-sm-2" value="P" <?php if($data['jk']=="P") { ?> checked="" <?php } ?>> Perempuan
                  </div>
                </div>
                <div class="box-footer">
                 <a href="?module=data-pelatih" class="btn btn-danger">Cancel</a>
                 <button type="submit" name="Save" class="btn btn-primary pull-right"><i class="fa fa-save fa-fw"></i> Edit Data</button>
               </div>
             </div>
           </form>
         </div>
       </div>
     </div>
   </section>
   <?php 
 }
 else if($_GET['form'] == "change-password"){ 
  ?>
  <section class="content-header">
    <h1>Data Pelatih</h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="?module=data-pelatih"><i class="fa fa-sitemap"></i> Pelatih</a></li>
      <li class="active">Change Password</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Change Password Form</h3>
          </div>
          <form class="form-horizontal" method="POST" name="forgot" action="?module=data-pelatih&act=change-password&pelatihID=<?php echo $id; ?>">
            <div class="box-body">
              <div class="form-group">
                <label class="col-sm-2 control-label">Password Baru</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Konfimasi Password</label>
                <div class="col-sm-9">
                  <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="Konfirmasi Password Baru">
                </div>
              </div>
              <div class="box-footer">
               <a href="?module=data-pelatih" class="btn btn-danger">Cancel</a>
               <button type="submit" name="change" onclick="return valid();" class="btn btn-primary pull-right"><i class="fa fa-key"></i> Change Password</button>
             </div>
           </div>
         </form>
       </div>
     </div>
   </div>
 </section>
 <?php 
}
?>
</div>
<?php  
include "layout/footer.php";
?>