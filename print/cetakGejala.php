<?php 
include "../lib/inc.koneksidb.php";
?>
<html>
<head>
<title>LAPORAN DATA GEJALA</title>
</head>
<body onLoad="window.print();">
<div class="panel-body">
<h4><center>LAPORAN DATA GEJALA</h4></center>
<table class="table table-striped">
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <th width="23" align="center">No</th>
    <th width="60">Kode</th>
    <th width="400" colspan="2">Nama Gejala</th>
  </tr>
  <?php 
  $sql = "SELECT * FROM gejala ORDER BY kd_gejala";
  $qry = mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
  $no = 0;
  while ($data=mysql_fetch_array($qry)) {
  $no++;
  ?>
  <tr> 
    <td align="center"><?php echo $no; ?></td>
    <td align="center"><?php echo $data['kd_gejala']; ?></td>
    <td align="center"><?php echo $data['nm_gejala']; ?></td>
	</tr>
	<?php
  }
  ?>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
    <tr> 
    <td valign="top">
<div align="right"><a class="btn btn-warning btn-sm raised" href="cetakGejala.PHP">Cetak</a></div></td>
  </tr>
</table>
</br>
</div>
</body>
</html>