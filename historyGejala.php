<?php
include "lib/inc.koneksidb.php";
$NOIP = $_SERVER['REMOTE_ADDR'];
?>

<html>
<head>
<title>Histori Gejala</title>
</head>
<body>
<div class="isi">
<table class="table table-striped">
	<?php
	$sql = "SELECT tmp_gejala.*, gejala.*
			FROM tmp_gejala,gejala
			WHERE tmp_gejala.kd_gejala=gejala.kd_gejala
			AND tmp_gejala.noip='$NOIP'";
	$qry = mysql_query($sql, $koneksi) or die ("Query Hasil salah".mysql_error());?>
  <tr>
    <th colspan="2"><h4>Histori Gejala Terpilih</h4></td>
  </tr>
   <tr><td>
	<?php
	$no	= 0;
	while($data= mysql_fetch_array($qry)){
		$no++;
    echo "$no . [$data[kd_gejala]] $data[nm_gejala]<br>";
		};
		?>
  </td></tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<div align="right"><a class="btn btn-warning btn-sm raised" href="index.php?page=hasil">Kembali</a></div>
</br>
</div>
</body>
</html>
