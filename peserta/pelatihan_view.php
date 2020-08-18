<?php  
$dataProgram = mysqli_fetch_array(mysqli_query($connect, "select * from peserta a join pendaftaran b on a.peserta_id=b.peserta_id join program_kursus c on b.program_id = c.program_id join jadwal d on d.program_id = c.program_id join pelatihan e on c.program_id = e.program_id join pelatih f on f.pelatih_id = e.pelatih_id group by c.program_id"));
?>
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
          <div class="box-header">
            <a href="?page=print-jadwal-peserta&pendaftaranID=<?php echo $_SESSION['pendaftaran_id']; ?>" class="btn btn-flat btn-success"><i class='fa fa-print'></i> &nbsp;Print Jadwal</a>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <?php
            if(isset($_GET['id'])){ ?>
              <table id="example1" class="table table-bordered table-striped">
                 

                <?php 
                $sql_hari = mysqli_query($connect, "SELECT DISTINCT hari FROM jadwal WHERE program_id='$dataProgram[program_id]'");
                $jml2 = mysqli_num_rows($sql_hari);
                ?>
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Ruangan</th>
                    <th>Pertemuan</th>
                    <?php 
                    while ($hari = mysqli_fetch_array($sql_hari)) {
                      echo "<th>$hari[hari]</th>";
                    }
                    ?>
                    <th>Jam Mulai</th>
                    <th>Jam Akhir</th>
                    <th>Nama Pelatih 1</th>
                    <th>Nama Pelatih 2</th>
                    <th>Nama Kursus</th>
                  </tr>
                </thead>
                <?php
              $sql    = mysqli_query($connect, "SELECT * FROM jadwal WHERE program_id='$dataProgram[program_id]'");
              $jml    = mysqli_num_rows($sql);
              $no=1;
              $pertemuan=1;
              if($jml == 0){
                echo "
                <tbody>
                <tr>
                <td colspan='4'>Tidak ada data jadwal</td>
                </tr>
                </tbody>";
              }
              else{ 
                ?>
                <tbody>
                  <?php
                  $sql_jadwal = mysqli_query($connect, "SELECT jadwal_id,hari,tanggal FROM jadwal WHERE program_id='$dataProgram[program_id]'");
                  while($data2 = mysqli_fetch_array($sql_jadwal)){
                    $dataTanggal[]  = $data2['tanggal'];
                  }
                  for($i=0; $i<$dataProgram['jml_pertemuan']; $i++){
                    echo "<tr><td>" . $no++ . "</td>";                  
                    echo "<td> Pertemuan " . $pertemuan++ . "</td>";                  
                    for($j=0; $j<$jml2; $j++){
                      $tanggalData[$i] = ($j)+($i*$jml2);
                      echo "<td>" . date("d-m-Y", strtotime($dataTanggal[$tanggalData[$i]])) . "</td>";
                    }
                    echo"</tr>";
                  }
                  ?>
                </tbody> 
                <?php
              }
              $sql_hari = mysqli_query($connect, "SELECT DISTINCT hari FROM jadwal WHERE program_id='$dataProgram[program_id]'");  
              ?>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Ruangan</th>
                  <th>Pertemuan</th>
                  <?php 
                  while ($hari = mysqli_fetch_array($sql_hari)) {
                    echo "<th>$hari[hari]</th>";
                  }
                  ?>
                  <th>Jam Mulai</th>
                  <th>Jam Akhir</th>
                  <th>Nama Pelatih 1</th>
                  <th>Nama Pelatih 2</th>
                  <th>Nama Kursus</th>
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