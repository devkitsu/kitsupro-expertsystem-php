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
	include "GejalaAddFm.php";
}
elseif (trim($TxtGejala)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Gejala masih kosong, ulangi kembali</b>
	</div></div>';
	include "GejalaAddFm.php";
}
else 
	// Skrip menyimpan data ke dalam tabel database
	$sql  = " INSERT INTO gejala (kd_gejala, nm_gejala) VALUES('$TxtKodeH', '$TxtGejala')";
	mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());

	echo '<div class="container"><div class="isi alert alert-success role=alert">
	<b>DATA TELAH BERHASIL DISIMPAN</b>
	</div></div>';
	include "GejalaTampil.php"

?>
