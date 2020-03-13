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
    <b>LAPORAN DATA</b>
  </div>
  <div class="panel-body">
    <table class="table table-striped">
	<?php		
		$sql  = "SELECT hak_akses FROM akun WHERE username='" . $_SESSION['username'] . "'";
		$qry  = mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
		$data = mysql_fetch_array($qry);
	?>
	<?php
		if($data['hak_akses'] == "Admin") { # Admin's features
	?>
    <tr>
	<td>Laporan Data Penyakit
	<td><a class="btn btn-xs btn-success raised" href="LapPenyakitSemua.php" target="_self">Lihat</a>
	</td>
	</tr>
	<tr>
	<td>Laporan Data Gejala
	<td><a class="btn btn-xs btn-success raised" href="LapGejala.php" target="_self">Lihat</a></td></td>
	</td>
	</tr>
	<tr>
	<td>Laporan Data Konsultasi
	<td><a class="btn btn-xs btn-success raised" href="LapKonsulSemua.php" target="_self">Lihat</a></td>
	</td>
	</tr>
	<tr>
	<td>Laporan Data Akun
	<td><a class="btn btn-xs btn-success raised" href="LapPakar.php" target="_self">Lihat</a></td>
	</td>
	</tr>
	<tr>
	<td>Laporan Data Pasien
	<td><a class="btn btn-xs btn-success raised" href="PasienTampil.php" target="_self">Lihat</a></td>
	</td>
	</tr>
	<tr>
	<td>Laporan Data Artikel Kesehatan
	<td><a class="btn btn-xs btn-success raised" href="LapArtikel.php" target="_self">Lihat</a></td>
	</td>
	</tr>
	<tr>
	<td>Laporan Data Artikel Ras
	<td><a class="btn btn-xs btn-success raised" href="LapRas.php" target="_self">Lihat</a></td>
	</td>
	</tr>
	 <?php
    } else { # Doctor's features
      ?>
	  <tr>
	<td>Laporan Data Penyakit
	<td><a class="btn btn-xs btn-success raised" href="LapPenyakitSemua.php" target="_self">Lihat</a>
	</td>
	</tr>
	<tr>
	<td>Laporan Data Gejala
	<td><a class="btn btn-xs btn-success raised" href="LapGejala.php" target="_self">Lihat</a></td></td>
	</td>
	</tr>
	<tr>
	<td>Laporan Data Konsultasi
	<td><a class="btn btn-xs btn-success raised" href="LapKonsulSemua.php" target="_self">Lihat</a></td>
	</td>
	</tr>
	<tr>
	<td>Laporan Data Pasien
	<td><a class="btn btn-xs btn-success raised" href="PasienTampil.php" target="_self">Lihat</a></td>
	</td>
	</tr>
	<tr>
	<td>Laporan Data Artikel Kesehatan
	<td><a class="btn btn-xs btn-success raised" href="LapArtikel.php" target="_self">Lihat</a></td>
	</td>
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
