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
	<title>Input Pemeliharaan</title>
</head>
<body>
	<form method="post" action="../process.php?process=update-pemeliharaan" enctype="multipart/form-data">
        <br>ID_PEMELIHARAAN<input type="text" name="ID_PEMELIHARAAN">
        <br>ID_DAK<input type="text" name="ID_DAK">
        <br>TOTAL_BIAYA<input type="text" name="TOTAL_BIAYA">
        <br>TANGGAL_MULAI<input type="text" name="TANGGAL_MULAI">
        <br>TANGGAL_AKHIR<input type="text" name="TANGGAL_AKHIR">
		<br><button>Tambah Data</button>
	</form>
</body>
</html>