<?php
include "../config/changedate_function.php";
$nama_program = mysqli_fetch_array(mysqli_query($connect, "SELECT nama_program FROM program_kursus WHERE program_id='$_GET[programID]'"));
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Pelatihan <?php echo $nama_program['nama_program']; ?></h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="home.php?module=data-pelatihan">Pelatihan</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Hari</th>
                  <th>Pelatih</th>
                  <th style="width:15%;">Action</th>
                </tr>
              </thead>
              <?php
              $sql_pelatihan = mysqli_query($connect, "SELECT a.pelatihan_id, a.hari, b.nama_pelatih FROM pelatihan a JOIN pelatih b ON(a.pelatih_id=b.pelatih_id) WHERE a.program_id='$_GET[programID]' ORDER BY hari"); 
              $jml    = mysqli_num_rows($sql_pelatihan);
              if($jml == 0){
                echo "
                <tbody><tr><td colspan='4'>Tidak ada data Pelatihan</td></tr></tbody>";
              }
              else{ ?>
                <tbody>
                  <?php 
                  $no = 1;
                  while($dataPelatihan = mysqli_fetch_array($sql_pelatihan)){
                    echo "
                    <tr>
                    <td>" . $no++ . "</td>
                    <td>$dataPelatihan[hari]</td>
                    <td>$dataPelatihan[nama_pelatih]</td>
                    <td><a href='laporan/laporan_pelatihan_print.php?pelatihanID=$dataPelatihan[pelatihan_id]' class='btn btn-flat btn-success'><i class='fa fa-print'></i> &nbsp;Print Data</a>
                    </td>
                    </tr>";                    
                  } ?>
                </tbody> 
                <?php
              } ?>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Program</th>
                  <th>Jumlah Peserta</th>
                  <th>Action</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php  
include "layout/footer.php";
?>