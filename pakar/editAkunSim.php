<?php
include_once "../lib/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$TxtId 		= $_POST['TxtId'];
$TxtNama	= $_POST['TxtNama'];
$TxtAlamat 	= $_POST['TxtAlamat']; 
$TxtKontak 	= $_POST['TxtKontak']; 
$TxtUserBaru = $_POST['TxtUserBaru'];
$TxtPassBaru = $_POST['TxtPassBaru'];
$TxtPassBaru2 = $_POST['TxtPassBaru2'];
$_SESSION['username'] = isset($_SESSION['username']) ? $_SESSION['username'] : '';

if (trim($TxtUserBaru)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Username Baru kosong, ulangi kembali</b>
	</div></div>';
	include "editAkun.php"; exit;
}
elseif (trim($TxtNama)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Nama masih kosong, ulangi kembali</b>
	</div></div>';
	include "editAkun.php";
}
elseif (trim($TxtAlamat)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Alamat masih kosong, ulangi kembali</b>
	</div></div>';
	include "editAkun.php";
}
elseif (trim($TxtKontak)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Kontak masih kosong, ulangi kembali</b>
	</div></div>';
	include "editAkun.php";
}
elseif (trim($TxtPassBaru)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Password Baru kosong, ulangi kembali</b>
	</div></div>';
	include "editAkun.php"; exit;
}
elseif (trim($TxtPassBaru2)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Konfirmasi Password Baru kosong, ulangi kembali</b>
	</div></div>';
	include "editAkun.php"; exit;
}
elseif (trim($TxtPassBaru2)!=trim($TxtPassBaru)) {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Kedua Password baru harus sama, ulangi kembali</b>
	</div></div>';
	include "editAkun.php"; exit;
}else{
$enkrip_pass = md5($TxtPassBaru);
$sql = "UPDATE akun SET name='$TxtNama', alamat='$TxtAlamat', kontak='$TxtKontak',
		username = '$TxtUserBaru', password = '$enkrip_pass' WHERE id_akun='$TxtId'";
$qry = mysql_query($sql,$koneksi) or die ("Gagal Cek</br>".mysql_error());

//ganti session
$_SESSION['username'] = $TxtUserBaru;
//
echo '<div class="container"><div class="isi alert alert-success role=alert">
	<b>AKUN ANDA BERHASIL DIUBAH</b>
	</div></div>';
	include "index.php";
}
?>