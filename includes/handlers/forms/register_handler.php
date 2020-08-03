<?php 
$first_name = '';
$last_name = '';
$email = '';
$confirm_email = '';
$password = '';
$confirm_password = '';
$errors = array(); // this array collects form errors. if it's not empty, user can't register

if(isset($_POST['register_button'])) {

    $first_name = strip_tags($_POST['first_name']); // strips HTML tags
    $first_name = str_replace(' ', '', $first_name); // replace spaces with empty string
    $first_name = ucfirst(strtolower($first_name)); //capitalize

    $last_name = strip_tags($_POST['last_name']);
    $last_name = str_replace(' ', '', $last_name);
    $last_name = ucfirst(strtolower($last_name));

    $email = strip_tags($_POST['email']);
    $email = str_replace(' ', '', $email);
    $email = ucfirst(strtolower($email));

    $confirm_email = strip_tags($_POST['confirm_email']);
    $confirm_email = str_replace(' ', '', $confirm_email);
    $confirm_email = ucfirst(strtolower($confirm_email));

    $password = strip_tags($_POST['password']);
    $confirm_password = strip_tags($_POST['confirm_password']);

    // check email validity if both email fields have equal values
    if($email == $confirm_email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($email, FILTER_VALIDATE_EMAIL);

            $check_if_email_exists = mysqli_query($con, "SELECT email from users WHERE email='$email'");
            $num_rows_returned = mysqli_num_rows($check_if_email_exists);

            if($num_rows_returned > 0) {
                array_push($errors, "Email already in use<br>");
            }
        }
    } else {
        array_push($errors, "Emails don't match!<br>");
    }

    // Passwords
    if($password != $confirm_password) {
        array_push($errors, "Your passwords do not match!<br>");
    } else {
        if(preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($errors, "Your password can only contain english characters or numbers<br>");
        }
    }

    if(empty($errors)) {
        $password = md5($password); // encrypt password before sending to database
        $query = mysqli_query($con, "INSERT INTO users VALUES(null, '$first_name', '$last_name', '$email', '$password')");
    }

    $_SESSION['first_name'] = '';
    $_SESSION['last_name'] = '';
    $_SESSION['email'] = '';
    $_SESSION['confirm_email'] = '';

}  

?>