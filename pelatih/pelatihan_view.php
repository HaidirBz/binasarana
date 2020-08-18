<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Jadwal Pelatihan</h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="home.php?module=jadwal-pelatihan">Pelatihan</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <?php
            if(isset($_GET['id'])){ ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Ruangan</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Akhir</th>
                    <th>Program Kursus</th>
                    <th style='width:25%;'>Action</th>
                  </tr>
                </thead>
                <?php 
                $sql    = mysqli_query($connect, "SELECT a.pelatihan_id, a.hari, b.nama_program, b.ruangan, b.jam_mulai, b.jam_akhir FROM pelatihan a JOIN program_kursus b ON(a.program_id=b.program_id) WHERE a.pelatih_id='$_SESSION[pelatih_id]'");
                $jml    = mysqli_num_rows($sql);
                if($jml == 0){
                  echo "
                  <tbody><tr><td colspan='4'>Tidak ada data pelatihan</td></tr></tbody>";
                }
                else{ ?>
                  <tbody>
                    <?php 
                    $no = 1;
                    while($dataPelatihan = mysqli_fetch_array($sql)){
                      echo "
                      <tr>
                      <td>" . $no++ . "</td>
                      <td>" . $dataPelatihan['ruangan'] . "</td>
                      <td>" . $dataPelatihan['hari'] . "</td>
                      <td>" . $dataPelatihan['jam_mulai'] . "</td>
                      <td>" . $dataPelatihan['jam_akhir'] . "</td>
                      <td>" . $dataPelatihan['nama_program'] . "</td>
                      <td class='btn-group'>
                      <a href='?page=print-jadwal&pelatihanID=$dataPelatihan[pelatihan_id]' class='btn btn-flat btn-success'><i class='fa fa-print'></i> &nbsp;Print Jadwal</a>
                      <a href='?page=print-absen&pelatihanID=$dataPelatihan[pelatihan_id]' class='btn btn-flat btn-success'><i class='fa fa-print'></i> &nbsp;Print Absen</a>
                      </td>
                      </tr>";
                    } ?>
                  </tbody> 
                  <?php
                } ?>
                <tfoot>
                  <tr>
                    <th>No</th>
                    <th>Hari</th>
                    <th>Program Kursus</th>
                    <th style='width:25%;'>Action</th>
                  </tr>
                </tfoot>
              </table> 
              <?php
            }
            ?>
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