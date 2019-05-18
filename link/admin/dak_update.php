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
	<title>Input DAK</title>
</head>
<body>
	<form method="post" action="../process.php?process=update-dak" enctype="multipart/form-data">
        <br>ID_ASET<input type="text" name="ID_ASET">
        <br>ID_LOKASI<input type="text" name="ID_LOKASI">
        <br>NAMA_DAK<input type="text" name="NAMA_DAK">
        <br>LUAS<input type="text" name="LUAS">
        <br>PANJANG<input type="text" name="PANJANG">
        <br>LEBAR<input type="text" name="LEBAR">
        <br>PANJANG_BAIK_M<input type="text" name="PANJANG_BAIK_M">
        <br>PANJANG_BAIK_PERS<input type="text" name="PANJANG_BAIK_PERS">
        <br>PANJANG_SEDANG_M<input type="text" name="PANJANG_SEDANG_M">
        <br>PANJANG_SEDANG_PERS<input type="text" name="PANJANG_SEDANG_PERS">
        <br>PANJANG_RUSAKRINGAN_M<input type="text" name="PANJANG_RUSAKRINGAN_M">
        <br>PANJANG_RUSAKRINGAN_PERS<input type="text" name="PANJANG_RUSAKRINGAN_PERS">
        <br>PANJANG_RUSAKBERAT_M<input type="text" name="PANJANG_RUSAKBERAT_M">
        <br>PANJANG_RUSAKBERAT_PERS<input type="text" name="PANJANG_RUSAKBERAT_PERS">
        <br>RENCANA_PENANGANAN<input type="text" name="RENCANA_PENANGANAN">
        <br>KEBUTUHAN_ANGGARAN<input type="text" name="KEBUTUHAN_ANGGARAN">
        <br>KEMAMPUAN_RUPIAH<input type="text" name="KEMAMPUAN_RUPIAH">
        <br>KEMAMPUAN_M<input type="text" name="KEMAMPUAN_M">
        <br>USULAN_TAMBAHAN_RUPIAH<input type="text" name="USULAN_TAMBAHAN_RUPIAH">
        <br>USULAN_TAMBAHAN_M<input type="text" name="USULAN_TAMBAHAN_M">
        <br>USULAN_TAMBAHAN_SUMBER_DANA<input type="text" name="USULAN_TAMBAHAN_SUMBER_DANA">
		<br><button>Tambah Data</button>
	</form>
</body>
</html>