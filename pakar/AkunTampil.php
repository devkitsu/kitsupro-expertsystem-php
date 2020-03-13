<?php 
include "../lib/inc.session.php"; 
include "../lib/inc.koneksidb.php";
?>

<!DOCTYPE html>
<html>
<head>
    <?php include "../lib/inc.head.php";?>
</head>
<body>
  <div class="container-fluid">
    <div class="isi"><br>

<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <?php include "../lib/inc.dashboardpakar.php";?>

  <!-- navbar kanan collapse -->
    <?php include "../lib/inc.navbar.php";?>
	<!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav> </br>

  <div class="container-fluid main-container">
      <div class="col-md-2 sidebar">
        <div class="row">
  <!-- uncomment code for absolute positioning tweek see top comment in css -->
  <div class="absolute-wrapper"> </div>
<!-- menu -->
  <?php include "../lib/inc.menu.php";?>
  <!-- menu -->
      <div class="col-md-10 content">
          <div class="panel panel-default">
  <div class="panel-heading">
<b>MENGELOLA DATA AKUN</b>
	<?php
		$sql= "SELECT * FROM akun";
		$qry= mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
		$total = mysql_num_rows($qry);
		$no = 1;
		echo "<p>Jumlah keseluruhan user saat ini ada $total user</p>";
	?>
	<br>
  <a href="AkunAddFm.php" class="btn btn-xs btn-success raised" target="_self">Tambah</a>
  <!-- <a href="../print/cetakAkun.php" class="btn btn-xs btn-success raised" >Cetak Laporan</a> -->
  </div>
  
  <div class="panel-body">
    <table class="table table-striped" id="table">
   <tr> 
    <th width="1" align="center">No</th>
	<th width="15%">Nama</th>
	<th width="3%">J.K</th>
	<th width="25%">Alamat</th>
	<th width="20%">Kontak</th>
	<th width="10%">Username</th>
	<th width="25%" colspan="2">Tipe</th>
  </tr>
  <?php 
  $sql = "SELECT * FROM akun ORDER BY hak_akses";
  $qry = mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
  $no = 0;
  while ($data=mysql_fetch_array($qry)) {
  $no++;
  ?>
  <tr> 
    <td align="center"><?php echo $no; ?></td>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['jkel']; ?></td>
	<td><?php echo $data['alamat']; ?></td>
    <td><?php echo $data['kontak']; ?></td>
	<td><?php echo $data['username']; ?></td>
    <td><?php echo $data['hak_akses']; ?></td>
    <td align="right"> 
	<?php
		if ($data['hak_akses'] == "Admin") {
			echo "<a href=\"AkunEditFm.php?kdubah=$data[id_akun]\" class=\"btn btn-xs btn-success raised\" target=\"_self\">Ubah</a>";
		} else {
			echo "<a href=\"AkunEditFm.php?kdubah=$data[id_akun]\" class=\"btn btn-xs btn-success raised\" target=\"_self\">Ubah</a> ";
			echo "<a href=\"AkunHapus.php?kdhapus=$data[id_akun]\" onclick=\"return confirm('Yakin Mau Hapus..?');\" class=\"btn btn-xs btn-danger raised\" target=\"_self\">Hapus</a>";
		}
	?>
  </tr>
  <?php
  }
  ?>
</table>
</div>
</div>
      </div>
    </div>
</br>
       <!-- footer start -->
<?php include "../lib/inc.footer.php";?>
<!-- footer end -->
</br>
</div>
</div>
</body>
</html>
