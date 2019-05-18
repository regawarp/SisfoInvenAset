<?php
session_start();

if ( isset( $_SESSION['user_id']) ) {
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM pemeliharaan";
	$result = mysqli_query($conn, $sql);
} else {
    // Redirect them to the login page
    header("Location: ../login.php");
}
?>
<html>
<head>
	<title>Pemeliharaan</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>ID_PEMELIHARAAN</td>
            <td>ID_DAK</td>
            <td>TOTAL_BIAYA</td>
            <td>TANGGAL_MULAI</td>
            <td>TANGGAL_AKHIR</td>
			<td>UPDATE</td>
			<td>DELETE</td>
		</tr>
	<?php
		if (mysqli_num_rows($result) > 0) {while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
		         <td>$row[ID_PEMELIHARAAN]</td>
                 <td>$row[ID_DAK]</td>
                 <td>$row[TOTAL_BIAYA]</td>
                 <td>$row[TANGGAL_MULAI]</td>
                 <td>$row[TANGGAL_AKHIR]</td>
		         <td><a href='pemeliharaan_update.php?idpemeliharaan=$row[ID_PEMELIHARAAN]'>UPDATE</a></td>
		         <td><a href='../process.php?process=delete-pemeliharaan&&idpemeliharaan=$row[ID_PEMELIHARAAN]'>DELETE</a></td>
		        </tr>";
		    }
		} else {echo "<tr><td colspan='24' align='center'>0 results</td></tr>";}
		mysqli_close($conn);
	?>
	</table>
</body>
</html>