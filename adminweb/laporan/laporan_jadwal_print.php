<?php
$host 	= "localhost";
$user 	= "root";
$pass 	= "";
$dbName = "binasarana";
$konek	= mysqli_connect($host,$user,$pass,$dbName);
mysqli_select_db($konek, $dbName);

$dataProgram = mysqli_fetch_array(mysqli_query($konek, "SELECT jml_pertemuan, nama_program FROM program_kursus WHERE program_id='$_GET[programID]'"));

$judul="DATA JADWAL " . strtoupper($dataProgram['nama_program']);
$no = 0;
$header=array(10,38,33);

include "fpdf/fpdf/fpdf.php";
$pdf = new FPDF();
$pdf->AddPage("P","A4");

#Tampilan judul laporan

$pdf->Setfont('helvetica','B','16');
$pdf->Cell(0,7,'BINA SARANA MANDIRI','0',1,'C');
$pdf->Cell(0,7,'Ruko Pondok Cabe Mutiara, Jl. RE Martadinata','0',1,'C');
$pdf->Cell(0,7,'Pd. Cabe Udik, Kec. Pamulang','0',1,'C');
$pdf->Cell(0,7,'Kota Tangerang Selatan','0',1,'C');
$pdf->SetFont('helvetica','B','10','C');
$pdf->ln();
$pdf->Cell(0,7,$judul,'4','3','C');
$pdf->ln();

#Header Title Laporan
$pdf->SetLineWidth(0.0);
$pdf->line(10,42,200,42);
$pdf->SetLeftMargin(50);

$pdf->SetFont('helvetica','B','10');
	#Warna Label
$pdf->SetFillColor(20,150,200);
$pdf->SetTextColor(255);
$pdf->cell($header[0],8,"No",1,'0','C',true);
$pdf->cell($header[1],8,"Pertemuan",1,'0','C',true);

$sql_hari = mysqli_query($konek, "SELECT DISTINCT hari FROM jadwal WHERE program_id='$_GET[programID]'");
$jml2 = mysqli_num_rows($sql_hari);
while($hari=mysqli_fetch_array($sql_hari)){
	$pdf->cell($header[2],8,$hari["hari"],1,'0','C',true);
}

$pdf->Ln();
$pdf->SetFont('helvetica','B','9');
$pdf->setfillcolor(255,255,255);
$pdf->settextcolor(0);
$fill=false;
$data=array();
$pertemuan=0;
$sql_jadwal = mysqli_query($konek, "SELECT jadwal_id,hari,tanggal FROM jadwal WHERE program_id='$_GET[programID]'");
while($data2 = mysqli_fetch_array($sql_jadwal)){
	$dataTanggal[]  = $data2['tanggal'];
}
for($i=0; $i<$dataProgram['jml_pertemuan']; $i++){
	$pdf->cell($header[0],8,++$no,1,'0','C',$fill);
	$pdf->cell($header[1],8,"Pertemuan " . ++$pertemuan,1,'0','C',$fill);
	for($j=0; $j<$jml2; $j++){
		$tanggalData[$i] = ($j)+($i*$jml2);
		$pdf->cell($header[2],8,date("d-m-Y", strtotime($dataTanggal[$tanggalData[$i]])),1,'0','C',$fill);
	}
	$pdf->Ln();
}
$pdf->Ln();
$tgl=date('d-m-Y');
$year=date('F Y');
$pdf->Cell(0,10,"Tangerang Selatan, $tgl",0,1,'R');
$pdf->Ln();
$pdf->SetFont('Times','U',10);
$pdf->Cell(0,10,$_GET['admin'],0,1,'R');
$pdf->SetY(-32);
#output file PDF
$pdf->output("Data Jadwal ($tgl).pdf","I");

?>
