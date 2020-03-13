<?php 
include "../lib/inc.koneksidb.php";

// Membaca variabel dari URL (alamat browser)
$kdhapus 	= isset($_GET['kdhapus']) ? $_GET['kdhapus'] : '';	

if (isset($_GET['kdhapus'])) {	
	$sql = "DELETE FROM akun WHERE id_akun='$kdhapus'";
	mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
		
	echo '<script type="text/javascript">
			//<![CDATA[
			window.location="AkunTampil.php"
			//]]>
		</script>';
}
?>
