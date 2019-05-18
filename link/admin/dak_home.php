<?php
session_start();

if ( isset( $_SESSION['user_id']) ) {
	$conn = mysqli_connect("localhost", "root", "", "db_pupr");
	$sql = "SELECT * FROM dak";
	$result = mysqli_query($conn, $sql);
} else {
    // Redirect them to the login page
    header("Location: ../login.php");
}
?>
<html>
<head>
	<title>DAK</title>
</head>
<body>
	<table border="1">
		<tr>
			<td>ID_DAK</td>
            <td>ID_LOKASI</td>
            <td>NAMA_DAK</td>
            <td>LUAS</td>
            <td>PANJANG</td>
            <td>LEBAR</td>
            <td>PANJANG_BAIK_M</td>
            <td>PANJANG_BAIK_PERS</td>
            <td>PANJANG_SEDANG_M</td>
            <td>PANJANG_SEDANG_PERS</td>
            <td>PANJANG_RUSAKRINGAN_M</td>
            <td>PANJANG_RUSAKRINGAN_PERS</td>
            <td>PANJANG_RUSAKBERAT_M</td>
            <td>PANJANG_RUSAKBERAT_PERS</td>
            <td>RENCANA_PENANGANAN</td>
            <td>KEBUTUHAN_ANGGARAN</td>
            <td>KEMAMPUAN_RUPIAH</td>
            <td>KEMAMPUAN_M</td>
            <td>USULAN_TAMBAHAN_RUPIAH</td>
            <td>USULAN_TAMBAHAN_M</td>
            <td>USULAN_TAMBAHAN_SUMBER_DANA</td>
			<td>UPDATE</td>
			<td>DELETE</td>
		</tr>
	<?php
		if (mysqli_num_rows($result) > 0) {while($row = mysqli_fetch_assoc($result)) {
				echo "<tr>
		         <td>$row[ID_DAK]</td>
                 <td>$row[ID_LOKASI]</td>
                 <td>$row[NAMA_DAK]</td>
                 <td>$row[LUAS]</td>
                 <td>$row[PANJANG]</td>
                 <td>$row[LEBAR]</td>
                 <td>$row[PANJANG_BAIK_M]</td>
                 <td>$row[PANJANG_BAIK_PERS]</td>
                 <td>$row[PANJANG_SEDANG_M]</td>
                 <td>$row[PANJANG_SEDANG_PERS]</td>
                 <td>$row[PANJANG_RUSAKRINGAN_M]</td>
                 <td>$row[PANJANG_RUSAKRINGAN_PERS]</td>
                 <td>$row[PANJANG_RUSAKBERAT_M]</td>
                 <td>$row[PANJANG_RUSAKBERAT_PERS]</td>
                 <td>$row[RENCANA_PENANGANAN]</td>
                 <td>$row[KEBUTUHAN_ANGGARAN]</td>
                 <td>$row[KEMAMPUAN_RUPIAH]</td>
                 <td>$row[KEMAMPUAN_M]</td>
                 <td>$row[USULAN_TAMBAHAN_RUPIAH]</td>
                 <td>$row[USULAN_TAMBAHAN_M]</td>
                 <td>$row[USULAN_TAMBAHAN_SUMBER_DANA]</td>
		         <td><a href='dak_update.php?iddak=$row[ID_DAK]'>UPDATE</a></td>
		         <td><a href='../process.php?process=delete-dak&&iddak=$row[ID_DAK]'>DELETE</a></td>
		        </tr>";
		    }
		} else {echo "<tr><td colspan='24' align='center'>0 results</td></tr>";}
		mysqli_close($conn);
	?>
	</table>
</body>
</html>