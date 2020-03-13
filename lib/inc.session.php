<?php
session_start();
if(! isset($_SESSION['username'])) {
	echo "<div align=center><b> PERHATIAN! </b><br>";
	echo "AKSES DITOLAK, PAKAR BELUM LOGIN<br>
	<a href=../index.php>kembali</a>
	</div>";

	exit;
}
?>
