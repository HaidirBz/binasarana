<div class="content-wrapper">
  <?php
  if($_GET['form'] == "edit"){ ?>
    <section class="content-header">
      <h1>Data User</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="?module=data-user"><i class="fa fa-user"></i> User</a></li>
        <li class="active">Edit User</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Form</h3>
            </div>
            <form class="form-horizontal" method="POST" action="?module=data-user&act=update&userID=<?php echo $id; ?>">
              <?php
              $sql = mysqli_query($connect, "SELECT * FROM user WHERE user_id='$id'");
              $data = mysqli_fetch_array($sql);
              ?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">User ID</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="user_id" value="<?php echo $data['user_id']; ?>" disabled="" placeholder="User ID">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Level</label>
                  <div class="col-sm-9">
                    <select name="level" class="form-control select2" style="width: 100%;">
                      <option disabled="" selected="">=== Pilih Level ===</option>
                      <option value='Admin' <?php if($data['level']=='Admin'){ ?> selected <?php } ?>>Admin</option>
                      <option value='Peserta' <?php if($data['level']=='Peserta'){ ?> selected <?php } ?>>Peserta</option>
                      <option value='Pelatih' <?php if($data['level']=='Pelatih'){ ?> selected <?php } ?>>Pelatih</option>
                    </select>
                  </div>
                </div>
                <div class="box-footer">
                 <a href="?module=data-user" class="btn btn-danger">Cancel</a>
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
 ?>
</div>
<?php  
include "layout/footer.php";
?>