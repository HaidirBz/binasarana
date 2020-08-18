<div id="content col-sm-12">
  <h2 class="title widgettitle">Jadwal Pelatihan</h2>
  <div class="alert alert-info">
    <h5><i class="glyphicon glyphicon-info-sign"></i> INFORMASI : </h5>
    <p>
      <ol>
        <li style="counter-increment: item; margin-left: -25px">Peserta mengikuti pelatihan selama 3 jam, pada jam 17.00-20.00.
              </li>
      </ol>
    </p>
  </div>
  <div class="entry clearfix">
    <h2 style="text-align: center;">PETUNJUK PENDAFTARAN PESERTA PELATIHAN</h2>
    <ol>
      <li style="text-align: justify;">Calon Peserta Memilih Menu Daftar.</li>
      <li style="text-align: justify;">Calon Peserta mengisi Form Pendaftaran.</li>
      <li style="text-align: justify;">Setelah mengisi Form, Calon Peserta bisa login 1 jam setelah melakukan pembayaran.</li>
      <li style="text-align: justify;">Jika memilih metode pembayaran <b>Tunai</b>, silahkan lakukan pembayaran seminggu sebelum tanggal mulai pelatihan ke Lokasi Kantor Lembaga Bina Sarana Mandiri.</li>
      <li style="text-align: justify;">Jika memilih metode pembayaran <b>Transfer</b>, silahkan transfer ke No. Rekening <b>83110121046</b> atas nama <u>Farida Handayani</u>.</li>
      <li style="text-align: justify;">Calon Peserta login menggunakan Username dan Password yang sudah di informasikan setelah melakukan pendaftaran.</li>
      <li style="text-align: justify;">Calon Peserta bisa melihat Jadwal Pelatihan setelah login.</li>
    </ol>
    <table id="example1" class="table table-responsive table-bordered">
          <thead>
            <tr>
              <th>Nama Program Kursus</th>
              <th>Harga</th>
              <th>Tanggal Mulai</th>
              <th>Kuota</th>
              <th>Status</th>
            </tr>
          </thead>
          <?php
          $sql    = mysqli_query($connect, "SELECT * FROM program_kursus ORDER BY tgl_mulai DESC");
          $jml    = mysqli_num_rows($sql);
          if($jml == 0){
            echo "
            <tbody>
            <tr>
            <td colspan='7'>Tidak ada data jadwal tersedia</td>
            </tr>
            </tbody>";
          }
          else{ ?>
            <tbody>
              <?php 
              while($dataProgram = mysqli_fetch_array($sql)){
                $sql2 = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(pendaftaran_id) AS 'kuota' FROM pendaftaran WHERE program_id='$dataProgram[program_id]'"));
                $jml2 = $dataProgram['kapasitas'] - $sql2['kuota'];

                echo "
                <tr>
                  <td>$dataProgram[nama_program] <br>| <b>$dataProgram[jml_pertemuan] Pertemuan</b> | <b>$dataProgram[hari] </b></td>
                  <td>Rp." . number_format($dataProgram['harga'],0,',','.') . "</td>
                  <td>" . date("d/m/Y", strtotime($dataProgram['tgl_mulai'])) . "</td>
                  <td>$jml2 Orang</td>
                  <td>";
                  if($jml2 == 0){
                    echo "<span class='label label-danger'><i>Full</i></span>";
                  }
                  else{
                    echo "<span class='label label-primary'><i>Tersedia</i></span>";
                  }
                  echo"
                  </td>
                </tr>";
              }

              ?>
              </tbody> <?php
            } 
            ?>
          </table>
  </div>
</div><!-- #content -->
</div>