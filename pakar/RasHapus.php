<?php 
include "../lib/inc.koneksidb.php";

// Membaca variabel dari URL (alamat browser)
$kdhapus 	= isset($_GET['kdhapus']) ? $_GET['kdhapus'] : '';	

if (isset($_GET['kdhapus'])) {	
	$nm=$_GET['nm'];
		unlink("../res/$nm");
	$sql = "DELETE FROM artikel_ras_kucing	WHERE id_ras='$kdhapus'";
	mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
		
	echo '<script type="text/javascript">
			//<![CDATA[
			window.location="RasTampil.php"
			//]]>
		</script>';
}
?>
