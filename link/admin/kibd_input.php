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
	<title>Input Kib D</title>
</head>
<body>
	<form method="post" action="../process.php?process=insert-kibd">
		<br>ID_KIBD<input type="text" name="ID_KIBD">
        <br>ID_LOKASI<input type="text" name="ID_LOKASI">
        <br>ID_DATASPA<input type="text" name="ID_DATASPA">
        <br>ID_ASET<input type="text" name="ID_ASET">
        <br>JENIS<input type="text" name="JENIS">
        <br>NAMA_BARANG<input type="text" name="NAMA_BARANG">
        <br>BETON<input type="text" name="BETON">
        <br>NOMOR_KODE_BARANG<input type="text" name="NOMOR_KODE_BARANG">
        <br>NOMOR_REGISTER<input type="text" name="NOMOR_REGISTER">
        <br>KONSTRUKSI<input type="text" name="KONSTRUKSI">
        <br>PANJANG<input type="number" name="PANJANG">
        <br>LEBAR<input type="number" name="LEBAR">
        <br>LUAS<input type="number" name="LUAS">
        <br>TANGGAL_DOKUMEN<input type="date" name="TANGGAL_DOKUMEN">
        <br>STATUS_TANAH<input type="text" name="STATUS_TANAH">
        <br>NOMOR_KODE<input type="text" name="NOMOR_KODE">
        <br>ASAL_USUL<input type="text" name="ASAL_USUL">
        <br>HARGA<input type="number" name="HARGA">
        <br>KONDISI<input type="text" name="KONDISI">
        <br>KETERANGAN<input type="text" name="KETERANGAN">
        <br>FOTO<input type="file" name="FOTO">
        <br>FILE<input type="file" name="FILE">
		<br><button>Tambah Data</button>
	</form>
</body>
</html>