<?php
session_start();

if (isset($_SESSION['user_id'])) {
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM kiba";
	$result = mysqli_query($conn, $sql);
} else {
	// Redirect them to the login page
	header("Location: ../beranda.php");
}
?>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>

	<!-- plugins:css -->
	<link rel="stylesheet" href="../../css/materialdesignicons.min.css">
	<link rel="stylesheet" href="../../css/vendor.bundle.base.css">
	<link rel="stylesheet" href="../../css/vendor.bundle.addons.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<link rel="stylesheet" href="../../css/skins/all.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../../datatables/css/dataTables.bootstrap.min.css" />
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="../../css/admin.css">
	<!-- endinject -->
</head>

<body>
	<div class="container-scroller">
		<!-- partial:../../partials/_navbar.html -->
		<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
			<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
				<a class="navbar-brand brand-logo" href="../../index.html">
					<img src="../../img/logo.png" alt="logo" />
				</a>
				<a class="navbar-brand brand-logo-mini" href="../../index.html">
					<img src="../../img/logo-mini.png" alt="logo" />
				</a>
			</div>
			<div class="navbar-menu-wrapper d-flex align-items-center">
				<ul class="navbar-nav navbar-nav-right">
					<li class="nav-item dropdown d-none d-xl-inline-block">
						<a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
							<span class="profile-text">Hello, Richard V.Welsh !</span>
							<img class="img-xs rounded-circle" src="../../img/faces/face1.jpg" alt="Profile image">
						</a>
						<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
							<a class="dropdown-item p-0">
								<div class="d-flex border-bottom">
									<div class="py-3 px-4 d-flex align-items-center justify-content-center">
										<i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
									</div>
									<div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
										<i class="mdi mdi-account-outline mr-0 text-gray"></i>
									</div>
									<div class="py-3 px-4 d-flex align-items-center justify-content-center">
										<i class="mdi mdi-alarm-check mr-0 text-gray"></i>
									</div>
								</div>
							</a>
							<a class="dropdown-item mt-2">
								Manage Accounts
							</a>
							<a class="dropdown-item">
								Change Password
							</a>
							<a class="dropdown-item">
								Check Inbox
							</a>
							<a class="dropdown-item">
								Sign Out
							</a>
						</div>
					</li>
				</ul>
				<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
					<span class="mdi mdi-menu"></span>
				</button>
			</div>
		</nav>
		<!-- partial -->
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<!-- partial:../../partials/_sidebar.html -->

			<nav class="sidebar sidebar-offcanvas" id="sidebar">
			<ul class="nav">
					<li class="nav-item nav-profile">
						<div class="nav-link">
							<div class="user-wrapper">
								<div class="profile-image">
									<img src="../../img/faces/face1.jpg" alt="profile image">
								</div>
								<div class="text-wrapper">
									<p class="profile-name">Richard V.Welsh</p>
									<div>
										<small class="designation text-muted">Manager</small>
										<span class="status-indicator online"></span>
									</div>
								</div>
							</div>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="dashboard.php">
							<i class="menu-icon mdi mdi-television"></i>
							<span class="menu-title">Dashboard</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="deddak.php">
							<i class="menu-icon mdi mdi-file-outline"></i>
							<span class="menu-title">DED & DAK</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="kiba_home.php">
							<i class="menu-icon mdi mdi-map"></i>
							<span class="menu-title">KIB A</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="kibd_home.php">
							<i class="menu-icon mdi mdi-file-multiple"></i>
							<span class="menu-title">KIB D</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="kibf_home.php">
							<i class="menu-icon mdi mdi-table"></i>
							<span class="menu-title">KIB F</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../../pages/tables/basic-table.html">
							<i class="menu-icon mdi mdi-map-marker-multiple"></i>
							<span class="menu-title">Data Spasial</span>
						</a>
					</li>
				</ul>
			</nav>

			<!-- partial -->
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title mb-4">Big Div</h5>
									<div class="table-responsive">
										<table id="myTable" class="table table-hover">
											<thead>
												<tr>
													<td>Lokasi</td>
													<td>ID Spasial</td>
													<td>Kode Brg</td>
													<td>No Register</td>
													<td>Luas</td>
													<td>Tahun Pengadaan</td>
													<td>Hak</td>
													<td>Tgl Sertif</td>
													<td>No Sertif</td>
													<td>Penggunaan</td>
													<td>Harga</td>
													<td>Nama Brg</td>
													<td>Ket</td>
													<td>Asal Usul</td>
													<td>Foto</td>
													<td>File</td>
													<td>Operasi</td>
												</tr>
											</thead>
											<tbody>
												<?php
												if (mysqli_num_rows($result) > 0) {
													while ($row = mysqli_fetch_assoc($result)) {
														echo "<tr>
																<td>$row[ID_LOKASI]</td>
																<td>$row[ID_DATASPA]</td>
																<td>$row[NOMOR_KODE_BARANG]</td>
																<td>$row[NOMOR_REGISTER]</td>
																<td>$row[LUAS]</td>
																<td>$row[TAHUN_PENGADAAN]</td>
																<td>$row[HAK]</td>
																<td>$row[TANGGAL_SERTIFIKAT]</td>
																<td>$row[NOMOR_SERTIFIKAT]</td>
																<td>$row[PENGGUNAAN]</td>
																<td>$row[HARGA]</td>
																<td>$row[NAMA_BARANG]</td>
																<td>$row[KETERANGAN]</td>
																<td>$row[ASAL_USUL]</td>
																<td>$row[FOTO]</td>
																<td>$row[FILE]</td>
																<td><a href='kiba_update.php?idkiba=$row[ID_KIBA]'>UPDATE</a><a href='../process.php?process=delete-kiba&&idkiba=$row[ID_KIBA]&&foto=$row[FOTO]&&file=$row[FILE]'>DELETE</a></td>
																</tr>";
													}
												} else {
													echo "<tr><td colspan='17' align='center'>0 results</td></tr>";
												}
												mysqli_close($conn);
												?>
											</tbody>
											<tfoot>

											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 grid-margin">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Input KIP A</h4>
									<form class="form-sample" action="../process.php?process=insert-kiba" enctype="multipart/form-data" method="post">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">ID KIB A</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="idkiba" />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Kode barang</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="nokodebrg" />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">ID Lokasi</label>
													<div class="input-group col-sm-8">
														<select name="idlokasi" class="form-control" style="margin: 0px 10px;">
															<option>52001</option>
															<option>52002</option>
														</select>
														<span class="input-group-append">
															<button class="file-upload-browse btn btn-info" type="button">Input Lokasi</button>
														</span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">ID Spatial</label>
													<div class="input-group col-sm-8">
														<select name="iddataspa" class="form-control" style="margin: 0px 10px;">
															<option>60</option>
														</select>
														<span class="input-group-append">
															<button class="file-upload-browse btn btn-info" type="button">Input Spatial</button>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Nama Barang</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="nama_barang" />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Kd Barang</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="nokodebrg" />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">No Register</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="noreg" />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Luas</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="luas" />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Thn Pengadan</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="thn_pengadaan" />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Hak</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="hak" />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Tgl Sertifikat</label>
													<div class="col-sm-9">
														<input type="date" class="form-control" name="tgl_sertifikat" />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">No Sertifikat</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="no_sertifikat" />
													</div>
												</div>
											</div>
										</div>
										
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Penggunaan</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="penggunaan" />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Harga</label>
													<div class="col-sm-9">
														<input type="number" class="form-control" name="harga" />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Keterangan</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="keterangan" />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Asal Usul</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="asalusul" />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Foto</label>
													<div class="col-sm-9">
														<input type="file" name="foto" />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">File</label>
													<div class="col-sm-9">
														<input type="file"  name="file" />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<button type="submit" class="btn btn-success mr-2" style="width:100%;">Submit</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:../../partials/_footer.html -->
				<footer class="footer">
					<div class="container-fluid clearfix">
						<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
							<a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
						<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
							<i class="mdi mdi-heart text-danger"></i>
						</span>
					</div>
				</footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->
</body>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../js/vendor.bundle.base.js"></script>
<script src="../../js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="../../js/off-canvas.js"></script>
<script src="../../js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- <script src="../../js/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="../../datatables/js/jquery.dataTables.min.js"></script>
<script src="../../datatables/js/dataTables.bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
		$('#myTable').DataTable();
	});
</script>
<!-- End custom js for this page-->

</html>