<?php
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
    
} else {
    // Redirect them to the login page
    header("Location: ../login.php");
}
?>
<html>
<head>
	<title>Input Data Spatial</title>
</head>
<body>
	<form method="post" action="../process.php?process=update-dataspa" enctype="multipart/form-data">
        <br>ID_DATASPA<input type="text" name="ID_DATASPA">
        <br>NAMA_DATASPA<input type="text" name="NAMA_DATASPA">
        <br>LINK_GIS<input type="text" name="LINK_GIS">
		<br><button>Tambah Data</button>
	</form>
</body>
</html>