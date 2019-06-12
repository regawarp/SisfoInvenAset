<?php
session_start();

if (isset($_SESSION['user_id'])) {
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM ded,dedlokasi,lokasi WHERE ded.ID_DED=dedlokasi.ID_DED AND dedlokasi.ID_LOKASI=lokasi.ID_LOKASI";
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
									<h5 class="card-title mb-4">Big Div</h5>
									<div class="table-responsive">
										<table id="myTable" class="table table-hover">
											<thead>
												<tr>
													<td>ID_DED</td>
													<td>Nama Lokasi</td>
													<td>PATH_FILE</td>
													<td>UPDATE</td>
													<td>DELETE</td>
												</tr>
											</thead>
											<tbody>
												<?php
												if (mysqli_num_rows($result) > 0) {
													while ($row = mysqli_fetch_assoc($result)) {
														echo "<tr>
														<td>$row[ID_DED]</td>
														<td>$row[NAMA_LOKASI]</td>
														<td><a href='../../file/$row[PATH_FILE]' target='_blank'>$row[PATH_FILE]</a></td>
														<td><a href='ded_update.php?ID_DED=$row[ID_DED]'><button class='btn btn-warning' type='button'>
														<span class='mdi mdi-pencil'></span>
													</button></a></td>
														<td><a href='../process.php?process=delete-ded&&ID_DED=$row[ID_DED]'><button class='btn btn-danger' type='button'>
														<span class='mdi mdi-delete'></span>
													</button></a></td>
														</tr>";
													}
												} else {
													echo "<tr><td colspan='24' align='center'>0 results</td></tr>";
												}
												mysqli_close($conn);
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
										<h4 class="card-title">Input DED</h4>
										<form class="form-sample" action="../process.php?process=insert-ded" enctype="multipart/form-data" method="post">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group row"> <label class="col-sm-3 col-form-label">ID_DED</label>
														<div class="col-sm-9">
															<?php
															$conn = mysqli_connect("localhost", "root", "", "db_pupr");
															$query = "SELECT * FROM ded,dedlokasi,lokasi WHERE ded.ID_DED=dedlokasi.ID_DED AND dedlokasi.ID_LOKASI=lokasi.ID_LOKASI GROUP BY ded.ID_DED ";
															$result = mysqli_query($conn, $sql);
															if (mysqli_num_rows($result) > 0) {
																if ($row = mysqli_fetch_assoc($result)) {
																	$num = $row['ID_DED'];
																	$num++;
																	echo "<input type='text' class='form-control' name='ID_DED' readonly value='$num'>";
																}
															} else {
																echo "<input type='text' class='form-control' name='ID_DED' readonly value='1'>";
															}
															mysqli_close($conn);
															?>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row"> <label class="col-sm-3 col-form-label">NAMA LOKASI</label>
														<div class="col-sm-9">
															<select name="ID_LOKASI" class="form-control" style="margin: 0px 10px;">
																<?php
																$conn = mysqli_connect("localhost", "root", "", "db_pupr");
																$query = "SELECT * FROM lokasi";
																$result = mysqli_query($conn, $query);
																if (mysqli_num_rows($result) > 0) {
																	while ($rowlokasi = mysqli_fetch_assoc($result)) {
																		echo "<option value='$rowlokasi[ID_LOKASI]'>$rowlokasi[NAMA_LOKASI]</option>";
																	}
																} else {
																	echo "<option>Input Lokasi Baru</option>";
																}
																mysqli_close($conn);
																?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">PATH_FILE</label>
														<div class="col-sm-9">
															<input type="file" name="PATH_FILE" />
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
</body>

</html>