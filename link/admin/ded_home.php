<?php
session_start();

if ( isset( $_SESSION['user_id']) ) {
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM ded";
	$result = mysqli_query($conn, $sql);
} else {
    // Redirect them to the login page
    header("Location: ../login.php");
}
?>
<html>
<head>
	<title>DED</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>ID_DED</td>
            <td>PATH_FILE</td>
			<td>UPDATE</td>
			<td>DELETE</td>
		</tr>
	<?php
		if (mysqli_num_rows($result) > 0) {while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
		         <td>$row[ID_DED]</td>
		         <td>$row[PATH_FILE]</td>
		         <td><a href='ded_update.php?idded=$row[ID_DED]'>UPDATE</a></td>
		         <td><a href='../process.php?process=delete-ded&&idded=$row[ID_DED]'>DELETE</a></td>
		        </tr>";
		    }
		} else {echo "<tr><td colspan='24' align='center'>0 results</td></tr>";}
		mysqli_close($conn);
	?>
	</table>
</body>
</html>