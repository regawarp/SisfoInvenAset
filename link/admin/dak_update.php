<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $conn = mysqli_connect("localhost", "root", "", "db_pupr");
    $sql = "SELECT * FROM dak WHERE ID_DAK='$_GET[ID_DAK]'";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) { } else {
        header("Location:dak_home.php");
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
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Update DAK</h4>
                                    <form class="form-sample" action="../process.php?process=update-dak" enctype="multipart/form-data" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">ID_DAK</label>
                                                    <div class="col-sm-9">
                                                        <input type='text' class='form-control' name='ID_DAK' readonly <?php echo "value='$row[ID_DAK]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">LOKASI</label>
                                                    <div class="col-sm-9">
                                                        <select name="ID_LOKASI" class="form-control" style="margin: 0px 10px;">
                                                            <?php
                                                            $query = "SELECT * FROM lokasi";
                                                            $result = mysqli_query($conn, $query);
                                                            if (mysqli_num_rows($result) > 0) {
                                                                while ($rowlokasi = mysqli_fetch_assoc($result)) {
                                                                    if ((string)$row['ID_LOKASI'] == (string)$rowlokasi['ID_LOKASI']) {
                                                                        echo "<option selected value='$rowlokasi[ID_LOKASI]'>$rowlokasi[NAMA_LOKASI]</option>";
                                                                    } else {
                                                                        echo "<option value='$rowlokasi[ID_LOKASI]'>$rowlokasi[NAMA_LOKASI]</option>";
                                                                    }
                                                                }
                                                            } else {
                                                                echo "<option>Input Lokasi Baru</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">NAMA_DAK</label>
                                                    <div class="col-sm-9"> <input type="text" class="form-control" name="NAMA_DAK" <?php echo "value='$row[NAMA_DAK]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">LUAS</label>
                                                    <div class="col-sm-9"> <input type="number" class="form-control" name="LUAS" <?php echo "value='$row[LUAS]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG</label>
                                                    <div class="col-sm-9"> <input type="number" class="form-control" name="PANJANG" <?php echo "value='$row[PANJANG]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">LEBAR</label>
                                                    <div class="col-sm-9"> <input type="number" class="form-control" name="LEBAR" <?php echo "value='$row[LEBAR]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG_BAIK_M</label>
                                                    <div class="col-sm-9"> <input type="number" class="form-control" name="PANJANG_BAIK_M" <?php echo "value='$row[PANJANG_BAIK_M]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG_BAIK_PERS</label>
                                                    <div class="col-sm-9"> <input type="number" class="form-control" name="PANJANG_BAIK_PERS" <?php echo "value='$row[PANJANG_BAIK_PERS]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG_SEDANG_M</label>
                                                    <div class="col-sm-9"> <input type="number" class="form-control" name="PANJANG_SEDANG_M" <?php echo "value='$row[PANJANG_SEDANG_M]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG_SEDANG_PERS</label>
                                                    <div class="col-sm-9"> <input type="number" class="form-control" name="PANJANG_SEDANG_PERS" <?php echo "value='$row[PANJANG_SEDANG_PERS]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG_RUSAKRINGAN_M</label>
                                                    <div class="col-sm-9"> <input type="number" class="form-control" name="PANJANG_RUSAKRINGAN_M" <?php echo "value='$row[PANJANG_RUSAKRINGAN_M]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG_RUSAKRINGAN_PERS</label>
                                                    <div class="col-sm-9"> <input type="number" class="form-control" name="PANJANG_RUSAKRINGAN_PERS" <?php echo "value='$row[PANJANG_RUSAKRINGAN_PERS]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG_RUSAKBERAT_M</label>
                                                    <div class="col-sm-9"> <input type="number" class="form-control" name="PANJANG_RUSAKBERAT_M" <?php echo "value='$row[PANJANG_RUSAKBERAT_M]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG_RUSAKBERAT_PERS</label>
                                                    <div class="col-sm-9"> <input type="number" class="form-control" name="PANJANG_RUSAKBERAT_PERS" <?php echo "value='$row[PANJANG_RUSAKBERAT_PERS]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">RENCANA_PENANGANAN</label>
                                                    <div class="col-sm-9"> <input type="text" class="form-control" name="RENCANA_PENANGANAN" <?php echo "value='$row[RENCANA_PENANGANAN]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">KEBUTUHAN_ANGGARAN</label>
                                                    <div class="col-sm-9"> <input type="number" class="form-control" name="KEBUTUHAN_ANGGARAN" <?php echo "value='$row[KEBUTUHAN_ANGGARAN]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">KEMAMPUAN_RUPIAH</label>
                                                    <div class="col-sm-9"> <input type="number" class="form-control" name="KEMAMPUAN_RUPIAH" <?php echo "value='$row[KEMAMPUAN_RUPIAH]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">KEMAMPUAN_M</label>
                                                    <div class="col-sm-9"> <input type="number" class="form-control" name="KEMAMPUAN_M" <?php echo "value='$row[KEMAMPUAN_M]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">USULAN_TAMBAHAN_RUPIAH</label>
                                                    <div class="col-sm-9"> <input type="number" class="form-control" name="USULAN_TAMBAHAN_RUPIAH" <?php echo "value='$row[USULAN_TAMBAHAN_RUPIAH]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">USULAN_TAMBAHAN_M</label>
                                                    <div class="col-sm-9"> <input type="number" class="form-control" name="USULAN_TAMBAHAN_M" <?php echo "value='$row[USULAN_TAMBAHAN_M]'"; ?>>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row"> <label class="col-sm-3 col-form-label">USULAN_TAMBAHAN_SUMBER_DANA</label>
                                                    <div class="col-sm-9"> <input type="text" class="form-control" name="USULAN_TAMBAHAN_SUMBER_DANA" <?php echo "value='$row[USULAN_TAMBAHAN_SUMBER_DANA]'"; ?>>
                                                    </div>
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