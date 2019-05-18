<?php
session_start();

if ( isset( $_SESSION['user_id']) ) {
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM lokasi";
	$result = mysqli_query($conn, $sql);
} else {
    // Redirect them to the login page
    header("Location: ../beranda.php");
}
?>
<html>
<head>
	<title>Lokasi</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>ID_LOKAS</td>
            <td>NAMA_LOKASI</td>
			<td>UPDATE</td>
			<td>DELETE</td>
		</tr>
	<?php
		if (mysqli_num_rows($result) > 0) {while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
		         <td>$row[ID_LOKASI]</td>
		         <td>$row[NAMA_LOKASI]</td>
		         <td><a href='lokasi_update.php?idlokasi=$row[ID_LOKASI]'>UPDATE</a></td>
		         <td><a href='../process.php?process=delete-lokasi&&idlokasi=$row[ID_LOKASI]'>DELETE</a></td>
		        </tr>";
		    }
		} else {echo "<tr><td colspan='24' align='center'>0 results</td></tr>";}
		mysqli_close($conn);
	?>
	</table>
</body>
</html>