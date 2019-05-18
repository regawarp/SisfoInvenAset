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
        $foto = basename($_FILES["foto"]["name"]);
        $file = basename($_FILES["file"]["name"]);
        $keterangan = $_POST['keterangan'];
        $asalusul = $_POST['asalusul'];

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $insert_query='INSERT INTO kiba VALUES("'.$idkiba.'","'.$idlokasi.'","'.$iddataspa.'","'.$nama_barang.'","'.$nokodebrg.'","'.$noreg.'",'.$luas.','.$thn_pengadaan.',"'.$hak.'",'.$tgl_sertifikat.',"'.$no_sertifikat.'","'.$penggunaan.'",'.$harga.',"'.$foto.'","'.$file.'","'.$keterangan.'","'.$asalusul.'")';
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
            
            header("Location: admin/kiba_home.php");
        }else{
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
        $thn_pengadaan = $_POST['thn_pengadaan'];
        $hak = $_POST['hak'];
        $tgl_sertifikat = $_POST['tgl_sertifikat'];
        $no_sertifikat = $_POST['no_sertifikat'];
        $penggunaan = $_POST['penggunaan'];
        $harga = $_POST['harga'];
        $foto = basename($_FILES["foto"]["name"]);
        $file = basename($_FILES["file"]["name"]);
        $keterangan = $_POST['keterangan'];
        $asalusul = $_POST['asalusul'];

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if($foto=="" && $file==""){
            $update_query="UPDATE kiba  SET ID_LOKASI='$idlokasi', ID_DATASPA='$iddataspa',NOMOR_KODE_BARANG='$nokodebrg',NOMOR_REGISTER=$noreg,LUAS=$luas,TAHUN_PENGADAAN='$thn_pengadaan',HAK='$hak',TANGGAL_SERTIFIKAT='$tgl_sertifikat',NOMOR_SERTIFIKAT='$no_sertifikat',PENGGUNAAN='$penggunaan',HARGA=$harga,NAMA_BARANG='$nama_barang',KETERANGAN='$keterangan',ASAL_USUL='$asalusul' WHERE ID_KIBA='$idkiba'";
        }else if($foto==""){
            $update_query="UPDATE kiba  SET ID_LOKASI='$idlokasi', ID_DATASPA='$iddataspa',NOMOR_KODE_BARANG='$nokodebrg',NOMOR_REGISTER=$noreg,LUAS=$luas,TAHUN_PENGADAAN='$thn_pengadaan',HAK='$hak',TANGGAL_SERTIFIKAT='$tgl_sertifikat',NOMOR_SERTIFIKAT='$no_sertifikat',PENGGUNAAN='$penggunaan',HARGA=$harga,NAMA_BARANG='$nama_barang',KETERANGAN='$keterangan',ASAL_USUL='$asalusul',FILE='$file' WHERE ID_KIBA='$idkiba'";
        }else if($file==""){
            $update_query="UPDATE kiba  SET ID_LOKASI='$idlokasi', ID_DATASPA='$iddataspa',NOMOR_KODE_BARANG='$nokodebrg',NOMOR_REGISTER=$noreg,LUAS=$luas,TAHUN_PENGADAAN='$thn_pengadaan',HAK='$hak',TANGGAL_SERTIFIKAT='$tgl_sertifikat',NOMOR_SERTIFIKAT='$no_sertifikat',PENGGUNAAN='$penggunaan',HARGA=$harga,NAMA_BARANG='$nama_barang',KETERANGAN='$keterangan',ASAL_USUL='$asalusul',FOTO='$foto' WHERE ID_KIBA='$idkiba'";
        }else{
            $update_query="UPDATE kiba  SET ID_LOKASI='$idlokasi', ID_DATASPA='$iddataspa',NOMOR_KODE_BARANG='$nokodebrg',NOMOR_REGISTER=$noreg,LUAS=$luas,TAHUN_PENGADAAN='$thn_pengadaan',HAK='$hak',TANGGAL_SERTIFIKAT='$tgl_sertifikat',NOMOR_SERTIFIKAT='$no_sertifikat',PENGGUNAAN='$penggunaan',HARGA=$harga,NAMA_BARANG='$nama_barang',KETERANGAN='$keterangan',ASAL_USUL='$asalusul',FOTO='$foto',FILE='$file' WHERE ID_KIBA='$idkiba'";
        }
        
        if(mysqli_query($conn,$update_query)){
            echo "Data sukses diupdate";
        }else{
            echo "Error: " . $update_query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        break;

    case 'delete-kiba':
        $idkiba = $_GET['idkiba'];
        $foto = $_GET['foto'];
        $file = $_GET['file'];
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $delete_query='DELETE FROM kiba WHERE ID_KIBA='.$idkiba;
        if(mysqli_query($conn,$delete_query)){
            echo "Data berhasil dihapus";
            if($foto!=""){
                if (!unlink('../img/upload/'.$foto)){
                  echo ("Error deleting $foto");
                }else{
                  echo ("Deleted $foto");
                }
            }
            if($file!=""){
                if (!unlink('../file/'.$file)){
                  echo ("Error deleting $file");
                }else{
                  echo ("Deleted $file");
                }
            }
        }else{
            echo "Error: " . $delete_query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        break;
    
    case 'insert-kibd':
        # code...
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

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $insert_query="INSERT INTO kibd VALUES('$ID_KIBD','$ID_LOKASI','$ID_DATASPA','$ID_ASET','$NAMA_BARANG','$NOMOR_KODE_BARANG','$NOMOR_REGISTER','$KONSTRUKSI','$PANJANG','$LEBAR','$LUAS','$TANGGAL_DOKUMEN','$NOMOR_DOKUMEN','$STATUS_TANAH','$NOMOR_KODE','$ASAL_USUL','$HARGA','$KONDISI','$KETERANGAN','$FOTO','$FILE')";
        if(mysqli_query($conn,$insert_query)){
            echo "Data Sukses diinput";
        }else{
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        break;

    case 'update-kibd':
        # code...
        break;

    case 'delete-kibd':
        # code...
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

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $insert_query="INSERT INTO kibf VALUES('$ID_KIBF','$ID_DATASPA','$ID_LOKASI','$ID_ASET','$NAMA_BARANG','$BANGUNAN','$BERTINGKAT','$BETON','$PANJANG','$TANGGAL_DOKUMEN','$NOMOR_DOKUMEN','$TANGGAL_MULAI','$STATUS_TANAH','$NOMO_KODE_TANAH','$NILAI_KONTRAK','$FOTO','$FILE','$KETERANGAN','$ASAL_USUL')";
        if(mysqli_query($conn,$insert_query)){
            echo "Data Sukses diinput";
        }else{
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        break;

    case 'update-kibf':
        # code...
        break;

    case 'delete-kibf':
        # code...
        break;

    case 'insert-lokasi':
        $ID_LOKASI = $_POST['ID_LOKASI'];
        $NAMA_LOKASI = $_POST['NAMA_LOKASI'];

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $insert_query="INSERT INTO lokasi VALUES('$ID_LOKASI','$NAMA_LOKASI')";
        if(mysqli_query($conn,$insert_query)){
            echo "Data Sukses diinput";
        }else{
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        break;

    case 'update-lokasi':
        # code...
        break;

    case 'delete-lokasi':
        # code...
        break;

    case 'insert-aset':
        $ID_LOKASI = $_POST['ID_LOKASI'];
        $NAMA_ASET = $_POST['NAMA_ASET'];

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $insert_query="INSERT INTO aset VALUES('$ID_LOKASI','$NAMA_ASET')";
        if(mysqli_query($conn,$insert_query)){
            echo "Data Sukses diinput";
        }else{
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        break;

    case 'update-aset':
        # code...
        break;

    case 'delete-aset':
        # code...
        break;

    case 'insert-dak':
        $ID_LOKASI = $_POST['ID_LOKASI'];
        $NAMA_ASET = $_POST['NAMA_ASET'];

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $insert_query="INSERT INTO aset VALUES('$ID_LOKASI','$NAMA_ASET')";
        if(mysqli_query($conn,$insert_query)){
            echo "Data Sukses diinput";
        }else{
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        break;

    case 'update-dak':
        # code...
        break;

    case 'delete-dak':
        # code...
        break;

    case 'insert-spatial':
        # code...
        break;

    case 'update-spatial':
        # code...
        break;

    case 'delete-spatial':
        # code...
        break;

    case 'insert-ded':
        # code...
        $ID_DED = $_POST['ID_DED'];
        $PATH_FILE = $_POST['PATH_FILE'];

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $insert_query="INSERT INTO aset VALUES('$ID_DED','$PATH_FILE')";
        if(mysqli_query($conn,$insert_query)){
            echo "Data Sukses diinput";
        }else{
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        break;

    case 'update-ded':
        # code...
        break;

    case 'delete-ded':
        # code...
        break;

    case 'insert-pegawai':
        # code...
        $NOMOR_INDUK_PEGAWAI = $_POST['NOMOR_INDUK_PEGAWAI'];
        $ID_JENIS = $_POST['ID_JENIS'];
        $NAMA_PEGAWAI = $_POST['NAMA_PEGAWAI'];
        $PASSWORD = $_POST['PASSWORD'];

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $insert_query="INSERT INTO aset VALUES('$NOMOR_INDUK_PEGAWAI','$ID_JENIS','$NAMA_PEGAWAI','$PASSWORD')";
        if(mysqli_query($conn,$insert_query)){
            echo "Data Sukses diinput";
        }else{
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        break;

    case 'update-pegawai':
        # code...

        break;

    case 'delete-pegawai':
        # code...
        break;

    case 'insert-pemeliharaan':
        # code...
        $ID_PEMELIHARAAN = $_POST['ID_PEMELIHARAAN'];
        $ID_DAK = $_POST['ID_DAK'];
        $TOTAL_BIAYA = $_POST['TOTAL_BIAYA'];
        $TANGGAL_MULAI = $_POST['TANGGAL_MULAI'];
        $TANGGAL_AKHIR = $_POST['TANGGAL_AKHIR'];

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $insert_query="INSERT INTO aset VALUES('$ID_PEMELIHARAAN','$ID_DAK','$TOTAL_BIAYA','$TANGGAL_MULAI','$TANGGAL_AKHIR')";
        if(mysqli_query($conn,$insert_query)){
            echo "Data Sukses diinput";
        }else{
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        break;

    case 'update-pemeliharaan':
        # code...
        break;

    case 'delete-pemeliharaan':
        # code...
        break;

    case 'insert-detail':
        # code...
        $ID_DETAIL_PEMELIHARAAN = $_POST['ID_DETAIL_PEMELIHARAAN'];
        $ID_PEMELIHARAAN = $_POST['ID_PEMELIHARAAN'];
        $JENIS_PEMELIHARAAN = $_POST['JENIS_PEMELIHARAAN'];
        $BIAYA = $_POST['BIAYA'];
        $VOLUME = $_POST['VOLUME'];

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $insert_query="INSERT INTO aset VALUES('$$ID_DETAIL_PEMELIHARAAN','$ID_PEMELIHARAAN','$JENIS_PEMELIHARAAN','$BIAYA','$VOLUME')";
        if(mysqli_query($conn,$insert_query)){
            echo "Data Sukses diinput";
        }else{
            echo "Error: " . $insert_query . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);
        break;

    case 'update-detail':
        # code...
        break;
    
    case 'delete-detail':
        # code...
        break;

    default:
        # code...
        break;
}

?>