<?php 
ob_start();
session_start();
$con = mysqli_connect("localhost", "root", "", "buchzeichen");

if(mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}

// require '../../../config/config.php';

// if user is not logged in, take them to register.php
if (isset($_SESSION['email'])) {
    $user_logged_in_email = $_SESSION['email'];
    $user_logged_in_query = mysqli_query($con, "SELECT * FROM users WHERE email='$user_logged_in_email'");
    $user = mysqli_fetch_array($user_logged_in_query);
} else {
    header("Location: register.php");
}

?>

<html>
<head>
    <title>Buchzeichen</title>

    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    
    <!-- CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body>

    <a href="includes/handlers/logout.php">
        <i class="fa fa-sign-out fa-lg"></i>
    </a>
</body>
</html>