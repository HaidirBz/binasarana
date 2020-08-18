<?php
$host 	= "localhost";
$user 	= "root";
$pass 	= "";
$dbName = "binasarana";
$konek	= mysqli_connect($host,$user,$pass,$dbName);
mysqli_select_db($konek, $dbName);

$query = "SELECT * FROM program_kursus ORDER BY nama_program";

$judul="LAPORAN DATA PROGRAM KURSUS";
$no = 0;
$header=array(10,130,35,35,35,35);

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
$pdf->cell($header[1],8,"Nama Program",1,'0','C',true);
$pdf->cell($header[2],8,"Kapasitas",1,'0','C',true);
$pdf->cell($header[3],8,"Jml Pertemuan",1,'0','C',true);
$pdf->cell($header[4],8,"Harga",1,'0','C',true);
$pdf->cell($header[5],8,"Tanggal Mulai",1,'0','C',true);

$pdf->Ln();
$pdf->SetFont('helvetica','B','9');
$pdf->setfillcolor(255,255,255);
$pdf->settextcolor(0);
$fill=false;
$data=array();
$sql = mysqli_query($konek, $query);
while($data=mysqli_fetch_array($sql)){
	$cellWidth = 130;
	$cellHeight = 8;

	if($pdf->GetStringWidth($data["nama_program"]) < $cellWidth){
		$line = 1;
	}
	else{
		$textLength = strlen($data["nama_program"]);
		$errMargin = 5;
		$startChar = 0;
		$maxChar = 0;
		$textArray = array();
		$tmpString = "";

		while($startChar < $textLength){
			while($pdf->GetStringWidth($tmpString) < ($cellWidth-$errMargin) && ($startChar+$maxChar) < $textLength){
				$maxChar++;
				$tmpString = substr($data["nama_program"], $startChar, $maxChar);
			}
			$startChar=$startChar+$maxChar;
			array_push($textArray, $tmpString);
			$maxChar = 0;
			$tmpString = 0;
		}
		$line = count($textArray);
	}

	$pdf->cell($header[0],($line * $cellHeight),++$no,1,'0','C',$fill);
	$xPos = $pdf->GetX();
	$yPos = $pdf->GetY();
	$pdf->Multicell($cellWidth,$cellHeight,$data["nama_program"],1,'0',$fill);
	$pdf->SetXY($xPos + $cellWidth, $yPos);
	$pdf->cell($header[2],($line * $cellHeight),$data["kapasitas"] . " Orang",1,'0','C',$fill);
	$pdf->cell($header[3],($line * $cellHeight),$data["jml_pertemuan"],1,'0','C',$fill);
	$pdf->cell($header[4],($line * $cellHeight),"Rp. ". number_format($data["harga"],'0',',','.'),1,'0',$fill);
	$pdf->cell($header[5],($line * $cellHeight),date('d-m-Y', strtotime($data["tgl_mulai"])),1,'0','C',$fill);
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
$pdf->output("BSM-data-program-kursus-($tgl).pdf","I");

?>
