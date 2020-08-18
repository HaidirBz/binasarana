<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Peserta</h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Peserta</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a href="laporan/laporan_peserta_print.php?admin=<?php echo $_SESSION['nama_lengkap']; ?>" class="btn btn-flat btn-success"><i class='fa fa-print'></i> Print Data</a>
          </div>
          <div class="box-body table-responsive no-padding">
            <br>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama Peserta</th>
                  <th>Email</th>
                  <th>No Hp</th>
                  <th>Jenis Kelamin</th>
                  <th style="width:28%;">Action</th>
                </tr>
              </thead>
              <?php
              $sql    = mysqli_query($connect, "SELECT a.peserta_id, b.username, a.nama_peserta, a.email, a.no_hp, a.jk FROM peserta a JOIN user b ON(a.user_id=b.user_id) ORDER BY nama_peserta");
              $jml    = mysqli_num_rows($sql);
              if($jml == 0){
                echo "
                <tbody>
                <tr>
                <td colspan='8'>Tidak ada data peserta</td>
                </tr>
                </tbody>";
              }
              else{ 
                $no = 1;
                ?>
                <tbody>
                  <?php while($dataPeserta = mysqli_fetch_array($sql)){
                    echo "
                    <tr>
                    <td>" . $no++ . "</td>
                    <td>$dataPeserta[username]</td>
                    <td>$dataPeserta[nama_peserta]</td>
                    <td>$dataPeserta[email]</td>
                    <td>$dataPeserta[no_hp]</td>
                    <td>$dataPeserta[jk]</td>
                    <td class='btn-group'>
                    <a href='?module=data-peserta&form=edit&pesertaID=$dataPeserta[peserta_id]' class='btn btn-flat btn-success'><i class='fa fa-edit'></i> Edit</a>
                    <a href='#' class='btn btn-flat btn-danger'
                    onClick='confirm_delete(\"home.php?module=data-peserta&act=delete&pesertaID=$dataPeserta[peserta_id]\")'><i class='fa fa-trash'></i> Delete</a>
                    <a href='?module=data-peserta&form=change-password&pesertaID=$dataPeserta[peserta_id]' class='btn btn-flat btn-primary'><i class='fa fa-key'></i> Change Password</a>
                    </td></tr>";
                  } ?>
                </tbody> 
                <?php
              } 
              ?>
              <tfoot>
                <tr><th>No</th>
                  <th>Username</th>
                  <th>Nama Peserta</th>
                  <th>Email</th>
                  <th>No Hp</th>
                  <th>Jenis Kelamin</th>
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