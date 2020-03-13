<?php
include "../lib/inc.session.php";
include "../lib/inc.koneksidb.php";

// Membaca variabel dari URL (alamat browser)
$kdubah 		= isset($_GET['kdubah']) ? $_GET['kdubah'] : '';

# Menampilkan data
$sql = "SELECT * FROM penyakit WHERE kd_penyakit='$kdubah'";
$qry = mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
$data=mysql_fetch_array($qry);

	# Samakan dgn Variabel Form
	$TxtKode  		= isset($_POST['TxtKodeH']) ? $_POST['TxtKodeH'] : $data['kd_penyakit'];
	$TxtPenyakit 	= isset($_POST['TxtPenyakit']) ? $_POST['TxtPenyakit'] : $data['nm_penyakit'];
	$TxtKeterangan = isset($_POST['TxtKeterangan']) ? $_POST['TxtKeterangan'] : $data['keterangan']; 
	$TxtSolusi 		= isset($_POST['TxtSolusi']) ? $_POST['TxtSolusi'] : $data['solusi'];
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
<b>FORM UBAH DATA PENYAKIT</b>
  </div>
  <div class="panel-body">

    <form name="form1" method="post" action="PenyakitEditSim.php">
<table class="table table-striped">
<tr>

<tr >
  <td>Kode</td>
  <td><input name="TxtKode" type="text"  maxlength="4" size="10" value="<?php echo $TxtKode; ?>" disabled="disabled">
    <input name="TxtKodeH" type="hidden" value="<?php echo $TxtKode; ?>"></td>
</tr>
<tr >
  <td width="137">Nama Penyakit</td>
  <td width="452"><input name="TxtPenyakit" type="text" value="<?php echo $TxtPenyakit; ?>" size="60" maxlength="100"></td>
</tr>
<tr >
  <td>Keterangan</td>
  <td><textarea name="TxtKeterangan" cols="50" rows="4"><?php echo $TxtKeterangan; ?></textarea></td>
</tr>
<tr >
  <td>Solusi</td>
  <td><textarea name="TxtSolusi" cols="50" rows="4"><?php echo $TxtSolusi; ?></textarea></td>
</tr>
<tr >
  <td>&nbsp;</td>
  <td><input class="btn btn-sm btn-success raised" type="submit" name="Submit" value="Ubah Data">
  <a class="btn btn-sm btn-warning raised" href="PenyakitTampil.php">kembali</a>
  </td>

</tr>
</table>


</form>

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
