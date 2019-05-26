<?php
session_start();

if (isset($_SESSION['user_id'])) { } else {
    // Redirect them to the login page
    header("Location: ../login.php");
}
?>
<html>

<head>
    <title>Input Aset</title>
</head>

<body>
    <form method="post" action="../process.php?process=insert-aset" enctype="multipart/form-data">
        <br>ID_ASET<input type="text" name="ID_ASET">
        <br>NAMA_ASET<input type="text" name="NAMA_ASET">
        <br><button>Tambah Data</button>
    </form>
</body>

</html>