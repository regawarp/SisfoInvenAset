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
        $insert_query='INSERT INTO kiba VALUES("$idkiba","$iddataspa","$nokodebrg",$noreg,$luas,"$thn_pengadaan","$hak","$tgl_sertifikat","$no_sertifikat","$penggunaan",$harga,"$nama_barang","$keterangan","$asalusul","$foto","$file")';
        if(mysql_query($conn,$insert_query)){
            echo "Data Sukses diinput";
        }else{
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        break;

    case 'update-kiba':
        # code...
        break;

    case 'delete-kiba':
        # code...
        break;
    
    default:
        # code...
        break;
}

?>