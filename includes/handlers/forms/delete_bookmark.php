<?php 
require '../../../config/config.php';

if(isset($_GET['bookmark_id'])) {
    $bookmark_id = $_GET['bookmark_id'];
    $query = mysqli_query($con, "DELETE FROM bookmarks WHERE id='$bookmark_id'");
}

?>