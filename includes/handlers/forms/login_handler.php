<?php
if(isset($_POST['login_button'])) {
    $email = filter_var($_POST['log_email'], FILTER_SANITIZE_EMAIL); // sanitize email

    $_SESSION['login_email'] = $email; // store email into session variable
    $password = md5($_POST['login_password']);

    $check_database_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    $check_login_query = mysqli_num_rows($check_database_query);

    if($check_login_query == 1) {
        $row = mysqli_fetch_array($check_database_query);
        $email = $row['email'];

        $_SESSION['email'] = $email;
        header("Location: index.php");
        exit();
    } else {
        array_push($errors, "Email or password incorrect<br>");
    }

?>