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
			<td>$row['idkiba']</td>
	        <td>$row['idlokasi']</td>
			<td>$row['iddataspa']</td>
			<td>$row['nokodebrg']</td>
			<td>$row['noreg']</td>
			<td>$row['luas']</td>
			<td>$row['thn_pengadaan']</td>
			<td>$row['hak']</td>
			<td>$row['tgl_sertifikat']</td>
			<td>$row['no_sertifikat']</td>
			<td>$row['penggunaan']</td>
			<td>$row['harga']</td>
			<td>$row['nama_barang']</td>
			<td>$row['keterangan']</td>
			<td>$row['asalusul']</td>
			<td>$row['foto']</td>
			<td>$row['file']</td>
			<td>UPDATE</td>
			<td>DELETE</td>
		</tr>
	<?php
		if (mysqli_num_rows($result) > 0) {while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
		         <td>".$row["ID_KIBA"]."</td>
		         <td>".$row['ID_LOKASI']."</td>
		         <td>".$row['ID_DATASPA']."</td>
		         <td>".$row['NOMOR_KODE_BARANG']."</td>
		         <td>".$row['NOMOR_REGISTER']."</td>
		         <td>".$row['LUAS']."</td>
		         <td>".$row['TAHUN_PENGADAAN']."</td>
		         <td>".$row['HAK']."</td>
		         <td>".$row['TANGGAL_SERTIFIKAT']."</td>
		         <td>".$row['NOMOR_SERTIFIKAT']."</td>
		         <td>".$row['PENGGUNAAN']."</td>
		         <td>".$row['HARGA']."</td>
		         <td>".$row['NAMA_BARANG']."</td>
		         <td>".$row['KETERANGAN']."</td>
		         <td>".$row['ASAL_USUL']."</td>
		         <td>".$row['FOTO']."</td>
		         <td>".$row['FILE']."</td>
		         <td><a href='../process.php?process=update-kiba&&idkiba=$row[ID_KIBA]'>UPDATE</a></td>
		         <td><a href='../process.php?process=delete-kiba&&idkiba=$row[ID_KIBA]'>DELETE</a></td>
		        </tr>";
		    }
		} else {echo "<tr><td colspan='17' align='center'>0 results</td></tr>";}
		mysqli_close($conn);
	?>
	</table>
</body>
</html>