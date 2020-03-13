<?php 
include "../lib/inc.koneksidb.php";
?>
<html>
<head>
<title>LAPORAN DATA ARTIKEL</title>
</head>
<body onLoad="window.print();">
<div class="panel-body">
<h4><center>LAPORAN DATA ARTIKEL</h4></center>
<table class="table table-striped">
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <th width="1%" align="center">No</th>
	<th width="25%">Judul</th>
	<th width="25%">Tanggal</th>
	<th width="50%" colspan="2">Author</th>
  </tr>
  <?php 
  $sql = "SELECT * FROM artikel ORDER BY id";
  $qry = mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
  $no = 0;
  while ($data=mysql_fetch_array($qry)) {
  $no++;
  ?>
  <tr> 
    <td align="center"><?php echo $no; ?></td>
    <td align="center"><?php echo $data['judul']; ?></td>
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
<div align="right"><a class="btn btn-warning btn-sm raised" href="cetakArtikel.PHP">Cetak</a></div></td>
  </tr>
</table>
</br>
</div>
</body>
</html>