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
    <b>LAPORAN DATA PENYAKIT</b>
		<?php
		$sql= "SELECT * FROM penyakit";
		$qry= mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
		$total = mysql_num_rows($qry);
		$no = 1;
		echo "<p>Jumlah keseluruhan penyakit saat ini ada $total penyakit</p>";
	?>
  </div>
  <div class="panel-body">
    
    <table class="table table-striped">
  
  <?php 
$batas = 2;
$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : "";
 
if ( empty( $pg ) ) {
$posisi = 0;
$pg = 1;
} else {
$posisi = ( $pg - 1 ) * $batas;
}

  $sql = "SELECT * FROM penyakit ORDER BY kd_penyakit LIMIT $posisi, $batas";
  $qry = mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
  $no = 0;
  while ($data=mysql_fetch_array($qry)) {
  $no++;
  ?>
  <tr>
    <th width="120"><b>Kode</b></th>
    <th width="469"><b><?php echo $data['kd_penyakit']; ?></b></th>
  </tr>
  <tr>
    <td valign="top">Nama Penyakit </td>
    <td><?php echo $data['nm_penyakit']; ?></td>
  </tr>
  <tr>
    <td valign="top">Keterangan</td>
    <td><?php echo $data['keterangan']; ?></td>
  </tr>
  <tr> 
    <td valign="top">Solusi</td>
    <td><?php echo $data['solusi']; ?>
    <a href="LapGejalaPenyakit2.php?kdSakit=<?php echo $data['kd_penyakit']; ?>" target="_self"><span class="label label-danger">Lihat Gejalanya</span></a></td>
  </tr>
  <tr> 
    <td colspan="2">&nbsp;</td>
  </tr>
  <?php
  }
  ?>

<tr>
<td colspan="2">
<?php
//hitung jumlah data
$jml_data = mysql_num_rows(mysql_query("SELECT * FROM penyakit ORDER BY kd_penyakit"));
//Jumlah halaman
$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
 
//Navigasi ke sebelumnya
if ( $pg > 1 ) {
$link = $pg-1;
$prev = "<a href='?pg=$link'>Sebelumnya </a>";
} else {
$prev = "Sebelumnya ";
}
 
//Navigasi nomor
$nmr = '';
for ( $i = 1; $i<= $JmlHalaman; $i++ ){
 
if ( $i == $pg ) {
$nmr .= $i . " ";
} else {
$nmr .= "<a href='?pg=$i'>$i</a> ";
}
}
 
//Navigasi ke selanjutnya
if ( $pg < $JmlHalaman ) {
$link = $pg + 1;
$next = "<a href='?pg=$link'>Selanjutnya</a>";
} else {
$next = " Selanjutnya";
}
 
//Tampilkan navigasi
echo '<ul class=pager><li class=previous>'.$prev.'</li><li>'.$nmr.'</li><li class=next>'.$next.'</li></ul>';
?>
</td>
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
