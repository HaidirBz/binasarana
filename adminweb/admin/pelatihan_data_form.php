<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<?php
	include "../config/autoid_function.php";
	include "../config/changedate_function.php";
	if(isset($_GET['programID'])){
		$program = mysqli_fetch_array(mysqli_query($connect, "SELECT a.program_id, a.nama_program FROM program_kursus a JOIN pendaftaran b ON(a.program_id=b.program_id) WHERE a.program_id=$id")); 
	}

	if($_GET['form'] == "add") {
		?>
		<section class="content-header">
			<h1>Data Pelatihan</h1>
			<ol class="breadcrumb">
				<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="?module=data-pelatihan"><i class="fa fa-calendar-check-o"></i> Pelatihan</a></li>
				<li class="active">Add Pelatihan</li>
			</ol>
		</section>
		<section class="content">
			<div class="row">
				<div class="col-md-12">
					<div class="box box-info">
						<div class="box-header with-border">
							<h3 class="box-title">Add Form</h3>
						</div>
						<form class="form-horizontal" method="POST" action="?module=data-pelatihan&act=add&programID=<?php echo $id; ?>">
							<div class="form-group">
								<h5 class="col-sm-1" align="center"><b>No</b></h5>
								<h5 class="col-sm-1" align="center"><b>Hari</b></h5>
								<h5 class="col-sm-7" align="center"><b>Pelatih</b></h5>
							</div>
							<?php
							$no = 1;
							$sql = mysqli_query($connect, "SELECT DISTINCT hari FROM jadwal WHERE program_id='$id'");
							?>
							<?php 
							while ($data = mysqli_fetch_array($sql)) { ?>
								<div class="form-group">
									<label class="col-sm-1 control-label"><center><?php echo $no++; ?></center></label>
									<div class="col-sm-2">
										<input type="text" readonly="" name="hari[]" class="form-control" value="<?php echo $data['hari']; ?>">
									</div>
									<div class="col-sm-7">
										<select name="pelatih_id[]" class="form-control" style="width: 100%;">
											<option disabled="" value="" selected="">=== Pilih Pelatih ===</option>
											<?php
											$sql4 = mysqli_query($connect, "SELECT pelatih_id, nama_pelatih from pelatih ORDER BY nama_pelatih");
											while($dataPelatih = mysqli_fetch_array($sql4)){ ?>
												<option value="<?php echo $dataPelatih['pelatih_id']; ?>"><?php echo $dataPelatih['nama_pelatih']; ?></option>
												<?php
											}
											?>
										</select>
									</div>
								</div>
								<?php
							}
							?>
							<div class="box-footer">
								<a href="?module=data-pelatihan" class="btn btn-danger">Cancel</a>
								<button type="submit" name="Save" class="btn btn-primary pull-right"><i class="fa fa-save fa-fw"></i> Save Data</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php 
}
else if($_GET['form'] == "edit") {
	$array_pelatih 	= array();

	$sql_pelatih  = mysqli_query($connect, "SELECT a.pelatih_id from pelatih a JOIN pelatihan b ON(a.pelatih_id=b.pelatih_id) JOIN program_kursus c ON(b.program_id=c.program_id) WHERE b.program_id='$_GET[programID]'");
	$jml_pelatih  = mysqli_num_rows($sql_pelatih);
	if($jml_pelatih > 0){
		while($ambil_pelatih = mysqli_fetch_array($sql_pelatih)){
			$array_pelatih[] = "\"$ambil_pelatih[0]\"";
		}
		$pelatih = implode(',', $array_pelatih);
	}
	?>
	<section class="content-header">
		<h1>Data Pelatihan</h1>
		<ol class="breadcrumb">
			<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="?module=data-pelatihan"><i class="fa fa-calendar-check-o"></i> Pelatihan</a></li>
			<?php 
			?>
			<li class="active">Edit Pelatihan</li>
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
					<form class="form-horizontal" method="POST" action="?module=data-pelatihan&act=edit&programID=<?php echo $id; ?>">
						<div class="box-body">
							<div class="form-group">
								<h5 class="col-sm-1" align="center"><b>No</b></h5>
								<h5 class="col-sm-1" align="center"><b>Pelatihan ID</b></h5>
								<h5 class="col-sm-1" align="center"><b>Hari</b></h5>
								<h5 class="col-sm-7" align="center"><b>Pelatih</b></h5>
							</div>
							<?php
							$no = 1;
							$sql = mysqli_query($connect, "SELECT * FROM pelatihan WHERE program_id='$id'"); 
							while ($data = mysqli_fetch_array($sql)) { ?>
								<div class="form-group">
									<label class="col-sm-1 control-label"><center><?php echo $no++; ?></center></label>
									<div class="col-sm-1">
										<input type="text" readonly="" name="pelatihan_id[]" class="form-control" value="<?php echo $data['pelatihan_id']; ?>">
									</div>
									<div class="col-sm-2">
										<input type="text" readonly="" name="hari[]" class="form-control" value="<?php echo $data['hari']; ?>">
									</div>
									<style>
										option:disabled{
											color: red;
										}
									</style>
									<div class="col-sm-7">
										<select name="pelatih_id[]" id="pelatih_id" class="form-control" style="width: 100%;">
											<option disabled="" value="" selected="">=== Pilih Pelatih ===</option>
											<?php
											if($jml_pelatih > 0){
												$sql4 = mysqli_query($connect, "SELECT pelatih_id, nama_pelatih from pelatih WHERE pelatih_id NOT IN($pelatih) OR pelatih_id='$data[pelatih_id]' ORDER BY nama_pelatih");
											}
											else {
												$sql4 = mysqli_query($connect, "SELECT pelatih_id, nama_pelatih from pelatih ORDER BY nama_pelatih");
											}
											while($dataPelatih = mysqli_fetch_array($sql4)){ ?>
												<option value="<?php echo $dataPelatih['pelatih_id']; ?>"<?php if($dataPelatih['pelatih_id']==$data['pelatih_id']){ ?> selected <?php } ?>><?php echo $dataPelatih['nama_pelatih']; ?></option>
												<?php
											}
											?>
										</select>
									</div>
								</div>
								<?php
							}
							?>
							<div class="box-footer">
								<a href="?module=data-pelatihan" class="btn btn-danger">Cancel</a>
								<button type="submit" name="Save" class="btn btn-primary pull-right"><i class="fa fa-save fa-fw"></i> Save Data</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<?php 
}
else if($_GET['form'] == "editPelatihan") {
	$jadwalID  		= $_GET['jadwalID'];
	$pelatihanID   	= $_GET['pelatihanID'];
	$array_pelatih 	= array();

	$sql_pelatih  = mysqli_query($connect, "SELECT a.dosen_id from pelaksana a JOIN pelatihan b ON(a.dosen_id=b.dosen_id) JOIN jadwal c ON(b.jadwal_id=c.jadwal_id) WHERE b.jadwal_id='$id' AND a.kategori='Pelatih/Pengawas'");
	$jml_pelatih  = mysqli_num_rows($sql_pelatih);
	if($jml_pelatih > 0){
		while($ambil_pelatih = mysqli_fetch_array($sql_pelatih)){
			$array_pelatih[] = "\"$ambil_pelatih[0]\"";
		}
		$pelatih = implode(',', $array_pelatih);
	}               
	?>
	<section class="content-header">
		<h1>Data Pelatihan <?php if(isset($_GET['jadwalID'])){ echo $tgl . " " . $bln . " " . $thn; } ?></h1>
		<ol class="breadcrumb">
			<li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="?module=data-pelatihan"><i class="fa fa-calendar-check-o"></i> Pelatihan</a></li>
			<li><a href="?module=data-pelatihan?jadwalID=<?php echo $jadwalID; ?>"><i class="fa fa-calendar-check-o"></i> Pelatihan <?php if(isset($_GET['jadwalID'])){ echo $tgl . " " . $bln . " " . $thn; } ?></a></li>
			<li class="active">Edit Pelatihan</li>
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
					<form class="form-horizontal" method="POST" action="?module=data-pelatihan&act=editPelatihan&jadwalID=<?php echo $jadwalID; ?>&pelatihanID=<?php echo $pelatihanID; ?>">
						<?php
						$sql = mysqli_query($connect, "SELECT * FROM pelatihan WHERE pelatihan_id='$pelatihanID'");
						$data = mysqli_fetch_array($sql);
						?>
						<div class="box-body">
							<div class="form-group">
								<label class="col-sm-2 control-label">Pelatihan ID</label>
								<div class="col-sm-9">
									<input type="text" disabled="" name="pelatihan_id" class="form-control" value="<?php echo $data['pelatihan_id'] ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Ruang</label>
								<div class="col-sm-9">
									<select name="ruang_id" class="form-control select2" style="width: 100%;">
										<option disabled="" selected="">=== Pilih Ruang ===</option>
										<?php
										if($jml_ruang > 0){
											$sql3 = mysqli_query($connect, "SELECT ruang_id, nama_ruang from ruang WHERE ruang_id NOT IN($ruang) OR ruang_id='$data[ruang_id]' ORDER BY nama_ruang");
										}
										else{
											$sql3 = mysqli_query($connect, "SELECT ruang_id, nama_ruang from ruang ORDER BY nama_ruang");                    
										}
										while($dataRuang = mysqli_fetch_array($sql3)){ ?>
											<option value="<?php echo $dataRuang['ruang_id']; ?>" <?php if($dataRuang['ruang_id']==$data['ruang_id']){ ?> selected <?php }?>><?php echo $dataRuang['nama_ruang']; ?></option>";
											<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Pelatih</label>
								<div class="col-sm-9">
									<select name="dosen_id" class="form-control select2" style="width: 100%;">
										<option disabled="" selected="">=== Pilih Pelaksana ===</option>
										<?php 
										if($jml_pelatih > 0){
											$sql4 = mysqli_query($connect, "SELECT dosen_id, nama_pelaksana from pelaksana WHERE (kategori='Pelatih/Pengawas' AND dosen_id NOT IN($pelatih)) OR dosen_id='$data[dosen_id]' ORDER BY nama_pelaksana");
										}
										else{
											$sql4 = mysqli_query($connect, "SELECT dosen_id, nama_pelaksana from pelaksana WHERE kategori='Pelatih/Pengawas' ORDER BY nama_pelaksana");                    
										}
										while($dataPelaksana = mysqli_fetch_array($sql4)){ ?>
											<option value="<?php echo $dataPelaksana['dosen_id']; ?>" <?php if($dataPelaksana['dosen_id']==$data['dosen_id']){ ?> selected <?php }?>><?php echo $dataPelaksana['nama_pelaksana']; ?></option>";
											<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="box-footer">
								<a href="?module=data-pelatihan&jadwalID=<?php echo $jadwalID; ?>" class="btn btn-danger">Cancel</a>
								<button type="submit" name="Save" class="btn btn-primary pull-right"><i class="fa fa-save fa-fw"></i> Save Data</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		</section><?php
	}
	?>
</div>
<!-- /.content-wrapper -->
<?php  
include "layout/footer.php";
?>
