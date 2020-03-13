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
		header("location:pakar/index.php"); # to redirect akun after the session is validated
	} else {
		echo '<div class="container"><div class=" alert alert-danger role=alert">
	<b>USERNAME DAN PASSWORD TIDAK SESUAI</b>
	</div></div>';

	include "index.php";
	exit;
	}
?>
