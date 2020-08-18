<?php
$host 		= "localhost";
$user 		= "root";
$pass 		= "";
$dbName 	= "binasarana";
$connect	= mysqli_connect($host,$user,$pass,$dbName);
mysqli_select_db($connect, $dbName);

include "../../config/changedate_function.php";
$pendaftaranID = $_GET['pendaftaranID'];

$dataProgram = mysqli_fetch_array(mysqli_query($connect, "SELECT a.program_id, b.jml_pertemuan, b.nama_program FROM pendaftaran a JOIN program_kursus b ON(a.program_id=b.program_id) WHERE a.pendaftaran_id='$pendaftaranID'"));


$query = "SELECT hari,tanggal FROM jadwal WHERE program_id='$dataProgram[program_id]'";


$judul="JADWAL PELATIHAN ";

$query2 = mysqli_fetch_array(mysqli_query($connect, "SELECT b.nama_peserta FROM pendaftaran a JOIN peserta b ON(a.peserta_id=b.peserta_id) WHERE a.pendaftaran_id='$pendaftaranID'"));

$no = 1;
$pertemuan=1;
$header=array("15","40","30");

include "fpdf/fpdf/fpdf.php";
$pdf = new FPDF();
$pdf->AddPage("P","A4");

#Tampilan judul laporan
// $pdf->Image('../assets/dist/img/icon.jpg', 10, 8, 26);
$pdf->Setfont('helvetica','B','16');
$pdf->Cell(0,7,'BINA SARANA MANDIRI','0',1,'C');
$pdf->Cell(0,7,'Ruko Pondok Cabe Mutiara, Jl. RE Martadinata','0',1,'C');
$pdf->Cell(0,7,'Pd. Cabe Udik, Kec. Pamulang','0',1,'C');
$pdf->Cell(0,7,'Kota Tangerang Selatan','0',1,'C');
$pdf->SetFont('helvetica','B','10','C');
$pdf->ln();
$pdf->Cell(0,7,$judul . strtoupper($query2['nama_peserta']),'4','3','C');
$pdf->Cell(0,7,$dataProgram['nama_program'],'4','3','C');

$pdf->ln();

#Header Title Laporan
$pdf->SetLineWidth(0.0);
$pdf->line(10,42,200,42);

$pdf->SetFillColor(20,150,200);
$pdf->SetTextColor(255);
$pdf->SetLeftMargin(38);

$sql_hari = mysqli_query($connect, "SELECT DISTINCT hari FROM jadwal WHERE program_id='$dataProgram[program_id]'");
$jml2 = mysqli_num_rows($sql_hari);

$pdf->SetFont('helvetica','B','9');
$pdf->cell($header[0],10,'NO',1,'0','C',true);
$pdf->cell($header[1],10,'PERTEMUAN',1,'0','C',true);
while ($hari = mysqli_fetch_array($sql_hari)) {
	$pdf->cell($header[1],10,strtoupper($hari['hari']),1,'0','C',true);
}
$pdf->SetFont('helvetica','','9');
$pdf->setfillcolor(255,255,255);
$pdf->settextcolor(0);
$fill=true;
$data=array();
$sql_jadwal = mysqli_query($connect, "SELECT jadwal_id,hari,tanggal FROM jadwal WHERE program_id='$dataProgram[program_id]'");
while($data2 = mysqli_fetch_array($sql_jadwal)){
	$dataTanggal[]  = $data2['tanggal'];
}
for($i=0; $i<$dataProgram['jml_pertemuan']; $i++){
	$pdf->Ln();
	$pdf->cell($header[0],8,$no++,1,'0','C',$fill);                  
	$pdf->cell($header[1],8,"PERTEMUAN " . $pertemuan++,1,'0','C',$fill);                  
	for($j=0; $j<$jml2; $j++){
		$tanggalData[$i] = ($j)+($i*$jml2);
		$pdf->cell($header[1],8,date("d-m-Y", strtotime($dataTanggal[$tanggalData[$i]])),1,'0','C',$fill);
	}
}
$pdf->Ln();

$tgl=date('d-m-Y');
$pdf->Ln();
$pdf->Cell(0,10,"(Tangerang Selatan,                                   )",0,1,'R');
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Times','U',10);
$pdf->Cell(0,10,"                                                                     ",0,1,'R');
$pdf->SetY(-32);
#output file PDF
$pdf->output("Jadwal-Pelatihan-$query2[nama_peserta]-($tgl).pdf","I");

?>
