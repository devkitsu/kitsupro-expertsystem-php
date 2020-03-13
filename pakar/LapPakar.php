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
    <b>LAPORAN DATA AKUN</b>
	<?php
		$sql= "SELECT * FROM akun WHERE hak_akses='pakar'";
		$qry= mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
		$total = mysql_num_rows($qry);
		$no = 1;
		echo "<p>Jumlah keseluruhan pakar saat ini ada $total pakar</p>";
	?>
  </div>
  <div class="panel-body">
    <table class="table table-striped" id="table">
   <tr> 
    <th width="5" align="center">No</th>
    <th width="200">Nama</th>
	<th width="5">J.K</th>
	<th width="300">Alamat</th>
	<th width="80">Kontak</th>
    <th width="280" colspan="2">Username</th>
  </tr>
  <?php 
  $sql = "SELECT * FROM akun WHERE hak_akses='pakar' ORDER BY id_akun";
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
