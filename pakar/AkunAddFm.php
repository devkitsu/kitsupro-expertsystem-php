<?php 
include "../lib/inc.session.php"; 
include "../lib/inc.koneksidb.php";
# Membaca data pada form, lalu datanya ditampilkan sebagai Value form
$TxtNama	= isset($_POST['TxtNama']) ? $_POST['TxtNama'] : ''; 
$TxtJkel 	= isset($_POST['TxtJkel']) ? $_POST['TxtJkel'] : ''; 
$TxtAlamat 	= isset($_POST['TxtAlamat']) ? $_POST['TxtAlamat'] : ''; 
$TxtKontak 	= isset($_POST['TxtKontak']) ? $_POST['TxtKontak'] : ''; 
$TxtUname 	= isset($_POST['TxtUname']) ? $_POST['TxtUname'] : ''; 
$TxtPass 	= isset($_POST['TxtPass']) ? $_POST['TxtPass'] : ''; 
$TxtTipe 	= isset($_POST['TxtTipe']) ? $_POST['TxtTipe'] : ''; 
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
<b>FORM TAMBAH DATA AKUN</b>
  </div>
  <div class="panel-body">
  
    <form name="form1" method="post" action="AkunAddSim.php">
	<div class="form-group">Nama:
	<input class="form-control" name="TxtNama" type="text" value="<?php echo $TxtNama; ?>" size="35" maxlength="60">
    </div>
    <div class="form-group">Jenis Kelamin:
    <label class="radio-inline"><input type="radio" name="TxtJkel" value="L" checked>L</label>
    <label class="radio-inline"><input type="radio" name="TxtJkel" value="P">P</label>
    </div>
	<div class="form-group">Hak Akses:
    <label class="radio-inline"><input type="radio" name="TxtTipe" value="Pakar" checked>Pakar</label>
    <label class="radio-inline"><input type="radio" name="TxtTipe" value="Admin">Admin</label>
    </div>
	<div class="form-group">Kontak:
	<input class="form-control" name="TxtKontak" type="text" value="<?php echo $TxtKontak; ?>" size="35" maxlength="60">
    </div>
	<div class="form-group">Alamat:
    <input class="form-control" name="TxtAlamat" type="text" value="<?php echo $TxtAlamat;?>" size="35" maxlength="60">
    </div>
	<div class="form-group">Username:
	<input class="form-control" name="TxtUname" type="text" value="<?php echo $TxtUname; ?>" size="35" maxlength="60">
    </div>
	<div class="form-group">Password:
	<input class="form-control" name="TxtPass" type="password" value="<?php echo $TxtPass; ?>" size="35" maxlength="60">
	</div>

    <br>
    <div class="form-group">   
    <button type="submit" name="Submit" value="Lanjut" class="btn btn-success raised btn-sm">Simpan</button>
    <button type="reset" name="Reset" value="Reset" class="btn btn-danger raised btn-sm">Reset</button>
    </div>
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

