<?php 
ob_start();
session_start();
$con = mysqli_connect("us-cdbr-east-02.cleardb.com", "bf37c144838c8c", "40fa23a7", "heroku_25c33d2a731040c");

if(mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}

?>