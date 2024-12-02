<?php 
session_start();
include 'koneksi/koneksi.php';
if(isset($_SESSION['kd_cs'])){

	$kode_cs = $_SESSION['kd_cs'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Beads-Shop</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

	<script  src="js/jquery.js"></script>
	<script  src="js/bootstrap.min.js"></script>


</head>
<body>
	<!-- <div class="container-fluid">
		<div class="row top">
			<center>
				<div class="col-md-4" style="padding: 3px;">
					<span> <i class="glyphicon glyphicon-earphone"></i> +621234567890</span>
				</div>


				<div class="col-md-4"  style="padding: 3px;">
					<span><i class="glyphicon glyphicon-envelope"></i> beads@gmail.com</span>
				</div>


				<div class="col-md-4"  style="padding: 3px;">
					<span>Beads Jakarta</span>
				</div>
			</center>
		</div>
	</div> -->

	<nav class="navbar navbar-default" style="padding: 5px;">
		<div class="container">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#" style="color: #5790AB"><b>Beads-Shop</b></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">Home</a></li>
					<li><a href="produk.php">Product</a></li>
					<li><a href="about.php">About</a></li>
					<!-- <li><a href="manual.php">Manual Aplikasi</a></li> -->
					<?php 
if (isset($_SESSION['kd_cs'])) {
    $kode_cs = $_SESSION['kd_cs'];
    $cek = mysqli_query($conn, "SELECT kode_produk FROM keranjang WHERE kode_customer = '$kode_cs'");
    $value = mysqli_num_rows($cek);
    ?>
    <li>
        <a href="keranjang.php" class="d-flex align-items-center">
            <i class="bi bi-cart-fill me-1"></i> 
            <b class="badge bg-danger rounded-pill"><?= $value ?></b>
        </a>
    </li>
    <?php 
} else {
    echo "
    <li>
        <a href='keranjang.php' class='d-flex align-items-center'>
            <i class='bi bi-cart-fill me-1'></i> 
            <b class='badge bg-secondary rounded-pill'>0</b>
        </a>
    </li>
    ";
}

if (!isset($_SESSION['user'])) {
    ?>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-person-circle me-1"></i> Akun <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="user_login.php">Login</a></li>
            <li><a href="register.php">Registration</a></li>
        </ul>
    </li>
    <?php 
} else {
    ?>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle d-flex align-items-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-person-circle me-1"></i> <?= $_SESSION['user']; ?> <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <li><a href="proses/logout.php">Log Out</a></li>
        </ul>
    </li>
    <?php 
}
?>
		</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>