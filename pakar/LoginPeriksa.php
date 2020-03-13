<?php
session_start();
include_once "lib/inc.koneksidb.php";
	$username = $_POST['TxtUser']; # to record username and password
	$password = md5($_POST['TxtPasswd']);
	$query	= "SELECT * FROM akun WHERE username='$username' AND password='$password'";
	$login	= mysql_query($query,$koneksi) or die ("Gagal Cek".mysql_error());;
	$found	= mysql_num_rows($login);
	$fetch	= mysql_fetch_array($login);
	if($found > 0) { # to validate log in
		session_start(); # to create session
		$_SESSION['username'] = $fetch['username'];
		$_SESSION['password'] = $fetch['password'];
		header("location:pakar/index.php"); # to redirect users after the session is validated
	} else {
		echo '<div class="container"><div class=" alert alert-danger role=alert">
	<b>USERNAME DAN PASSWORD TIDAK SESUAI</b>
	</div></div>';

	include "index.php"; 
	exit;
	}
/*
// Membaca variabel dari Form
$TxtUser   = isset($_POST['TxtUser']) ? $_POST['TxtUser']: '';
$TxtPasswd = isset($_POST['TxtPasswd']) ? $_POST['TxtPasswd']: '';

// Validasi form
if (trim($TxtUser)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Username kosong, ulangi kembali</b>
	</div></div>';
	include "index.php"; exit;
}
elseif (trim($TxtPasswd)=="") {
	echo '<div class="container"><div class="isi alert alert-danger role=alert">
	<b>Password kosong, ulangi kembali</b>
	</div></div>';
	include "index.php"; exit;
}

// Memeriksa keberadaan UserID dan PassID dari tabel pakar
// Menggunakan enkripsi MD5
$sql_cek = "SELECT * FROM users WHERE username='$TxtUser' AND password=MD5('$TxtPasswd')";
$qry_cek = mysql_query($sql_cek, $koneksi) or die ("Gagal Cek".mysql_error());
$ada_cek = mysql_num_rows($qry_cek);
if ($_SESSION['SES_USER'] == "admin" && $_SESSION['SES_PASS'] = $TxtPasswd) {
	header ("location: pakar/index.php");
	exit;
}else if ($_SESSION['SES_USER'] = $TxtUser && $_SESSION['SES_PASS'] = $TxtPasswd ) {
	header ("location: adm/index.php");
	exit;
}else {
	echo '<div class="container"><div class=" alert alert-danger role=alert">
	<b>USERNAME DAN PASSWORD TIDAK SESUAI</b>
	</div></div>';

	include "index.php"; 
	exit;
}*/
?>
 
