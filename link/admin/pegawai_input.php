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
	<title>Input Pegawai</title>
</head>
<body>
	<form method="post" action="../process.php?process=insert-pegawai" enctype="multipart/form-data">
        <br>NOMOR_INDUK_PEGAWAI<input type="text" name="NOMOR_INDUK_PEGAWAI">
        <br>ID_JENIS<input type="text" name="ID_JENIS">
        <br>NAMA_PEGAWAI<input type="text" name="NAMA_PEGAWAI">
        <br>PASSWORD<input type="text" name="PASSWORD">
		<br><button>Tambah Data</button>
	</form>
</body>
</html>