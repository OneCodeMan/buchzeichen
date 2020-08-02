<?php 
require 'config/config.php';
require 'includes/handlers/forms/register_handler.php';
require 'includes/handlers/forms/login_handler.php';
?>

<html>
<head>
    <title>Buchzeichen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>
    <div class="container">
        <div class="title">
            <h1>Buchzeichen</h1>
        </div>
        <div id="welcome-container" class="col-5 component-container">
            <h2 id="welcome-title">
                Keep track of your bookmarks.
            </h2>
            <p id="welcome-message">
                The internet is full of information. It's easy to get overwhelmed. 
                Our attention span is finite. We should save it for what's important to us.
                Buchzeichen makes sure you have important bookmarks saved, convenient to access. 
                Consume smart.
            </p>
            <button type="button" id="register-page-btn" class="btn btn-dark">Register</button>
            <button type="button" id="login-page-btn" class="btn btn-dark">Login</button>
        </div>
        <div class="col-5 hidden component-container" id="register-container">
            <form action="register.php" method="POST">
                <h1 class="form-title">Register</h1>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" name="first_name" placeholder="First Name" minlength="1" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" name="last_name" placeholder="Last Name" minlength="1" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" name="confirm_email" placeholder="Confirm Email" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="password" name="password" placeholder="Password" minlength="5" required>
                    </div>
                    <div class="form-group col-md-6">
                        <input type="password" name="confirm_password" placeholder="Confirm Password" minlength="5" required>
                    </div>
                </div>

                <input type="submit" name="register_button" value="Register" class="btn btn-dark" required>
            </form>
            <a href="#" id="register-back-to-welcome">Go Back</a>
        </div>
        
        <div class="col-5 hidden component-container" id="login-container">
            <form action="register.php", method="POST">
                <h1 class="form-title">Log In</h1>
                
                <div class="form-group">
                    <input type="email" name="login_email" placeholder="Email" value="" required>
                </div>
            
                <div class="form-group">
                    <input type="password" name="login_password" placeholder="Password">
                </div>
                <input type="submit" name="login_button" value="Login" class="btn btn-dark"> 
            </form>
            <a href="#" id="login-back-to-welcome">Go Back</a>
        </div>

    </div>

</body>
</html>