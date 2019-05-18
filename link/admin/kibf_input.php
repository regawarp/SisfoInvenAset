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
	<title>Input Kib F</title>
</head>
<body>
	<form method="post" action="../process.php?process=insert-kibf" enctype="multipart/form-data">
		<br>ID_KIBF<input type="text" name="ID_KIBF">
        <br>ID_DATASPA<input type="text" name="ID_DATASPA"><button>Input Spatial</button>
        <br>ID_LOKASI<input type="text" name="ID_LOKASI"><button>Input Lokasi</button>
        <br>ID_ASET<input type="text" name="ID_ASET">
        <br>NAMA_BARANG<input type="text" name="NAMA_BARANG">
        <br>BANGUNGAN<input type="text" name="BANGUNAN">
        <br>BERTINGKAT<input type="text" name="BERTINGKAT">
        <br>BETON<input type="text" name="BETON">
        <br>PANJANG<input type="number" name="PANJANG">
        <br>TANGGAL_DOKUMEN<input type="date" name="TANGGAL_DOKUMEN">
        <br>NOMOR_DOKUMEN<input type="text" name="NOMOR_DOKUMEN">
        <br>TANGGAL_MULAI<input type="date" name="TANGGAL_MULAI">
        <br>STATUS_TANAH<input type="text" name="STATUS_TANAH">
        <br>NOMO_KODE_TANAH<input type="text" name="NOMO_KODE_TANAH">
        <br>NILAI_KONTRAK<input type="text" name="NILAI_KONTRAK">
        <br>FOTO<input type="file" name="FOTO">
        <br>FILE<input type="file" name="FILE">
        <br>KETERANGAN<input type="text" name="KETERANGAN">
        <br>ASAL_USUL<input type="text" name="ASAL_USUL">
		<br><button>Tambah Data</button>
	</form>
</body>
</html>