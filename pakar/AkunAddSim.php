<?php 
include "../lib/inc.koneksidb.php";

// Membaca variabel dari Form
$TxtNama	= $_POST['TxtNama'];
$TxtJkel 	= $_POST['TxtJkel'];
$TxtAlamat 	= $_POST['TxtAlamat'];
$TxtKontak 	= $_POST['TxtKontak'];
$TxtUname 	= $_POST['TxtUname'];
$TxtPass 	= md5($_POST['TxtPass']);
$TxtTipe 	= $_POST['TxtTipe'];

// Validasi form
if (trim($TxtNama)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Nama masih kosong, ulangi kembali</b>
	</div></div>';
	include "AkunAddFm.php";
}
elseif (trim($TxtAlamat)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Alamat masih kosong, ulangi kembali</b>
	</div></div>';
	include "AkunAddFm.php";
}
elseif (trim($TxtKontak)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Kontak masih kosong, ulangi kembali</b>
	</div></div>';
	include "AkunAddFm.php";
}
elseif (trim($TxtUname)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Username masih kosong, ulangi kembali</b>
	</div></div>';
	include "AkunAddFm.php";
}
elseif (trim($TxtPass)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Password masih kosong, ulangi kembali</b>
	</div></div>';
	include "AkunAddFm.php";
}
else {
	// Skrip menyimpan data ke dalam tabel database
	$sql  = " INSERT INTO akun (name, jkel, alamat, kontak, username, password, hak_akses)
			VALUES('$TxtNama', '$TxtJkel', '$TxtAlamat', '$TxtKontak', '$TxtUname', '$TxtPass', '$TxtTipe')";
	mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());

	echo '<div class="container"><div class="isi alert alert-success role=alert">
	<b>DATA TELAH BERHASIL DISIMPAN</b>
	</div></div>';
	include "AkunTampil.php";


}
?>
