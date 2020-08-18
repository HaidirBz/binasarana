<?php
$host 	= "localhost";
$user 	= "root";
$pass 	= "";
$dbName = "binasarana";
$konek	= mysqli_connect($host,$user,$pass,$dbName);
mysqli_select_db($konek, $dbName);

$query = "SELECT username, level FROM user ORDER BY username";


$judul="LAPORAN DATA USER";
$no = 0;
$header=array(10,100,50);

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
$pdf->SetLeftMargin(25);


$pdf->SetFont('helvetica','B','10');
	#Warna Label
$pdf->SetFillColor(20,150,200);
$pdf->SetTextColor(255);


$pdf->cell($header[0],8,"No",1,'0','C',true);
$pdf->cell($header[1],8,"Username",1,'0','C',true);
$pdf->cell($header[2],8,"Level",1,'0','C',true);
$pdf->Ln();
$pdf->SetFont('helvetica','B','9');
$pdf->setfillcolor(255,255,255);
$pdf->settextcolor(0);
$fill=false;
$data=array();
$sql = mysqli_query($konek, $query);
while($data=mysqli_fetch_array($sql)){
	$line = 1;
	$cellHeight = 8;

	$pdf->cell($header[0],($line * $cellHeight),++$no,1,'0','C',$fill);
	$pdf->cell($header[1],($line * $cellHeight),$data["username"],1,'0',$fill);
	$pdf->cell($header[2],($line * $cellHeight),$data["level"],1,'0',$fill);
	$pdf->Ln();
}
$pdf->Ln();
$tgl=date('d-m-Y');
$year=date('F Y');
$pdf->Ln();
$pdf->Cell(0,10,"Tangerang Selatan, $tgl",0,1,'R');
$pdf->Ln();
$pdf->SetFont('Times','U',10);
$pdf->Cell(0,10,$_GET['admin'],0,1,'R');
$pdf->SetY(-32);
#output file PDF
$pdf->output("BSM-data-user-($tgl).pdf","I");

?>
