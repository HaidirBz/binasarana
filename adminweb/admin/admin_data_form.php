<div class="content-wrapper">
  <?php
  if($_GET['form'] == "add"){
    include "../config/autoid_function.php";
    ?>
    <section class="content-header">
      <h1>Data Admin</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="?module=data-admin"><i class="fa fa-user-secret"></i> Admin</a></li>
        <li class="active">Add Admin</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Form</h3>
            </div>
            <form class="form-horizontal" method="POST" action="?module=data-admin&act=insert">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Admin ID</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="admin_id" value="<?php echo autoid("admin_id", "admin"); ?>" readonly="" placeholder="Admin ID">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">No Hp</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" name="no_hp" placeholder="No Hp">
                  </div>
                </div>
                <div class="box-footer">
                  <a href="?module=data-admin" class="btn btn-danger">Cancel</a>
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
      <h1>Data Admin</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="?module=data-admin"><i class="fa fa-user-secret"></i> Admin</a></li>
        <li class="active">Edit Admin</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Form</h3>
            </div>
            <form class="form-horizontal" method="POST" action="?module=data-admin&act=update&adminID=<?php echo $id; ?>">
              <?php
              $sql = mysqli_query($connect, "SELECT a.admin_id, b.username, a.nama_lengkap, a.no_hp FROM admin a INNER JOIN user b ON(a.user_id=b.user_id) WHERE admin_id='$id'");
              $data = mysqli_fetch_array($sql);
              ?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Admin ID</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="admin_id" value="<?php echo $data['admin_id']; ?>" readonly="" placeholder="Admin ID">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Lengkap</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?>" placeholder="Nama Lengkap">
                  </div>
                </div>
                 <div class="form-group">
                  <label class="col-sm-2 control-label">No Hp</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" name="no_hp" value="<?php echo $data['no_hp']; ?>" placeholder="No Hp">
                  </div>
                </div>
                <div class="box-footer">
                 <a href="?module=data-admin" class="btn btn-danger">Cancel</a>
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
    <h1>Data Admin</h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="?module=data-admin"><i class="fa fa-user-secret"></i> Admin</a></li>
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
          <form class="form-horizontal" method="POST" name="forgot" action="?module=data-admin&act=change-password&adminID=<?php echo $id; ?>">
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
               <a href="?module=data-admin" class="btn btn-danger">Cancel</a>
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