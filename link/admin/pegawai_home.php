<?php
session_start();

if ( isset( $_SESSION['user_id']) ) {
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM pegawai";
	$result = mysqli_query($conn, $sql);
} else {
    // Redirect them to the login page
    header("Location: ../login.php");
}
?>
<html>
<head>
	<title>Pegawai</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>NOMOR_INPUK_PEGAWAI</td>
            <td>ID_JENIS</td>
            <td>NAMA_PEGAWAI</td>
            <td>PASSWORD</td>
			<td>UPDATE</td>
			<td>DELETE</td>
		</tr>
	<?php
		if (mysqli_num_rows($result) > 0) {while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
		         <td>$row[NOMOR_INPUK_PEGAWAI]</td>
                 <td>$row[ID_JENIS]</td>
                 <td>$row[NAMA_PEGAWAI]</td>
                 <td>$row[PASSWORD]</td>
		         <td><a href='pegawai_update.php?nomor-induk-pegawai=$row[NOMOR_INPUK_PEGAWAI]'>UPDATE</a></td>
		         <td><a href='../process.php?process=delete-pegawai&&nomor-induk-pegawai=$row[NOMOR_INPUK_PEGAWAI]'>DELETE</a></td>
		        </tr>";
		    }
		} else {echo "<tr><td colspan='24' align='center'>0 results</td></tr>";}
		mysqli_close($conn);
	?>
	</table>
</body>
</html>