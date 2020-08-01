<?php 
include("includes/header.php");
include("includes/classes/User.php");
include("includes/classes/Bookmark.php");

$user = $user['email'];
if(isset($_POST['add_bookmark'])) {
    $bookmark = new Bookmark($con, $user);
    $bookmark->addBookmark($_POST['bookmark_name'], $_POST['bookmark_description'], $_POST['bookmark_url']);
    header("Location: index.php");
}
?>

<html>
<head>
    <title>Buchzeichen</title>
</head>
<body>
    <h1>Buchzeichen</h1>
    <p>Logged in as <?php echo $user;?></p>

    <div id="bookmarks">
        <h2>Your Bookmarks</h2>
        <form action="index.php" class="add_bookmark_form" method="POST">
            <input type="text" name="bookmark_name" placeholder="name" required>
            <textarea name="bookmark_description" id="bookmark_description" placeholder="Enter a brief description of the URL"></textarea>
            <input type="text" name="bookmark_url" id="bookmark_url" placeholder="url" required>
            <input type="submit" name="add_bookmark" id="add_bookmark" value="Post">
            <br>
        </form>
        <?php 
            $bookmarks_query = mysqli_query($con, "SELECT * FROM bookmarks WHERE belongs_to='$user'");
            $bookmarks_query_row_count = mysqli_num_rows($bookmarks_query);
            $bookmarks_html = '';

            // loop to render the bookmarks
            if($bookmarks_query_row_count > 0) { // make sure user has bookmarks
                while($row = mysqli_fetch_array($bookmarks_query)) { 
                    // data extraction
                    $id = $row['id'];
                    $name = $row['name'];
                    $description = $row['description'];
                    $url = $row['url'];

                    // data rendering
                    $bookmarks_html .= "
                        <div class='bookmark-container'>
                            <button class='edit_button btn-info' id='bookmark-edit-$id'>Edit</button>
                            <button class='delete_button btn-danger' id='bookmark-delete-$id'>X</button>
                            <a href='$url' target='_blank' bookmark-url'>$name</a>
                            <p class='bookmark-description'>$description</p>
                        </div>
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

            echo $bookmarks_html;
        ?>
    </div>
</body>
</html>