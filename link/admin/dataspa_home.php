<?php
session_start();

if ( isset( $_SESSION['user_id']) ) {
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM dataspa";
	$result = mysqli_query($conn, $sql);
} else {
    // Redirect them to the login page
    header("Location: ../login.php");
}
?>
<html>
<head>
	<title>Data Spatial</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>ID_DATASPA</td>
            <td>NAMA_DATASPA</td>
            <td>LINK_GIS</td>
			<td>UPDATE</td>
			<td>DELETE</td>
		</tr>
	<?php
		if (mysqli_num_rows($result) > 0) {while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
		         <td>$row[ID_DATASPA]</td>
                 <td>$row[NAMA_DATASPA]</td>
                 <td>$row[LINK_GIS]</td>
		         <td><a href='dataspa_update.php?iddataspa=$row[ID_DATASPA]'>UPDATE</a></td>
		         <td><a href='../process.php?process=delete-dataspa&&iddataspa=$row[ID_DATASPA]'>DELETE</a></td>
		        </tr>";
		    }
		} else {echo "<tr><td colspan='24' align='center'>0 results</td></tr>";}
		mysqli_close($conn);
	?>
	</table>
</body>
</html>