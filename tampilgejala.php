<?php 
include "lib/inc.koneksidb.php";

// Menampilkan Daftar penyakit berdasarkan KodeSakit
$kdsakit = $_REQUEST['kdsakit'];
$sqlp = "SELECT * FROM penyakit WHERE kd_penyakit='$kdsakit' ";
$qryp = mysql_query($sqlp);
$datap= mysql_fetch_array($qryp);
$sakit = $datap['nm_penyakit'];
?>
<html>
<head>
<title>Tampilan Data Gejala</title>
</head>
<body>
  <div class="isi">
<br><table class="table table-striped table-hover">
  <tr> 
    <td colspan="2"><b>GEJALA DARI PENYAKIT : <?php echo strtoupper($sakit); ?></b></td>
  </tr>
  <tr> 
    <th width="80"><b>KODE</b></th>
    <th width="1120"><b>NAMA GEJALA</b></th>
  </tr>
  <?php 
	$sqlg  = "SELECT gejala.* FROM gejala,relasi ";
	$sqlg .= "WHERE gejala.kd_gejala=relasi.kd_gejala ";
	$sqlg .= "AND  relasi.kd_penyakit='$kdsakit' ";
	$sqlg .= "ORDER BY gejala.kd_gejala";
	$qryg = mysql_query($sqlg, $koneksi)  or die ("SQL Error".mysql_error());
	$no	= 0;
	while ($datag=mysql_fetch_array($qryg)) {
	$no++;
  ?>
  <tr> 
    <td><?php echo $datag['kd_gejala']; ?></td>
    <td><?php echo $datag['nm_gejala']; ?></td>
  </tr>
  <?php
  }
  ?>
  <tr> 
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
<div align="right"><a class="btn btn-warning raised btn-sm"href="?page=dafpenyakit">kembali</a></div>
<br>
</div>
</body>
</html>
