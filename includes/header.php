<?php 
ob_start();
session_start();
$con = mysqli_connect("us-cdbr-east-02.cleardb.com", "bf37c144838c8c", "40fa23a7", "heroku_25c33d2a731040c");

if(mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
}

function isDomainAvailable($domain) {
    //check, if a valid url is provided
    if(!filter_var($domain, FILTER_VALIDATE_URL)) {
        return false;
    }

    //initialize curl
    $curlInit = curl_init($domain);
    curl_setopt($curlInit,CURLOPT_CONNECTTIMEOUT,10);
    curl_setopt($curlInit,CURLOPT_HEADER,true);
    curl_setopt($curlInit,CURLOPT_NOBODY,true);
    curl_setopt($curlInit,CURLOPT_RETURNTRANSFER,true);

    //get answer
    $response = curl_exec($curlInit);

    curl_close($curlInit);

    if ($response) return true;

    return false;
}

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

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Buchzeichen</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            </ul>
            <span class="navbar-text">
                <?php echo "Signed in as " . $_SESSION['email']; ?>
            </span>
            <span class="navbar-text">
                <a class="nav-link" href="includes/handlers/logout.php">
                    Log Out
                </a>
            </span>
        </div>
    </nav>
</body>
</html>