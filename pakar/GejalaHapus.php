<?php 
include "../lib/inc.koneksidb.php";

// Membaca variabel dari URL (alamat browser)
$kdhapus 	= isset($_GET['kdhapus']) ? $_GET['kdhapus'] : '';	

if (isset($_GET['kdhapus'])) {	
	$sql = "DELETE FROM gejala	WHERE kd_gejala='$kdhapus'";
	mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
		  
	$sql2 = "DELETE FROM relasi WHERE kd_gejala='$kdhapus'";
	mysql_query($sql2, $koneksi);
		
	echo '<script type="text/javascript">
			//<![CDATA[
			window.location="GejalaTampil.php"
			//]]>
		</script>';
}
?>
