<?php
include "lib/inc.koneksidb.php";
?>
<html>
<head>
<title>Tampilan Data Ras</title>
</head>
<body>
  <div class="isi"><br>
<?php $sql="select * from artikel_ras_kucing where id_ras=$_GET[id_ras]";
		$rs=mysql_query($sql);
		$row=mysql_fetch_array($rs);{ ?>
		<div class="panel panel-info">
		  <div class="panel-heading"><h4><?php echo $row['ras']; ?></h4></div>
		  <div class="panel-body">
		    <img style="float:left;margin-right:20px;"src="res/<?php echo $row['foto']; ?>" class="image-rounded" width="250" height="250"/>
		    <p class="scroll"><?php echo $row['isi']; ?></p>
		  </div>
		</div>
		<?php } ?>
<div align="right"><a class="btn btn-warning raised btn-sm"href="?page=ras">kembali</a></div>
<br>
</div></br>
</body>
</html>
