<?php
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
    //Already loged in
    header("Location: admin/dashboard.php");
} else {

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
	<link rel="stylesheet" type="text/css" href="../css/animate.css">
	<link rel="stylesheet" type="text/css" href="../css/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="../css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="../css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="../css/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
    
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form" action="process.php?process=login" method="post">
					<span class="login100-form-title p-b-43">
						Login to continue
					</span>
					
					
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username">
						<span class="focus-input100"></span>
						<span class="label-input100">Username</span>
					</div>
					
					
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password">
						<span class="focus-input100"></span>
						<span class="label-input100">Password</span>
					</div>

					<div class="flex-sb-m w-full p-t-3 p-b-32">

						<div>
							<a href="#" class="txt1">
								Forgot Password?
							</a>
						</div>
					</div>
			

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>
					
					<div class="text-center p-t-46 p-b-20">
						<span class="txt2">
							<a href="beranda.php">< Kembali ke Beranda</a>
                        </span>
                        <span class="txt2">
							<a href="admin/dashboard.php">Ke Dashboard ></a>
                        </span>
                        
					</div>
				</form>

				<div class="login100-more" style="background-image: url('../img/bg-01.jpg');">
				</div>
			</div>
		</div>
    </div>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script src="../js/login.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/animsition.js"></script>
    <script src="../js/select2.js"></script>
	<script src="../js/moment.js"></script>
	<script src="../js/daterangepicker.js"></script>

</body>
</html>