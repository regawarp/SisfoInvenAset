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
	<title>Input Detail Pemeliharaan</title>
</head>
<body>
	<form method="post" action="../process.php?process=update-detail" enctype="multipart/form-data">
        <br>ID_DETAIL_PEMELIHARAAN<input type="text" name="ID_DETAIL_PEMELIHARAAN">
        <br>ID_PEMELIHARAAN<input type="text" name="ID_PEMELIHARAAN">
        <br>JENIS_PEMELIHARAAN<input type="text" name="JENIS_PEMELIHARAAN">
        <br>BIAYA<input type="text" name="BIAYA">
        <br>VOLUME<input type="text" name="VOLUME">
		<br><button>Tambah Data</button>
	</form>
</body>
</html>