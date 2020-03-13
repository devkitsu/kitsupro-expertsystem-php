<?php 
include "../lib/inc.koneksidb.php";
include "../lib/inc.session.php";  
# Baca variabel Form (If Register Global ON)
$sql = "SELECT * FROM akun WHERE username='" . $_SESSION['username'] . "'";
$qry = mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
$data=mysql_fetch_array($qry); 
$TxtId    = isset($_POST['TxtId']) ? $_POST['TxtId'] : $data['id_akun'];
$TxtNama  = isset($_POST['TxtNama']) ? $_POST['TxtNama'] : $data['name'];
$TxtAlamat  = isset($_POST['TxtAlamat']) ? $_POST['TxtAlamat'] : $data['alamat']; 
$TxtKontak  = isset($_POST['TxtKontak']) ? $_POST['TxtKontak'] : $data['kontak']; 
$TxtUserBaru = isset($_POST['TxtUserBaru']) ? $_POST['TxtUserBaru'] : '';
$TxtPassBaru = isset($_POST['TxtPassBaru']) ? $_POST['TxtPassBaru'] : '';
$TxtPassBaru2 = isset($_POST['TxtPassBaru2']) ? $_POST['TxtPassBaru2'] : '';
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
  <!-- Menu -->
	<?php include "../lib/inc.menu.php";?>

      <div class="col-md-10 content">
          <div class="panel panel-default">
  <div class="panel-heading">
    <b>FORM EDIT AKUN</b>
  </div>
  <div class="panel-body">
  <form action="editAkunSim.php" method="post" name="form1" target="_self">    
    <br>
    <h4>Masukan data profil baru</h4>
    <br>
	<div class="form-group">ID:
	<input name="TxtId" type="text"  maxlength="4" size="10" value="<?php echo $TxtId; ?>" disabled="disabled">
    <input name="TxtIdH" type="hidden" value="<?php echo $TxtId; ?>"></td>
    </div>
	<div class="form-group">Nama:
	<input class="form-control" name="TxtNama" type="text" value="<?php echo $TxtNama; ?>" size="35" maxlength="60">
    </div>
	<div class="form-group">Kontak:
	<input class="form-control" name="TxtKontak" type="text" value="<?php echo $TxtKontak; ?>" size="35" maxlength="60">
    </div>
	<div class="form-group">Alamat:
    <input class="form-control" name="TxtAlamat" value="<?php echo $TxtAlamat; ?>" size="35" maxlength="60">
    </div>
    <div class="form-group"> Username
    <input class="form-control" value="<?php echo $_SESSION['username']; ?>" placeholder="Masukkan Username Baru" name="TxtUserBaru" type="text" size="35" maxlength="60">
    </div>
    <div class="form-group">Password Baru
    <input placeholder="Password Baru" class="form-control" name="TxtPassBaru" type="password">
    </div>
    <div class="form-group">
    <input placeholder="Konfirmasi Password Baru" class="form-control" name="TxtPassBaru2" type="password">
    </div>
    <br>
    <div class="form-group">   
    <button type="submit" name="Submit" value="Lanjut" class="btn btn-success raised btn-sm">Simpan</button>
    <a class="btn btn-sm btn-warning raised" href="AkunTampil.php">kembali</a>
    </div>
    <br>
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


