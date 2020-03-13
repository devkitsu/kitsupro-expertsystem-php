<?php 
include "lib/inc.koneksidb.php";
?>
<html>
<head>
<?php include "lib/inc.head2.php";?>
<title>Data Artikel</title></head>
<body>
  <div class="isi" ><br>
<table class="table table-striped table-hover">
  <tr>
    <td colspan="4"><h3>RAS KUCING</h3></td>
  </tr>
   <tr>
    <th class="warning" width="80"><b>NO</b></th>
    <th class="warning"><b>JENIS RAS KUCING</b></th>
    <th class="warning"><b></b>ASAL</th>
    <th class="warning"><b></b>AKSI</th>
  </tr>
    <?php
  	// Menampilkan daftar penyakit
	$sql = "SELECT * FROM artikel_ras_kucing ORDER BY ras";
	$qry = mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
	$no	= 0;
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>

  <tr>
     <td align="center"><?php echo $no; ?></td>
    <td><?php echo $data['ras']; ?></td>
    <td><?php echo $data['asal']; ?></td>
    <td><a class="btn btn-warning raised btn-xs" href="?page=read2&id_ras=<?php echo $data['id_ras']; ?>"><small>Lihat</small></a></td>
  </tr>

  <?php
  }
  ?>
</table></br>
</div>
</body>
</html>
