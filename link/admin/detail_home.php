<?php
session_start();

if (isset($_SESSION['user_id'])) {
	include("../connect.php");
	$sql = "SELECT * FROM detail_pemeliharaan WHERE ID_PEMELIHARAAN=$_GET[ID_PEMELIHARAAN]";
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
									<h5 class="card-title mb-4">Detail Pemeliharaan</h5>
									<div class="table-responsive">
										<table id="myTable" class="table table-hover cell-border">
											<thead>
												<tr>
													<td>ID_DETAIL_PEMELIHARAAN</td>
													<td>ID_PEMELIHARAAN</td>
													<td>JENIS_PEMELIHARAAN</td>
													<td>BIAYA</td>
													<td>VOLUME</td>
													<td>UPDATE</td>
													<td>DELETE</td>
												</tr>
											</thead>
											<tbody>
												<?php
												if (mysqli_num_rows($result) > 0) {
													while ($row = mysqli_fetch_assoc($result)) {
														echo "<tr>
																<td>$row[ID_DETAIL_PEMELIHARAAN]</td>
																<td>$row[ID_PEMELIHARAAN]</td>
																<td>$row[JENIS_PEMELIHARAAN]</td>
																<td>$row[BIAYA]</td>
																<td>$row[VOLUME]</td>
																<td><a href='detail_update.php?ID_DETAIL_PEMELIHARAAN=$row[ID_DETAIL_PEMELIHARAAN]'><button class='btn btn-warning' type='button'>
																<span class='mdi mdi-pencil'></span>
																</button></a></td>
																<td><a href='../process.php?process=delete-detail&&ID_DETAIL_PEMELIHARAAN=$row[ID_DETAIL_PEMELIHARAAN]'><button class='btn btn-danger' type='button'>
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
										<h4 class="card-title">Input Pemeliharaan</h4>
										<form class="form-sample" action="../process.php?process=insert-detail" enctype="multipart/form-data" method="post">
											<div class="row">
												<div class="col-md-6">
													<input type="hidden" name="ID_PEMELIHARAAN" <?php echo "value='$_GET[ID_PEMELIHARAAN]'"; ?>>
													<div class="form-group row"> <label class="col-sm-3 col-form-label">ID_DETAIL_PEMELIHARAAN</label>
														<div class="col-sm-9">
															<?php
															include("../connect.php");
															$query = "SELECT * FROM detail_pemeliharaan WHERE ID_PEMELIHARAAN=$_GET[ID_PEMELIHARAAN]";
															$result = mysqli_query($conn, $sql);
															if (mysqli_num_rows($result) > 0) {
																if ($row = mysqli_fetch_assoc($result)) {
																	$num = $row['ID_DETAIL_PEMELIHARAAN'];
																	$num++;
																	echo "<input type='text' class='form-control' name='ID_DETAIL_PEMELIHARAAN' readonly value='$num'>";
																}
															} else {
																echo "<input type='text' class='form-control' name='ID_DETAIL_PEMELIHARAAN' readonly value='1'>";
															}
															mysqli_close($conn);
															?>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">JENIS_PEMELIHARAAN</label>
														<div class="col-sm-9">
															<input type="text" class="form-control" name="JENIS_PEMELIHARAAN" />
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">BIAYA</label>
														<div class="col-sm-9">
															<input type="number" class="form-control" name="BIAYA" />
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group row">
														<label class="col-sm-3 col-form-label">VOLUME</label>
														<div class="col-sm-9">
															<input type="number" class="form-control" name="VOLUME" />
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