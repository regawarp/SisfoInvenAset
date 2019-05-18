<?php
session_start();

if (isset($_SESSION['user_id'])) {
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
                                    <h5 class="card-title mb-4">Big Div</h5>
                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-hover">
                                            <thead>
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
                                            </thead>
                                            <tbody>
                                            <?php
                                            if (mysqli_num_rows($result) > 0) {
                                                while ($row = mysqli_fetch_assoc($result)) {
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
                                            } else {
                                                echo "<tr><td colspan='24' align='center'>0 results</td></tr>";
                                            }
                                            mysqli_close($conn);
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
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