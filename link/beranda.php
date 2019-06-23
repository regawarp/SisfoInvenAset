<?php
session_start();
$nav = "Login";
if (isset($_SESSION['user_id'])) {
	$nav = "Dashboard";
} else { }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>PUPR</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">
	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="../css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="../css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="../css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="../css/style.css" />

</head>

<body>
	<!-- Header -->
	<header id="home">
		<!-- Background Image -->
		<div class="bg-img" style="background-image: url('../img/background1.jpg');">
			<!-- <div class="overlay"></div> -->
		</div>
		<!-- /Background Image -->

		<!-- Nav -->
		<nav id="nav" class="navbar nav-transparent">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="index.html">
							<img class="logo" src="../img/logo.png" alt="logo">
							<img class="logo-alt" src="../img/logo-alt.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>

				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="#home">Beranda</a></li>
					<li><a href="#about">Tentang</a></li>
					<li><a href="#peta">Peta</a></li>
					<li class="has-dropdown"><a href="#fitur">Fitur</a>
						<ul class="dropdown">
							<li class="has-dropdown"><a href="#">Irigasi</a>
								<ul class="dropdown">
									<li><a href="#">Dana Alokasi Khusus</a></li>
									<li><a href="#">Irigasi teknis</a></li>
									<li><a href="#">Tanah</a></li>
									<li><a href="#">Biaya Operasi dan Maintenance</a></li>
									<li><a href="#">Konstruksi dalam Pengerjaan</a></li>
									<li><a href="#">Peta Irigasi Teknis</a></li>
								</ul>
							</li>
							<li class="has-dropdown"><a href="#">Konservasi dan Pengembangan SDA</a>
								<ul class="dropdown">
									<li><a href="#">Detail Engineering Design</a></li>
									<li><a href="#">Daerah Aliran Sungai</a></li>
									<li><a href="#">Drainase</a></li>
									<li><a href="#">Danau</a></li>
									<li><a href="#">Biaya Operasi dan Pemeliharaan</a></li>
									<li><a href="#">Peta Titik Lokasi Banjir</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><a href="#contact">Kontak</a></li>
					<?php
					if ($nav == "Dashboard") {
						echo '<li><a href="admin/dashboard.php">Dashboard</a></li>';
					} else {
						echo '<li><a href="#" data-toggle="modal" data-target="#exampleModalCenter">Login</a></li>';
					}
					?>
				</ul>
				<!-- /Main navigation -->

			</div>
		</nav>
		<!-- /Nav -->

		<!-- Modal Login -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="position:absolute;right:0;margin-right:20px;">
							<span aria-hidden="true">&times;</span>
						</button>
						<h5 class="modal-title text-center" id="exampleModalLongTitle">Login</h5>
					</div>
					<div class="modal-body" style="color:black;">
						<form action="process.php?process=login" method="post">
							<center><img src="../img/logo-square-only.png" alt="pugarut" style="height:300px;"></center>
							Username: <br />
							<input type="text" name="username" class="form-control">
							Password: <br />
							<input type="password" name="password" class="form-control">
							<input type="submit" value="Login" class="btn btn-info" style="margin-top:10px;width:100%;">
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- /Modal Login -->

		<!-- home wrapper -->
		<div class="home-wrapper">
			<div class="container">
				<div class="row">

					<!-- home content -->
					<div class="col-md-10 col-md-offset-1">
						<div class="home-content">
							<h1 class="white-text bgjudul">Aplikasi Inventarisasi <br />Aset Infrastruktur <br />Sumber Daya Air</h1>
							<!--<p class="white-text">Morbi mattis felis at nunc. Duis viverra diam non justo. In nisl. Nullam sit amet magna in magna gravida vehicula. Mauris tincidunt sem sed arcu. Nunc posuere.</p>-->
							<!--<button class="white-btn">Get Started!</button>
							<button class="main-btn">Learn more</button>-->
						</div>
					</div>
					<!-- /home content -->

				</div>
			</div>
		</div>
		<!-- /home wrapper -->

	</header>
	<!-- /Header -->

	<!-- Penjelasan Aplikasi -->
	<div id="about" class="section md-padding bg-white">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Penjelasan Aplikasi content -->
				<div class="col-md-6 tentang">
					<div class="section-header">
						<h2 class="title">Penjelasan Aplikasi</h2>
					</div>
					<p>Aplikasi ini adalah aplikasi yang akan membantu pengelola aset infrastruktur untuk melakukan serangkaian kegiatan pendataan,
						pencatatan, serta memvisualisasikan aset infrastruktur sumber daya air agar tertib administrasi, pengamanan aset, serta pengendalian dan pengawasan aset.
					</p>

				</div>
				<!-- /Penjelasan Aplikasi content -->

				<!-- About slider -->
				<div class="col-md-3">
					<img class="img-responsive" src="../img/logo-square.png" alt="logo-square-alt.png">
				</div>
				<!-- /About slider -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Penjelasan Aplikasi -->

	<!-- Peta -->
	<div id="peta" class="section md-padding bg-grey">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Peta content -->
				<div class="section-header text-center">
					<h2 class="title">Peta Aset Infrastruktur Sumber Daya Air</h2>
				</div>
				<div class="col-md-12 tentang">
					<iframe width="950" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" title="Aset Infrastruktur Sumber Daya Air" src="//www.arcgis.com/apps/Embed/index.html?webmap=ef284696a7a8437e8aac540dd4e680e3&extent=107.54,-7.4457,107.5849,-7.4224&home=true&zoom=true&previewImage=false&scale=true&search=true&searchextent=true&details=true&legendlayers=true&active_panel=details&basemap_gallery=true&disable_scroll=true&theme=light"></iframe>
				</div>
				<!-- /Peta content -->
			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>

	<div id="peta" class="section md-padding bg-grey">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Peta content -->
				<div class="section-header text-center">
					<h2 class="title">Peta Titik Lokasi Banjir dan Daerah Berpotensi Banjir</h2>
				</div>
				<div class="col-md-12 tentang">
					<iframe width="950" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" title="Peta Titik Lokasi Banjir" src="//www.arcgis.com/apps/Embed/index.html?webmap=cfc7c9ea3f984a29a9475890be44ad8b&extent=107.8132,-7.2523,107.9928,-7.1592&home=true&zoom=true&previewImage=false&scale=true&search=true&searchextent=true&details=true&legendlayers=true&active_panel=details&basemap_gallery=true&disable_scroll=true&theme=light"></iframe>
				</div>
				<!-- /Peta content -->
			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>

	<!-- /Peta -->

	<!-- About -->
	<div id="fitur" class="section md-padding">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section header -->
				<div class="section-header text-center">
					<h2 class="title">Aset Infrastruktur Sumber Daya Air</h2>
				</div>
				<!-- /Section header -->

				<!-- about -->
				<div class="col-md-6">
					<div class="about">
						<i class="fa fa-tint"></i>
						<h3>Irigasi</h3>
						<p>Irigasi adalah suatu sistem untuk mengairi suatu lahan dengan cara membendung sumber air.</p>
						<a href="#">Read more</a>
					</div>
				</div>
				<!-- /about -->

				<!-- about -->
				<div class="col-md-6">
					<div class="about">
						<i class="fa fa-pagelines"></i>
						<h4>Konservasi dan Pengembangan Sumber Daya Air</h4>
						<p>Konservasi sumber daya air adalah usaha untuk memelihara keberadaan, sifat dan fungsi, serta keberlanjutan sumber daya air.</p>
						<a href="#">Read more</a>
					</div>
				</div>
				<!-- /about -->

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /About -->

	<!-- Contact -->
	<div id="contact" class="section md-padding bg-grey">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<!-- Section-header -->
				<div class="section-header text-center">
					<h2 class="title">Kontak Kami</h2>
					<p> Dinas Pekerjaan Umum dan Penataan Ruangan Kabupaten Garut </p>
				</div>
				<!-- /Section-header -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-phone"></i>
						<h3>Phone</h3>
						<p>(0262)233730</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-fax"></i>
						<h3>Fax</h3>
						<p>(0262)544184</p>
					</div>
				</div>
				<!-- /contact -->

				<!-- contact -->
				<div class="col-sm-4">
					<div class="contact">
						<i class="fa fa-map-marker"></i>
						<h3>Address</h3>
						<p>Jl Samarang no 117, Sukagalih, Tarogong Kidul, Garut (44151)</p>
					</div>
				</div>
				<!-- /contact -->
			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</div>
	<!-- /Contact -->

	<!-- Footer -->
	<footer id="footer" class="sm-padding bg-dark">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<div class="col-md-12">

					<!-- footer logo -->
					<div class="footer-logo">
						<a href="index.html"><img src="../img/logo-alt.png" alt="logo"></a>
					</div>
					<!-- /footer logo -->

					<!-- footer copyright -->
					<div class="footer-copyright">
						<p>Copyright © 2019. Tsania Rizqi Fajriati. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
					</div>
					<!-- /footer copyright -->

				</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</footer>
	<!-- /Footer -->

	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="../js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>

</body>

</html>