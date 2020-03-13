<?php 
include "../lib/inc.koneksidb.php";
	
# Baca variabel Form 
$TxtKodeH    = $_POST['TxtKodeH'];
$CekGejala 	 = $_POST['CekGejala'];

# Validasi Form
if (trim($TxtKodeH)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Nama Penyakit belum dipilih, ulangi kembali</b>
	</div></div>';
	include "RelasiAddPilih.php";
}
else {
   $jum  = count($CekGejala);
   if ($jum==0) {
	 echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>BELUM ADA GEJALA YANG DIPILIH</b>
	</div></div>';
   }
   else {
	 # UNTUK MENGHAPUS YANG TIDAK DIPILIH LAGI
      // Kode untuk mendata relasi
	 $sqlpil = "SELECT * FROM relasi WHERE kd_penyakit='$TxtKodeH'";
	 $qrypil = mysql_query($sqlpil);
	 while ($datapil=mysql_fetch_array($qrypil)){
	    // Kode untuk mengurai Gejala yang dipilih
	    for ($i = 0; $i < $jum; ++$i) {	
		// Perintah untuk menghapus Relasi
		if ($datapil['kd_gejala'] != $CekGejala[$i]) {
		   $sqldel  = "DELETE FROM relasi WHERE kd_penyakit='$TxtKodeH' AND NOT kd_gejala IN ('$CekGejala[$i]')";
		   mysql_query($sqldel);
		  }
		}
	 }
		
	# UNTUK DATA GEJALA TAMBAHAN
	for ($i = 0; $i < $jum; ++$i) {	
	     // Perintah untuk mendapat relasi		
	     $sqlr  = "SELECT * FROM relasi WHERE kd_penyakit='$TxtKodeH' AND kd_gejala='$CekGejala[$i]'";
	     $qryr  = mysql_query($sqlr, $koneksi);
	     $cocok = mysql_num_rows($qryr);
		 
           // Gejala yang baru akan disimpan
	     if (! $cocok==1) {
		 $sql  = "INSERT INTO relasi (kd_penyakit,kd_gejala) VALUES ('$TxtKodeH','$CekGejala[$i]')";
		 mysql_query($sql, $koneksi) or die ("SQL Input Relasi Gagal".mysql_error());
	     }
	  }		
       // Pesan sebagai konfirmasi			
	  echo '<div class="container"><div class="isi alert alert-success role=alert">
	<b>SUKSES DISIMPAN</b>
	</div></div>';
	include "RelasiAddPilih.php";
	  
	}
}
?>
