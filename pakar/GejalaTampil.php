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
<b>MENGELOLA DATA GEJALA</b>
	<?php
		$sql= "SELECT * FROM gejala";
		$qry= mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
		$total = mysql_num_rows($qry);
		$no = 1;
		echo "<p>Jumlah keseluruhan gejala saat ini ada $total gejala</p>";
	?>
	<br>
  <a href="GejalaAddFm.php" class="btn btn-xs btn-success raised" target="_self">Tambah</a>
  <!-- <a href="../print/cetakGejala.php" class="btn btn-xs btn-success raised" >Cetak Laporan</a> -->
  </div>
  <div class="panel-body">
    <table class="table table-striped" id="table">
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
    <td><?php echo $data['kd_gejala']; ?></td>
    <td><?php echo $data['nm_gejala']; ?></td>
    <td align="right">
    <a class="btn btn-xs btn-success raised" href="GejalaEditFm.php?kdubah=<?php echo $data['kd_gejala']; ?>" target="_self">Ubah</a>
    <a class="btn btn-xs btn-danger raised" href="GejalaHapus.php?kdhapus=<?php echo $data['kd_gejala']; ?>" onclick="return confirm('Yakin Mau Hapus..?');" target="_self">Hapus</a></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
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
