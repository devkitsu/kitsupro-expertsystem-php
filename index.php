<!DOCTYPE html>
<html>
<head>
   <?php include "lib/inc.head2.php";?>
</head>
<body>
<div class="container">

<!-- header start -->
<?php include "lib/inc.header.php";?>
<!-- header end -->

    <!-- navbar  -->
    <nav class="navbar navbar-inverse">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Diagnosa Penyakit Kucing</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="?page=daftar">Konsultasi</a></li>
            <li><a href="?page=dafpenyakit">Daftar Penyakit</a></li>
            <li><a href="?page=ras">Ras Kucing</a></li>
            <li><a href="?page=artikel">Artikel</a></li>
            <li><a href="?page=about">Tentang</a></li>
            <li>
              <a class="btn btn-warning outline btn-circle collapsed"  data-toggle="collapse" href="#nav-collapse2" aria-expanded="false" aria-controls="nav-collapse2">...</a>
            </li>
          </ul>

          <!-- form login -->
          <div class="collapse nav navbar-nav nav-collapse slide-down" id="nav-collapse2">
            <form action="LoginPeriksa.php"  method="post" class="navbar-form navbar-right form-inline" role="form">
              <div class="form-group">
                <input type="text" name="TxtUser" class="form-control" placeholder="Username" autofocus required/ >
              </div>
              <div class="form-group">
                <input type="password" name="TxtPasswd" class="form-control" placeholder="Password" required/>
              </div>
              <input type="submit" class="btn btn-danger btn-sm" value="Login">
            </form>
          </div>
          <!-- /form login -->
        </div><!-- /.navbar-collapse -->

    </nav>
    <!-- /.navbar -->
<div class="garis"></div>
<div class="badan"><br>
    <div class="container-fluid">
   <!--    <div class="isi"> -->

       <div><?php include "lib/inc.bukaprogram.php";?></div>

    <!--  </div> --></br>
    </div>
</div>
<div class="garis2"></div>

<!-- footer start -->
<?php include "lib/inc.footer.php";?>
<!-- footer end -->

</div>
</body>
</html>
