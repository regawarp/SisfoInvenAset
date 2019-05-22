<?php
session_start();

if (isset($_SESSION['user_id'])) {
	if (isset($_GET['status'])) {
		$status = $_GET['status'];
		echo "<script type='text/javascript'>alert('$status');</script>";
	}
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM kiba,lokasi,dataspa where kiba.ID_LOKASI=lokasi.ID_LOKASI AND kiba.ID_DATASPA=dataspa.ID_DATASPA";
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
						<div class="col-12 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title mb-4">Data Kartu Inventaris Barang A (Tanah)</h5>
									<div class="table-responsive">
										<table id="myTable" class="table table-hover">
											<thead>
												<tr>
													<td>Update</td>
													<td>Delete</td>
													<td>Lokasi</td>
													<td>Data Spatial</td>
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
												</tr>
											</thead>
											<tbody>
												<?php
												if (mysqli_num_rows($result) > 0) {
													while ($row = mysqli_fetch_assoc($result)) {
														echo "<tr>
																<td>
																<a href='kiba_update.php?idkiba=$row[ID_KIBA]'>
																	<button class='btn btn-warning' type='button'>
																		<span class='mdi mdi-pencil'></span>
																	</button>
																</a>
																</td>
																<td>
																<a href='../process.php?process=delete-kiba&&idkiba=$row[ID_KIBA]&&foto=$row[FOTO]&&file=$row[FILE]'>
																	<button class='btn btn-danger' type='button'>
																		<span class='mdi mdi-delete'></span>
																	</button>
																</a>
																</td>
																<td>$row[NAMA_LOKASI]</td>
																<td><a href='$row[LINK_GIS]'>$row[NAMA_DATASPA]</a></td>
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
																<td><img src='../../img/upload/$row[FOTO]' width='50px' height='auto'></td>
																<td><a href='../../file/$row[FILE]'>Lampiran</a></td>
																</tr>";
													}
												} else {
													echo "<tr><td colspan='17' align='center'>0 results</td></tr>";
												}
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
									<h4 class="card-title">Input KIB A</h4>
									<form class="form-sample" action="../process.php?process=insert-kiba" enctype="multipart/form-data" method="post">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">ID KIB A</label>
													<div class="col-sm-9">
														<?php
														$query = "SELECT ID_KIBA FROM kiba ORDER BY ID_KIBA DESC LIMIT 1";
														$result = mysqli_query($conn, $query);
														if (mysqli_num_rows($result) > 0) {
															if ($id = mysqli_fetch_assoc($result)) {
																$num = $id['ID_KIBA'];
																$num++;
																echo "<input type='text' class='form-control' name='idkiba' value='$num' readonly/>";
															} else {
																echo "<input type='text' class='form-control' name='idkiba' value='1'/> readonly";
															}
														}
														?>
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
													<label class="col-sm-3 col-form-label">Lokasi</label>
													<div class="input-group col-sm-8">
														<select name="idlokasi" class="form-control" style="margin: 0px 10px;">
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
															<button class="file-upload-browse btn btn-info" type="button">Input Lokasi</button>
														</span>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Data Spatial</label>
													<div class="input-group col-sm-8">
														<select name="iddataspa" class="form-control" style="margin: 0px 10px;">
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
														<input type="file" name="file" />
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