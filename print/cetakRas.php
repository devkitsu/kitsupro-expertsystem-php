<?php 
include "../lib/inc.koneksidb.php";
?>
<html>
<head>
<title>LAPORAN DATA RAS</title>
</head>
<body onLoad="window.print();">
<div class="panel-body">
<h4><center>LAPORAN DATA RAS</h4></center>
<table class="table table-striped">
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <th width="1%" align="center">No</th>
	<th width="25%">Ras</th>
	<th width="20%">Asal</th>
	<th width="10%">Tanggal</th>
	<th width="60%" colspan="2">Author</th>
  </tr>
  <?php 
  $sql = "SELECT * FROM artikel_ras ORDER BY ras";
  $qry = mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
  $no = 0;
  while ($data=mysql_fetch_array($qry)) {
  $no++;
  ?>
  <tr> 
    <td align="center"><?php echo $no; ?></td>
    <td align="center"><?php echo $data['ras']; ?></td>
    <td align="center"><?php echo $data['asal']; ?></td>
    <td align="center"><?php echo $data['tanggal']; ?></td>
    <td align="center"><?php echo $data['username']; ?></td>
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
<div align="right"><a class="btn btn-warning btn-sm raised" href="cetakRas.PHP">Cetak</a></div></td>
  </tr>
</table>
</br>
</div>
</body>
</html>