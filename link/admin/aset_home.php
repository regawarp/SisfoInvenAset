<?php
session_start();

if (isset($_SESSION['user_id'])) {
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM aset";
	$result = mysqli_query($conn, $sql);
} else {
	// Redirect them to the login page
	header("Location: ../login.php");
}
?>
<html>

<head>
	<title>Aset</title>
</head>

<body>
	<table border="1">
		<tr>
			<td>ID_ASET</td>
			<td>NAMA_ASET</td>
			<td>UPDATE</td>
			<td>DELETE</td>
		</tr>
		<?php
		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
		         <td>$row[ID_ASET]</td>
		         <td>$row[NAMA_ASET]</td>
		         <td><a href='aset_update.php?idaset=$row[ID_ASET]'>UPDATE</a></td>
		         <td><a href='../process.php?process=delete-aset&&idaset=$row[ID_ASET]'>DELETE</a></td>
		        </tr>";
			}
		} else {
			echo "<tr><td colspan='24' align='center'>0 results</td></tr>";
		}
		mysqli_close($conn);
		?>
	</table>
</body>

</html>