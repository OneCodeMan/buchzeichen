<?php 
require 'config/config.php';
require 'includes/handlers/forms/register_handler.php';
require 'includes/handlers/forms/login_handler.php';
?>

<html>
<head>
    <title>Buchzeichen</title>
</head>
<body>

    <h1>Register</h1>
    <form action="register.php" method="POST">
        <input type="text" name="first_name" placeholder="First Name" required>
        <br>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <br>
        <input type="text" name="email" placeholder="Email" required>
        <br>
        <input type="text" name="confirm_email" placeholder="Confirm Email" required>
        <br>
        <input type="password" name="password" placeholder="Password" required>
        <br>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <br>
        <input type="submit" name="register_button" value="Register" required>
    </form>

    <h1>Log In</h1>
    <form action="register.php", method="POST">
        <input type="email" name="login_email" placeholder="Email" value="" required> <br>
        <input type="password" name="login_password" placeholder="Password"> <br>
        <input type="submit" name="login_button" value="Login"> 
        <br>
    </form>

</body>
</html>