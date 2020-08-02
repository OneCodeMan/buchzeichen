<?php 
require '../../../config/config.php';

$bookmark_id = $_GET['bookmark_id'];
$bookmark_belongs_to = $_GET['belongs_to'];
$bookmark_fetch_existing_row_query = mysqli_query($con, "SELECT * FROM bookmarks WHERE id='$bookmark_id' AND belongs_to='$bookmark_belongs_to'");
$bookmark_num_rows = mysqli_num_rows($bookmark_fetch_existing_row_query);

$bookmark = mysqli_fetch_array($bookmark_fetch_existing_row_query);
$name = $bookmark['name'];
$description = $bookmark['description'];
$url = $bookmark['url'];

// if user tries to edit a book that isn't theirs
if(!($bookmark_num_rows > 0)) {
    header("Location: ../../../index.php");
}

if(isset($_POST['update_bookmark'])) {

    $bookmark_id = $_POST['bookmark_id'];
    $name = $_POST['bookmark_name'];
    $description= $_POST['bookmark_description'];
    $url = $_POST['bookmark_url'];

    $bookmark_update_query = mysqli_query($con, "UPDATE bookmarks SET name='$name', description='$description', url='$url' WHERE id='$bookmark_id'");
    header("Location: ../../../index.php");
}
?>

<html>
<head>
    <title>hellooo</title>
    <body>
        <h1>Hi!</h1>
        <div class="container">
            <form action="edit_bookmark.php" class="update_bookmark_form" method="POST">
                <input type="text" name="bookmark_id" placeholder="id" style="display: none;" value="<?php echo $bookmark_id ?>">
                <input type="text" name="bookmark_name" placeholder="name" value="<?php echo $name ?>" required>
                <textarea name="bookmark_description" id="bookmark_description" placeholder="Enter a brief description of the URL"><?php echo $description; ?></textarea>
                <input type="text" name="bookmark_url" id="bookmark_url" value="<?php echo $url ?>" placeholder="url" required>
                <input type="submit" name="update_bookmark" id="update_bookmark" value="Update">
                <br>
            </form>
        </div>
    </body>
</head>
</html>