<?php 
include "../lib/inc.session.php"; 
include "../lib/inc.koneksidb.php";

// Membaca data dari form
$kdSakit = isset($_GET['kdSakit']) ? $_GET['kdSakit'] : ''; 
$kdSakit = isset($_POST['CmbPenyakit']) ? $_POST['CmbPenyakit'] : $kdSakit; 

$sqlp = "SELECT * FROM penyakit WHERE kd_penyakit='$kdSakit' ";
$qryp = mysql_query($sqlp);
$datap= mysql_fetch_array($qryp);
$sakit = $datap['nm_penyakit'];
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
  <b>DAFTAR GEJALA PENYAKIT : <?php echo strtoupper($sakit); ?></b>
  </div>
  <div class="panel-body">
    
  
<table class="table table-striped">
  
  <tr> 
    <th width="26" align="center"><b>No</b></th>
    <th width="70"><b>Kode</b></th>
    <th width="488"><b>Nama Gejala</b></th>
  </tr>
  <?php 
  $sqlg  = "SELECT gejala.* FROM gejala,relasi WHERE gejala.kd_gejala=relasi.kd_gejala AND  relasi.kd_penyakit='$kdSakit' ORDER BY gejala.kd_gejala";
  $qryg = mysql_query($sqlg, $koneksi) or die ("SQL Error".mysql_error());
  $no = 0;
  while ($datag=mysql_fetch_array($qryg)) {
  $no++;
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td align="center"><?php echo $no; ?></td>
    <td><?php echo $datag['kd_gejala']; ?></td>
    <td><?php echo $datag['nm_gejala']; ?></td>
  </tr>
  <?php
  }
  ?>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
</table>

<div align="right"><a class="btn btn-warning raised btn-sm"href="LapPenyakitSemua.php">kembali</a></div>

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
