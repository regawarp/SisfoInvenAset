<?php
session_start();

if ( isset( $_SESSION['user_id']) ) {
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM jenis_pegawai";
	$result = mysqli_query($conn, $sql);
} else {
    // Redirect them to the login page
    header("Location: ../login.php");
}
?>
<html>
<head>
	<title>Jenis Pegawai</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>ID_JENIS</td>
            <td>NAMA_JENIS</td>
			<td>UPDATE</td>
			<td>DELETE</td>
		</tr>
	<?php
		if (mysqli_num_rows($result) > 0) {while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
		         <td>$row[ID_JENIS]</td>
		         <td>$row[NAMA_JENIS]</td>
		         <td><a href='jenis_pegawai_update.php?idjenis=$row[ID_JENIS]'>UPDATE</a></td>
		         <td><a href='../process.php?process=delete-jenis&&idjenis=$row[ID_JENIS]'>DELETE</a></td>
		        </tr>";
		    }
		} else {echo "<tr><td colspan='24' align='center'>0 results</td></tr>";}
		mysqli_close($conn);
	?>
	</table>
</body>
</html>