<div class="content-wrapper">
  <?php
  if($_GET['form'] == "add"){
    include "../config/autoid_function.php";
    ?>
    <section class="content-header">
      <h1>Data Pendaftaran</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="?module=data-pendaftaran"><i class="fa fa-calendar"></i> Pendaftaran</a></li>
        <li class="active">Add Pendaftaran</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Form</h3>
            </div>
            <form class="form-horizontal" method="POST" action="?module=data-pendaftaran&act=insert">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_peserta" placeholder="Nama">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">E-Mail</label>
                  <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" placeholder="E-Mail">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">No HP</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="no_hp" placeholder="No Handphone">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-9">
                    <label class="control-label">
                      <input type="radio" name="jk" class="minimal col-sm-2" value="L" checked=""> &nbsp;Laki-Laki
                    </label><br>
                    <label class="control-label">
                      <input type="radio" name="jk" class="minimal col-sm-2" value="P"> &nbsp;Perempuan
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Program Kursus</label>
                  <div class="col-sm-9">
                    <select  onchange="ambilData()" id="program_id" name="program_id" class="form-control select2" style="width: 100%;">
                      <option disabled="" selected="">=== Pilih Program Kursus ===</option>
                      <?php 
                      $sql = mysqli_query($connect, "SELECT program_id,nama_program,hari,kapasitas FROM program_kursus ORDER BY nama_program");
                      while($dataProgram = mysqli_fetch_array($sql)){
                        $sql2 = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(pendaftaran_id) AS 'kuota' FROM pendaftaran WHERE program_id='$dataProgram[program_id]'"));
                        $jml = $dataProgram['kapasitas'] - $sql2['kuota']; ?>
                        <option value="<?php echo $dataProgram['program_id']; ?>" <?php if($jml == 0) { ?> disabled <?php } ?>><?php echo $dataProgram['nama_program'] . "&nbsp;|&nbsp;" . $dataProgram['hari'] . "&nbsp;|&nbsp;" . $jml . " Orang"; ?></option><?php
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Pembayaran</label>
                  <div class="col-sm-9">
                    <label class="control-label">
                      <input type="radio" name="pembayaran" class="minimal col-sm-2" value="Tunai" checked=""> &nbsp;Tunai
                    </label><br>
                    <label class="control-label">
                      <input type="radio" name="pembayaran" class="minimal col-sm-2" value="Transfer"> &nbsp;Transfer
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Pesan</label>
                  <div class="col-sm-9">
                    <textarea name="pesan" class="form-control" rows="3" placeholder="Pesan"></textarea>
                  </div>
                </div>
                <div class="box-footer">
                  <a href="?module=data-pendaftaran" class="btn btn-danger">Cancel</a>
                  <button type="submit" name="Save" class="btn btn-primary pull-right"><i class="fa fa-save fa-fw"></i>  Add Data</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <?php
  }
  else if($_GET['form'] == "edit"){ 
    ?>
    <section class="content-header">
      <h1>Data Pendaftaran</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="?module=data-pendaftaran"><i class="fa fa-calendar"></i> Pendaftaran</a></li>
        <li class="active">Edit Pendaftaran</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Form</h3>
            </div>
            <form class="form-horizontal" method="POST" action="?module=data-pendaftaran&act=update&regID=<?php echo $id; ?>">
              <?php
              $sql = mysqli_query($connect, "SELECT * FROM pendaftaran a JOIN peserta b ON(a.peserta_id=b.peserta_id) WHERE a.pendaftaran_id='$id'");
              $data = mysqli_fetch_array($sql);
              ?>
              <div class="box-body">
                <div class="box-body">
                  <div class="form-group">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">No Pendaftaran</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="pendaftaran_id" value="<?php echo $data['pendaftaran_id']; ?>" readonly="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Nama</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="nama_peserta" placeholder="Nama Peserta" value="<?php echo $data['nama_peserta']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">E-Mail</label>
                      <div class="col-sm-9">
                        <input type="email" name="email" class="form-control" placeholder="E-Mail" value="<?php echo $data['email']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">No HP</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="no_hp" placeholder="No Handphone" value="<?php echo $data['no_hp']; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Jenis Kelamin</label>
                      <div class="col-sm-9">
                        <label class="control-label">
                          <input type="radio" name="jk" class="minimal col-sm-2" value="L" <?php if($data["jk"] == "L"){ ?> checked <?php } ?>> &nbsp;Laki-Laki
                        </label><br>
                        <label class="control-label">
                          <input type="radio" name="jk" class="minimal col-sm-2" value="P" <?php if($data["jk"] == "P"){ ?> checked <?php } ?>> &nbsp;Perempuan
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Program Kursus</label>
                      <div class="col-sm-9">
                        <select name="program_id" class="form-control select2" style="width: 100%;">
                          <option disabled="" selected="">=== Pilih Program Kursus ===</option>
                          <?php 
                          $sql = mysqli_query($connect, "SELECT * from program_kursus ORDER BY nama_program");
                          while($dataProgram = mysqli_fetch_array($sql)){ 
                            $sql2 = mysqli_fetch_array(mysqli_query($connect, "SELECT COUNT(pendaftaran_id) AS 'kuota' FROM pendaftaran WHERE program_id='$dataProgram[program_id]'"));
                            $jml = $dataProgram['kapasitas'] - $sql2['kuota'];
                            ?>
                            <option value="<?php echo $dataProgram['program_id']; ?>" <?php if($data["program_id"] == $dataProgram["program_id"]) { ?> selected <?php } if($jml == 0) { ?> disabled <?php } ?>><?php echo $dataProgram['nama_program'] . "&nbsp;|&nbsp;" . $dataProgram['hari'] . "&nbsp;|&nbsp;" . $jml . " Orang"; ?></option><?php
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Pesan</label>
                      <div class="col-sm-9">
                        <textarea name="pesan" class="form-control" rows="3" placeholder="Pesan"><?php echo $data['pesan']; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Pembayaran</label>
                      <div class="col-sm-9">
                        <label class="control-label">
                          <input type="radio" name="pembayaran" class="minimal col-sm-2" value="Tunai" <?php if($data["pembayaran"] == "Tunai"){ ?> checked <?php } ?>> &nbsp;Tunai
                        </label><br>
                        <label class="control-label">
                          <input type="radio" name="pembayaran" class="minimal col-sm-2" value="Transfer" <?php if($data["pembayaran"] == "Transfer"){ ?> checked <?php } ?>> &nbsp;Transfer
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Status</label>
                      <div class="col-sm-9">
                        <select name="status" class="form-control select2" style="width: 100%;">
                          <option disabled="" selected="">=== Pilih Status ===</option>
                          <option value="Aktif" <?php if($data["status"] == "Aktif") { ?> selected <?php } ?>>Aktif</option>
                          <option value="Non-aktif" <?php if($data["status"] == "Non-aktif") { ?> selected <?php } ?>>Non-Aktif</option>
                        </select>
                      </div>
                    </div>
                    <div class="box-footer">
                     <a href="?module=data-pendaftaran" class="btn btn-danger">Cancel</a>
                     <button type="submit" name="Save" class="btn btn-primary pull-right"><i class="fa fa-save fa-fw"></i> Edit Data</button>
                   </div>
                 </div>
               </form>
             </div>
           </div>
         </div>
       </section>
       <?php 
     }
     ?>
   </div>
   <?php  
   include "layout/footer.php";
   ?>