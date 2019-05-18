<?php
// Always start this first
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_pupr";

switch ($_GET['process']) {
    case 'login':
        if ( ! empty( $_POST ) ) {
            if ( isset( $_POST['username'] ) && isset( $_POST['password'] ) ) {
                // Getting submitted user data from database
             //    $con = new mysqli($db_host, $db_user, $db_pass, $db_name);
             //    $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
             //    $stmt->bind_param('s', $_POST['username']);
             //    $stmt->execute();
             //    $result = $stmt->get_result();
                // $user = $result->fetch_object();
                    
                // Verify user password and set $_SESSION
                // if ( password_verify( $_POST['password'], $user->password ) ) {
                //  $_SESSION['user_id'] = $user->ID;
                // }
                if ( $_POST['password'] == 'a'  ) {
                    $_SESSION['user_id'] = $_POST['username'];
                    header('Location: admin/dashboard.php');
                }else{//WRONG PASS
                    echo ("<script LANGUAGE='JavaScript'>
                    window.alert('Wrong Password');
                    window.location.href='login.php';
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
        $thn_pengadaan = $_POST['thn_pengadaan'];
        $hak = $_POST['hak'];
        $tgl_sertifikat = $_POST['tgl_sertifikat'];
        $no_sertifikat = $_POST['no_sertifikat'];
        $penggunaan = $_POST['penggunaan'];
        $harga = $_POST['harga'];
        $keterangan = $_POST['keterangan'];
        $asalusul = $_POST['asalusul'];
        $foto = basename($_FILES["foto"]["name"]);
        $file = basename($_FILES["file"]["name"]);

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $insert_query='INSERT INTO kiba VALUES("'.$idkiba.'","'.$idlokasi.'","'.$iddataspa.'","'.$nama_barang.'","'.$nokodebrg.'","'.$noreg.'",'.$luas.','.$thn_pengadaan.',"'.$hak.'",'.$tgl_sertifikat.',"'.$no_sertifikat.'","'.$penggunaan.'",'.$harga.',"'.$keterangan.'","'.$asalusul.'","'.$foto.'","'.$file.'")';
        if(mysqli_query($conn,$insert_query)){
            echo "Data Sukses diinput";

            //Upload foto and file
            $target_dir = "../img/upload/";
            $target_file = $target_dir . basename($_FILES["foto"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["foto"]["tmp_name"]);
                if($check !== false) {
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
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

            $target_dir = "../file/";
            $target_file = $target_dir . basename($_FILES["file"]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
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
                    echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            
        }else{
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        break;

    case 'update-kiba':
        $idkiba = $_POST['idkiba'];
        $idlokasi = $_POST['idlokasi'];
        $iddataspa = $_POST['iddataspa'];
        $nokodebrg = $_POST['nokodebrg'];
        $noreg = $_POST['noreg'];
        $luas = $_POST['luas'];
        $thn_pengadaan = $_POST['thn_pengadaan'];
        $hak = $_POST['hak'];
        $tgl_sertifikat = $_POST['tgl_sertifikat'];
        $no_sertifikat = $_POST['no_sertifikat'];
        $penggunaan = $_POST['penggunaan'];
        $harga = $_POST['harga'];
        $nama_barang = $_POST['nama_barang'];
        $keterangan = $_POST['keterangan'];
        $asalusul = $_POST['asalusul'];
        $foto = $_POST['foto'];
        $file = $_POST['file'];

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $update_query="UPDATE kiba  SET ID_LOKASI='$idlokasi', ID_DATASPA='$iddataspa',NOMOR_KODE_BARANG='$nokodebrg',NOMOR_REGISTER=$noreg,LUAS=$luas,TAHUN_PENGADAAN='$thn_pengadaan',HAK='$hak',TANGGAL_SERTIFIKAT='$tgl_sertifikat',NOMOR_SERTIFIKAT='$no_sertifikat',PENGGUNAAN='$penggunaan',HARGA=$harga,NAMA_BARANG='$nama_barang',KETERANGAN='$keterangan',ASAL_USUL='$asalusul',FOTO='$foto',FILE='$file' WHERE ID_KIBA='$idkiba'";
        if(mysqli_query($conn,$update_query)){
            echo "Data sukses diupdate";
        }else{
            echo "Error: " . $update_query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        break;

    case 'delete-kiba':
        $idkiba = $_GET['idkiba'];
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $delete_query='DELETE FROM kiba WHERE ID_KIBA='.$idkiba;
        if(mysqli_query($conn,$delete_query)){
            echo "Data berhasil dihapus";
        }else{
            echo "Error: " . $delete_query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        break;
    
    default:
        # code...
        break;
}

?>