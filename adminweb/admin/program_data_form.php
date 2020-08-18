<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <?php
  include "../config/autoid_function.php";
  if($_GET['form'] == "add"){
    ?>
    <section class="content-header">
      <h1>Data Program Kursus</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="?module=data-program"><i class="fa fa-calendar"></i> Program Kursus</a></li>
        <li class="active">Add Program Kursus</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add Form</h3>
            </div>
            <form class="form-horizontal" method="POST" action="?module=data-program&act=insert">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Program ID</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="program_id" value="<?php echo autoid("program_id", "program_kursus"); ?>" readonly="" placeholder="Program ID">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Program Kursus</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_program" placeholder="Nama Program Kursus">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Ruangan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="ruangan" placeholder="Ruangan">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Hari</label>
                  <div class="col-sm-9">
                    <?php
                    $daftar_hari = array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
                    for($i=0; $i<count($daftar_hari); $i++){
                      echo "
                      <label class='control-label' id='labelhari'>
                      <input type='checkbox' class='minimal' name='hari[]' value='$daftar_hari[$i]'> &nbsp;$daftar_hari[$i] &nbsp;&nbsp;
                      </label>";
                    }
                    ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jam Mulai</label>
                  <div class="col-sm-9">
                    <input type="time" class="form-control" name="jam_mulai">    
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jam Akhir</label>
                  <div class="col-sm-9">
                    <input type="time" class="form-control" name="jam_akhir">    
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kapasitas</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" name="kapasitas" placeholder="Kapasitas">    
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jumlah Pertemuan</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" name="jml_pertemuan" placeholder="Jumlah Pertemuan">                   
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Harga</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="harga" id="rupiah" placeholder="Harga">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Mulai</label>
                  <div class="col-sm-9">
                    <input type="text" id="datepicker" class="form-control" name="tgl_mulai" placeholder="Tanggal Mulai">                   
                  </div>
                </div>
                <div class="box-footer">
                  <a href="?module=data-program" class="btn btn-danger">Cancel</a>
                  <button type="submit" name="Save" class="btn btn-primary pull-right"><i class="fa fa-save fa-fw"></i>  Add Data</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content --><?php
  }
  else if($_GET['form'] == "edit"){ ?>
    <section class="content-header">
      <h1>Data Program Kursus</h1>
      <ol class="breadcrumb">
        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="?module=data-program"><i class="fa fa-calendar"></i> Program Kursus</a></li>
        <li class="active">Edit Program Kursus</li>
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
            <form class="form-horizontal" method="POST" action="?module=data-program&act=update&programID=<?php echo $id; ?>">
              <?php
              $sql = mysqli_query($connect, "SELECT * FROM program_kursus WHERE program_id='$id'");
              $data = mysqli_fetch_array($sql);
              ?>
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Program ID</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="program_id" value="<?php echo $data['program_id']; ?>" disabled="" placeholder="Program ID">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Program Kursus</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="nama_program" value="<?php echo $data['nama_program']; ?>" placeholder="Nama Program Kursus">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Ruangan</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="ruangan" value="<?php echo $data['ruangan']; ?>" placeholder="Ruangan">
                  </div>
                </div>
                <div class="form-group">
                      <label class="col-sm-2 control-label">Hari</label>
                      <div class="col-sm-9">
                        <?php
                        $ambil_hari = explode(',', $data['hari']);  
                        $daftar_hari = array('Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
                        for($i=0; $i<count($daftar_hari); $i++){ ?>
                          <label class="control-label">
                            <input type="checkbox" class="minimal" name="hari[]" value="<?php echo $daftar_hari[$i]; ?>" <?php for($j=0; $j<count($ambil_hari); $j++){ if($ambil_hari[$j] == $daftar_hari[$i]) { ?> checked <?php }} ?>> &nbsp;<?php echo $daftar_hari[$i]; ?> &nbsp;&nbsp;
                            </label><?php
                          }
                          ?>
                        </div>
                      </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jam Mulai</label>
                  <div class="col-sm-9">
                    <input type="time" class="form-control" name="jam_mulai" value="<?php echo $data['jam_mulai']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jam AKhir</label>
                  <div class="col-sm-9">
                    <input type="time" class="form-control" name="jam_akhir" value="<?php echo $data['jam_akhir']; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kapasitas</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" name="kapasitas" value="<?php echo $data['kapasitas']; ?>" placeholder="Kapasitas">                   
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Jumlah Pertemuan</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" name="jml_pertemuan" value="<?php echo $data['jml_pertemuan']; ?>" placeholder="Jumlah Pertemuan">                   
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Harga</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="harga"  value="<?php echo 'Rp. ' .
                    number_format($data['harga'],0,',','.'); ?>" id="rupiah" placeholder="Harga">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tanggal Mulai</label>
                  <div class="col-sm-9">
                    <input type="text" id="datepicker" class="form-control" name="tgl_mulai" placeholder="Tanggal Mulai" value="<?php echo date('m/d/Y', strtotime($data['tgl_mulai'])); ?>">                   
                  </div>
                </div>
                <div class="box-footer">
                 <a href="?module=data-program" class="btn btn-danger">Cancel</a>
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