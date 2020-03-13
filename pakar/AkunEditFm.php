<?php 
include "../lib/inc.session.php"; 
include "../lib/inc.koneksidb.php";
// Membaca variabel dari URL (alamat browser)
$kdubah     = isset($_GET['kdubah']) ? $_GET['kdubah'] : '';  
# Menampilkan data
$sql = "SELECT * FROM akun WHERE id_akun='$kdubah'";
$qry = mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
$data=mysql_fetch_array($qry); 
  # Samakan dgn Variabel Form
  $TxtId    = isset($_POST['TxtIdH']) ? $_POST['TxtIdH'] : $data['id_akun'];
  $TxtNama  = isset($_POST['TxtNama']) ? $_POST['TxtNama'] : $data['name']; 
  $TxtJkel  = isset($_POST['TxtJkel']) ? $_POST['TxtJkel'] : $data['jkel']; 
  $TxtAlamat  = isset($_POST['TxtAlamat']) ? $_POST['TxtAlamat'] : $data['alamat']; 
  $TxtKontak  = isset($_POST['TxtKontak']) ? $_POST['TxtKontak'] : $data['kontak']; 
  $TxtUname  = isset($_POST['TxtUname']) ? $_POST['TxtUname'] : $data['username']; 
  $TxtPass  = isset($_POST['TxtPass']) ? $_POST['TxtPass'] : $data['password']; 
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
<b>FORM UBAH DATA AKUN</b>
  </div>
  <div class="panel-body">
    
<form name="form1" method="post" action="AkunEditSim.php">
	<div class="form-group">ID:
	<input name="TxtId" type="text"  maxlength="4" size="10" value="<?php echo $TxtId; ?>" disabled="disabled">
    <input name="TxtIdH" type="hidden" value="<?php echo $TxtId; ?>"></td>
    </div>
	<div class="form-group">Nama:
	<input class="form-control" name="TxtNama" type="text" value="<?php echo $TxtNama; ?>" size="35" maxlength="60">
    </div>
    <div class="form-group">Jenis Kelamin:
    <label class="radio-inline"><input type="radio" name="TxtJkel" value="L" checked>L</label>
    <label class="radio-inline"><input type="radio" name="TxtJkel" value="P">P</label>
    </div>
	<div class="form-group">Kontak:
	<input class="form-control" name="TxtKontak" type="text" value="<?php echo $TxtKontak; ?>" size="35" maxlength="60">
    </div>
	<div class="form-group">Alamat:
    <input class="form-control" name="TxtAlamat" value="<?php echo $TxtAlamat; ?>" size="35" maxlength="60">
    </div>
	<div class="form-group">Username:
	<input class="form-control" name="TxtUname" type="text" value="<?php echo $TxtUname; ?>" size="35" maxlength="60">
    </div>
	<div class="form-group">Password:
	<input class="form-control" name="TxtPass" type="password" value="<?php echo $TxtPass; ?>" size="35" maxlength="60">
	</div>
<table>
    <td>&nbsp;</td>
      <td><input class="btn btn-sm btn-success raised"  type="submit" name="Submit" value="Ubah Data">
          <a class="btn btn-sm btn-warning raised" href="AkunTampil.php">kembali</a>
      </td>
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
