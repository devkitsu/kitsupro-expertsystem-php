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
    <b>LAPORAN DATA PASIEN</b>
		<?php
		$sql= "SELECT * FROM konsultasi";
		$qry= mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
		$total = mysql_num_rows($qry);
		$no = 1;
		echo "<p>Jumlah keseluruhan pasien saat ini ada $total pasien</p>";
	?>
  </div>
  <div class="panel-body">
    <table class="table table-striped" id="table">
   <tr> 
    <th width="1%">No</th>
	<th width="15%">Nama Pemilik</th>
	<th width="15%">Nama Anabul</th>
	<th width="6%">Jenis Kelamin</th>
	<th width="6%">Umur Anabul</th>
	<th width="20%">Ras</th>
	<th width="20%" colspan="2">Alamat</th>
  </tr>
  <?php 
  $sql = "SELECT * FROM konsultasi ORDER BY nama_pemilik";
  $qry = mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
  $no = 0;
  while ($data=mysql_fetch_array($qry)) {
  $no++;
  ?>
  <tr> 
    <td align="center"><?php echo $no; ?></td>
    <td><?php echo $data['nama_pemilik']; ?></td>
    <td><?php echo $data['nama_anabul']; ?></td>
    <td><?php echo $data['jkel_anabul']; ?></td>
    <td><?php echo $data['umur_anabul']; ?></td>
    <td><?php echo $data['ras_anabul']; ?></td>
    <td><?php echo $data['alamat']; ?></td>
    <td align="right"> 
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
