<!DOCTYPE HTML>
<html>
<head>
<title>Sistem Diagnosa Kucing</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>
<div class="wrap">

<!--main-->
<div>

<div class="content">
<div class="isi">

<center><b>ABOUT US</center></b>
<br><center><b>SISTEM DIAGNOSA PENYAKIT UMUM PADA KUCING</center>
<br><br>Term Of Use:</b>
<br><br>1. SISTEM INI DIGUNAKAN UNTUK MENDIAGNOSA PENYAKIT UMUM PADA KUCING
<br><br>2. SISTEM INI DIGUNAKAN UNTUK MEMBERIKAN INFORMASI TENTANG PENYAKIT UMUM PADA KUCING
<br><br>3. SISTEM INI DIGUNAKAN SEBAGAI DIAGNOSA AWAL SEBELUM MEMBAWA KE PETSHOP/KLINIK HEWAN
<br><br>4. SETELAH MENGGUNAKAN SISTEM INI, ANDA BISA MEMBAWA KUCING KE PETSHOP/KLINIK HEWAN
<br><br>
</div>
</div>
<div class=slider>
	 <div class=isi-slider>
		 <?php
		 include "lib/inc.koneksidb.php";
		 $sql="select foto from artikel_ras_kucing";
		 $qry = mysql_query($sql,$koneksi) or die ("Query error :".mysql_error());
		 $counter = 1;
		 while($data = mysql_fetch_array($qry)){
		 ?>
		 <img src="res/<?php echo $data['foto']?>" class="image-rounded" width="250" height="250">
		 <?php $counter++; }?>
	 </div>
 </div>
<p>&nbsp;</p>

</div>


</div>
</body>
</html>
