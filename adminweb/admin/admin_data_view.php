<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Admin</h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Admin</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a href="?module=data-admin&form=add" class="btn btn-flat btn-success"><i class='fa fa-plus'></i> Add Data</a>
            <a href="laporan/laporan_admin_print.php?admin=<?php echo $_SESSION['nama_lengkap']; ?>" class="btn btn-flat btn-success"><i class='fa fa-print'></i> Print Data</a>
          </div>
          <div class="box-body table-responsive no-padding">
            <br>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama Lengkap</th>
                  <th>No Hp</th>
                  <th style="width:28%;">Action</th>
                </tr>
              </thead>
              <?php 
              $sql    = mysqli_query($connect, "SELECT b.user_id, a.admin_id, b.username, a.nama_lengkap, a.no_hp  FROM admin a INNER JOIN user b ON(a.user_id=b.user_id)");
              $jml    = mysqli_num_rows($sql);
              if($jml == 0){
                echo "
                <tbody>
                <tr>
                <td colspan='4'>Tidak ada data admin</td>
                </tr>
                </tbody>";
              }
              else{
                $no=1;
                ?>
                <tbody>
                  <?php while($dataAdmin = mysqli_fetch_array($sql)){
                    echo "
                    <tr>
                    <td>" . $no++ . "</td>
                    <td>$dataAdmin[username]</a></td>
                    <td>$dataAdmin[nama_lengkap]</td>
                    <td>$dataAdmin[no_hp]</td>
                    <td class='btn-group'>";
                    if($dataAdmin['user_id'] == $_SESSION['user_id']){
                      echo "<button class='btn btn-flat btn-default'><i class='fa fa-minus'></i> Disabled</button>";
                    }
                    else{
                      echo "
                      <a href='?module=data-admin&form=edit&adminID=$dataAdmin[admin_id]' class='btn btn-flat btn-success'><i class='fa fa-edit'></i> Edit</a>
                      <a href='#' class='btn btn-flat btn-danger'
                      onClick='confirm_delete(\"home.php?module=data-admin&act=delete&adminID=$dataAdmin[admin_id]\")'><i class='fa fa-trash'></i> Delete</a>
                      <a href='?module=data-admin&form=change-password&adminID=$dataAdmin[admin_id]' class='btn btn-flat btn-primary'><i class='fa fa-key'></i> Change Password</a>";
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
                  <th>Nama Lengkap</th>
                  <th>No Hp</th>
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
<?php  
include "layout/footer.php";
?>