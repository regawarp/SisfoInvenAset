<?php
session_start();

if (isset($_SESSION['user_id'])) {
    include("../connect.php");
    $sql = "SELECT * FROM dak";
    $result = mysqli_query($conn, $sql);
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
    <title>Dashboard</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="../../css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet" href="../../css/skins/all.css">
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../../datatables/css/jquery.dataTables.min.css" />
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
                                    <h5 class="card-title mb-4">Data DAK</h5>
                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-hover cell-border ">
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
                                                    <td><a href='dak_update.php?ID_DAK=$row[ID_DAK]'><button class='btn btn-warning' type='button'>
                                                    <span class='mdi mdi-pencil'></span>
                                                </button></a></td>
                                                    <td><a href='../process.php?process=delete-dak&&ID_DAK=$row[ID_DAK]'><button class='btn btn-danger' type='button'>
                                                    <span class='mdi mdi-delete'></span>
                                                </button></a></td>
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
                                    <a href="dak_export.php" class="btn btn-success col-md-12" style="margin-top:20px;">
                                    <i class="mdi mdi-file-excel"></i>Download File Excel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($_SESSION['jenis'] != "User") { ?>
                        <div class="row">
                            <div class="col-12 grid-margin">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Input DAK</h4>
                                        <form class="form-sample" action="../process.php?process=insert-dak" enctype="multipart/form-data" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">ID_DAK</label>
                                                        <div class="col-sm-9">
                                                            <?php
                                                            include("../connect.php");
                                                            $sql = "SELECT * FROM dak ORDER BY ID_DAK DESC LIMIT 1";
                                                            $result = mysqli_query($conn, $sql);
                                                            if (mysqli_num_rows($result) > 0) {
                                                                if ($row = mysqli_fetch_assoc($result)) {
                                                                    $num = $row['ID_DAK'];
                                                                    $num++;
                                                                    echo "<input type='text' class='form-control' name='ID_DAK' readonly value='$num'>";
                                                                }
                                                            } else {
                                                                echo "<input type='text' class='form-control' name='ID_DAK' readonly value='1'>";
                                                            }
                                                            mysqli_close($conn);
                                                            ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">LOKASI</label>
                                                        <div class="col-sm-9">
                                                            <select name="ID_LOKASI" class="form-control" style="margin: 0px 10px;">
                                                                <?php
                                                                include("../connect.php");
                                                                $query = "SELECT * FROM lokasi";
                                                                $result = mysqli_query($conn, $query);
                                                                if (mysqli_num_rows($result) > 0) {
                                                                    while ($rowlokasi = mysqli_fetch_assoc($result)) {
                                                                        echo "<option value='$rowlokasi[ID_LOKASI]'>$rowlokasi[NAMA_LOKASI]</option>";
                                                                    }
                                                                } else {
                                                                    echo "<option>Input Lokasi Baru</option>";
                                                                }
                                                                mysqli_close($conn);
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">NAMA_DAK</label>
                                                        <div class="col-sm-9"> <input type="text" class="form-control" name="NAMA_DAK">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">LUAS</label>
                                                        <div class="col-sm-9"> <input type="number" value="0" class="form-control" name="LUAS">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG</label>
                                                        <div class="col-sm-9"> <input type="number" value="0" class="form-control" name="PANJANG">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">LEBAR</label>
                                                        <div class="col-sm-9"> <input type="number" value="0" class="form-control" name="LEBAR">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG_BAIK_M</label>
                                                        <div class="col-sm-9"> <input type="number" value="0" class="form-control" name="PANJANG_BAIK_M">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG_BAIK_PERS</label>
                                                        <div class="col-sm-9"> <input type="number" value="0" class="form-control" name="PANJANG_BAIK_PERS">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG_SEDANG_M</label>
                                                        <div class="col-sm-9"> <input type="number" value="0" class="form-control" name="PANJANG_SEDANG_M">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG_SEDANG_PERS</label>
                                                        <div class="col-sm-9"> <input type="number" value="0" class="form-control" name="PANJANG_SEDANG_PERS">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG_RUSAKRINGAN_M</label>
                                                        <div class="col-sm-9"> <input type="number" value="0" class="form-control" name="PANJANG_RUSAKRINGAN_M">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG_RUSAKRINGAN_PERS</label>
                                                        <div class="col-sm-9"> <input type="number" value="0" class="form-control" name="PANJANG_RUSAKRINGAN_PERS">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG_RUSAKBERAT_M</label>
                                                        <div class="col-sm-9"> <input type="number" value="0" class="form-control" name="PANJANG_RUSAKBERAT_M">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">PANJANG_RUSAKBERAT_PERS</label>
                                                        <div class="col-sm-9"> <input type="number" value="0" class="form-control" name="PANJANG_RUSAKBERAT_PERS">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">RENCANA_PENANGANAN</label>
                                                        <div class="col-sm-9"> <input type="text" class="form-control" name="RENCANA_PENANGANAN">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">KEBUTUHAN_ANGGARAN</label>
                                                        <div class="col-sm-9"> <input type="number" value="0" class="form-control" name="KEBUTUHAN_ANGGARAN">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">KEMAMPUAN_RUPIAH</label>
                                                        <div class="col-sm-9"> <input type="number" value="0" class="form-control" name="KEMAMPUAN_RUPIAH">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">KEMAMPUAN_M</label>
                                                        <div class="col-sm-9"> <input type="number" value="0" class="form-control" name="KEMAMPUAN_M">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">USULAN_TAMBAHAN_RUPIAH</label>
                                                        <div class="col-sm-9"> <input type="number" value="0" class="form-control" name="USULAN_TAMBAHAN_RUPIAH">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">USULAN_TAMBAHAN_M</label>
                                                        <div class="col-sm-9"> <input type="number" value="0" class="form-control" name="USULAN_TAMBAHAN_M">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group row"> <label class="col-sm-3 col-form-label">USULAN_TAMBAHAN_SUMBER_DANA</label>
                                                        <div class="col-sm-9"> <input type="text" class="form-control" name="USULAN_TAMBAHAN_SUMBER_DANA">
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
                    <?php } ?>
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