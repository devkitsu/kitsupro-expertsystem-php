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
<b>FORM UBAH DATA ARTIKEL RAS KUCING</b>
  </div>
  <div class="panel-body">
  <?php
  # Menampilkan data
$sql = "SELECT artikel_ras_kucing.*, akun.* FROM artikel_ras_kucing, akun WHERE akun.id_akun=artikel_ras_kucing.id_akun AND id_ras='$kdubah'";
$qry = mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
$data=mysql_fetch_array($qry); 
  ?>
<form method="post" action="" enctype="multipart/form-data">
<table class="table table-hover">
	<tr class="success">
	</tr>
	<tr>
		<td >Ras</td>
		<td><input required type="text"  name="ras" value="<?php echo $data['ras']; ?>"  /></td>
	</tr>
	<tr>
		<td>Isi</td>
		<td>
			<textarea name="isi" required><?php echo $data['isi']; ?></textarea>
		</td>
	</tr>
	<tr>
		<td >Asal</td>
		<td><input required type="text"  name="asal" value="<?php echo $data['asal']; ?>"  /></td>
	</tr>
	<tr>
		<td >Gambar </td>
		<td><input type="file"  name="userfile" value=""  /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td><input class="btn btn-success"  type="submit" name="edit" value="UBAH DATA" />
		<a href="RasTampil.php" class="btn btn-danger" >Kembali</a>
		</td>
	</tr>
</table>
</form>
<?php	 if(isset($_POST['edit'])){
		function bersih($ras){
			$kata=mysql_escape_string($ras);	
			return $kata;
		}
		$ras=bersih($_POST['ras']);
		$isi=bersih($_POST['isi']);
		$asal=bersih($_POST['asal']);
		$tgl=date('Y-m-d');
		$uploaddir = '../res/';
		$fileName = $_FILES['userfile']['name'];     
		$tmpName  = $_FILES['userfile']['tmp_name']; 
		$uploadfile = $uploaddir . $fileName;
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) 
		{
		$sql="update artikel_ras_kucing set ras='$ras',isi='$isi',foto='$fileName', asal='$asal', tanggal='$tgl' where id_ras='".$_GET['kdubah']."'";
		mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
		$nm=$_GET['nm'];
		unlink("../res/$nm");
		echo'<script type="text/javascript">
			alert("Berhasil Edit");
			window.location="RasTampil.php"
		</script>';
		}else{
		$sql="update artikel_ras_kucing set ras='$ras',isi='$isi',asal='$asal',tanggal='$tgl' where id_ras='".$_GET['kdubah']."'";
		mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
		echo'<script type="text/javascript">
			alert("Berhasil Edit Ras");
			window.location="RasTampil.php"
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