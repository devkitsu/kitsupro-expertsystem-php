<?php 
include "../lib/inc.koneksidb.php";
?>
<!-- Menu -->
   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
    <nav class="navbar navbar-default" role="navigation">
      <!-- Main Menu -->
        <ul class="nav navbar-nav">
          <?php
			$sql  = "SELECT hak_akses FROM akun WHERE username='" . $_SESSION['username'] . "'";
			$qry  = mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
			$data = mysql_fetch_array($qry);
			?>
		<?php
		if($data['hak_akses'] == "Admin") { # Admin's features
		?>
		  <li class="active"><a><b>MENU ADMIN</b></a></li>
          <li><a href="index.php">Beranda</a></li>
		  <li><a href="RasTampil.php">Data Ras</a></li>
		  <li><a href="AkunTampil.php">Data Akun</a></li>
		  <li><a href="DataLap.php">Laporan Data</a></li>
		  <?php
        } else { # Doctor's features
      ?>
		  <li class="active"><a><b>MENU PAKAR</b></a></li>
		  <li><a href="index.php">Beranda</a></li>
          <li><a href="RelasiAddPilih.php">Buat Relasi</a></li>
		  <li><a href="PenyakitTampil.php">Data Penyakit</a></li>
		  <li><a href="GejalaTampil.php">Data Gejala</a></li>
		  <li><a href="ArtikelTampil.php">Data Artikel Kesehatan</a></li>
		  <li><a href="DataLap.php">Laporan Data</a></li>
        </ul>
		<?php
        }
      ?><!-- /.navbar-collapse -->
    </nav>
  </div>
  </div>
</div>
