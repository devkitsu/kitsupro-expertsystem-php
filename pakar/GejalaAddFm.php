<?php 
include "../lib/inc.session.php"; 
include "../lib/inc.koneksidb.php";
include "../lib/inc.kodeauto.php";
# Membaca data pada form, lalu datanya ditampilkan sebagai Value form
$TxtKode  = kdauto("gejala","G");
$TxtGejala = isset($_POST['TxtNama']) ? $_POST['TxtNama'] : ''; 
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
<b>FORM TAMBAH DATA GEJALA</b>
  </div>
  <div class="panel-body">
    
<form name="form1" method="post" action="GejalaAddSim.php">
  <table class="table table-striped">
    <tr> 
      <td>Kode</td>
      <td><input name="TxtKode" type="text"  maxlength="4" size="10" value="<?php echo $TxtKode; ?>" disabled="disabled">
        <input name="TxtKodeH" type="hidden" value="<?php echo $TxtKode; ?>"></td>
    </tr>
    <tr> 
      <td width="110">Nama Gejala</td>
      <td width="479"><textarea name="TxtGejala" cols="50" rows="3"><?php echo $TxtGejala; ?></textarea></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><input class="btn btn-sm btn-success raised" type="submit" name="Submit" value="Simpan">
          <input class="btn btn-sm btn-danger raised" type="reset" name="Reset" value="Reset">
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

