<?php
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
    
} else {
    // Redirect them to the login page
    header("Location: ../beranda.php");
}
?>
<html>
<head>
	<title>Input Lokasi</title>
</head>
<body>
	<form method="post" action="../process.php?process=insert-lokasi" enctype="multipart/form-data">
        <br>ID_LOKASI<input type="text" name="ID_LOKASI">
        <br>NAMA_LOKASI<input type="text" name="NAMA_LOKASI">
		<br><button>Tambah Data</button>
	</form>
</body>
</html>