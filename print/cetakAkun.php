<?php 
include "../lib/inc.koneksidb.php";
?>
<html>
<head>
<title>LAPORAN DATA AKUN</title>
</head>
<body onLoad="window.print();">
<div class="panel-body">
<h4><center>LAPORAN DATA AKUN</h4></center>
<table class="table table-striped">
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <th width="1">No</th>
	<th width="15%">Hak Akses</th>
	<th width="20%">Nama</th>
	<th width="5%">Jenis Kelamin</th>
	<th width="20%">Kontak</th>
	<th width="10%">Alamat</th>
	<th width="25%" colspan="2">Username</th>
  </tr>
  <?php 
  $sql = "SELECT * FROM users ORDER BY hak_akses";
  $qry = mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
  $no = 0;
  while ($data=mysql_fetch_array($qry)) {
  $no++;
  ?>
  <tr> 
    <td align="center"><?php echo $no; ?></td>
    <td align="center"><?php echo $data['hak_akses']; ?></td>
    <td align="center"><?php echo $data['name']; ?></td>
	<td align="center"><?php echo $data['jkel']; ?></td>
    <td align="center"><?php echo $data['kontak']; ?></td>
	<td align="center"><?php echo $data['alamat']; ?></td>
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
<div align="right"><a class="btn btn-warning btn-sm raised" href="cetakAkun.PHP">Cetak</a></div></td>
  </tr>
</table>
</br>
</div>
</body>
</html>