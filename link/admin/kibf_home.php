<?php
session_start();

if ( isset( $_SESSION['user_id']) ) {
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM kibf";
	$result = mysqli_query($conn, $sql);
} else {
    // Redirect them to the login page
    header("Location: ../login.php");
}
?>
<html>
<head>
	<title>Kartu Inventaris Barang F</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>ID_KIBF</td>
	         <td>ID_DATASPA</td>
	         <td>ID_LOKASI</td>
	         <td>ID_ASET</td>
	         <td>BANGUNGAN</td>
	         <td>BERTINGKAT</td>
	         <td>BETON</td>
	         <td>TANGGAL_DOKUMEN</td>
	         <td>PANJANG</td>
	         <td>NOMOR_DOKUMEN</td>
	         <td>TANGGAL_MULAI</td>
	         <td>STATUS_TANAH</td>
	         <td>NOMO_KODE_TANAH</td>
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
		         <td>$row[ID_KIBF]</td>
		         <td>$row[ID_DATASPA]</td>
		         <td>$row[ID_LOKASI]</td>
		         <td>$row[ID_ASET]</td>
		         <td>$row[BANGUNGAN]</td>
		         <td>$row[BERTINGKAT]</td>
		         <td>$row[BETON]</td>
		         <td>$row[TANGGAL_DOKUMEN]</td>
		         <td>$row[PANJANG]</td>
		         <td>$row[NOMOR_DOKUMEN]</td>
		         <td>$row[TANGGAL_MULAI]</td>
		         <td>$row[STATUS_TANAH]</td>
		         <td>$row[NOMO_KODE_TANAH]</td>
		         <td>$row[NAMA_BARANG]</td>
		         <td>$row[KETERANGAN]</td>
		         <td>$row[ASAL_USUL]</td>
		         <td>$row[FOTO]</td>
		         <td>$row[FILE]</td>
		         <td><a href='kibf_update.php?idkibf=$row[ID_KIBF]'>UPDATE</a></td>
		         <td><a href='../process.php?process=delete-kibf&&idkibf=$row[ID_KIBA]'>DELETE</a></td>
		        </tr>";
		    }
		} else {echo "<tr><td colspan='20' align='center'>0 results</td></tr>";}
		mysqli_close($conn);
	?>
	</table>
</body>
</html>