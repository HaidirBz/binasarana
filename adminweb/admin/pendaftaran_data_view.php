<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Pendaftaran</h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Pendaftaran</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a href="?module=data-pendaftaran&form=add" class="btn btn-flat btn-success"><i class='fa fa-plus'></i> Add Data</a>
            <a href="laporan/laporan_pendaftaran_print.php?admin=<?php echo $_SESSION['nama_lengkap']; ?>" class="btn btn-flat btn-success"><i class='fa fa-print'></i> Print Data</a>
          </div>
          <div class="box-body table-responsive no-padding">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Pendaftaran</th>
                  <th>Nama Peserta</th>
                  <th>Program Kursus</th>
                  <th>Hari</th>
                  <th>Pesan</th>
                  <th>Pembayaran</th>
                  <th>Status</th>
                  <th>Tanggal Daftar</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php
              $no     = 1; 
              $sql    = mysqli_query($connect, "SELECT a.pendaftaran_id, c.nama_peserta, b.nama_program, b.hari, a.pesan, a.pembayaran, a.status, a.tgl_daftar FROM pendaftaran a JOIN program_kursus b ON(a.program_id=b.program_id) JOIN peserta c ON(a.peserta_id=c.peserta_id) ORDER BY a.tgl_daftar DESC");
              $jml    = mysqli_num_rows($sql);
              if($jml == 0){
                echo "
                <tbody>
                <tr>
                <td colspan='9'>Tidak ada data pendaftaran</td>
                </tr>
                </tbody>";
              }
              else{ ?>
                <tbody>
                  <?php while($dataPendaftaran = mysqli_fetch_array($sql)){
                    echo "
                    <tr>
                    <td>" . $no++ . "</td>
                    <td>$dataPendaftaran[pendaftaran_id]</td>
                    <td>$dataPendaftaran[nama_peserta]</td>
                    <td>$dataPendaftaran[nama_program]</td>
                    <td>$dataPendaftaran[hari]</td>
                    <td>$dataPendaftaran[pesan]</td>";
                    if($dataPendaftaran['pembayaran'] == NULL){
                      echo "<td style='text-align:center;'><span class='label label-success'><i>None</i></span></td>";
                    }
                    else{
                      echo "<td style='text-align:center;'><span class='label label-success'><i>$dataPendaftaran[pembayaran]</i></span></td>";
                    }
                    echo"
                    <td>$dataPendaftaran[status]</td>
                    <td>" . date('d-m-Y H:i', strtotime($dataPendaftaran['tgl_daftar'])) . "</td>
                    <td class='btn-group'>";
                    if($dataPendaftaran['status']=="Non-aktif"){
                      echo "<a href='#' class='btn btn-flat btn-info'
                      onClick='confirm_pendaftaran(\"home.php?module=data-pendaftaran&act=konfirmasi&regID=$dataPendaftaran[pendaftaran_id]\")'><i class='fa fa-check-circle'></i> Konfirmasi</a>";
                    }
                    echo"
                    <a href='?module=data-pendaftaran&form=edit&regID=$dataPendaftaran[pendaftaran_id]' class='btn btn-flat btn-success'><i class='fa fa-edit'></i> Edit</a>
                    <a href='#' class='btn btn-flat btn-danger'
                    onClick='confirm_delete(\"home.php?module=data-pendaftaran&act=delete&regID=$dataPendaftaran[pendaftaran_id]\")'><i class='fa fa-trash'></i> Delete</a>
                    </td></tr>";
                  } ?>
                  </tbody> <?php
                } 
                ?>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>No Pendaftaran</th>
                    <th>Nama Peserta</th>
                    <th>Program Kursus</th>
                    <th>Hari</th>
                    <th>Pesan</th>
                    <th>Pembayaran</th>
                    <th>Status</th>
                    <th>Tanggal Daftar</th>
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
  <div class="modal fade" id="modal_konfirmasi">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Konfirmasi Pendaftaran</h4>
        </div>
        <div class="modal-body">
          <p>Anda yakin ingin mengkonfirmasi pendaftaran ini?</p><br>
        </div>
        <div class="modal-footer">
          <a href="#" class="btn btn-primary" id="konfirmasi_link"><i class="fa fa-key fa-check-circle"></i> Konfirmasi</a>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </div>
  </div>
  <?php  
  include "layout/footer.php";
  ?>
  