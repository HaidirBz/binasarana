<?php
$host 		= "localhost";
$user 		= "root";
$pass 		= "";
$dbName 	= "binasarana";
$connect	= mysqli_connect($host,$user,$pass,$dbName);
mysqli_select_db($connect, $dbName);

	include "../../config/changedate_function.php";
	$pelatihanID 		= $_GET['pelatihanID'];

	$pelatihan = mysqli_fetch_array(mysqli_query($connect, "SELECT DISTINCT b.program_id, a.nama_program FROM program_kursus a INNER JOIN pelatihan b ON(a.program_id=b.program_id) WHERE b.pelatihan_id='$pelatihanID'"));


	$query = "SELECT c.hari, c.tanggal FROM pelatih a JOIN pelatihan b ON(a.pelatih_id=b.pelatih_id) JOIN jadwal c ON(b.hari=c.hari) WHERE b.pelatihan_id='$pelatihanID'";
	$judul="JADWAL PELATIHAN ";

	$query2 = mysqli_fetch_array(mysqli_query($connect, "SELECT b.nama_pelatih FROM pelatihan a JOIN pelatih b ON(a.pelatih_id=b.pelatih_id) WHERE a.pelatihan_id='$pelatihanID'"));

$no = 1;
$header=array(
	array("label"=>"NO","length"=>"15"),
	array("label"=>"HARI","length"=>"30"),
	array("label"=>"TANGGAL","length"=>"40"),
	array("label"=>"TANDA TANGAN","length"=>"30")
);

include "fpdf/fpdf/fpdf.php";
$pdf = new FPDF();
$pdf->AddPage("P","A4");
$pdf->SetAutoPageBreak(false);

#Tampilan judul laporan
// $pdf->Image('../assets/dist/img/icon.jpg', 10, 8, 26);
$pdf->Setfont('helvetica','B','16');
$pdf->Cell(0,7,'BINA SARANA MANDIRI','0',1,'C');
$pdf->Cell(0,7,'Ruko Pondok Cabe Mutiara, Jl. RE Martadinata','0',1,'C');
$pdf->Cell(0,7,'Pd. Cabe Udik, Kec. Pamulang','0',1,'C');
$pdf->Cell(0,7,'Kota Tangerang Selatan','0',1,'C');
$pdf->SetFont('helvetica','B','10','C');
$pdf->ln();
$pdf->Cell(0,7,$judul . strtoupper($query2['nama_pelatih']),'4','3','C');
$pdf->Cell(0,7,$pelatihan['nama_program'],'4','3','C');

$pdf->ln();

#Header Title Laporan
$pdf->SetLineWidth(0.0);
$pdf->line(10,42,200,42);
$pdf->SetLeftMargin(50);

$pdf->SetFillColor(20,150,200);
$pdf->SetTextColor(255);

$pdf->SetFont('helvetica','B','9');
$pdf->cell($header[0]['length'],10,'NO',1,'0','C',true);
$pdf->cell($header[1]['length'],10,'HARI',1,'0','C',true);
$pdf->cell($header[2]['length'],10,'TANGGAL',1,'0','C',true);
$pdf->cell($header[3]['length'],10,'TANDA TANGAN',1,'0','C',true);
$pdf->SetFont('helvetica','','9');
$pdf->Ln();
$pdf->setfillcolor(255,255,255);
$pdf->settextcolor(0);
$fill=true;
$data=array();
$sql = mysqli_query($connect, $query);
while($data=mysqli_fetch_array($sql)){
	$pdf->cell($header[0]['length'],8,$no++,1,'0','C',$fill);
	$pdf->cell($header[1]['length'],8,$data["hari"],1,'0','C',$fill);
	$pdf->cell($header[2]['length'],8,date("d-m-Y", strtotime($data["tanggal"])),1,'0','C',$fill);
	$pdf->Cell($header[3]['length'],8,'',1,'0',$fill);
	$pdf->Ln();
}
$tgl=date('d-m-Y');
$pdf->Ln();
$pdf->Cell(0,10,"(Tangerang Selatan,                                   )",0,1,'R');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','U',10);
$pdf->Cell(0,10,"                                                                     ",0,1,'R');
$pdf->SetY(-32);
#output file PDF
$pdf->output("Jadwal-Pelatihan-$query2[nama_pelatih]-($tgl).pdf","I");

?>
