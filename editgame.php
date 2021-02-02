<?php

require 'includes/library.php';
if (!is_admin()) {
    $error = "Access to this page is permitted for administrators only.";
    header("Location: error.php?m=$error");
    exit;
}

$page_title = "Edit Game Details";
$page_name = "ADMINS ONLY";
require_once ('includes/header.php');
require_once('includes/database.php');

if (!filter_has_var(INPUT_GET, "id")) {
    $error = "Your request cannot be processed since there was a problem retrieving game id.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


$sql = "SELECT * 
      FROM $tblVideo, $tblCategory 
      WHERE videogames.category_id = categories.category_id
      AND id=$id";



$query = @$conn->query($sql);


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

<h2>Edit Game Details</h2>
<form action="updategame.php" method="post">
    <div class="videodetails">
        <div class="label">

            <div>Title:</div>
            <div>Comapany:</div>
            <div>Category</div>
            <div>Date:</div>
            <div>Publisher:</div>
            <div>Price:</div>
            <div>Image:</div>
            <div>Description</div>
        </div>

        <div>

            <div><input name="title" size="80" value="<?php echo $row['title'] ?>" required></div>
            <div><input name="company" value="<?php echo $row['company'] ?>" required></div>
            <div><select name="category">
                    <option value="1" <?= $row['category'] == 'RPG' ? 'selected' : ''; ?>>RPG</option>
                    <option value="2" <?= $row['category'] == 'FPS' ? 'selected' : ''; ?>>FPS</option>
                    <option value="3" <?= $row['category'] == 'Horror' ? 'selected' : ''; ?>>Horror</option>
                    <option value="4" <?= $row['category'] == 'MMO' ? 'selected' : ''; ?>>MMO</option>
                    <option value="5" <?= $row['category'] == 'Party' ? 'selected' : ''; ?>>Party</option>
                </select>
            </div>
            <div><input name="release_date" value="<?php echo $row['release_date'] ?>" required></div>
            <div><input name="publisher" value="<?php echo $row['publisher'] ?>" required></div>
            <div><input name="price" type="number" step="0.01" value="<?php echo $row['price'] ?>" required></div>
            <div><input name="image" size="100" value="<?php echo $row['image'] ?>" required></div>
            <div><textarea name="description" rows="6" cols="65"><?php echo $row['description'] ?></textarea></div>
        </div>
    </div>
    <div>
        <input type="hidden" name="id" value="<?php echo $id ?>" />
        <input type="submit" value=" Update " />
        <input type="button" value="Cancel" onclick="window.location.href = 'details.php?id=<?= $id ?>'" />
    </div>
</form>
<?php
// close the connection.
$conn->close();
require_once 'includes/footer.php';