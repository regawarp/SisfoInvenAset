<?php
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
    
} else {
    // Redirect them to the login page
    header("Location: ../login.php");
}
?>
<html>
<head>
	<title>Input DED</title>
</head>
<body>
	<form method="post" action="../process.php?process=insert-ded" enctype="multipart/form-data">
        <br>ID_DED<input type="text" name="ID_DED">
        <br>PATH_FILE<input type="text" name="PATH_FILE">
		<br><button>Tambah Data</button>
	</form>
</body>
</html>