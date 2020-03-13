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
<b>FORM TAMBAH DATA ARTIKEL KESEHATAN</b>
  </div>
  <div class="panel-body">
<form method="post" action="" enctype="multipart/form-data">
<table class="table table-hover">
<?php
		$sql="SELECT * FROM  akun WHERE username='" . $_SESSION['username'] . "'";
		$qry = mysql_query($sql, $koneksi)  or die ("SQL Error".mysql_error());
		$data=mysql_fetch_array($qry);
		?>
	<tr class="success">
	</tr>
	<tr>
		<td >Judul</td>
		<td><input required type="text"  name="judul" value=""  /></td>
	</tr>
	<tr>
		<td>Isi</td>
		<td>
			<textarea name="isi" required>Isi Artikel</textarea>
		</td>
	</tr>
	<tr>
		<td >Gambar </td>
		<td><input required type="file"  name="userfile" value=""  /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
  <td><input class="btn btn-sm btn-success raised" type="submit" name="save" value="Simpan">
      <input class="btn btn-sm btn-danger raised" type="reset" name="Reset" value="Reset">
  </td>
	</tr>
</table>
</form>

<?php	 if(isset($_POST['save'])){
		function bersih($judul){
			$kata=mysql_escape_string($judul);
			return $kata;
		}
		$nama= $data['id_akun'];
		$judul=bersih($_POST['judul']);
		$isi=bersih($_POST['isi']);
		$tgl=date('Y-m-d');
		$uploaddir = '../res/';
		$fileName = $_FILES['userfile']['name'];
		$tmpName  = $_FILES['userfile']['tmp_name'];
		$uploadfile = $uploaddir . $fileName;
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
		{
		$sql="insert into artikel_kesehatan values('','$nama','$judul'
		,'$isi','$fileName', '$tgl')";
		mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
		echo'<script type="text/javascript">
			alert("Berhasil Tambah Artikel");
			window.location="ArtikelTampil.php"
		</script>';
		}else
		echo'<script type="text/javascript">
			alert("Gagal Tambah Artikel");
		</script>';
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
