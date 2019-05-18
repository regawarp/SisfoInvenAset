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
	<title>Input Kib A</title>
</head>
<body>
	<form method="post" action="../process.php?process=insert-kiba" enctype="multipart/form-data">
		ID KIBA :
		<input type="text" name="idkiba">
		<br>ID LOKASI :
		<select name="idlokasi">
			<option>52001</option>
			<option>52002</option>
		</select> <button>Input Lokasi</button>
		<br>ID SPATIAL :
		<select name="iddataspa">
			<option>60</option>
		</select> <button>Input Spatial</button>
		<br>NAMA BARANG
		<input type="text" name="nama_barang">
		<br>NOMOR KODE BARANG
		<input type="text" name="nokodebrg">
		<br>NOMOR REGISTER
		<input type="text" name="noreg">
		<br>LUAS
		<input type="text" name="luas">
		<br>TAHUN PENGADAAN
		<input type="text" name="thn_pengadaan">
		<br>HAK
		<input type="text" name="hak">
		<br>TANGGAL SERTIFIKAT
		<input type="date" name="tgl_sertifikat">
		<br>NOMOR SERTIFIKAT
		<input type="text" name="no_sertifikat">
		<br>PENGGUNAAN
		<input type="text" name="penggunaan">
		<br>HARGA
		<input type="number" name="harga">
		<br>FOTO
		<input type="file" name="foto">
		<br>FILE
		<input type="file" name="file">
		<br>KETERANGAN
		<input type="text" name="keterangan">
		<br>ASAL USUL
		<input type="text" name="asalusul">
		<br>
		<button>Tambah Data</button>
	</form>
</body>
</html>