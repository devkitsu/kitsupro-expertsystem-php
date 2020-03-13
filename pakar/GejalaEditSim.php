<?php 
include "../lib/inc.koneksidb.php";
	
// Membaca variabel dari Form
$TxtKodeH 	= $_POST['TxtKodeH'];
$TxtGejala 	= $_POST['TxtGejala'];

// Validasi form
if (trim($TxtKodeH)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Kode belum terbentuk, ulangi kembali</b>
	</div></div>';
	include "GejalaEditFm.php";
}
elseif (trim($TxtGejala)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Gejala masih kosong, ulangi kembali</b>
	</div></div>';
	include "GejalaEditFm.php";
}
else {
	// Skrip menyimpan data ke dalam tabel database
	$sql  = " UPDATE gejala SET nm_gejala='$TxtGejala' WHERE kd_gejala='$TxtKodeH'";
	mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());

	echo '<div class="container"><div class="isi alert alert-success role=alert">
	<b>DATA TELAH BERHASIL DIUBAH</b>
	</div></div>';

	include "GejalaTampil.php";
}
?>
