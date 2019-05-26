<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $conn = mysqli_connect("localhost", "root", "", "db_pupr");
    $sql = "SELECT * FROM pegawai,jenis_pegawai WHERE pegawai.ID_JENIS=jenis_pegawai.ID_JENIS AND NOMOR_INDUK_PEGAWAI = '$_GET[NOMOR_INDUK_PEGAWAI]'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) { } else {
        header("Location:pegawai_home.php");
    }
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
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Update Pegawai</h4>
                                    <form class="form-sample" action="../process.php?process=update-pegawai" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">NOMOR_INDUK_PEGAWAI</label>
                                                    <div class="col-sm-9">
                                                        <input type='text' class='form-control' name='NOMOR_INDUK_PEGAWAI' readonly <?php echo "value='$row[NOMOR_INDUK_PEGAWAI]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">JENIS PEGAWAI</label>
                                                    <div class="col-sm-9">
                                                        <select name="ID_JENIS" class="form-control" style="margin: 0px 10px;">
                                                            <?php
                                                            $conn = mysqli_connect("localhost", "root", "", "db_pupr");
                                                            $query = "SELECT * FROM jenis_pegawai";
                                                            $result = mysqli_query($conn, $query);
                                                            if (mysqli_num_rows($result) > 0) {
                                                                while ($rowjenis = mysqli_fetch_assoc($result)) {
                                                                    if ((string)$row['ID_JENIS'] == (string)$rowjenis['ID_JENIS']) {
                                                                        echo "<option selected value='$rowjenis[ID_JENIS]'>$rowjenis[NAMA_JENIS]</option>";
                                                                    } else {
                                                                        echo "<option value='$rowjenis[ID_JENIS]'>$rowjenis[NAMA_JENIS]</option>";
                                                                    }
                                                                }
                                                            } else {
                                                                echo "<option>Input Jenis Baru</option>";
                                                            }
                                                            mysqli_close($conn);
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">NAMA_PEGAWAI</label>
                                                    <div class="col-sm-9"> <input type="text" class="form-control" name="NAMA_PEGAWAI" <?php echo "value='$row[NAMA_PEGAWAI]'"; ?>></div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">PASSWORD</label>
                                                    <div class="col-sm-9"> <input type="text" class="form-control" name="PASSWORD" <?php echo "value='$row[PASSWORD]'"; ?>></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-success mr-2" style="width:100%;">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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
</body>

</html>