<?php 
include "../lib/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$TxtKodeH 		= $_POST['TxtKodeH'];
$TxtPenyakit 	= $_POST['TxtPenyakit'];
$TxtKeterangan 	= $_POST['TxtKeterangan'];
$TxtSolusi   	= $_POST['TxtSolusi'];

# Validasi Form
if (trim($TxtKodeH)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Kode belum terbentuk, ulangi kembali</b>
	</div></div>';
	include "PenyakitAddFm.php";
}
elseif (trim($TxtPenyakit)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Nama Penyakit masih kosong, ulangi kembali</b>
	</div></div>';
	include "PenyakitAddFm.php";
}
elseif (trim($TxtKeterangan)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Keterangan masih kosong, ulangi kembali</b>
	</div></div>';
	include "PenyakitAddFm.php";
}
elseif (trim($TxtSolusi)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Solusi masih kosong, ulangi kembali</b>
	</div></div>';
	include "PenyakitAddFm.php";
}
else {
	// Menyimpan data ke tabel
	$sql  = " INSERT INTO penyakit (kd_penyakit, nm_penyakit, keterangan, solusi) ";
	$sql .=	" VALUES ('$TxtKodeH', '$TxtPenyakit', '$TxtKeterangan', '$TxtSolusi')";
	mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());

	echo '<div class="container"><div class="isi alert alert-success role=alert">
	<b>DATA TELAH BERHASIL DISIMPAN</b>
	</div></div>';
	include "PenyakitTampil.php";

	
}
?>
