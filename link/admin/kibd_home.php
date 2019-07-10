<?php
session_start();

if (isset($_SESSION['user_id'])) {
	if (isset($_GET['status'])) {
		$status = $_GET['status'];
		echo "<script type='text/javascript'>alert('$status');</script>";
	}
	include("../connect.php");
	$sql = "SELECT * FROM kibd,lokasi,dataspa,aset where kibd.ID_LOKASI=lokasi.ID_LOKASI AND kibd.ID_DATASPA=dataspa.ID_DATASPA AND kibd.ID_ASET=aset.ID_ASET";
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
	<title>Dashboard</title>

	<!-- plugins:css -->
	<link rel="stylesheet" href="../../css/materialdesignicons.min.css">
	<link rel="stylesheet" href="../../css/vendor.bundle.base.css">
	<link rel="stylesheet" href="../../css/vendor.bundle.addons.css">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<link rel="stylesheet" href="../../css/skins/all.css">
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="../../datatables/css/jquery.dataTables.min.css" />
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="../../css/admin.css">
	<!-- endinject -->
</head>

<body>
	<div class="container-scroller">
		<!-- partial:../../partials/_navbar.html -->
		<?php
		include "header.php"
		?>
		<!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<!-- partial:../../partials/_sidebar.html -->

			<?php
			include "navigasi.php";
			?>

			<!-- partial -->
			<div class="main-panel">
				<div class="content-wrapper">
					<div class="row">
						<div class="col-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title mb-4">Data Kartu Inventaris Barang D</h5>
									<div class="table-responsive">
										<table id="myTable" class="table table-hover cell-border">
											<thead>
												<tr>
													<td>Lokasi</td>
													<td>Spasial</td>
													<td>Aset</td>
													<td>Nama Brg</td>
													<td>Kode Brg</td>
													<td>No Regis</td>
													<td>Konstruksi</td>
													<td>Panjang</td>
													<td>Lebar</td>
													<td>Luas</td>
													<td>Tgl Dokumen</td>
													<td>No Dokumen</td>
													<td>Status Tanah</td>
													<td>No Kode</td>
													<td>Asal Usul</td>
													<td>Harga</td>
													<td>Kondisi</td>
													<td>Ket</td>
													<td>Foto</td>
													<td>File</td>
													<td>Update</td>
													<td>Delete</td>
												</tr>
											</thead>
											<tbody>
												<?php
												if (mysqli_num_rows($result) > 0) {
													while ($row = mysqli_fetch_assoc($result)) {
														echo "<tr>
													<td>$row[NAMA_LOKASI]</td>
													<td><a href='https://$row[LINK_GIS]' target='_blank'>$row[NAMA_DATASPA]</a></td>
													<td>$row[NAMA_ASET]</td>
													<td>$row[NAMA_BARANG]</td>
													<td>$row[NOMOR_KODE_BARANG]</td>
													<td>$row[NOMOR_REGISTER]</td>
													<td>$row[KONSTRUKSI]</td>
													<td>$row[PANJANG]</td>
													<td>$row[LEBAR]</td>
													<td>$row[LUAS]</td>
													<td>$row[TANGGAL_DOKUMEN]</td>
													<td>$row[NOMOR_DOKUMEN]</td>
													<td>$row[STATUS_TANAH]</td>
													<td>$row[NOMOR_KODE]</td>
													<td>$row[ASAL_USUL]</td>
													<td>$row[HARGA]</td>
													<td>$row[KONDISI]</td>
													<td>$row[KETERANGAN]</td>
													<td><img src='../../img/upload/$row[FOTO]' width='50px' height='auto'></td>
													<td><a href='../../file/$row[FILE]'>Lampiran</a></td>
													<td>
														<a href='kibd_update.php?idkibd=$row[ID_KIBD]'>
														<button class='btn btn-warning' type='button'>
																		<span class='mdi mdi-pencil'></span>
																	</button>
																	</a>
													</td>
													<td>
														<a href='../process.php?process=delete-kibd&&idkibd=$row[ID_KIBD]'>
														<button class='btn btn-danger' type='button'>
																		<span class='mdi mdi-delete'></span>
																	</button>
														</a>
													</td>
													</tr>";
													}
												} else {
													echo "<tr><td colspan='24' align='center'>0 results</td></tr>";
												}
												?>
											</tbody>
										</table>
									</div>
									<a href="kibd_export.php" class="btn btn-success col-md-12"style="margin-top:20px;">
                                    	<i class="mdi mdi-file-excel"></i>Download File Excel
                                    </a>
								</div>
							</div>
						</div>
					</div>
					
					<div class="row">
						<div class="col-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title mb-4">Data Kartu Inventaris Barang F yang harus dipindahkan</h5>
									<div class="table-responsive">
										<table id="myTable" class="table table-hover">
											<thead>
												<tr>
													<td>Spasial</td>
													<td>Lokasi</td>
													<td>Aset</td>
													<td>Nama Barang</td>
													<td>Bangunan</td>
													<td>Bertingkat</td>
													<td>Beton</td>
													<td>Panjang</td>
													<td>Tgl Dokumen</td>
													<td>No Dokumen</td>
													<td>Tgl Mulai</td>
													<td>Status Tanah</td>
													<td>Kode Tanah</td>
													<td>Nilai Kontrak</td>
													<td>Foto</td>
													<td>File</td>
													<td>Keterangan</td>
													<td>Asal Usul</td>
													<td>Update</td>
													<td>Delete</td>
												</tr>
											</thead>
											<tbody>
												<?php
												include("../connect.php");
												$sql = "SELECT * FROM kibf,lokasi,dataspa,aset where kibf.ID_LOKASI=lokasi.ID_LOKASI AND kibf.ID_DATASPA=dataspa.ID_DATASPA AND kibf.ID_ASET=aset.ID_ASET AND keterangan='Selesai'";
												$result = mysqli_query($conn, $sql);
												if (mysqli_num_rows($result) > 0) {
													while ($row = mysqli_fetch_assoc($result)) {
														echo "<tr>
												<td><a href='https://$row[LINK_GIS]' target='_blank'>$row[NAMA_DATASPA]</a></td>
												<td>$row[NAMA_LOKASI]</td>
												<td>$row[NAMA_ASET]</td>
												<td>$row[NAMA_BARANG]</td>
												<td>$row[BANGUNAN]</td>
												<td>$row[BERTINGKAT]</td>
												<td>$row[BETON]</td>
												<td>$row[PANJANG]</td>
												<td>$row[TANGGAL_DOKUMEN]</td>
												<td>$row[NOMOR_DOKUMEN]</td>
												<td>$row[TANGGAL_MULAI]</td>
												<td>$row[STATUS_TANAH]</td>
												<td>$row[NOMO_KODE_TANAH]</td>
												<td>$row[NILAI_KONTRAK]</td>
												<td><img src='../../img/upload/$row[FOTO]' width='50px' height='auto'></td>
												<td><a href='../../file/$row[FILE]'>Lampiran</a></td>
												<td>$row[KETERANGAN]</td>
												<td>$row[ASAL_USUL]</td>
												<td>
												<a href='kibf_update.php?idkibf=$row[ID_KIBF]'>
												<button class='btn btn-warning' type='button'>
												<span class='mdi mdi-pencil'></span>
												</button>
												</a>
												</td>
												<td>
												<a href='../process.php?process=delete-kibf&&idkibf=$row[ID_KIBF]'>
												<button class='btn btn-danger' type='button'>
																		<span class='mdi mdi-delete'></span>
																	</button>
												</a>
												</td>
												</tr>";
													}
												} else {
													echo "<tr><td colspan='20' align='center'>0 results</td></tr>";
												}
												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php if ($_SESSION['jenis'] != "User") { ?>
						<div class="row">
							<div class="col-12 grid-margin">
								<div class="card">
									<div class="card-body">
										<h4 class="card-title">Input KIB D</h4>
										<form class="form-sample" method="post" action="../process.php?process=insert-kibd" enctype="multipart/form-data">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">ID KIB D</label>
														<div class="col-sm-9">
															<?php
															$query = "SELECT ID_KIBD FROM kibd ORDER BY ID_KIBD DESC LIMIT 1";
															$result = mysqli_query($conn, $query);
															if (mysqli_num_rows($result) > 0) {
																if ($id = mysqli_fetch_assoc($result)) {
																	$num = $id['ID_KIBD'];
																	$num++;
																	echo "<input type='text' class='form-control' name='ID_KIBD' value='$num' readonly/>";
																} else {
																	echo "<input type='text' class='form-control' name='ID_KIBD' value='1'/> readonly";
																}
															}
															?>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Aset</label>
														<div class="input-group col-sm-8">
															<select name="ID_ASET" class="form-control" style="margin: 0px 10px;">
																<?php
																$query = "SELECT * FROM aset";
																$result = mysqli_query($conn, $query);
																if (mysqli_num_rows($result) > 0) {
																	while ($row = mysqli_fetch_assoc($result)) {
																		echo "<option value='$row[ID_ASET]'>$row[NAMA_ASET]</option>";
																	}
																} else {
																	echo "<option>Input Aset Baru</option>";
																}
																?>
															</select>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Lokasi</label>
														<div class="input-group col-sm-8">
															<select name="ID_LOKASI" class="form-control" style="margin: 0px 10px;">
																<?php
																$query = "SELECT * FROM lokasi";
																$result = mysqli_query($conn, $query);
																if (mysqli_num_rows($result) > 0) {
																	while ($row = mysqli_fetch_assoc($result)) {
																		echo "<option value='$row[ID_LOKASI]'>$row[NAMA_LOKASI]</option>";
																	}
																} else {
																	echo "<option>Input Lokasi Baru</option>";
																}
																?>
															</select>
															<span class="input-group-append">
																<a class="file-upload-browse btn btn-info" type="button" href="lokasi_home.php">Input Lokasi</a>
															</span>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Spatial</label>
														<div class="input-group col-sm-8">
															<select name="ID_DATASPA" class="form-control" style="margin: 0px 10px;">
																<?php
																$query = "SELECT * FROM dataspa";
																$result = mysqli_query($conn, $query);
																if (mysqli_num_rows($result) > 0) {
																	while ($row = mysqli_fetch_assoc($result)) {
																		echo "<option value='$row[ID_DATASPA]'>$row[NAMA_DATASPA]</option>";
																	}
																} else {
																	echo "<option>Input Data Spatial Baru</option>";
																}
																?>
															</select>
															<span class="input-group-append">
																<a class="file-upload-browse btn btn-info" type="button" href="dataspa_home.php">Input Spatial</a>
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
															<input type="text" class="form-control" name="NAMA_BARANG" />
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Kd Barang</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="NOMOR_KODE_BARANG" />
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">No Dokumen</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="NOMOR_DOKUMEN" <?php echo "value='$row[NOMOR_DOKUMEN]'"; ?> />
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">No Regis</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="NOMOR_REGISTER" />
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Konstruksi</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="KONSTRUKSI" />
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Panjang</label>
														<div class="col-sm-9">
															<input type="number" class="form-control" name="PANJANG" />
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Lebar</label>
														<div class="col-sm-9">
															<input type="number" class="form-control" name="LEBAR" />
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Luas</label>
														<div class="col-sm-9">
															<input type="number" class="form-control" name="LUAS" />
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Tgl Dokumen</label>
														<div class="col-sm-9">
															<input type="date" class="form-control" name="TANGGAL_DOKUMEN" />
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Status Tanah</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="STATUS_TANAH" />
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Nomor Kode</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="NOMOR_KODE" />
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Asal Usul</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="ASAL_USUL" />
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Harga</label>
														<div class="col-sm-9">
															<input type="number" class="form-control" name="HARGA" />
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Kondisi</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="KONDISI" />
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Keterangan</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="KETERANGAN" />
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">Foto</label>
														<div class="col-sm-9">
															<input type="file" name="FOTO" />
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">File</label>
														<div class="col-sm-9">
															<input type="file" name="FILE" />
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
					<?php } ?>
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:../../partials/_footer.html -->
				<?php
				include "footer.php"
				?>
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
<?php
mysqli_close($conn);
?>