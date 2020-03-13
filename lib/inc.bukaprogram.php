<?php
$page = isset($_GET['page']) ? $_GET['page']: '';
if ($page=="dafpenyakit"){
	if(file_exists ("tampilpenyakit.php")){
		include "tampilpenyakit.php";
		}
		else{
			echo"File program penyakit tidak ada!";
			}
	}
elseif ($page=="artikel"){
	if(file_exists ("tampilartikel.php")){
		include "tampilartikel.php";
		}
		else{
			echo"File program gejala penyakit tidak ada!";
			}
	}
elseif ($page=="read"){
	if(file_exists ("bacaartikel.php")){
		include "bacaartikel.php";
		}
		else{
			echo"File program gejala penyakit tidak ada!";
			}
	}
elseif ($page=="read2"){
	if(file_exists ("bacaras.php")){
		include "bacaras.php";
		}
		else{
			echo"File program gejala penyakit tidak ada!";
			}
	}
elseif ($page=="ras"){
	if(file_exists ("tampilras.php")){
		include "tampilras.php";
		}
		else{
			echo"File program gejala penyakit tidak ada!";
			}
	}
elseif ($page=="about"){
	if(file_exists ("about.php")){
		include "about.php";
		}
		else{
			echo"File program gejala penyakit tidak ada!";
			}
	}
elseif ($page=="dafgejala"){
	if(file_exists ("tampilgejala.php")){
		include "tampilgejala.php";
		}
		else{
			echo"File program gejala penyakit tidak ada!";
			}
	}
elseif ($page=="daftar"){
	if(file_exists ("pasienaddfm.php")){
		include "pasienaddfm.php";
		}
		else{
			echo"File program form pasien tidak ada!";
			}
	}
elseif ($page=="daftarsim"){
	if(file_exists ("pasienaddsim.php")){
		include "pasienaddsim.php";
		}
		else{
			echo"File program form simpan pasien tidak ada!";
			}
	}
elseif ($page=="konsul"){
	if(file_exists ("konsultasifm.php")){
		include "konsultasifm.php";
		}
		else{
			echo"File program form konsultasi tidak ada!";
			}
	}
elseif ($page=="konsulcek"){
	if(file_exists ("konsultasiperiksa.php")){
		include "konsultasiperiksa.php";
		}
		else{
			echo"File program konsultasi periksa tidak ada!";
			}
	}
elseif ($page=="hasil"){
	if(file_exists ("analisahasil.php")){
		include "analisahasil.php";
		}
		else{
			echo"File program analisa hasil tidak ada!";
			}
	}
elseif ($page=="cetak"){
	if(file_exists ("cetakAnalisaHasil.php")){
		include "cetakAnalisaHasil.php";
		}
		else{
			echo"File program tidak ada!";
			}
	}
	elseif ($page=="histori"){
		if(file_exists ("historyGejala.php")){
			include "historyGejala.php";
			}
			else{
				echo"File program tidak ada!";
				}
		}
?>
