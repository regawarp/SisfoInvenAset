<?php
// Always start this first
session_start();

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
    
    default:
        # code...
        break;
}

?>