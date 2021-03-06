<?php
session_start();

if (isset($_SESSION['user_id'])) {
	include("../connect.php");
	$sql = "SELECT * FROM kibf,lokasi,dataspa WHERE kibf.ID_LOKASI=lokasi.ID_LOKASI AND kibf.ID_DATASPA=dataspa.ID_DATASPA AND ID_KIBF='$_GET[idkibf]'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		if ($row = mysqli_fetch_assoc($result)) { } else {
			header("Location:kibf_home.php");
		}
	}
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
		<?php
		include "header.php";
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
						<div class="col-12 grid-margin">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Update KIB F</h4>
									<form class="form-sample" method="post" action="../process.php?process=update-kibf" enctype="multipart/form-data">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">ID KIB F</label>
													<div class="col-sm-9">
														<input type='text' class='form-control' name='ID_KIBF' readonly <?php echo "value='$row[ID_KIBF]'"; ?> />
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
																while ($rowaset = mysqli_fetch_assoc($result)) {
																	if ($rowaset['ID_ASET'] == $row['ID_ASET']) {
																		echo "<option value='$rowaset[ID_ASET]' selected>$rowaset[NAMA_ASET]</option>";
																	} else {
																		echo "<option value='$rowaset[ID_ASET]'>$rowaset[NAMA_ASET]</option>";
																	}
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
																while ($rowlok = mysqli_fetch_assoc($result)) {
																	if ((string)($rowlok['ID_LOKASI']) == (string)($row['ID_LOKASI'])) {
																		echo "<option value='$rowlok[ID_LOKASI]' selected='selected'>$rowlok[NAMA_LOKASI]</option>";
																	} else {
																		echo "<option value='$rowlok[ID_LOKASI]'>$rowlok[NAMA_LOKASI]</option>";
																	}
																}
															} else {
																echo "<option>Input Lokasi Baru</option>";
															}
															?>
														</select>
														<span class="input-group-append">
															<button class="file-upload-browse btn btn-info" type="button">Input Lokasi</button>
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
																while ($rowspa = mysqli_fetch_assoc($result)) {
																	if ($rowspa['ID_DATASPA'] == $row['ID_DATASPA']) {
																		echo "<option value='$rowspa[ID_DATASPA]' selected>$rowspa[NAMA_DATASPA]</option>";
																	} else {
																		echo "<option value='$rowspa[ID_DATASPA]'>$rowspa[NAMA_DATASPA]</option>";
																	}
																}
															} else {
																echo "<option>Input Data Spatial Baru</option>";
															}
															?>
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
														<input type="text" class="form-control" name="NAMA_BARANG" <?php echo "value='$row[NAMA_BARANG]'"; ?> />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Bangunan</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="BANGUNAN" <?php echo "value='$row[BANGUNAN]'"; ?> />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Bertingkat</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="BERTINGKAT" <?php echo "value='$row[BERTINGKAT]'"; ?> />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Beton</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="BETON" <?php echo "value='$row[BETON]'"; ?> />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Panjang</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="PANJANG" <?php echo "value='$row[PANJANG]'"; ?> />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Tgl Dokumen</label>
													<div class="col-sm-9">
														<input type="date" class="form-control" name="TANGGAL_DOKUMEN" <?php echo "value='$row[TANGGAL_DOKUMEN]'"; ?> />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">No Dokumen</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="NOMOR_DOKUMEN" <?php echo "value='$row[NOMOR_DOKUMEN]'"; ?> />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Tgl Mulai</label>
													<div class="col-sm-9">
														<input type="date" class="form-control" name="TANGGAL_MULAI" <?php echo "value='$row[TANGGAL_MULAI]'"; ?> />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Status Tanah</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="STATUS_TANAH" <?php echo "value='$row[STATUS_TANAH]'"; ?> />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">No Kd Tanah</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="NOMO_KODE_TANAH" <?php echo "value='$row[NOMO_KODE_TANAH]'"; ?> />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Nilai Kontrak</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="NILAI_KONTRAK" <?php echo "value='$row[NILAI_KONTRAK]'"; ?> />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Keterangan</label>
													<div class="col-sm-9">
														<select name="KETERANGAN" class="form-control">
															<?php
															$query = "SELECT * FROM dataspa";
															$result = mysqli_query($conn, $query);
															if ($row['KETERANGAN']=="Selesai") {
																echo "<option value='Dalam Pengerjaan'>Dalam Pengerjaan</option>";
																echo "<option value='Selesai' selected>Selesai</option>";
															}else{
																echo "<option value='Dalam Pengerjaan' selected>Dalam Pengerjaan</option>";
																echo "<option value='Selesai' >Selesai</option>";	
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
													<label class="col-sm-3 col-form-label">Asal Usul</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" name="ASAL_USUL" <?php echo "value='$row[ASAL_USUL]'"; ?> />
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
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:../../partials/_footer.html -->
				<?php
				include "footer.php";
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