<div class="content-wrapper">
  <?php
  if($_GET['form'] == "edit"){ 
    ?>
    <section class="content-header">
      <h1>Data Peserta</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="?module=data-peserta"><i class="fa fa-user-plus"></i> Peserta</a></li>
        <li class="active">Edit Peserta</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Form</h3>
            </div>
            <form class="form-horizontal" method="POST" action="?module=data-peserta&act=update&pesertaID=<?php echo $id; ?>">
              <?php
              $sql = mysqli_query($connect, "SELECT a.peserta_id, b.username, a.nama_peserta, a.email, a.jk, a.no_hp FROM peserta a JOIN user b ON(a.user_id=b.user_id) WHERE a.peserta_id='$id'");
              $data = mysqli_fetch_array($sql);
              ?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Peserta ID</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="peserta_id" readonly="" value="<?php echo $data['peserta_id']; ?>" placeholder="Peserta ID">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Peserta</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_peserta" value="<?php echo $data['nama_peserta']; ?>" placeholder="Nama Peserta">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    <input type="radio" name="jk" class="minimal col-sm-2" value="L" <?php if($data['jk']=="L") { ?> checked="" <?php } ?>> Laki-Laki&nbsp;&nbsp;
                    <input type="radio" name="jk" class="minimal col-sm-2" value="P" <?php if($data['jk']=="P") { ?> checked="" <?php } ?>> Perempuan
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
                <div class="box-footer">
                 <a href="?module=data-peserta" class="btn btn-danger">Cancel</a>
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
    <h1>Data Peserta</h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="?module=data-peserta"><i class="fa fa-user-plus"></i> Peserta</a></li>
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
          <form class="form-horizontal" method="POST" name="forgot" action="?module=data-peserta&act=change-password&pesertaID=<?php echo $id; ?>">
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
               <a href="?module=data-peserta" class="btn btn-danger">Cancel</a>
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