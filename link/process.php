<?php
// Always start this first
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_pupr";

if ($_SESSION['jenis'] == "User") {
    switch ($_GET['process']) {
        case 'logout':
            session_destroy();
            header('Location: ../index.php');
            break;
    }
    echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Tidak Ada Hak Akses !');
                            window.location.href='admin/dashboard.php';
                            </script>");
} else {


    function uploadFileFoto($PATH_FILE, $TMP, $JENIS)
    {
        if ($JENIS == "FOTO") {
            //Upload foto and file
            $target_dir = "../img/upload/";
            $target_file = $target_dir . $PATH_FILE;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($TMP);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["foto"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($TMP, $target_file)) {
                    echo "The file " . $PATH_FILE . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        } else if ($JENIS == "FILE") {
            $target_dir = "../file/";
            $target_file = $target_dir . $PATH_FILE;
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($TMP, $target_file)) {
                    echo "The file " . $PATH_FILE . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }

    switch ($_GET['process']) {
        case 'login':
            if (!empty($_POST)) {
                if (isset($_POST['username']) && isset($_POST['password'])) {
                    include("connect.php");
                    $query = "SELECT * FROM pegawai,jenis_pegawai WHERE pegawai.ID_JENIS=jenis_pegawai.ID_JENIS AND NOMOR_INDUK_PEGAWAI = '$_POST[username]' ";
                    $result = mysqli_query($conn, $query);
                    if (mysqli_num_rows($result) > 0) {
                        if ($row = mysqli_fetch_assoc($result)) {
                            if ((string) $_POST['password'] == (string) $row['PASSWORD']) {
                                $_SESSION['user_id'] = $_POST['username'];
                                $_SESSION['jenis'] = $row['NAMA_JENIS'];
                                $_SESSION['nama'] = $row['NAMA_PEGAWAI'];
                                header('Location: admin/dashboard.php');
                            } else {
                                echo ("<script LANGUAGE='JavaScript'>
                            window.alert('Wrong Password');
                            window.location.href='beranda.php';
                            </script>");
                            }
                        }
                    } else {
                        echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Wrong Username');
                    window.location.href='beranda.php';
                    </script>");
                    }
                }
            }
            break;
        case 'logout':
            session_destroy();
            header('Location: ../index.php');
            break;

        case 'insert-kiba':
            $idkiba = $_POST['idkiba'];
            $idlokasi = $_POST['idlokasi'];
            $iddataspa = $_POST['iddataspa'];
            $nama_barang = $_POST['nama_barang'];
            $nokodebrg = $_POST['nokodebrg'];
            $noreg = $_POST['noreg'];
            $luas = $_POST['luas'];
            $thn_pengadaan = $_POST['thn_pengadaan']."-01-01";
            $hak = $_POST['hak'];
            $tgl_sertifikat = $_POST['tgl_sertifikat'];
            $no_sertifikat = $_POST['no_sertifikat'];
            $penggunaan = $_POST['penggunaan'];
            $harga = $_POST['harga'];
            $foto = basename($_FILES["foto"]["name"]);
            $file = basename($_FILES["file"]["name"]);
            $keterangan = $_POST['keterangan'];
            $asalusul = $_POST['asalusul'];

            include("connect.php");
            $insert_query = "INSERT INTO kiba VALUES('$idkiba','$idlokasi','$iddataspa','$nama_barang','$nokodebrg','$noreg',$luas,'$thn_pengadaan','$hak','$tgl_sertifikat','$no_sertifikat','$penggunaan',$harga,'$foto','$file','$keterangan','$asalusul')";
            echo $insert_query;
            if (mysqli_query($conn, $insert_query)) {
                echo "Data Sukses diinput";

                //Upload foto and file
                $target_dir = "../img/upload/";
                $target_file = $target_dir . basename($_FILES["foto"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                if (isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["foto"]["tmp_name"]);
                    if ($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES["foto"]["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if (
                    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif"
                ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                        echo "The file " . basename($_FILES["foto"]["name"]) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }

                $target_dir = "../file/";
                $target_file = $target_dir . basename($_FILES["file"]["name"]);
                $uploadOk = 1;
                $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                        echo "The file " . basename($_FILES["file"]["name"]) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }

                header("Location: admin/kiba_home.php?status=sukses-insert");
            } else {
                header("Location: admin/kiba_home.php?status=gagal-insert");
                echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'update-kiba':
            $idkiba = $_POST['idkiba'];
            $idlokasi = $_POST['idlokasi'];
            $iddataspa = $_POST['iddataspa'];
            $nama_barang = $_POST['nama_barang'];
            $nokodebrg = $_POST['nokodebrg'];
            $noreg = $_POST['noreg'];
            $luas = $_POST['luas'];
            $thn_pengadaan = $_POST['thn_pengadaan']."-01-01";
            $hak = $_POST['hak'];
            $tgl_sertifikat = $_POST['tgl_sertifikat'];
            $no_sertifikat = $_POST['no_sertifikat'];
            $penggunaan = $_POST['penggunaan'];
            $harga = $_POST['harga'];
            $foto = basename($_FILES["foto"]["name"]);
            $file = basename($_FILES["file"]["name"]);
            $keterangan = $_POST['keterangan'];
            $asalusul = $_POST['asalusul'];

            include("connect.php");
            if ($foto == "" && $file == "") {
                $update_query = "UPDATE kiba  SET ID_LOKASI='$idlokasi', ID_DATASPA='$iddataspa',NOMOR_KODE_BARANG='$nokodebrg',NOMOR_REGISTER='$noreg',LUAS=$luas,TAHUN_PENGADAAN='$thn_pengadaan',HAK='$hak',TANGGAL_SERTIFIKAT='$tgl_sertifikat',NOMOR_SERTIFIKAT='$no_sertifikat',PENGGUNAAN='$penggunaan',HARGA=$harga,NAMA_BARANG='$nama_barang',KETERANGAN='$keterangan',ASAL_USUL='$asalusul' WHERE ID_KIBA='$idkiba'";
            } else if ($foto == "") {
                $update_query = "UPDATE kiba  SET ID_LOKASI='$idlokasi', ID_DATASPA='$iddataspa',NOMOR_KODE_BARANG='$nokodebrg',NOMOR_REGISTER='$noreg',LUAS=$luas,TAHUN_PENGADAAN='$thn_pengadaan',HAK='$hak',TANGGAL_SERTIFIKAT='$tgl_sertifikat',NOMOR_SERTIFIKAT='$no_sertifikat',PENGGUNAAN='$penggunaan',HARGA=$harga,NAMA_BARANG='$nama_barang',KETERANGAN='$keterangan',ASAL_USUL='$asalusul',FILE='$file' WHERE ID_KIBA='$idkiba'";
            } else if ($file == "") {
                $update_query = "UPDATE kiba  SET ID_LOKASI='$idlokasi', ID_DATASPA='$iddataspa',NOMOR_KODE_BARANG='$nokodebrg',NOMOR_REGISTER='$noreg',LUAS=$luas,TAHUN_PENGADAAN='$thn_pengadaan',HAK='$hak',TANGGAL_SERTIFIKAT='$tgl_sertifikat',NOMOR_SERTIFIKAT='$no_sertifikat',PENGGUNAAN='$penggunaan',HARGA=$harga,NAMA_BARANG='$nama_barang',KETERANGAN='$keterangan',ASAL_USUL='$asalusul',FOTO='$foto' WHERE ID_KIBA='$idkiba'";
            } else {
                $update_query = "UPDATE kiba  SET ID_LOKASI='$idlokasi', ID_DATASPA='$iddataspa',NOMOR_KODE_BARANG='$nokodebrg',NOMOR_REGISTER='$noreg',LUAS=$luas,TAHUN_PENGADAAN='$thn_pengadaan',HAK='$hak',TANGGAL_SERTIFIKAT='$tgl_sertifikat',NOMOR_SERTIFIKAT='$no_sertifikat',PENGGUNAAN='$penggunaan',HARGA=$harga,NAMA_BARANG='$nama_barang',KETERANGAN='$keterangan',ASAL_USUL='$asalusul',FOTO='$foto',FILE='$file' WHERE ID_KIBA='$idkiba'";
            }

            if (mysqli_query($conn, $update_query)) {
                header("Location: admin/kiba_home.php?status=sukses-update");
            } else {
                header("Location: admin/kiba_home.php?status=gagal-update");
                echo "Error: " . $update_query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'delete-kiba':
            $idkiba = $_GET['idkiba'];
            $foto = $_GET['foto'];
            $file = $_GET['file'];
            include("connect.php");
            $delete_query = 'DELETE FROM kiba WHERE ID_KIBA=' . $idkiba;
            if (mysqli_query($conn, $delete_query)) {
                echo "Data berhasil dihapus";
                if ($foto != "") {
                    if (!unlink('../img/upload/' . $foto)) {
                        echo ("Error deleting $foto");
                    } else {
                        echo ("Deleted $foto");
                    }
                }
                if ($file != "") {
                    if (!unlink('../file/' . $file)) {
                        echo ("Error deleting $file");
                    } else {
                        echo ("Deleted $file");
                    }
                }
                header("Location: admin/kiba_home.php?status=sukses-delete");
            } else {
                header("Location: admin/kiba_home.php?status=gagal-delete");
                echo "Error: " . $delete_query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'insert-kibd':
            $ID_KIBD = $_POST['ID_KIBD'];
            $ID_LOKASI = $_POST['ID_LOKASI'];
            $ID_DATASPA = $_POST['ID_DATASPA'];
            $ID_ASET = $_POST['ID_ASET'];
            $NAMA_BARANG = $_POST['NAMA_BARANG'];
            $NOMOR_KODE_BARANG = $_POST['NOMOR_KODE_BARANG'];
            $NOMOR_REGISTER = $_POST['NOMOR_REGISTER'];
            $KONSTRUKSI = $_POST['KONSTRUKSI'];
            $PANJANG = $_POST['PANJANG'];
            $LEBAR = $_POST['LEBAR'];
            $LUAS = $_POST['LUAS'];
            $TANGGAL_DOKUMEN = $_POST['TANGGAL_DOKUMEN'];
            $NOMOR_DOKUMEN = $_POST['NOMOR_DOKUMEN'];
            $STATUS_TANAH = $_POST['STATUS_TANAH'];
            $NOMOR_KODE = $_POST['NOMOR_KODE'];
            $ASAL_USUL = $_POST['ASAL_USUL'];
            $HARGA = $_POST['HARGA'];
            $KONDISI = $_POST['KONDISI'];
            $FOTO = basename($_FILES["FOTO"]["name"]);
            $FILE = basename($_FILES["FILE"]["name"]);
            $KETERANGAN = $_POST['KETERANGAN'];

            include("connect.php");
            $insert_query = "INSERT INTO kibd VALUES('$ID_KIBD','$ID_LOKASI','$ID_DATASPA','$ID_ASET','$NAMA_BARANG','$NOMOR_KODE_BARANG','$NOMOR_REGISTER','$KONSTRUKSI','$PANJANG','$LEBAR','$LUAS','$TANGGAL_DOKUMEN','$NOMOR_DOKUMEN','$STATUS_TANAH','$NOMOR_KODE','$ASAL_USUL','$HARGA','$KONDISI','$KETERANGAN','$FOTO','$FILE')";
            if (mysqli_query($conn, $insert_query)) {
                header("Location: admin/kibd_home.php?status=sukses-insert");
            } else {
                header("Location: admin/kibd_home.php?status=gagal-insert");
                echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'update-kibd':
            $ID_KIBD = $_POST['ID_KIBD'];
            $ID_LOKASI = $_POST['ID_LOKASI'];
            $ID_DATASPA = $_POST['ID_DATASPA'];
            $ID_ASET = $_POST['ID_ASET'];
            $NAMA_BARANG = $_POST['NAMA_BARANG'];
            $NOMOR_KODE_BARANG = $_POST['NOMOR_KODE_BARANG'];
            $NOMOR_REGISTER = $_POST['NOMOR_REGISTER'];
            $KONSTRUKSI = $_POST['KONSTRUKSI'];
            $PANJANG = $_POST['PANJANG'];
            $LEBAR = $_POST['LEBAR'];
            $LUAS = $_POST['LUAS'];
            $TANGGAL_DOKUMEN = $_POST['TANGGAL_DOKUMEN'];
            $NOMOR_DOKUMEN = $_POST['NOMOR_DOKUMEN'];
            $STATUS_TANAH = $_POST['STATUS_TANAH'];
            $NOMOR_KODE = $_POST['NOMOR_KODE'];
            $ASAL_USUL = $_POST['ASAL_USUL'];
            $HARGA = $_POST['HARGA'];
            $KONDISI = $_POST['KONDISI'];
            $FOTO = basename($_FILES["FOTO"]["name"]);
            $FILE = basename($_FILES["FILE"]["name"]);
            $KETERANGAN = $_POST['KETERANGAN'];

            include("connect.php");
            if ($FOTO != "" && $FILE != "") {
                $update_query = "UPDATE kibd SET ID_DATASPA = '$ID_DATASPA',ID_ASET = '$ID_ASET',NAMA_BARANG = '$NAMA_BARANG',NOMOR_KODE_BARANG = '$NOMOR_KODE_BARANG',NOMOR_REGISTER = '$NOMOR_REGISTER',KONSTRUKSI = '$KONSTRUKSI',PANJANG = '$PANJANG',LEBAR = '$LEBAR',LUAS = '$LUAS',TANGGAL_DOKUMEN = '$TANGGAL_DOKUMEN',NOMOR_DOKUMEN = '$NOMOR_DOKUMEN',STATUS_TANAH = '$STATUS_TANAH',NOMOR_KODE = '$NOMOR_KODE',ASAL_USUL = '$ASAL_USUL',HARGA = '$HARGA',KONDISI = '$KONDISI',FOTO = '$FOTO',FILE = '$FILE',KETERANGAN = '$KETERANGAN' WHERE ID_KIBD='$ID_KIBD'";
            } else if ($FOTO != "") {
                $update_query = "UPDATE kibd SET ID_DATASPA = '$ID_DATASPA',ID_ASET = '$ID_ASET',NAMA_BARANG = '$NAMA_BARANG',NOMOR_KODE_BARANG = '$NOMOR_KODE_BARANG',NOMOR_REGISTER = '$NOMOR_REGISTER',KONSTRUKSI = '$KONSTRUKSI',PANJANG = '$PANJANG',LEBAR = '$LEBAR',LUAS = '$LUAS',TANGGAL_DOKUMEN = '$TANGGAL_DOKUMEN',NOMOR_DOKUMEN = '$NOMOR_DOKUMEN',STATUS_TANAH = '$STATUS_TANAH',NOMOR_KODE = '$NOMOR_KODE',ASAL_USUL = '$ASAL_USUL',HARGA = '$HARGA',KONDISI = '$KONDISI',FOTO = '$FOTO',KETERANGAN = '$KETERANGAN' WHERE ID_KIBD='$ID_KIBD'";
            } else if ($FILE != "") {
                $update_query = "UPDATE kibd SET ID_DATASPA = '$ID_DATASPA',ID_ASET = '$ID_ASET',NAMA_BARANG = '$NAMA_BARANG',NOMOR_KODE_BARANG = '$NOMOR_KODE_BARANG',NOMOR_REGISTER = '$NOMOR_REGISTER',KONSTRUKSI = '$KONSTRUKSI',PANJANG = '$PANJANG',LEBAR = '$LEBAR',LUAS = '$LUAS',TANGGAL_DOKUMEN = '$TANGGAL_DOKUMEN',NOMOR_DOKUMEN = '$NOMOR_DOKUMEN',STATUS_TANAH = '$STATUS_TANAH',NOMOR_KODE = '$NOMOR_KODE',ASAL_USUL = '$ASAL_USUL',HARGA = '$HARGA',KONDISI = '$KONDISI',FILE = '$FILE',KETERANGAN = '$KETERANGAN' WHERE ID_KIBD='$ID_KIBD'";
            } else {
                $update_query = "UPDATE kibd SET ID_DATASPA = '$ID_DATASPA',ID_ASET = '$ID_ASET',NAMA_BARANG = '$NAMA_BARANG',NOMOR_KODE_BARANG = '$NOMOR_KODE_BARANG',NOMOR_REGISTER = '$NOMOR_REGISTER',KONSTRUKSI = '$KONSTRUKSI',PANJANG = '$PANJANG',LEBAR = '$LEBAR',LUAS = '$LUAS',TANGGAL_DOKUMEN = '$TANGGAL_DOKUMEN',NOMOR_DOKUMEN = '$NOMOR_DOKUMEN',STATUS_TANAH = '$STATUS_TANAH',NOMOR_KODE = '$NOMOR_KODE',ASAL_USUL = '$ASAL_USUL',HARGA = '$HARGA',KONDISI = '$KONDISI',KETERANGAN = '$KETERANGAN' WHERE ID_KIBD='$ID_KIBD'";
            }

            if (mysqli_query($conn, $update_query)) {
                header("Location: admin/kibd_home.php?status=sukses-update");
            } else {
                // header("Location: admin/kiba_home.php?status=gagal-update");
                echo "Error: " . $update_query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'delete-kibd':
            $idkibd = $_GET['idkibd'];
            $foto = $_GET['foto'];
            $file = $_GET['file'];
            include("connect.php");
            $delete_query = "DELETE FROM kibd WHERE ID_KIBD='$idkibd'";
            if (mysqli_query($conn, $delete_query)) {
                echo "Data berhasil dihapus";
                if ($foto != "") {
                    if (!unlink('../img/upload/' . $foto)) {
                        echo ("Error deleting $foto");
                    } else {
                        echo ("Deleted $foto");
                    }
                }
                if ($file != "") {
                    if (!unlink('../file/' . $file)) {
                        echo ("Error deleting $file");
                    } else {
                        echo ("Deleted $file");
                    }
                }
                header("Location: admin/kibd_home.php?status=sukses-delete");
            } else {
                // header("Location: admin/kibd_home.php?status=gagal-delete");
                echo "Error: " . $delete_query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'insert-kibf':
            $ID_KIBF = $_POST['ID_KIBF'];
            $ID_DATASPA = $_POST['ID_DATASPA'];
            $ID_LOKASI = $_POST['ID_LOKASI'];
            $ID_ASET = $_POST['ID_ASET'];
            $NAMA_BARANG = $_POST['NAMA_BARANG'];
            $BANGUNAN = $_POST['BANGUNAN'];
            $BERTINGKAT = $_POST['BERTINGKAT'];
            $BETON = $_POST['BETON'];
            $PANJANG = $_POST['PANJANG'];
            $TANGGAL_DOKUMEN = $_POST['TANGGAL_DOKUMEN'];
            $NOMOR_DOKUMEN = $_POST['NOMOR_DOKUMEN'];
            $TANGGAL_MULAI = $_POST['TANGGAL_MULAI'];
            $STATUS_TANAH = $_POST['STATUS_TANAH'];
            $NOMO_KODE_TANAH = $_POST['NOMO_KODE_TANAH'];
            $NILAI_KONTRAK = $_POST['NILAI_KONTRAK'];
            $FOTO = basename($_FILES["FOTO"]["name"]);
            $FILE = basename($_FILES["FILE"]["name"]);
            $KETERANGAN = $_POST['KETERANGAN'];
            $ASAL_USUL = $_POST['ASAL_USUL'];

            include("connect.php");
            $insert_query = "INSERT INTO kibf VALUES('$ID_KIBF','$ID_DATASPA','$ID_LOKASI','$ID_ASET','$NAMA_BARANG','$BANGUNAN','$BERTINGKAT','$BETON','$PANJANG','$TANGGAL_DOKUMEN','$NOMOR_DOKUMEN','$TANGGAL_MULAI','$STATUS_TANAH','$NOMO_KODE_TANAH','$NILAI_KONTRAK','$FOTO','$FILE','$KETERANGAN','$ASAL_USUL')";
            if (mysqli_query($conn, $insert_query)) {
                header("Location: admin/kibf_home.php?status=sukses-insert");
            } else {
                echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'update-kibf':
            $ID_KIBF = $_POST['ID_KIBF'];
            $ID_DATASPA = $_POST['ID_DATASPA'];
            $ID_LOKASI = $_POST['ID_LOKASI'];
            $ID_ASET = $_POST['ID_ASET'];
            $NAMA_BARANG = $_POST['NAMA_BARANG'];
            $BANGUNAN = $_POST['BANGUNAN'];
            $BERTINGKAT = $_POST['BERTINGKAT'];
            $BETON = $_POST['BETON'];
            $PANJANG = $_POST['PANJANG'];
            $TANGGAL_DOKUMEN = $_POST['TANGGAL_DOKUMEN'];
            $NOMOR_DOKUMEN = $_POST['NOMOR_DOKUMEN'];
            $TANGGAL_MULAI = $_POST['TANGGAL_MULAI'];
            $STATUS_TANAH = $_POST['STATUS_TANAH'];
            $NOMO_KODE_TANAH = $_POST['NOMO_KODE_TANAH'];
            $NILAI_KONTRAK = $_POST['NILAI_KONTRAK'];
            $FOTO = basename($_FILES["FOTO"]["name"]);
            $FILE = basename($_FILES["FILE"]["name"]);
            $KETERANGAN = $_POST['KETERANGAN'];
            $ASAL_USUL = $_POST['ASAL_USUL'];

            include("connect.php");
            if ($FOTO != "" && $FILE != "") {
                $update_query = "UPDATE kibf SET ID_DATASPA = '$ID_DATASPA',ID_LOKASI = '$ID_LOKASI',ID_ASET = '$ID_ASET',NAMA_BARANG = '$NAMA_BARANG',BANGUNAN = '$BANGUNAN',BERTINGKAT = '$BERTINGKAT',BETON = '$BETON',PANJANG = '$PANJANG',TANGGAL_DOKUMEN = '$TANGGAL_DOKUMEN',NOMOR_DOKUMEN = '$NOMOR_DOKUMEN',TANGGAL_MULAI = '$TANGGAL_MULAI',STATUS_TANAH = '$STATUS_TANAH',NOMO_KODE_TANAH = '$NOMO_KODE_TANAH',NILAI_KONTRAK = '$NILAI_KONTRAK',FOTO = '$FOTO',FILE = '$FILE',KETERANGAN = '$KETERANGAN',ASAL_USUL = '$ASAL_USUL' WHERE ID_KIBF='$ID_KIBF'";
            } else if ($FOTO != "") {
                $update_query = "UPDATE kibf SET ID_DATASPA = '$ID_DATASPA',ID_LOKASI = '$ID_LOKASI',ID_ASET = '$ID_ASET',NAMA_BARANG = '$NAMA_BARANG',BANGUNAN = '$BANGUNAN',BERTINGKAT = '$BERTINGKAT',BETON = '$BETON',PANJANG = '$PANJANG',TANGGAL_DOKUMEN = '$TANGGAL_DOKUMEN',NOMOR_DOKUMEN = '$NOMOR_DOKUMEN',TANGGAL_MULAI = '$TANGGAL_MULAI',STATUS_TANAH = '$STATUS_TANAH',NOMO_KODE_TANAH = '$NOMO_KODE_TANAH',NILAI_KONTRAK = '$NILAI_KONTRAK',FOTO = '$FILE',KETERANGAN = '$KETERANGAN',ASAL_USUL = '$ASAL_USUL' WHERE ID_KIBF='$ID_KIBF'";
            } else if ($FILE != "") {
                $update_query = "UPDATE kibf SET ID_DATASPA = '$ID_DATASPA',ID_LOKASI = '$ID_LOKASI',ID_ASET = '$ID_ASET',NAMA_BARANG = '$NAMA_BARANG',BANGUNAN = '$BANGUNAN',BERTINGKAT = '$BERTINGKAT',BETON = '$BETON',PANJANG = '$PANJANG',TANGGAL_DOKUMEN = '$TANGGAL_DOKUMEN',NOMOR_DOKUMEN = '$NOMOR_DOKUMEN',TANGGAL_MULAI = '$TANGGAL_MULAI',STATUS_TANAH = '$STATUS_TANAH',NOMO_KODE_TANAH = '$NOMO_KODE_TANAH',NILAI_KONTRAK = '$NILAI_KONTRAK',FILE = '$FILE',KETERANGAN = '$KETERANGAN',ASAL_USUL = '$ASAL_USUL' WHERE ID_KIBF='$ID_KIBF'";
            } else {
                $update_query = "UPDATE kibf SET ID_DATASPA = '$ID_DATASPA',ID_LOKASI = '$ID_LOKASI',ID_ASET = '$ID_ASET',NAMA_BARANG = '$NAMA_BARANG',BANGUNAN = '$BANGUNAN',BERTINGKAT = '$BERTINGKAT',BETON = '$BETON',PANJANG = '$PANJANG',TANGGAL_DOKUMEN = '$TANGGAL_DOKUMEN',NOMOR_DOKUMEN = '$NOMOR_DOKUMEN',TANGGAL_MULAI = '$TANGGAL_MULAI',STATUS_TANAH = '$STATUS_TANAH',NOMO_KODE_TANAH = '$NOMO_KODE_TANAH',NILAI_KONTRAK = '$NILAI_KONTRAK',KETERANGAN = '$KETERANGAN',ASAL_USUL = '$ASAL_USUL' WHERE ID_KIBF='$ID_KIBF'";
            }

            if (mysqli_query($conn, $update_query)) {
                header("Location: admin/kibf_home.php?status=sukses-update");
            } else {
                // header("Location: admin/kiba_home.php?status=gagal-update");
                echo "Error: " . $update_query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'delete-kibf':
            $idkibf = $_GET['idkibf'];
            $foto = $_GET['foto'];
            $file = $_GET['file'];
            include("connect.php");
            $delete_query = "DELETE FROM kibf WHERE ID_KIBF='$idkibf'";
            if (mysqli_query($conn, $delete_query)) {
                echo "Data berhasil dihapus";
                if ($foto != "") {
                    if (!unlink('../img/upload/' . $foto)) {
                        echo ("Error deleting $foto");
                    } else {
                        echo ("Deleted $foto");
                    }
                }
                if ($file != "") {
                    if (!unlink('../file/' . $file)) {
                        echo ("Error deleting $file");
                    } else {
                        echo ("Deleted $file");
                    }
                }
                header("Location: admin/kibf_home.php?status=sukses-delete");
            } else {
                // header("Location: admin/kibd_home.php?status=gagal-delete");
                echo "Error: " . $delete_query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'insert-lokasi':
            $ID_LOKASI = $_POST['ID_LOKASI'];
            $NAMA_LOKASI = $_POST['NAMA_LOKASI'];

            include("connect.php");
            $insert_query = "INSERT INTO lokasi VALUES('$ID_LOKASI','$NAMA_LOKASI')";
            if (mysqli_query($conn, $insert_query)) {
                echo "Data Sukses diinput";
                header("Location: admin/lokasi_home.php");
            } else {
                echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'update-lokasi':
            $ID_LOKASI = $_POST['ID_LOKASI'];
            $NAMA_LOKASI = $_POST['NAMA_LOKASI'];

            include("connect.php");
            $insert_query = "UPDATE lokasi SET NAMA_LOKASI='$NAMA_LOKASI' WHERE ID_LOKASI='$ID_LOKASI'";
            if (mysqli_query($conn, $insert_query)) {
                echo "Data Sukses di update";
                header("Location: admin/lokasi_home.php");
            } else {
                echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'delete-lokasi':
            $ID_LOKASI = $_GET['ID_LOKASI'];

            include("connect.php");
            $insert_query = "DELETE FROM lokasi WHERE ID_LOKASI='$ID_LOKASI'";
            if (mysqli_query($conn, $insert_query)) {
                echo "Data Sukses di delete";
                header("Location: admin/lokasi_home.php");
            } else {
                echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'insert-aset':
            $ID_ASET = $_POST['ID_ASET'];
            $NAMA_ASET = $_POST['NAMA_ASET'];

            include("connect.php");
            $insert_query = "INSERT INTO aset VALUES('$ID_ASET','$NAMA_ASET')";
            if (mysqli_query($conn, $insert_query)) {
                echo "Data Sukses diinput";
            } else {
                echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'update-aset':
            $ID_ASET = $_POST['ID_LOKASI'];
            $NAMA_ASET = $_POST['NAMA_ASET'];

            include("connect.php");
            $insert_query = "INSERT aset SET NAMA_ASET='$NAMA_ASET' WHERE ID_ASET='$ID_ASET'";
            if (mysqli_query($conn, $insert_query)) {
                echo "Data Sukses di update";
            } else {
                echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'delete-aset':
            $ID_ASET = $_GET['ID_ASET'];

            include("connect.php");
            $insert_query = "DELETE FROM aset WHERE ID_ASET='$ID_ASET'";
            if (mysqli_query($conn, $insert_query)) {
                echo "Data Sukses di delete";
            } else {
                echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'insert-dak':
            $ID_DAK = $_POST['ID_DAK'];
            $ID_LOKASI = $_POST['ID_LOKASI'];
            $NAMA_DAK = $_POST['NAMA_DAK'];
            $LUAS = $_POST['LUAS'];
            $PANJANG = $_POST['PANJANG'];
            $LEBAR = $_POST['LEBAR'];
            $PANJANG_BAIK_M = $_POST['PANJANG_BAIK_M'];
            $PANJANG_BAIK_PERS = $_POST['PANJANG_BAIK_PERS'];
            $PANJANG_SEDANG_M = $_POST['PANJANG_SEDANG_M'];
            $PANJANG_SEDANG_PERS = $_POST['PANJANG_SEDANG_PERS'];
            $PANJANG_RUSAKRINGAN_M = $_POST['PANJANG_RUSAKRINGAN_M'];
            $PANJANG_RUSAKRINGAN_PERS = $_POST['PANJANG_RUSAKRINGAN_PERS'];
            $PANJANG_RUSAKBERAT_M = $_POST['PANJANG_RUSAKBERAT_M'];
            $PANJANG_RUSAKBERAT_PERS = $_POST['PANJANG_RUSAKBERAT_PERS'];
            $RENCANA_PENANGANAN = $_POST['RENCANA_PENANGANAN'];
            $KEBUTUHAN_ANGGARAN = $_POST['KEBUTUHAN_ANGGARAN'];
            $KEMAMPUAN_RUPIAH = $_POST['KEMAMPUAN_RUPIAH'];
            $KEMAMPUAN_M = $_POST['KEMAMPUAN_M'];
            $USULAN_TAMBAHAN_RUPIAH = $_POST['USULAN_TAMBAHAN_RUPIAH'];
            $USULAN_TAMBAHAN_M = $_POST['USULAN_TAMBAHAN_M'];
            $USULAN_TAMBAHAN_SUMBER_DANA = $_POST['USULAN_TAMBAHAN_SUMBER_DANA'];

            include("connect.php");
            $query = "INSERT INTO dak VALUES('$ID_DAK','$ID_LOKASI','$NAMA_DAK',$LUAS,$PANJANG,$LEBAR,$PANJANG_BAIK_M,$PANJANG_BAIK_PERS,$PANJANG_SEDANG_M,$PANJANG_SEDANG_PERS,$PANJANG_RUSAKRINGAN_M,$PANJANG_RUSAKRINGAN_PERS,$PANJANG_RUSAKBERAT_M,$PANJANG_RUSAKBERAT_PERS,'$RENCANA_PENANGANAN',$KEBUTUHAN_ANGGARAN,$KEMAMPUAN_RUPIAH,$KEMAMPUAN_M,$USULAN_TAMBAHAN_RUPIAH,$USULAN_TAMBAHAN_M,'$USULAN_TAMBAHAN_SUMBER_DANA')";
            if (mysqli_query($conn, $query)) {
                echo "Data Sukses di insert";
                header("Location:admin/dak_home.php");
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'update-dak':
            $ID_DAK = $_POST['ID_DAK'];
            $ID_LOKASI = $_POST['ID_LOKASI'];
            $NAMA_DAK = $_POST['NAMA_DAK'];
            $LUAS = $_POST['LUAS'];
            $PANJANG = $_POST['PANJANG'];
            $LEBAR = $_POST['LEBAR'];
            $PANJANG_BAIK_M = $_POST['PANJANG_BAIK_M'];
            $PANJANG_BAIK_PERS = $_POST['PANJANG_BAIK_PERS'];
            $PANJANG_SEDANG_M = $_POST['PANJANG_SEDANG_M'];
            $PANJANG_SEDANG_PERS = $_POST['PANJANG_SEDANG_PERS'];
            $PANJANG_RUSAKRINGAN_M = $_POST['PANJANG_RUSAKRINGAN_M'];
            $PANJANG_RUSAKRINGAN_PERS = $_POST['PANJANG_RUSAKRINGAN_PERS'];
            $PANJANG_RUSAKBERAT_M = $_POST['PANJANG_RUSAKBERAT_M'];
            $PANJANG_RUSAKBERAT_PERS = $_POST['PANJANG_RUSAKBERAT_PERS'];
            $RENCANA_PENANGANAN = $_POST['RENCANA_PENANGANAN'];
            $KEBUTUHAN_ANGGARAN = $_POST['KEBUTUHAN_ANGGARAN'];
            $KEMAMPUAN_RUPIAH = $_POST['KEMAMPUAN_RUPIAH'];
            $KEMAMPUAN_M = $_POST['KEMAMPUAN_M'];
            $USULAN_TAMBAHAN_RUPIAH = $_POST['USULAN_TAMBAHAN_RUPIAH'];
            $USULAN_TAMBAHAN_M = $_POST['USULAN_TAMBAHAN_M'];
            $USULAN_TAMBAHAN_SUMBER_DANA = $_POST['USULAN_TAMBAHAN_SUMBER_DANA'];

            include("connect.php");
            $query = "UPDATE dak SET ID_LOKASI = '$ID_LOKASI',NAMA_DAK = '$NAMA_DAK',LUAS = $LUAS,PANJANG = $PANJANG,LEBAR = $LEBAR,PANJANG_BAIK_M = $PANJANG_BAIK_M,PANJANG_BAIK_PERS = $PANJANG_BAIK_PERS,PANJANG_SEDANG_M = $PANJANG_SEDANG_M,PANJANG_SEDANG_PERS = $PANJANG_SEDANG_PERS,PANJANG_RUSAKRINGAN_M = $PANJANG_RUSAKRINGAN_M,PANJANG_RUSAKRINGAN_PERS = $PANJANG_RUSAKRINGAN_PERS,PANJANG_RUSAKBERAT_M = $PANJANG_RUSAKBERAT_M,PANJANG_RUSAKBERAT_PERS = $PANJANG_RUSAKBERAT_PERS,RENCANA_PENANGANAN = '$RENCANA_PENANGANAN',KEBUTUHAN_ANGGARAN = $KEBUTUHAN_ANGGARAN,KEMAMPUAN_RUPIAH = $KEMAMPUAN_RUPIAH,KEMAMPUAN_M = $KEMAMPUAN_M,USULAN_TAMBAHAN_RUPIAH = $USULAN_TAMBAHAN_RUPIAH,USULAN_TAMBAHAN_M = $USULAN_TAMBAHAN_M,USULAN_TAMBAHAN_SUMBER_DANA = '$USULAN_TAMBAHAN_SUMBER_DANA' WHERE ID_DAK = '$ID_DAK'";
            if (mysqli_query($conn, $query)) {
                echo "Data Sukses di update";
                header("Location:admin/dak_home.php");
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'delete-dak':
            $ID_DAK = $_GET['ID_DAK'];

            include("connect.php");
            $query = "DELETE FROM dak WHERE ID_DAK = '$ID_DAK'";
            if (mysqli_query($conn, $query)) {
                echo "Data Sukses di delete";
                header("Location:admin/dak_home.php");
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'insert-spatial':
            $ID_DATASPA = $_POST['ID_DATASPA'];
            $NAMA_DATASPA = $_POST['NAMA_DATASPA'];
            $LINK_GIS = $_POST['LINK_GIS'];

            include("connect.php");
            $query = "INSERT INTO dataspa VALUES('$ID_DATASPA','$NAMA_DATASPA','$LINK_GIS')";
            if (mysqli_query($conn, $query)) {
                echo "Data Sukses diinput";
                header('Location:admin/dataspa_home.php');
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'update-spatial':
            $ID_DATASPA = $_POST['ID_DATASPA'];
            $NAMA_DATASPA = $_POST['NAMA_DATASPA'];
            $LINK_GIS = $_POST['LINK_GIS'];

            include("connect.php");
            $query = "UPDATE dataspa SET NAMA_DATASPA='$NAMA_DATASPA',LINK_GIS='$LINK_GIS' WHERE ID_DATASPA='$ID_DATASPA'";
            if (mysqli_query($conn, $query)) {
                echo "Data Sukses diinput";
                header('Location:admin/dataspa_home.php');
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'delete-spatial':
            $ID_DATASPA = $_GET['ID_DATASPA'];

            include("connect.php");
            $query = "DELETE FROM dataspa WHERE ID_DATASPA='$ID_DATASPA'";
            if (mysqli_query($conn, $query)) {
                echo "Data Sukses di delete";
                header('Location:admin/dataspa_home.php');
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'insert-ded':
            $ID_DED = $_POST['ID_DED'];
            $ID_LOKASI = $_POST['ID_LOKASI'];
            $PATH_FILE = basename($_FILES['PATH_FILE']['name']);
            $TMP = $_FILES['PATH_FILE']['tmp_name'];

            include("connect.php");
            $query = "INSERT INTO ded VALUES('$ID_DED','$PATH_FILE')";
            if (mysqli_query($conn, $query)) {
                echo "Data Sukses diinput";
                //Input ke table ded lokasi
                $query = "INSERT INTO dedlokasi VALUES('$ID_LOKASI','$ID_DED')";
                mysqli_query($conn, $query);
                uploadFileFoto($PATH_FILE, $TMP, "FILE");
                header('Location:admin/ded_home.php');
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'update-ded':
            $ID_DED = $_POST['ID_DED'];
            $ID_LOKASI = $_POST['ID_LOKASI'];
            $PATH_FILE = basename($_FILES['PATH_FILE']['name']);

            include("connect.php");

            $query = "UPDATE dedlokasi SET ID_LOKASI='$ID_LOKASI' WHERE ID_DED='$ID_DED'";
            mysqli_query($conn, $query);
            if ($PATH_FILE != "") {
                $query = "UPDATE ded SET PATH_FILE='$PATH_FILE' WHERE ID_DED='$ID_DED'";
                uploadFileFoto($PATH_FILE, $TMP, "FILE");
                if (mysqli_query($conn, $query)) {
                    echo "Data Sukses di update";
                    header('Location:admin/ded_home.php');
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($conn);
                }
            }
            header('Location:admin/ded_home.php');

            mysqli_close($conn);
            break;

        case 'delete-ded':
            $ID_DED = $_GET['ID_DED'];

            include("connect.php");
            $query = "DELETE FROM dedlokasi WHERE ID_DED='$ID_DED'";
            mysqli_query($conn, $query);
            $query = "DELETE FROM ded WHERE ID_DED='$ID_DED'";
            if (mysqli_query($conn, $query)) {
                echo "Data Sukses di delete";
                header('Location:admin/ded_home.php');
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'insert-pegawai':
            $NOMOR_INDUK_PEGAWAI = $_POST['NOMOR_INDUK_PEGAWAI'];
            $ID_JENIS = $_POST['ID_JENIS'];
            $NAMA_PEGAWAI = $_POST['NAMA_PEGAWAI'];
            $PASSWORD = $_POST['PASSWORD'];

            include("connect.php");
            $query = "INSERT INTO pegawai VALUES('$NOMOR_INDUK_PEGAWAI','$ID_JENIS','$NAMA_PEGAWAI','$PASSWORD')";
            if (mysqli_query($conn, $query)) {
                echo "Data Sukses di insert";
                header('Location:admin/pegawai_home.php');
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'update-pegawai':
            $NOMOR_INDUK_PEGAWAI = $_POST['NOMOR_INDUK_PEGAWAI'];
            $ID_JENIS = $_POST['ID_JENIS'];
            $NAMA_PEGAWAI = $_POST['NAMA_PEGAWAI'];
            $PASSWORD = $_POST['PASSWORD'];

            include("connect.php");
            $query = "UPDATE pegawai SET ID_JENIS='$ID_JENIS',NAMA_PEGAWAI='$NAMA_PEGAWAI',PASSWORD='$PASSWORD' WHERE NOMOR_INDUK_PEGAWAI='$NOMOR_INDUK_PEGAWAI'";
            if (mysqli_query($conn, $query)) {
                echo "Data Sukses di update";
                header('Location:admin/pegawai_home.php');
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);

            break;

        case 'delete-pegawai':
            $NOMOR_INDUK_PEGAWAI = $_GET['NOMOR_INDUK_PEGAWAI'];

            include("connect.php");
            $query = "DELETE FROM pegawai WHERE NOMOR_INDUK_PEGAWAI='$NOMOR_INDUK_PEGAWAI'";
            if (mysqli_query($conn, $query)) {
                echo "Data Sukses di delete";
                header('Location:admin/pegawai_home.php');
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'insert-pemeliharaan':
            $ID_PEMELIHARAAN = $_POST['ID_PEMELIHARAAN'];
            $ID_DAK = $_POST['ID_DAK'];
            $TOTAL_BIAYA = $_POST['TOTAL_BIAYA'];
            $TANGGAL_MULAI = $_POST['TANGGAL_MULAI'];
            $TANGGAL_AKHIR = $_POST['TANGGAL_AKHIR'];

            include("connect.php");
            $query = "INSERT INTO pemeliharaan VALUES('$ID_PEMELIHARAAN','$ID_DAK',$TOTAL_BIAYA,'$TANGGAL_MULAI','$TANGGAL_AKHIR')";
            if (mysqli_query($conn, $query)) {
                echo "Data Sukses diinput";
                header('Location:admin/pemeliharaan_home.php');
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'update-pemeliharaan':
            $ID_PEMELIHARAAN = $_POST['ID_PEMELIHARAAN'];
            $ID_DAK = $_POST['ID_DAK'];
            $TOTAL_BIAYA = $_POST['TOTAL_BIAYA'];
            $TANGGAL_MULAI = $_POST['TANGGAL_MULAI'];
            $TANGGAL_AKHIR = $_POST['TANGGAL_AKHIR'];

            include("connect.php");
            $query = "UPDATE pemeliharaan SET ID_DAK='$ID_DAK',TOTAL_BIAYA=$TOTAL_BIAYA,TANGGAL_MULAI='$TANGGAL_MULAI',TANGGAL_AKHIR='$TANGGAL_AKHIR' WHERE ID_PEMELIHARAAN='$ID_PEMELIHARAAN'";
            if (mysqli_query($conn, $query)) {
                echo "Data Sukses di update";
                header('Location:admin/pemeliharaan_home.php');
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'delete-pemeliharaan':
            $ID_PEMELIHARAAN = $_GET['ID_PEMELIHARAAN'];

            include("connect.php");
            $query = "DELETE FROM pemeliharaan WHERE ID_PEMELIHARAAN='$ID_PEMELIHARAAN'";
            if (mysqli_query($conn, $query)) {
                echo "Data Sukses diinput";
                header('Location:admin/pemeliharaan_home.php');
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'insert-detail':
            $ID_DETAIL_PEMELIHARAAN = $_POST['ID_DETAIL_PEMELIHARAAN'];
            $ID_PEMELIHARAAN = $_POST['ID_PEMELIHARAAN'];
            $JENIS_PEMELIHARAAN = $_POST['JENIS_PEMELIHARAAN'];
            $BIAYA = $_POST['BIAYA'];
            $VOLUME = $_POST['VOLUME'];

            include("connect.php");
            $query = "INSERT INTO detail_pemeliharaan VALUES('$ID_DETAIL_PEMELIHARAAN','$ID_PEMELIHARAAN','$JENIS_PEMELIHARAAN','$BIAYA','$VOLUME')";
            if (mysqli_query($conn, $query)) {
                header("Location:admin/detail_home.php?ID_PEMELIHARAAN='$ID_PEMELIHARAAN'");
                echo "Data Sukses diinput";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'update-detail':
            $ID_DETAIL_PEMELIHARAAN = $_POST['ID_DETAIL_PEMELIHARAAN'];
            $ID_PEMELIHARAAN = $_POST['ID_PEMELIHARAAN'];
            $JENIS_PEMELIHARAAN = $_POST['JENIS_PEMELIHARAAN'];
            $BIAYA = $_POST['BIAYA'];
            $VOLUME = $_POST['VOLUME'];

            include("connect.php");
            $query = "UPDATE detail_pemeliharaan SET ID_PEMELIHARAAN='$ID_PEMELIHARAAN',JENIS_PEMELIHARAAN='$JENIS_PEMELIHARAAN',BIAYA=$BIAYA,VOLUME=$VOLUME WHERE ID_DETAIL_PEMELIHARAAN='$ID_DETAIL_PEMELIHARAAN'";
            if (mysqli_query($conn, $query)) {
                echo "Data Sukses di update";
                header("Location:admin/detail_home.php?ID_PEMELIHARAAN='$ID_PEMELIHARAAN'");
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        case 'delete-detail':
            $ID_DETAIL_PEMELIHARAAN = $_GET['ID_DETAIL_PEMELIHARAAN'];

            include("connect.php");
            $query = "DELETE FROM detail_pemeliharaan WHERE ID_DETAIL_PEMELIHARAAN='$ID_DETAIL_PEMELIHARAAN'";
            if (mysqli_query($conn, $query)) {
                echo "Data Sukses di delete";
                header("Location:admin/detail_home.php?ID_PEMELIHARAAN='$ID_PEMELIHARAAN'");
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
            break;

        default:
            # code...
            break;
    }
}
