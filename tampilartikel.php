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
    <td colspan="4"><h3>Artikel Kesehatan Kucing</h3></td>
  </tr>
   <tr>
    <th class="warning" width="80"><b>NO</b></th>
    <th class="warning"><b>JUDUL</b></th>
    <th class="warning"><b>AKSI</b></th>
  </tr>
    <?php
  	// Menampilkan daftar penyakit
	$sql = "SELECT * FROM artikel_kesehatan ORDER BY judul";
	$qry = mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
	$no	= 0;
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>

  <tr>
     <td align="center"><?php echo $no; ?></td>
    <td><?php echo $data['judul']; ?></td>
    <td><a class="btn btn-warning raised btn-xs" href="?page=read&id_artikel=<?php echo $data['id_artikel']; ?>"><small>Lihat</small></a></td>
  </tr>

  <?php
  }
  ?>
</table></br>
</div>
</body>
</html>
