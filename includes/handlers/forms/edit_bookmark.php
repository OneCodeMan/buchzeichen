<?php 
// require '../../../config/config.php';
require '../../header.php';

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
    <!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../../../assets/js/bootstrap.js"></script>
    
    <!-- CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../assets/css/styles.css">
    <body>
        <div class="container">
            <h2 class="bookmarks-form-title">Edit Bookmark</h1>
            <div class="col-md-5 update-bookmark-form-div">
                <form action="edit_bookmark.php" class="update_bookmark_form" method="POST">
                    <input type="text" name="bookmark_id" placeholder="id" style="display: none;" value="<?php echo $bookmark_id ?>">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" class="form-control" name="bookmark_name" placeholder="name" value="<?php echo $name ?>" minlength="2" maxlength="70" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" class="form-control" name="bookmark_description" id="bookmark_description" maxlength="100" placeholder="description (optional)" value="<?php echo $description; ?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">URL</label>
                        <input type="url" pattern="https://.*" name="bookmark_url" id="bookmark_url" placeholder="URL (example: https://google.com)"  value="<?php echo $url ?>" minlength="2" maxlength="300" placeholder="url" required>
                    </div>
                    <input type="submit" class="btn btn-primary" name="update_bookmark" id="update_bookmark" value="Update Bookmark">
                    <br>
                </form>
            </div>
            
        </div>
    </body>
</head>
</html>