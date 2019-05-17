<?php
session_start();

if ( isset( $_SESSION['user_id']) ) {
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM kiba WHERE $_GET[idkiba]";
	$result = mysqli_query($conn, $sql);
} else {
    // Redirect them to the login page
    header("Location: ../login.php");
}
if (mysqli_num_rows($result) > 0) {if($row = mysqli_fetch_assoc($result)) {
echo'
<html>
<head>
	<title>Update Kib A</title>
</head>
<body>
	<form method="post" action="../process.php?process=update-kiba&&idkiba='.$row['ID_KIBA'].'">
		ID KIBA :
		<input type="text" name="idkiba" value="'.$row['ID_KIBA'].'">
		<br>ID LOKASI :
		<select name="idlokasi">
			<option>LK001</option>
			<option>LK002</option>
		</select> <button>Input Lokasi</button>
		<br>ID SPATIAL :
		<select name="iddataspa">
			<option>SP001</option>
			<option>SP002</option>
		</select> <button>Input Spatial</button>
		<br>NOMOR KODE BARANG
		<input type="text" name="nokodebrg" value="'.$row['NOMOR_KODE_BARANG'].'">
		<br>NOMOR REGISTER
		<input type="text" name="noreg" value="'.$row['NOMOR_REGISTER'].'">
		<br>LUAS
		<input type="text" name="luas" value="'.$row['LUAS'].'">
		<br>TAHUN PENGADAAN
		<input type="text" name="thn_pengadaan" value="'.$row['TAHUN_PENGADAAN'].'">
		<br>HAK
		<input type="text" name="hak" value="'.$row['HAK'].'">
		<br>TANGGAL SERTIFIKAT
		<input type="date" name="tgl_sertifikat" value="'.$row['TANGGAL_SERTIFIKAT'].'">
		<br>NOMOR SERTIFIKAT
		<input type="text" name="no_sertifikat" value="'.$row['NOMOR_SERTIFIKAT'].'">
		<br>PENGGUNAAN
		<input type="text" name="penggunaan" value="'.$row['PENGGUNAAN'].'">
		<br>HARGA
		<input type="number" name="harga" value="'.$row['HARGA'].'">
		<br>NAMA BARANG
		<input type="text" name="nama_barang" value="'.$row['NAMA_BARANG'].'">
		<br>KETERANGAN
		<input type="text" name="keterangan" value="'.$row['KETERANGAN'].'">
		<br>ASAL USUL
		<input type="text" name="asalusul" value="'.$row['ASAL_USUL'].'">
		<br>FOTO
		<input type="text" name="foto" value="'.$row['FOTO'].'">
		<br>FILE
		<input type="text" name="file" value="'.$row['FILE'].'">
		<br>
		<button>Update Data</button>
	</form>
</body>
</html>
';}}
?>