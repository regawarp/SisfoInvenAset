<?php
session_start();

if ( isset( $_SESSION['user_id']) ) {
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM kiba";
	$result = mysqli_query($conn, $sql);
} else {
    // Redirect them to the login page
    header("Location: ../login.php");
}
?>
<html>
<head>
	<title>Kartu Inventaris Barang A</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>ID_KIBA</td>
	         <td>ID_LOKASI</td>
	         <td>ID_DATASPA</td>
	         <td>NOMOR_KODE_BARANG</td>
	         <td>NOMOR_REGISTER</td>
	         <td>LUAS</td>
	         <td>TAHUN_PENGADAAN</td>
	         <td>HAK</td>
	         <td>TANGGAL_SERTIFIKAT</td>
	         <td>NOMOR_SERTIFIKAT</td>
	         <td>PENGGUNAAN</td>
	         <td>HARGA</td>
	         <td>NAMA_BARANG</td>
	         <td>KETERANGAN</td>
	         <td>ASAL_USUL</td>
	         <td>FOTO</td>
	         <td>FILE</td>
			<td>UPDATE</td>
			<td>DELETE</td>
		</tr>
	<?php
		if (mysqli_num_rows($result) > 0) {while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
		         <td>$row[ID_KIBA]</td>
		         <td>$row[ID_LOKASI]</td>
		         <td>$row[ID_DATASPA]</td>
		         <td>$row[NOMOR_KODE_BARANG]</td>
		         <td>$row[NOMOR_REGISTER]</td>
		         <td>$row[LUAS]</td>
		         <td>$row[TAHUN_PENGADAAN]</td>
		         <td>$row[HAK]</td>
		         <td>$row[TANGGAL_SERTIFIKAT]</td>
		         <td>$row[NOMOR_SERTIFIKAT]</td>
		         <td>$row[PENGGUNAAN]</td>
		         <td>$row[HARGA]</td>
		         <td>$row[NAMA_BARANG]</td>
		         <td>$row[KETERANGAN]</td>
		         <td>$row[ASAL_USUL]</td>
		         <td>$row[FOTO]</td>
		         <td>$row[FILE]</td>
		         <td><a href='kiba_update.php?idkiba=$row[ID_KIBA]'>UPDATE</a></td>
		         <td><a href='../process.php?process=delete-kiba&&idkiba=$row[ID_KIBA]'>DELETE</a></td>
		        </tr>";
		    }
		} else {echo "<tr><td colspan='17' align='center'>0 results</td></tr>";}
		mysqli_close($conn);
	?>
	</table>
</body>
</html>