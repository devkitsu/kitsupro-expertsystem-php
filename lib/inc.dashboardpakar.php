 <div class="navbar-header">
      <button type="button" class="navbar-toggle navbar-toggle-sidebar collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
      MENU
      </button>
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">
	  <?php $sql  = " SELECT name FROM akun WHERE username='" . $_SESSION['username'] . "'";
			$qry  = mysql_query($sql, $koneksi) or die ("SQL Error".mysql_error());
			$data = mysql_fetch_array($qry);
		?>
		Dashboard / Selamat Datang <?php echo $data['name'] ?>
      </a>
    </div>
