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
	<title>Input Jenis Pegawai</title>
</head>
<body>
	<form method="post" action="../process.php?process=insert-jenis" enctype="multipart/form-data">
        <br>ID_JENIS<input type="text" name="ID_JENIS">
        <br>NAMA_JENIS<input type="text" name="NAMA_JENIS">
		<br><button>Tambah Data</button>
	</form>
</body>
</html>