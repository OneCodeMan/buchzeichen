<?php 
include("includes/header.php");
include("includes/classes/User.php");
include("includes/classes/Bookmark.php");

$first_name = $user['first_name'];
$user = $user['email'];
$invalid_url_message = "";
if(isset($_POST['add_bookmark'])) {

       if (isDomainAvailable($_POST['bookmark_url'])) {
            $bookmark = new Bookmark($con, $user);
            $bookmark->addBookmark($_POST['bookmark_name'], $_POST['bookmark_description'], $_POST['bookmark_url']);
            header("Location: index.php");
            echo "Entry added";
       } else {
            $invalid_url_message = "You have entered an invalid URL";
       }

}
?>
    <div class="container">

        <div id="bookmarks">
            <h2 class="bookmarks-form-title">Your Bookmarks</h2>
            <div class="col-md-9 add-bookmark-form-div">
                <form action="index.php" class="add_bookmark_form" method="POST">
                    <input type="text" name="bookmark_name" placeholder="name" minlength="2" maxlength="70" required>
                    <input type="text" name="bookmark_description" id="bookmark_description" maxlength="100" placeholder="description (optional)">
                    <input type="url" pattern="https?://.+" name="bookmark_url" id="bookmark_url" value="https://" placeholder="URL (example: https://google.com)" minlength="2" maxlength="300" required>
                    <input type="submit" class="btn btn-warning" name="add_bookmark" id="add_bookmark" value="Add Bookmark">
                    <br>
                    <?php echo $invalid_url_message; ?>
                    <br>
                </form>
            </div>
            <?php 
                $bookmarks_query = mysqli_query($con, "SELECT * FROM bookmarks WHERE belongs_to='$user'");
                $bookmarks_query_row_count = mysqli_num_rows($bookmarks_query);
                $bookmarks_html = '<div class="bookmarks">';

                // loop to render the bookmarks
                if($bookmarks_query_row_count > 0) { // make sure user has bookmarks
                    while($row = mysqli_fetch_array($bookmarks_query)) { 
                        // data extraction
                        $id = $row['id'];
                        $name = $row['name'];
                        $description = $row['description'];
                        $url = $row['url'];
                        $belongs_to = $row['belongs_to'];

                        // data rendering
                        $bookmarks_html .= "
                            <div class='bookmark-container'>
                                <a href='$url' target='_blank' bookmark-url' class='bookmark-name'>$name</a>
                                <a href='includes/handlers/forms/edit_bookmark.php?bookmark_id=$id&belongs_to=$belongs_to'>
                                    <button class='edit-button btn-info'>
                                        Edit
                                    </button>
                                </a>
                                <button class='delete_button btn-danger' id='bookmark-delete-$id'>Delete</button>
                                <p class='bookmark-description'>$description</p>
                            </div>
                            <hr>
                        ";
                    ?>
                    <script>
                        $(document).ready(function() {
                            $('#bookmark-delete-<?php echo $id; ?>').on('click', function() {
                                $.post("includes/handlers/forms/delete_bookmark.php?bookmark_id=<?php echo $id; ?>", function() {
                                    location.reload();
                                });
                            });

                            
                        });
                    </script>
                    <?php
                    }
                } // end of if
                $bookmarks_html .= "</div>";
                echo $bookmarks_html;
            ?>
        </div>
    </div>
    
</body>
</html>