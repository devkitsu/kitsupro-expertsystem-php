<?php
include "lib/inc.koneksidb.php";
?>
<html>
<head>
<title>Tampilan Data Artikel Kesehatan</title>
</head>
<body>
  <div class="isi"><br>
<?php $sql="select * from artikel_kesehatan where id_artikel=$_GET[id_artikel]";
		$rs=mysql_query($sql);
		$row=mysql_fetch_array($rs);{ ?>
		<div class="panel panel-info">
		  <div class="panel-heading"><h4><?php echo $row['judul']; ?></h4></div>
		  <div class="panel-body">
		    <img style="float:left;margin-right:20px;"src="res/<?php echo $row['foto']; ?>" class="image-rounded" width="250" height="250"/>
		    <p><?php echo $row['isi']; ?></p>
		  </div>
		</div>
		<?php } ?>
<div align="right"><a class="btn btn-warning raised btn-sm"href="?page=artikel">kembali</a></div>
<br>
</div></br>
</body>
</html>
