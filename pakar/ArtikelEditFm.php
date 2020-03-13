<?php
include "../lib/inc.session.php";
include "../lib/inc.koneksidb.php";

$kdubah     = isset($_GET['kdubah']) ? $_GET['kdubah'] : '';
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
<b>FORM EDIT DATA ARTIKEL KESEHATAN</b>
  </div>
  <div class="panel-body">
  <?php
  # Menampilkan data
$sql = "SELECT artikel_kesehatan.*, akun.* FROM artikel_kesehatan, akun WHERE akun.id_akun=artikel_kesehatan.id_akun AND id_artikel='$kdubah'";
$qry = mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
$data=mysql_fetch_array($qry);
  ?>
<form method="post" action="" enctype="multipart/form-data">
<table class="table table-hover">
	<tr class="success">
	</tr>
	<tr>
		<td >Judul</td>
		<td><input required type="text"  name="judul" value="<?php echo $data['judul']; ?>"  /></td>
	</tr>
	<tr>
		<td>Isi</td>
		<td>
			<textarea name="isi" required><?php echo $data['isi']; ?></textarea>
		</td>
	</tr>
	<tr>
		<td >Gambar </td>
		<td><input type="file"  name="userfile" value=""  /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input class="btn btn-success"  type="submit" name="edit" value="Ubah DATA" />
		<a href="ArtikelTampil.php" class="btn btn-danger" >Kembali</a>
		</td>
	</tr>
</table>
</form>
<?php	 if(isset($_POST['edit'])){
		function bersih($judul){
			$kata=mysql_escape_string($judul);
			return $kata;
		}
		$judul=bersih($_POST['judul']);
		$isi=bersih($_POST['isi']);
		$tgl=date('Y-m-d');
		$uploaddir = '../res/';
		$fileName = $_FILES['userfile']['name'];
		$tmpName  = $_FILES['userfile']['tmp_name'];
		$uploadfile = $uploaddir . $fileName;
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
		{
		$sql="update artikel_kesehatan set judul='$judul',isi='$isi',foto='$fileName', tanggal='$tgl' where id_artikel='".$_GET['kdubah']."'";
		mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
		$nm=$_GET['nm'];
		unlink("../res/$nm");
		echo'<script type="text/javascript">
			alert("Berhasil Edit");
			window.location="ArtikelTampil.php"
		</script>';
		}else{
		$sql="update artikel_kesehatan set judul='$judul',isi='$isi',tanggal='$tgl' where id_artikel='".$_GET['kdubah']."'";
		mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
		echo'<script type="text/javascript">
			alert("Berhasil Edit Artikel");
			window.location="ArtikelTampil.php"
		</script>';
		}
}
?>
</div>
</div>
      </div>
    </div>
       <!-- footer start -->
<?php include "../lib/inc.footer.php";?>
<!-- footer end -->
</br>
</div>
</div>
</body>
</html>
