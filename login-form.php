<?php
// You'd put this code at the top of any "protected" page you create

// Always start this first
session_start();

if ( isset( $_SESSION['user_id'] ) ) {
    // Grab user data from the database using the user_id
    // Let them access the "logged in only" pages
    header("Location: admin.php");
} else {
    // Redirect them to the login page
?>
<html>
<head>
	<title>Login-Sistem Informasi Inventaris Aset</title>
</head>
<body>
	<h1>LOGIN</h1>
	<form action="process.php" method="post">
    <input type="text" name="username" placeholder="Enter your username" required>
    <input type="password" name="password" placeholder="Enter your password" required>
    <input type="submit" value="Submit">
    
	<a href="index.php">Home</a>
</body>
</html>

<?php
}
?>