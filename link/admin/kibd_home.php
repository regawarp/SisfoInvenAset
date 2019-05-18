<?php
session_start();

if ( isset( $_SESSION['user_id']) ) {
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM kibd";
	$result = mysqli_query($conn, $sql);
} else {
    // Redirect them to the login page
    header("Location: ../login.php");
}
?>
<html>
<head>
	<title>Kartu Inventaris Barang D</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>ID_KIBD</td>
	         <td>ID_LOKASI</td>
	         <td>ID_DATASPA</td>
	         <td>ID_ASET</td>
	         <td>JENIS</td>
	         <td>NAMA_BARANG</td>
	         <td>BETON</td>
	         <td>NOMOR_KODE_BARANG</td>
	         <td>NOMOR_REGISTER</td>
	         <td>KONSTRUKSI</td>
	         <td>PANJANG</td>
	         <td>LEBAR</td>
	         <td>LUAS</td>
	         <td>TANGGAL_DOKUMEN</td>
	         <td>STATUS_TANAH</td>
	         <td>NOMOR_KODE</td>
	         <td>ASAL_USUL</td>
	         <td>HARGA</td>
	         <td>KONDISI</td>
	         <td>KETERANGAN</td>
	         <td>FOTO</td>
	         <td>FILE</td>
			<td>UPDATE</td>
			<td>DELETE</td>
		</tr>
	<?php
		if (mysqli_num_rows($result) > 0) {while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
		         <td>$row[ID_KIBD]</td>
		         <td>$row[ID_LOKASI]</td>
		         <td>$row[ID_DATASPA]</td>
		         <td>$row[ID_ASET]</td>
		         <td>$row[JENIS]</td>
		         <td>$row[NAMA_BARANG]</td>
		         <td>$row[BETON]</td>
		         <td>$row[NOMOR_KODE_BARANG]</td>
		         <td>$row[NOMOR_REGISTER]</td>
		         <td>$row[KONSTRUKSI]</td>
		         <td>$row[PANJANG]</td>
		         <td>$row[LEBAR]</td>
		         <td>$row[LUAS]</td>
		         <td>$row[TANGGAL_DOKUMEN]</td>
		         <td>$row[STATUS_TANAH]</td>
		         <td>$row[NOMOR_KODE]</td>
		         <td>$row[ASAL_USUL]</td>
		         <td>$row[HARGA]</td>
		         <td>$row[KONDISI]</td>
		         <td>$row[KETERANGAN]</td>
		         <td>$row[FOTO]</td>
		         <td>$row[FILE]</td>
		         <td><a href='kiba_update.php?idkiba=$row[ID_KIBA]'>UPDATE</a></td>
		         <td><a href='../process.php?process=delete-kiba&&idkiba=$row[ID_KIBA]'>DELETE</a></td>
		        </tr>";
		    }
		} else {echo "<tr><td colspan='24' align='center'>0 results</td></tr>";}
		mysqli_close($conn);
	?>
	</table>
</body>
</html>