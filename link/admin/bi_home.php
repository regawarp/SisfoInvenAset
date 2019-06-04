<?php
session_start();

if (isset($_SESSION['user_id'])) {
    if (isset($_GET['status'])) {
        $status = $_GET['status'];
        echo "<script type='text/javascript'>alert('$status');</script>";
    }
} else {
    // Redirect them to the login page
    header("Location: ../beranda.php");
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="../../css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../../css/skins/all.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../../datatables/css/dataTables.bootstrap.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../css/admin.css">
    <!-- endinject -->
</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->
        <?php
        include "header.php";
        ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_sidebar.html -->

            <?php
            include "navigasi.php";
            ?>

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title mb-4">Buku Inventaris (BI)</h5>
                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <td>No. Kode Barang</td>
                                                    <td>No. Register</td>
                                                    <td>Nama Barang</td>
                                                    <td>Merk / Tipe</td>
                                                    <td>No. Sertifikat / No. Pabrik / No. Chasis / No. Mesin / No. Polisi</td>
                                                    <td>Bahan</td>
                                                    <td>Asal/ Cara Perolehan Barang</td>
                                                    <td>Tahun Perolehan</td>
                                                    <td>Ukuran Barang / Konstruksi (P,SP,D)</td>
                                                    <td>Keadaan Barang (B,KB,RB)</td>
                                                    <td>Jumlah Barang</td>
                                                    <td>Jumlah Harga</td>
                                                    <td>Keterangan</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $conn = mysqli_connect("localhost", "root", "", "db_pupr");
                                                $sql = "SELECT * FROM kiba";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<tr>
                                                                <td>$row[NOMOR_KODE_BARANG]</td>
                                                                <td>$row[NOMOR_REGISTER]</td>
                                                                <td>$row[NAMA_BARANG]</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>$row[ASAL_USUL]</td>
                                                                <td>$row[TAHUN_PENGADAAN]</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>$row[LUAS]</td>
                                                                <td>$row[HARGA]</td>
                                                                <td>$row[KETERANGAN]</td>
																</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='17' align='center'>0 results</td></tr>";
                                                }
                                                $sql = "SELECT * FROM kibd";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<tr>
                                                                <td>$row[NOMOR_KODE_BARANG]</td>
                                                                <td>$row[NOMOR_REGISTER]</td>
                                                                <td>$row[NAMA_BARANG]</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>$row[ASAL_USUL]</td>
                                                                <td>$row[TANGGAL_DOKUMEN]</td>
                                                                <td>$row[KONSTRUKSI]</td>
                                                                <td>$row[KONDISI]</td>
                                                                <td>$row[LUAS]</td>
                                                                <td>$row[HARGA]</td>
                                                                <td>$row[KETERANGAN]</td>
																</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='17' align='center'>0 results</td></tr>";
                                                }
                                                $sql = "SELECT * FROM kibf";
                                                $result = mysqli_query($conn, $sql);
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<tr>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>$row[NAMA_BARANG]</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>$row[ASAL_USUL]</td>
                                                                <td>$row[TANGGAL_MULAI]</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                                <td>$row[PANJANG]</td>
                                                                <td>$row[NILAI_KONTRAK]</td>
                                                                <td>$row[KETERANGAN]</td>
																</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='17' align='center'>0 results</td></tr>";
                                                }
                                                ?>

                                            </tbody>
                                            <tfoot>

                                            </tfoot>
                                        </table>
                                    </div>
                                    <a href="bi_export.php" class="btn btn-success col-md-12">Download file Excel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <?php
                include "footer.php";
                ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
</body>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../js/vendor.bundle.base.js"></script>
<script src="../../js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="../../js/off-canvas.js"></script>
<script src="../../js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<!-- <script src="../../js/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="../../datatables/js/jquery.dataTables.min.js"></script>
<script src="../../datatables/js/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
<!-- End custom js for this page-->

</html>
<?php
mysqli_close($conn);
?>