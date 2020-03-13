<?php 
include "../lib/inc.koneksidb.php";
	
# Baca variabel Form  
$TxtKodeH 		= $_POST['TxtKodeH'];
$TxtPenyakit 	= $_POST['TxtPenyakit'];
$TxtKeterangan 	= $_POST['TxtKeterangan'];
$TxtSolusi   	= $_POST['TxtSolusi'];

# Validasi Form
if (trim($TxtKodeH)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Kode tidak ada, ulangi kembali</b>
	</div></div>';
	include "PenyakitEditFm.php";
}
elseif (trim($TxtPenyakit)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Nama Penyakit masih kosong, ulangi kembali</b>
	</div></div>';
	include "PenyakitEditFm.php";
}
elseif (trim($TxtKeterangan)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Definisi masih kosong, ulangi kembali</b>
	</div></div>';
	include "PenyakitEditFm.php";
}
elseif (trim($TxtSolusi)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Solusi masih kosong, ulangi kembali</b>
	</div></div>';
	include "PenyakitEditFm.php";
}
else {
	$sql  = " UPDATE penyakit SET 
					nm_penyakit='$TxtPenyakit',
					keterangan='$TxtKeterangan',
					solusi='$TxtSolusi'
			  WHERE kd_penyakit='$TxtKodeH' ";
	mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());

	echo '<div class="container"><div class="isi alert alert-success role=alert">
	<b>DATA PENYAKIT BERHASIL DIUBAH</b>
	</div></div>';
	include "PenyakitTampil.php";
}
?>
