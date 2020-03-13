<?php 
include "lib/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$TxtNama 		= isset($_POST['TxtNama']) ? $_POST['TxtNama'] : '';
$TxtNama2 		= isset($_POST['TxtNama2']) ? $_POST['TxtNama2'] : '';
$RbKelamin 		= isset($_POST['RbKelamin']) ? $_POST['RbKelamin'] : '';
$TxtUmur 		= isset($_POST['TxtUmur']) ? $_POST['TxtUmur'] : '';
$TxtRas 		= isset($_POST['TxtRas']) ? $_POST['TxtRas'] : '';
$TxtAlamat 		= isset($_POST['TxtAlamat']) ? $_POST['TxtAlamat'] : '';
?>
<html>
<head>
<title>Form Masukan Data Pasien</title>
</head>
<body><br><br>
<div class="isi col-md-5 col-md-offset-7">
<form action="?page=daftarsim" method="post" name="form1" target="_self">
    
    <br>
    <h4>Masukan data anda dan anabul untuk mulai konsultasi</h4>
    <br>
    <div class="form-group">Nama Pemilik:
	<input class="form-control" placeholder="Masukkan Nama Pemilik" name="TxtNama" type="text" value="<?php echo $TxtNama; ?>" size="35" maxlength="60">
    </div>
	<div class="form-group">Nama Kucing: 
    <input class="form-control" placeholder="Masukkan Nama Kucing" name="TxtNama2" type="text" value="<?php echo $TxtNama2; ?>" size="35" maxlength="60">
    </div>
    <div class="form-group">Jenis Kelamin Kucing:
    <label class="radio-inline"><input type="radio" name="RbKelamin" value="Jantan" checked>Jantan</label>
    <label class="radio-inline"><input type="radio" name="RbKelamin" value="Betina">Betina</label>
    </div>
	<div class="form-group">Umur Kucing:
	<input class="form-control" placeholder="Masukkan Umur" name="TxtUmur" type="text" value="<?php echo $TxtUmur; ?>" size="35" maxlength="60">
    </div>
	<div class="form-group">Ras Kucing:
	<input class="form-control" placeholder="Masukkan Ras" name="TxtRas" type="text" value="<?php echo $TxtRas; ?>" size="35" maxlength="60">
    </div>
    <div class="form-group">Alamat Pemilik:
    <textarea placeholder="Alamat" class="form-control" name="TxtAlamat" value="<?php echo $TxtAlamat;?>"></textarea>
    </div>

    <br>
    <div class="form-group">   
    <button type="submit" name="Submit" value="Lanjut" class="btn btn-success raised btn-sm">Lanjut</button>
    <button type="reset" name="Reset" value="Reset" class="btn btn-danger raised btn-sm">Reset</button>
    </div>
  
    <br>
  
</form>
</div>

</body>
</html>
