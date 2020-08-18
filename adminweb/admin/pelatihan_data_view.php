<?php
include "../config/changedate_function.php";
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Pelatihan</h1>
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
                  <th>Nama Program</th>
                  <th>Jumlah Peserta</th>
                  <th style="width:30%;">Action</th>
                </tr>
              </thead>
              <?php
              $sql_pelatihan = mysqli_query($connect, "SELECT a.program_id, a.nama_program FROM program_kursus a LEFT OUTER JOIN pendaftaran b ON(a.program_id=b.program_id) WHERE b.status='Aktif' OR b.pendaftaran_id IS NULL GROUP BY a.nama_program"); 
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
                    $dataPeserta = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(a.pendaftaran_id) AS 'jmlPeserta' FROM pendaftaran a JOIN program_kursus b ON(a.program_id=b.program_id) WHERE (b.program_id='$dataPelatihan[program_id]') AND (a.status='Aktif')"));
                    echo "
                    <tr>
                    <td>" . $no++ . "</td>
                    <td>$dataPelatihan[nama_program]</td>
                    <td>
                    <span class='label label-flat label-danger'><i>$dataPeserta[jmlPeserta] ORANG</i></span>
                    </td>
                    ";

                  $sql_pelatihan2 = mysqli_num_rows(mysqli_query($connect, "SELECT pelatihan_id FROM pelatihan WHERE program_id='$dataPelatihan[program_id]'"));
                    if($sql_pelatihan2 > 0){
                      echo "
                      </td>
                      <td class='btn-group'>
                      <a href='?module=data-pelatihan&form=edit&programID=$dataPelatihan[program_id]' class='btn btn-flat btn-success'><i class='fa fa-edit'></i> &nbsp;Edit Data</a>
                      <a href='?module=data-pelatihan-per-program&programID=$dataPelatihan[program_id]' class='btn btn-flat btn-info'><i class='fa fa-info-circle'></i> &nbsp;Lihat Data
                      </a>
                      </td>
                      </tr>";
                    }                    
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