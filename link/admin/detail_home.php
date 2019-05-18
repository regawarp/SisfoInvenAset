<?php
session_start();

if ( isset( $_SESSION['user_id']) ) {
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM detail_pemeliharaan";
	$result = mysqli_query($conn, $sql);
} else {
    // Redirect them to the login page
    header("Location: ../login.php");
}
?>
<html>
<head>
	<title>Detail Pemeliharaan</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>ID_DETAIL_PEMELIHARAAN</td>
            <td>ID_PEMELIHARAAN</td>
            <td>JENIS_PEMELIHARAAN</td>
            <td>BIAYA</td>
            <td>VOLUME</td>
			<td>UPDATE</td>
			<td>DELETE</td>
		</tr>
	<?php
		if (mysqli_num_rows($result) > 0) {while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
		         <td>$row[ID_DETAIL_PEMELIHARAAN]</td>
                 <td>$row[ID_PEMELIHARAAN]</td>
                 <td>$row[JENIS_PEMELIHARAAN]</td>
                 <td>$row[BIAYA]</td>
                 <td>$row[VOLUME]</td>
		         <td><a href='detail_update.php?iddetail=$row[ID_DETAIL_PEMELIHARAAN]'>UPDATE</a></td>
		         <td><a href='../process.php?process=delete-detail&&iddetail=$row[ID_DETAIL_PEMELIHARAAN]'>DELETE</a></td>
		        </tr>";
		    }
		} else {echo "<tr><td colspan='24' align='center'>0 results</td></tr>";}
		mysqli_close($conn);
	?>
	</table>
</body>
</html>