<?php  
function ubahTanggal($tgl_mulai){
	$pisah = explode('/',$tgl_mulai);
	$array = array($pisah[2],$pisah[0],$pisah[1]);
	$satukan = implode('-',$array);
	return $satukan;
}

function ubahJam($jam_mulai){
	$array1 = array(1,2,3,4,5,6,7,8,9,10,11,12);
	$array2 = array(13,14,15,16,17,18,19,20,21,22,23,0);

	$ambil_jam  	= strrev(substr(strrev($jam_mulai),6));
	$ambil_menit 	= strrev(substr(strrev($jam_mulai),3,2));	
	$tipe 			= strrev(substr(strrev($jam_mulai),0,2));

	if($tipe == "PM"){
		for($i=0; $i<12; $i++){
			if($ambil_jam == $array1[$i]){
				$hasil = str_replace($array1[$i], $array2[$i], $ambil_jam);
				$jam = $hasil . ":" . $ambil_menit . ":00";			
			}
		}
	}
	else{
		$jam = $ambil_jam . ":" . $ambil_menit . ":00";
	}
	return $jam;
}

function balikJam($jam_jadwal){
	$array3 = array(1,2,3,4,5,6,7,8,9,10,11,12);
	$array4 = array(13,14,15,16,17,18,19,20,21,22,23,0);

	$ambil_jam2  	= substr($jam_jadwal,0,2);
	$ambil_menit2 	= substr($jam_jadwal,3,2);	

	for($i=0; $i<12; $i++){
		if($ambil_jam2 == $array3[$i]){
			$tipe2 	= "AM";
			$jam2 	= $ambil_jam2 . ":" . $ambil_menit2 . " " . $tipe2;
		}
		else{
			$tipe2	= "PM";
			$hasil2	= str_replace($array3[$i], $array4[$i], $ambil_jam2);
			$jam2 	= $hasil2 . ":" . $ambil_menit2 . " " . $tipe2;
		}
	}
	return $jam2;
}

function ubahHari($ambil_hari){
	$daftar_hari = array(
		'Sunday' 	=> 'Minggu',
		'Monday' 	=> 'Senin',
		'Tuesday' 	=> 'Selasa',
		'Wednesday' => 'Rabu',
		'Thursday' 	=> 'Kamis',
		'Friday' 	=> 'Jumat',
		'Saturday' 	=> 'Sabtu'
	);
	$nama_hari = date('l', strtotime($ambil_hari));
	return $daftar_hari[$nama_hari];
}

function ubahBulan($ambil_bulan){
	$daftar_bulan = array(
		'1' 	=> 'Januari',
		'2' 	=> 'Februari',
		'3' 	=> 'Maret',
		'4' 	=> 'April',
		'5' 	=> 'Mei',
		'6' 	=> 'Juni',
		'7' 	=> 'Juli',
		'8' 	=> 'Agustus',
		'9' 	=> 'September',
		'10' 	=> 'Oktober',
		'11' 	=> 'November',
		'12' 	=> 'Desember'
	);
	return $daftar_bulan[$ambil_bulan];
}
?>
