<?php 
class Bookmark {
    private $user_obj;
    private $con;

    /**
     * Constructor for bookmark, which creates a user object to attach bookmark to
     */
    public function __construct($con, $user) {
        $this->con = $con;
        $this->user_obj = new User($con, $user);
    }
    
    /**
     * Adds bookmark to database
     * 
     * @param string $name URL name
     * @param string $description small description of URL
     * @param string $url actual URL
     */
    public function addBookmark($name, $description, $url) {

        // sanitize data
        $name = strip_tags($name);
        $name = mysqli_real_escape_string($this->con, $name);

        $description = strip_tags($description);
        $description = mysqli_real_escape_string($this->con, $description);

        $url = strip_tags($url);
        $url = mysqli_real_escape_string($this->con, $url);

        $belongs_to = $this->user_obj->getEmail();

        // insert post
        $query = mysqli_query($this->con, "INSERT INTO bookmarks VALUES(null, '$name', '$description', '$url', '$belongs_to')");
    }
}
?>