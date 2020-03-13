<?php 
include "lib/inc.koneksidb.php";

# Baca variabel Form (If Register Global ON)
$RbPilih 	= $_REQUEST['RbPilih'];
$TxtKdGejala= $_REQUEST['TxtKdGejala'];

# Mendapatkan No NOIP
$NOIP 		= $_SERVER['REMOTE_ADDR'];

# Fungsi untuk menambah data ke tmp_analisa
function AddTmpAnalisa($kdgejala, $NOIP) {
	$sql_sakit = "SELECT relasi.* FROM relasi,tmp_penyakit 
				  WHERE relasi.kd_penyakit=tmp_penyakit.kd_penyakit 
				  AND noip='$NOIP' ORDER BY relasi.kd_penyakit,relasi.kd_gejala";
	$qry_sakit = mysql_query($sql_sakit) or die ("Query error :".mysql_error());
	
	while ($data_sakit = mysql_fetch_array($qry_sakit)) {
		$sqltmp = "INSERT INTO tmp_analisa (noip, kd_penyakit,kd_gejala)
					VALUES ('$NOIP','$data_sakit[kd_penyakit]','$data_sakit[kd_gejala]')";
		mysql_query($sqltmp) or die ("Query error :".mysql_error());
	}
}

# Fungsi hapus tabel tmp_gejala
function AddTmpGejala($kdgejala, $NOIP) {
	$sql_gejala = "INSERT INTO tmp_gejala (noip,kd_gejala) VALUES ('$NOIP','$kdgejala')";
	mysql_query($sql_gejala) or die ("Query error :".mysql_error());
}

# Fungsi hapus tabel tmp_sakit
function DelTmpSakit($NOIP) {
	$sql_del = "DELETE FROM tmp_penyakit WHERE noip='$NOIP'";
	mysql_query($sql_del) or die ("Query error :".mysql_error());
}

# Fungsi hapus tabel tmp_analisa
function DelTmpAnlisa($NOIP) {
	$sql_del = "DELETE FROM tmp_analisa WHERE noip='$NOIP'";
	mysql_query($sql_del) or die ("Query error :".mysql_error());
}

# PEMERIKSAAN
if ($RbPilih == "YA") {
	$sql_analisa = "SELECT * FROM tmp_analisa where noip='$NOIP'";
	$qry_analisa = mysql_query($sql_analisa, $koneksi) or die ("Query error :".mysql_error());
	$data_cek = mysql_num_rows($qry_analisa);
	if ($data_cek >= 1) {
		# Kode saat tmp_analisa tidak kosong
		DelTmpSakit($NOIP);
		$sql_tmp = "SELECT * FROM tmp_analisa 
					WHERE kd_gejala='$TxtKdGejala' 
					AND noip='$NOIP'";
		$qry_tmp = mysql_query($sql_tmp, $koneksi) or die ("Query error :".mysql_error());
		while ($data_tmp = mysql_fetch_array($qry_tmp)) {
			$sql_rsakit = "SELECT * FROM relasi 
							WHERE kd_penyakit='$data_tmp[kd_penyakit]' 
							GROUP BY kd_penyakit";
			$qry_rsakit = mysql_query($sql_rsakit, $koneksi) or die ("Query error :".mysql_error());
			while ($data_rsakit = mysql_fetch_array($qry_rsakit)) {
				// Data penyakit yang mungkin dimasukkan ke tmp
				$sql_input = "INSERT INTO tmp_penyakit (noip,kd_penyakit)
							 VALUES ('$NOIP','$data_rsakit[kd_penyakit]')";
				mysql_query($sql_input, $koneksi) or die ("Query error :".mysql_error());
			}
		} 
		// Gunakan Fungsi
		DelTmpAnlisa($NOIP);
		AddTmpAnalisa($TxtKdGejala, $NOIP);
		AddTmpGejala($TxtKdGejala, $NOIP);
	}	
	else {
		# Kode saat tmp_analisa kosong
		$sql_rgejala = "SELECT * FROM relasi WHERE kd_gejala='$TxtKdGejala'";
		$qry_rgejala = mysql_query($sql_rgejala, $koneksi) or die ("Query error :".mysql_error());
		while ($data_rgejala = mysql_fetch_array($qry_rgejala)) {
			$sql_rsakit = "SELECT * FROM relasi 
						   WHERE kd_penyakit='$data_rgejala[kd_penyakit]' 
						   GROUP BY kd_penyakit";
			$qry_rsakit = mysql_query($sql_rsakit, $koneksi) or die ("Query error :".mysql_error());
			while ($data_rsakit = mysql_fetch_array($qry_rsakit)) {
				// Data penyakit yang mungkin dimasukkan ke tmp
				$sql_input = "INSERT INTO tmp_penyakit (noip,kd_penyakit)
							 VALUES ('$NOIP','$data_rsakit[kd_penyakit]')";
				mysql_query($sql_input, $koneksi) or die ("Query error :".mysql_error());
			}
		} 
		// Menggunakan Fungsi
		AddTmpAnalisa($TxtKdGejala, $NOIP);
		AddTmpGejala($TxtKdGejala, $NOIP);
	}
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul'>";
}

