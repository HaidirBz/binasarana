<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Program Kursus</h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Program Kursus</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <a href="?module=data-program&form=add" class="btn btn-flat btn-success"><i class='fa fa-plus'></i> Add Data</a>
            <a href="laporan/laporan_program_print.php?admin=<?php echo $_SESSION['nama_lengkap']; ?>" class="btn btn-flat btn-success"><i class='fa fa-print'></i> Print Data</a>
          </div>
          <div class="box-body table-responsive no-padding">
            <br>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Program Kursus</th>
                  <th>Ruangan</th>
                  <th>Hari</th>
                  <th>Jam Mulai</th>
                  <th>Jam Akhir</th>
                  <th style="width: 10%;">Kapasitas</th>
                  <th>Jumlah Pertemuan</th>
                  <th>Harga</th>
                  <th>Tanggal Mulai</th>
                  <th style="width: 25%;">Action</th>
                </tr>
              </thead>
              <?php
              $jml_pertemuan = mysqli_query($connect, "SELECT jml_pertemuan FROM program_kursus");
              $sql    = mysqli_query($connect, "SELECT program_id, nama_program, ruangan, hari, jam_mulai, jam_akhir, kapasitas, jml_pertemuan, harga, tgl_mulai FROM program_kursus ORDER BY nama_program");
              $jml    = mysqli_num_rows($sql);
              $no=1;
              if($jml == 0){
                echo "
                <tbody>
                <tr>
                <td colspan='7'>Tidak ada data program kursus</td>
                </tr>
                </tbody>";
              }
              else{ 
                ?>
                <tbody>
                  <?php 
                  while($dataProgram = mysqli_fetch_array($sql)){
                    echo "
                    <tr>
                    <td>" . $no++ . "</td>
                    <td>$dataProgram[nama_program]</td>
                    <td>$dataProgram[ruangan]</td>
                    <td>$dataProgram[hari]</td>
                    <td>$dataProgram[jam_mulai]</td>
                    <td>$dataProgram[jam_akhir]</td>
                    <td>$dataProgram[kapasitas] orang</td>
                    <td>$dataProgram[jml_pertemuan]</td>
                    <td> Rp. " . number_format($dataProgram['harga'],0,',','.') . "</td>
                    <td>" . date("d-m-Y", strtotime($dataProgram['tgl_mulai'])) . "</td>
                    <td class='btn-group'>
                    <a href='?module=data-jadwal&programID=$dataProgram[program_id]' class='btn btn-flat btn-info'><i class='fa fa-info-circle'></i> &nbsp;Data Jadwal</a>
                    <a href='?module=data-program&form=edit&programID=$dataProgram[program_id]' class='btn btn-flat btn-success'><i class='fa fa-edit'></i> Edit</a>
                    <a href='#' class='btn btn-flat btn-danger'
                    onClick='confirm_delete(\"home.php?module=data-program&act=delete&programID=$dataProgram[program_id]\")'><i class='fa fa-trash'></i> Delete</a>
                    </td></tr>";
                  } 
                  ?>
                </tbody> 
                <?php
              } 
              ?>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Program Kursus</th>
                  <th>Ruangan</th>
                  <th>Hari</th>
                  <th>Jam Mulai</th>
                  <th>Jam Akhir</th>
                  <th>Kapasitas</th>
                  <th>Jumlah Pertemuan</th>
                  <th>Harga</th>
                  <th>Tanggal Mulai</th>
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
        <a href="home.php?module=logout" class="btn btn-danger" id="delete_link"><i class="fa fa-trash fa-fw"></i> Delete Data</a>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<?php  
include "layout/footer.php";
?>