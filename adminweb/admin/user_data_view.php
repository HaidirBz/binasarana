<div class="content-wrapper">
  <section class="content-header">
    <h1>Data User</h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">User</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a href="laporan/laporan_user_print.php?admin=<?php echo $_SESSION['nama_lengkap']; ?>" class="btn btn-flat btn-success"><i class='fa fa-print'></i> Print Data</a>
          </div>
          <div class="box-body table-responsive no-padding">
            <table id="example1" class="table table-bordered table-striped">
              <br>
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th style="width:27%;">Action</th>
                </tr>
              </thead>
              <?php 
              $sql    = mysqli_query($connect, "SELECT * FROM user ORDER BY level");
              $jml    = mysqli_num_rows($sql);
              if($jml == 0){
                echo "
                <tbody>
                <tr>
                <td colspan='4'>Tidak ada data user</td>
                </tr>
                </tbody>";
              }
              else{ 
                $no=1;
                ?>
                <tbody>
                  <?php while($dataUser = mysqli_fetch_array($sql)){
                    echo "
                    <tr>
                    <td>" . $no++ . "</td>
                    <td>$dataUser[username]</td>
                    <td>$dataUser[level]</td>
                    <td class='btn-group'>";
                    if($dataUser['user_id'] == $_SESSION['user_id']){
                      echo "<button class='btn btn-flat btn-default'><i class='fa fa-minus'></i> Disabled</button>";
                    }
                    else{
                      echo "
                      <a href='?module=data-user&form=edit&userID=$dataUser[user_id]' class='btn btn-flat btn-success'><i class='fa fa-edit'></i> Edit</a>
                      <a href='#' class='btn btn-flat btn-danger'
                      onClick='confirm_delete(\"home.php?module=data-user&act=delete&userID=$dataUser[user_id]\")'><i class='fa fa-trash'></i> Delete</a>
                      <a href='#' class='btn btn-flat btn-primary' onClick='confirm_reset_password(\"home.php?module=data-user&act=reset-password&userID=$dataUser[user_id]\")'><i class='fa fa-key'></i> Reset Password</a>";
                    }
                    echo "</td></tr>";
                  } 
                  ?>
                </tbody>
                <?php
              } 
              ?>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure to delete this data ?</p><br>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger" id="delete_link"><i class="fa fa-trash fa-fw"></i> Delete Data</a>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal_reset_password">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Confirm Reset Password</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure to reset password this data ?</p><br>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-primary" id="reset_password_link"><i class="fa fa-key fa-fw"></i> Reset Password</a>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<?php  
include "layout/footer.php";
?>