if ($RbPilih == "TIDAK") {
	$sql_analisa = "SELECT * FROM tmp_analisa where noip='$NOIP'";
	$qry_analisa = mysql_query($sql_analisa, $koneksi) or die ("Query error :".mysql_error());
	$data_cek = mysql_num_rows($qry_analisa);
	if ($data_cek >= 1) {
		# Kode saat tmp_analisa tidak kosong
		$sql_relasi = "SELECT * FROM tmp_analisa WHERE kd_gejala='$TxtKdGejala'";
		$qry_relasi = mysql_query($sql_relasi, $koneksi) or die ("Query error :".mysql_error());
		while($hsl_relasi = mysql_fetch_array($qry_relasi)){
			// Hapus daftar relasi yang sudah tidak mungkin dari tabel tmp
			$sql_deltmp = "DELETE FROM tmp_analisa 
							WHERE kd_penyakit='$hsl_relasi[kd_penyakit]' 
							AND noip='$NOIP'";
			mysql_query($sql_deltmp, $koneksi) or die ("Query error :".mysql_error());
			
			// Hapus daftar penyakit yang sudah tidak ada kemungkinan
			$sql_deltmp2 = "DELETE FROM tmp_penyakit 
						    WHERE kd_penyakit='$hsl_relasi[kd_penyakit]' 
						    AND noip='$NOIP'";
			mysql_query($sql_deltmp2, $koneksi) or die ("Query error :".mysql_error());
		}		
	}
	else {
		# Pindahkan data relsi ke tmp_analisa
		$sql_relasi= "SELECT * FROM relasi ORDER BY kd_penyakit,kd_gejala";
		$qry_relasi= mysql_query($sql_relasi, $koneksi) or die ("Query error :".mysql_error());
		while($hsl_relasi=mysql_fetch_array($qry_relasi)){
			$sql_intmp = "INSERT INTO tmp_analisa (noip, kd_penyakit,kd_gejala)
						  VALUES ('$NOIP','$hsl_relasi[kd_penyakit]',
						  '$hsl_relasi[kd_gejala]')";
			mysql_query($sql_intmp,$koneksi) or die ("Query error :".mysql_error());
			
			// Masukkan data penyakit yang mungkin terjangkit
			$sql_intmp2 = "INSERT INTO tmp_penyakit(noip,kd_penyakit)
						   VALUES ('$NOIP','$hsl_relasi[kd_penyakit]')";
			mysql_query($sql_intmp2,$koneksi) or die ("Query error :".mysql_error());			
		}
		
		# Hapus tmp_analisa yang tidak sesuai
		$sql_relasi2 = "SELECT * FROM relasi WHERE kd_gejala='$TxtKdGejala'";
		$qry_relasi2 = mysql_query($sql_relasi2, $koneksi) or die ("Query error :".mysql_error());
		while($hsl_relasi2 = mysql_fetch_array($qry_relasi2)){
			$sql_deltmp = "DELETE FROM tmp_analisa 
						   WHERE kd_penyakit='$hsl_relasi2[kd_penyakit]' 
						   AND noip='$NOIP'";
			mysql_query($sql_deltmp, $koneksi) or die ("Query error :".mysql_error());
			
			// Hapus penyakit yang sudah tidak mungkin
			$sql_deltmp2 = "DELETE FROM tmp_penyakit 
							WHERE kd_penyakit='$hsl_relasi2[kd_penyakit]' 
							AND noip='$NOIP'";
			mysql_query($sql_deltmp2, $koneksi) or die ("Query error :".mysql_error());
		}
	}
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul'>";
}
?>