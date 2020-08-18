<?php  
$dataProgram = mysqli_fetch_array(mysqli_query($connect, "SELECT jml_pertemuan, nama_program FROM program_kursus WHERE program_id='$_GET[programID]'"));
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Jadwal Program Kursus</h1>
    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="?module=data-program"><i class="fa fa-calendar"></i> Program Kursus</a></li>
      <li class="active"><?php echo $dataProgram['nama_program']; ?></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box"><div class="box-header">
          <a href="laporan/laporan_jadwal_print.php?programID=<?php echo $_GET['programID']; ?>&admin=<?php echo $_SESSION['nama_lengkap']; ?>" class="btn btn-flat btn-success"><i class='fa fa-print'></i> Print Jadwal</a>
          </div><br>
          <div class="box-body table-responsive no-padding">
            <table id="example1" class="table table-bordered table-striped">
              <?php 
              $sql_hari = mysqli_query($connect, "SELECT DISTINCT hari FROM jadwal WHERE program_id='$_GET[programID]'");
              $jml2 = mysqli_num_rows($sql_hari);
              ?>
              <thead>
                <tr>
                  <th>No</th>
                  <th>Pertemuan</th>
                  <?php 
                  while ($hari = mysqli_fetch_array($sql_hari)) {
                    echo "<th>$hari[hari]</th>";
                  }
                  ?>
                </tr>
              </thead>
              <?php
              $sql    = mysqli_query($connect, "SELECT * FROM jadwal WHERE program_id='$_GET[programID]'");
              $jml    = mysqli_num_rows($sql);
              $no=1;
              $pertemuan=1;
              if($jml == 0){
                echo "
                <tbody>
                <tr>
                <td colspan='8'>Tidak ada data jadwal</td>
                </tr>
                </tbody>";
              }
              else{ 
                ?>
                <tbody>
                  <?php
                  $sql_jadwal = mysqli_query($connect, "SELECT jadwal_id,hari,tanggal FROM jadwal WHERE program_id='$_GET[programID]'");
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
              $sql_hari = mysqli_query($connect, "SELECT DISTINCT hari FROM jadwal WHERE program_id='$_GET[programID]'");  
              ?>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Pertemuan</th>
                  <?php 
                  while ($hari = mysqli_fetch_array($sql_hari)) {
                    echo "<th>$hari[hari]</th>";
                  }
                  ?>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php  
include "layout/footer.php";
?>