<?php 
class User {
    private $user;
    private $con;

    public function __construct($con, $email) {
        $this->con = $con;
        $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
        $this->user = mysqli_fetch_array($user_details_query);
    }

    public function getEmail() {
        return $this->user['email'];
    }

    public function getName() {
        $email = $this->user['email'];
        $query = mysqli_query($this->con, "SELECT first_name, last_name FROM users WHERE email='$email'");
        $row = mysqli_fetch_array($query);
        return $row['first_name'] . " " . $row['last_name'];
    }
}

?>