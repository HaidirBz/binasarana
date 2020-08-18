<?php
$host 	= "localhost";
$user 	= "root";
$pass 	= "";
$dbName = "binasarana";
$konek	= mysqli_connect($host,$user,$pass,$dbName);
mysqli_select_db($konek, $dbName);

if(isset($_GET['pesertaID']) && !empty($_GET['pesertaID'])){
	$pesertaID = $_GET['pesertaID'];
	$query = "SELECT a.username, b.nama_peserta, b.jk, b.email, b.no_hp FROM user a INNER JOIN peserta b ON (a.user_id=b.user_id) WHERE peserta_id='$pesertaID'";
}
else{
	$query = "SELECT a.username, b.nama_peserta, b.jk, b.email, b.no_hp FROM user a INNER JOIN peserta b ON (a.user_id=b.user_id) ORDER BY b.nama_peserta";
}

$judul="LAPORAN DATA PESERTA";
$no = 0;
$header=array(10,85,60,10,75,40);

include "fpdf/fpdf/fpdf.php";
$pdf = new FPDF();
$pdf->AddPage("L","A4");

#Tampilan judul laporan

$pdf->Setfont('helvetica','B','18');
$pdf->Cell(0,7,'BINA SARANA MANDIRI','0',1,'C');
$pdf->Cell(0,7,'Ruko Pondok Cabe Mutiara, Jl. RE Martadinata, Pd. Cabe Udik, Kec. Pamulang','0',1,'C');
$pdf->Cell(0,7,'Kota Tangerang Selatan','0',1,'C');
$pdf->SetFont('helvetica','B','12','C');
$pdf->ln();
$pdf->Cell(0,7,$judul,'4','3','C');
$pdf->ln();
$pdf->SetLeftMargin(10);

#Header Title Laporan
$pdf->SetLineWidth(0.0);
$pdf->line(10,35,290,35);

$pdf->SetFont('helvetica','B','10');
	#Warna Label
$pdf->SetFillColor(20,150,200);
$pdf->SetTextColor(255);
$pdf->cell($header[0],8,"No",1,'0','C',true);
$pdf->cell($header[1],8,"Nama Lengkap",1,'0','C',true);
$pdf->cell($header[2],8,"Username",1,'0','C',true);
$pdf->cell($header[3],8,"JK",1,'0','C',true);
$pdf->cell($header[4],8,"Email",1,'0','C',true);
$pdf->cell($header[5],8,"No Handphone",1,'0','C',true);

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
	$pdf->cell($header[1],($line * $cellHeight),$data["nama_peserta"],1,'0',$fill);
	$pdf->cell($header[2],($line * $cellHeight),$data["username"],1,'0',$fill);
	$pdf->cell($header[3],($line * $cellHeight),$data["jk"],1,'0','C',$fill);
	$pdf->cell($header[4],($line * $cellHeight),$data["email"],1,'0',$fill);
	$pdf->cell($header[5],($line * $cellHeight),$data["no_hp"],1,'0',$fill);
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
$pdf->output("BSM-data-peserta-($tgl).pdf","I");

?>
