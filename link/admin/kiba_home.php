<?php
session_start();

if (isset($_SESSION['user_id'])) {
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM kiba";
	$result = mysqli_query($conn, $sql);
} else {
	// Redirect them to the login page
	header("Location: ../login.php");
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
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="../../css/admin.css">
	<!-- endinject -->
</head>

<body>
	<table border="1">
		<tr>
			<td>ID_KIBA</td>
			<td>ID_LOKASI</td>
			<td>ID_DATASPA</td>
			<td>NOMOR_KODE_BARANG</td>
			<td>NOMOR_REGISTER</td>
			<td>LUAS</td>
			<td>TAHUN_PENGADAAN</td>
			<td>HAK</td>
			<td>TANGGAL_SERTIFIKAT</td>
			<td>NOMOR_SERTIFIKAT</td>
			<td>PENGGUNAAN</td>
			<td>HARGA</td>
			<td>NAMA_BARANG</td>
			<td>KETERANGAN</td>
			<td>ASAL_USUL</td>
			<td>FOTO</td>
			<td>FILE</td>
			<td>UPDATE</td>
			<td>DELETE</td>
		</tr>
		<?php
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
		         <td>$row[ID_KIBA]</td>
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
		         <td><a href='kiba_update.php?idkiba=$row[ID_KIBA]'>UPDATE</a></td>
		         <td><a href='../process.php?process=delete-kiba&&idkiba=$row[ID_KIBA]&&foto=$row[FOTO]&&file=$row[FILE]'>DELETE</a></td>
		        </tr>";
			}
		} else {
			echo "<tr><td colspan='17' align='center'>0 results</td></tr>";
		}
		mysqli_close($conn);
		?>
	</table>
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
            <a class="nav-link" href="../../pages/charts/chartjs.html">
              <i class="menu-icon mdi mdi-file-multiple"></i>
              <span class="menu-title">KIB D</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../pages/tables/basic-table.html">
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
						<div class="col-md-6 d-flex align-items-stretch grid-margin">
							<div class="row flex-grow">
								<div class="col-12">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Default form</h4>
											<p class="card-description">
												Basic form layout
											</p>
											<form class="forms-sample">
												<div class="form-group">
													<label for="exampleInputEmail1">Email address</label>
													<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
												</div>
												<div class="form-group">
													<label for="exampleInputPassword1">Password</label>
													<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
												</div>
												<button type="submit" class="btn btn-success mr-2">Submit</button>
												<button class="btn btn-light">Cancel</button>
											</form>
										</div>
									</div>
								</div>
								<div class="col-12 stretch-card">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Horizontal Form</h4>
											<p class="card-description">
												Horizontal form layout
											</p>
											<form class="forms-sample">
												<div class="form-group row">
													<label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
													<div class="col-sm-9">
														<input type="email" class="form-control" id="exampleInputEmail2" placeholder="Enter email">
													</div>
												</div>
												<div class="form-group row">
													<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
													<div class="col-sm-9">
														<input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
													</div>
												</div>
												<button type="submit" class="btn btn-success mr-2">Submit</button>
												<button class="btn btn-light">Cancel</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Basic form</h4>
									<p class="card-description">
										Basic form elements
									</p>
									<form class="forms-sample">
										<div class="form-group">
											<label for="exampleInputName1">Name</label>
											<input type="text" class="form-control" id="exampleInputName1" placeholder="Name">
										</div>
										<div class="form-group">
											<label for="exampleInputEmail3">Email address</label>
											<input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
										</div>
										<div class="form-group">
											<label for="exampleInputPassword4">Password</label>
											<input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password">
										</div>
										<div class="form-group">
											<label>File upload</label>
											<input type="file" name="img[]" class="file-upload-default">
											<div class="input-group col-xs-12">
												<input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
												<span class="input-group-append">
													<button class="file-upload-browse btn btn-info" type="button">Upload</button>
												</span>
											</div>
										</div>
										<div class="form-group">
											<label for="exampleInputCity1">City</label>
											<input type="text" class="form-control" id="exampleInputCity1" placeholder="Location">
										</div>
										<div class="form-group">
											<label for="exampleTextarea1">Textarea</label>
											<textarea class="form-control" id="exampleTextarea1" rows="2"></textarea>
										</div>
										<button type="submit" class="btn btn-success mr-2">Submit</button>
										<button class="btn btn-light">Cancel</button>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-5 d-flex align-items-stretch">
							<div class="row flex-grow">
								<div class="col-12 grid-margin">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Basic input groups</h4>
											<p class="card-description">
												Basic bootstrap input groups
											</p>
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">@</span>
													</div>
													<input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
												</div>
											</div>
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">$</span>
													</div>
													<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
													<div class="input-group-append">
														<span class="input-group-text">.00</span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-prepend">
														<span class="input-group-text">$</span>
													</div>
													<div class="input-group-prepend">
														<span class="input-group-text">0.00</span>
													</div>
													<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-12 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<h4 class="card-title">Colored input groups</h4>
											<p class="card-description">
												Input groups with colors
											</p>
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-prepend bg-info">
														<span class="input-group-text bg-transparent">
															<i class="mdi mdi-shield-outline text-white"></i>
														</span>
													</div>
													<input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="colored-addon1">
												</div>
											</div>
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-prepend bg-primary border-primary">
														<span class="input-group-text bg-transparent">
															<i class="mdi mdi mdi-menu text-white"></i>
														</span>
													</div>
													<input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="colored-addon2">
												</div>
											</div>
											<div class="form-group">
												<div class="input-group">
													<input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="colored-addon3">
													<div class="input-group-append bg-primary border-primary">
														<span class="input-group-text bg-transparent">
															<i class="mdi mdi-menu text-white"></i>
														</span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="input-group">
													<div class="input-group-prepend bg-primary border-primary">
														<span class="input-group-text bg-transparent text-white">$</span>
													</div>
													<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
													<div class="input-group-append bg-primary border-primary">
														<span class="input-group-text bg-transparent text-white">.00</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-7 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Input size</h4>
									<p class="card-description">
										This is the default bootstrap form layout
									</p>
									<div class="form-group">
										<label>Large input</label>
										<input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
									</div>
									<div class="form-group">
										<label>Default input</label>
										<input type="text" class="form-control" placeholder="Username" aria-label="Username">
									</div>
									<div class="form-group">
										<label>Small input</label>
										<input type="text" class="form-control form-control-sm" placeholder="Username" aria-label="Username">
									</div>
								</div>
								<div class="card-body">
									<h4 class="card-title">Selectize</h4>
									<div class="form-group">
										<label for="exampleFormControlSelect1">Large select</label>
										<select class="form-control form-control-lg" id="exampleFormControlSelect1">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleFormControlSelect2">Default select</label>
										<select class="form-control" id="exampleFormControlSelect2">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleFormControlSelect3">Small select</label>
										<select class="form-control form-control-sm" id="exampleFormControlSelect3">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Checkbox Controls</h4>
									<p class="card-description">Checkbox and radio controls</p>
									<form class="forms-sample">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input"> Default
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" checked> Checked
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" disabled> Disabled
														</label>
													</div>
													<div class="form-check">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" disabled checked> Disabled checked
														</label>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="form-radio">
														<label class="form-check-label">
															<input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="" checked> Option one
														</label>
													</div>
													<div class="form-radio">
														<label class="form-check-label">
															<input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2"> Option two
														</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-radio disabled">
														<label class="form-check-label">
															<input type="radio" class="form-check-input" name="optionsRadios2" id="optionsRadios3" value="option3" disabled> Option three is disabled
														</label>
													</div>
													<div class="form-radio disabled">
														<label class="form-check-label">
															<input type="radio" class="form-check-input" name="optionsRadio2" id="optionsRadios4" value="option4" disabled checked> Option four is selected and disabled
														</label>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-6 grid-margin stretch-card">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Checkbox Flat Controls</h4>
									<p class="card-description">Checkbox and radio controls with flat design</p>
									<form class="forms-sample">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<div class="form-check form-check-flat">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input"> Default
														</label>
													</div>
													<div class="form-check form-check-flat">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" checked> Checked
														</label>
													</div>
													<div class="form-check form-check-flat">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" disabled> Disabled
														</label>
													</div>
													<div class="form-check form-check-flat">
														<label class="form-check-label">
															<input type="checkbox" class="form-check-input" disabled checked> Disabled checked
														</label>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<div class="form-radio form-radio-flat">
														<label class="form-check-label">
															<input type="radio" class="form-check-input" name="flatRadios1" id="flatRadios1" value="" checked> Option one
														</label>
													</div>
													<div class="form-radio form-radio-flat">
														<label class="form-check-label">
															<input type="radio" class="form-check-input" name="flatRadios2" id="flatRadios2" value="option2"> Option two
														</label>
													</div>
												</div>
												<div class="form-group">
													<div class="form-radio form-radio-flat disabled">
														<label class="form-check-label">
															<input type="radio" class="form-check-input" name="flatRadios3" id="flatRadios3" value="option3" disabled> Option three is disabled
														</label>
													</div>
													<div class="form-radio form-radio-flat disabled">
														<label class="form-check-label">
															<input type="radio" class="form-check-input" name="flatRadios4" id="flatRadios4" value="option4" disabled checked> Option four is selected and disabled
														</label>
													</div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-12 grid-margin">
							<div class="card">
								<div class="card-body">
									<h4 class="card-title">Horizontal Two column</h4>
									<form class="form-sample">
										<p class="card-description">
											Personal info
										</p>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">First Name</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Last Name</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Gender</label>
													<div class="col-sm-9">
														<select class="form-control">
															<option>Male</option>
															<option>Female</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Date of Birth</label>
													<div class="col-sm-9">
														<input class="form-control" placeholder="dd/mm/yyyy" />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Category</label>
													<div class="col-sm-9">
														<select class="form-control">
															<option>Category1</option>
															<option>Category2</option>
															<option>Category3</option>
															<option>Category4</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Membership</label>
													<div class="col-sm-4">
														<div class="form-radio">
															<label class="form-check-label">
																<input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked> Free
															</label>
														</div>
													</div>
													<div class="col-sm-5">
														<div class="form-radio">
															<label class="form-check-label">
																<input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2"> Professional
															</label>
														</div>
													</div>
												</div>
											</div>
										</div>
										<p class="card-description">
											Address
										</p>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Address 1</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">State</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Address 2</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Postcode</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" />
													</div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">City</label>
													<div class="col-sm-9">
														<input type="text" class="form-control" />
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group row">
													<label class="col-sm-3 col-form-label">Country</label>
													<div class="col-sm-9">
														<select class="form-control">
															<option>America</option>
															<option>Italy</option>
															<option>Russia</option>
															<option>Britain</option>
														</select>
													</div>
												</div>
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
<!-- End custom js for this page-->

</html>