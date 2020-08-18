<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Pelatih</h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pelatih</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a href="?module=data-pelatih&form=add" class="btn btn-flat btn-success"><i class='fa fa-plus'></i> Add Data</a>
            <a href="laporan/laporan_pelatih_print.php?admin=<?php echo $_SESSION['nama_lengkap']; ?>" class="btn btn-flat btn-success"><i class='fa fa-print'></i> Print Data</a>
          </div>
          <div class="box-body table-responsive no-padding">
            <br>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Nama Pelatih</th>
                  <th>Email</th>
                  <th>No Hp</th>
                  <th>Jenis Kelamin</th>
                  <th style="width:28%;">Action</th>
                </tr>
              </thead>
              <?php
              $sql    = mysqli_query($connect, "SELECT a.pelatih_id,b.username,a.nama_pelatih,a.jk,a.email,a.no_hp FROM pelatih a JOIN user b ON(a.user_id=b.user_id) ORDER BY nama_pelatih");
              $jml    = mysqli_num_rows($sql);
              if($jml == 0){
                echo "
                <tbody>
                <tr>
                <td colspan='7'>Tidak ada data pelatih</td>
                </tr>
                </tbody>";
              }
              else{ 
                $no = 1;
                ?>
                <tbody>
                  <?php while($dataPelatih = mysqli_fetch_array($sql)){
                    echo "
                    <tr>
                    <td>" . $no++ . "</td>
                    <td>$dataPelatih[username]</td>
                    <td>$dataPelatih[nama_pelatih]</td>
                    <td>$dataPelatih[email]</td>
                    <td>$dataPelatih[no_hp]</td>
                    <td>$dataPelatih[jk]</td>
                    <td class='btn-group'>";
                    echo "
                    <a href='?module=data-pelatih&form=edit&pelatihID=$dataPelatih[pelatih_id]' class='btn btn-flat btn-success'><i class='fa fa-edit'></i> Edit</a>
                    <a href='#' class='btn btn-flat btn-danger'
                    onClick='confirm_delete(\"home.php?module=data-pelatih&act=delete&pelatihID=$dataPelatih[pelatih_id]\")'><i class='fa fa-trash'></i> Delete</a>
                    <a href='?module=data-pelatih&form=change-password&pelatihID=$dataPelatih[pelatih_id]' class='btn btn-flat btn-primary'><i class='fa fa-key'></i> Change Password</a>
                    </td></tr>";
                  } ?>
                </tbody> 
                <?php
              } 
              ?>
              <tfoot>
                <tr><th>No</th>
                  <th>Username</th>
                  <th>Nama Pelatih</th>
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