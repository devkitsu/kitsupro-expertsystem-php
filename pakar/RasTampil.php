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
<b>MENGELOLA DATA ARTIKEL RAS KUCING</b>
	<?php
		$sql= "SELECT * FROM artikel_ras_kucing";
		$qry= mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
		$total = mysql_num_rows($qry);
		$no = 1;
		echo "<p>Jumlah keseluruhan ras saat ini ada $total ras</p>";
	?>
	<br>
  <a href="RasAddFm.php" class="btn btn-xs btn-success raised" target="_self">Tambah</a>
  <!-- <a href="cetakRas.php" class="btn btn-xs btn-success raised" >Cetak Laporan</a> -->
  </div>
  
  <div class="panel-body">
    <table class="table table-striped" id="table">
   <tr> 
    <th width="1%" align="center">No</th>
	<th width="25%">Ras</th>
	<th width="20%">Asal</th>
	<th width="10%">Tanggal</th>
	<th width="60%" colspan="2">Author</th>
  </tr>
  <?php 
  $sql = "SELECT artikel_ras_kucing.*, akun.* FROM artikel_ras_kucing, akun WHERE akun.id_akun=artikel_ras_kucing.id_akun ORDER BY artikel_ras_kucing.tanggal";
  $qry = mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
  $no = 0;
  while ($data=mysql_fetch_array($qry)) {
  $no++;
  ?>
  <tr> 
    <td align="center"><?php echo $no; ?></td>
    <td><?php echo $data['ras']; ?></td>
    <td><?php echo $data['asal']; ?></td>
    <td><?php echo $data['tanggal']; ?></td>
    <td><?php echo $data['name']; ?></td>
    <td align="right"> 
	<?php
	$sql2 = "SELECT akun.name FROM akun WHERE username='" . $_SESSION['username'] . "' ";
	$qry2 = mysql_query($sql2, $koneksi)  or die ("SQL Error".mysql_error());
	$data2=mysql_fetch_array($qry2);
		if ($data['id_akun'] != $data2['name'] && $_SESSION['username'] != $data['username']) {
		} else {
			echo "<a href=\"RasEditFm.php?kdubah=$data[id_ras]&nm=$data[foto]\" class=\"btn btn-xs btn-success raised\" target=\"_self\">Ubah</a> ";
			echo "<a href=\"RasHapus.php?kdhapus=$data[id_ras]&nm=$data[foto]\" onclick=\"return confirm('Yakin Mau Hapus..?');\" class=\"btn btn-xs btn-danger raised\" target=\"_self\">Hapus</a>";
		}
	?></tr>
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
