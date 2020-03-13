<?php
include "lib/inc.koneksidb.php";

$NOIP = $_SERVER['REMOTE_ADDR'];
$sql = "SELECT konsultasi.*, penyakit.*
		FROM konsultasi,penyakit
		WHERE penyakit.kd_penyakit=konsultasi.kd_penyakit
		AND konsultasi.noip='$NOIP'
		ORDER BY konsultasi.id_konsultasi DESC LIMIT 1";
$qry = mysql_query($sql, $koneksi) or die ("Query Hasil salah".mysql_error());
$data= mysql_fetch_array($qry);

?>
<html>
<head>
<title>Hasil Analisa</title>
</head>
<body onLoad="window.print();">
<center>
		<h2>HASIL KEMUNGKINAN DIAGNOSA PENYAKIT KUCING</h2>
	</center>
<div class="isi">
<table ALIGN="center" class="table table-striped">
    <tr>
    <td width="100">Tanggal</td>
    <td width="689">: <?php echo $data['tanggal']; ?></td>
  </tr>
    <tr>
    &nbsp;
  </tr>
  <tr>
    <td colspan="2" class="success"><b>DATA PASIEN</b></td>
  </tr>
  <tr>
    <td width="100">Nama Pemilik</td>
    <td width="689">: <?php echo $data['nama_pemilik']; ?></td>
  </tr>
   <tr>
    <td width="100">Nama Anabul</td>
    <td width="689">: <?php echo $data['nama_anabul']; ?></td>
  </tr>
  <tr>
    <td>Jenis Kelamin</td>
    <td>: <?php echo $data['jkel_anabul']; ?></td>
  </tr>
   <tr>
    <td width="100">Umur</td>
    <td width="689">: <?php echo $data['umur_anabul']; ?></td>
  </tr>
   <tr>
    <td width="100">Ras</td>
    <td width="689">: <?php echo $data['ras_anabul']; ?></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>: <?php echo $data['alamat']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="success" colspan="2"><b>HASIL ANALISA TERAKHIR</b></td>
  </tr>
  <tr>
    <td>Penyakit</td>
    <td><?php echo $data['kd_penyakit']." | ".$data['nm_penyakit']; ?></td>
  </tr>
  <tr>
    <td valign="top">Gejala</td>
    <td>
      <?php
	  	// Menampilkan daftar gejala
		$sql_gejala = "SELECT gejala.* FROM gejala,relasi
						WHERE gejala.kd_gejala=relasi.kd_gejala
						AND relasi.kd_penyakit='$data[kd_penyakit]'";
		$qry_gejala = mysql_query($sql_gejala, $koneksi);
		$i	= 0;
		while ($hsl_gejala=mysql_fetch_array($qry_gejala)) {
		$i++;
			echo "$i . $hsl_gejala[nm_gejala] <br>";
		}
		?>    </td>
  </tr>
  <tr>
    <td valign="top">Keterangan</td>
    <td><?php echo $data['keterangan']; ?></td>
  </tr>
  <tr>
    <td valign="top">Solusi</td>
    <td><?php echo $data['solusi']; ?></td>
  </tr>
</table>
<div align="right"><a class="btn btn-warning btn-sm raised" href="index.php?page=hasil">Kembali</a></div>
</br>
</div>
</body>
</html>
