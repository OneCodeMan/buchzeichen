<?php 
require 'config/config.php';

// if user is not logged in, take them to register.php
if (isset($_SESSION['email'])) {
    $user_logged_in = $_SESSION['email'];
    $user_logged_in_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
} else {
    header("Location: register.php");
}
