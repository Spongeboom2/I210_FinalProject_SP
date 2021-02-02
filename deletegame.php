<?php
require 'includes/library.php';
if (!is_admin()) {
    $error = "Access to this page is permitted for administrators only.";
    header("Location: error.php?m=$error");
    exit;
}

$page_title = "ADMINS ONLY";
$page_name = "Planet gaming logo";
require_once 'includes/header.php';
require_once 'includes/database.php';

//if book id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, 'id')) {
    $error = "There was a problem retrieving book id.";
    header("Location: error.php?m=$error");
    die();
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//MySQL SELECT statement
$sql = "SELECT * FROM $tblVideo, $tblCategory WHERE videogames.category_id = categories.category_id AND id=$id";

//execute the query
$query = @$conn->query($sql);

//Handle errors
if (!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$row = $query->fetch_assoc();
if (!$row) {
    $error = "Game not found";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
?>

    <h2>Game Details</h2>
    <div class="videodetails">
        <div class="cover">

            <img src="<?= $row['image'] ?>">
        </div>
        <div class="label">
            <div>Title:</div>
            <div>Comapny:</div>
            <div>Genres</div?
            <div>Date:</div>
            <div>Publisher:</div>
            <div>Price:</div>
            <div>Description</div>
        </div>

        <div class="content">
            <div><?= $row['title'] ?></div>
            <div><?= $row['company'] ?></div>
            <div><?= $row['category'] ?></div>
            <div><?= $row['release_date'] ?></div>
            <div><?= $row['publisher'] ?></div>
            <div>$<?= $row['price'] ?></div>
            <div><?= $row['description'] ?></div>
        </div>
    </div>
    <div>
        <input type="button" value="Delete"
               onclick="window.location.href = 'removegame.php?id=<?= $id ?>'">
        <input type="button" value="Cancel"
               onclick="window.location.href = 'details.php?id=<?= $id ?>'">
        <div style="color: red; display: inline-block;">Are you sure you want to delete the video game?</div>
    </div>
<?php
require_once('includes/footer.php');
