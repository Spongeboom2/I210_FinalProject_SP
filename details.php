<?php
/**
 * Authors: Ryan Stump, Parker Staph, Alex Young, Sean Birkle
    THIS IS THE DETAILS PAGE much wow*/
$page = 'ourGames';
$page_title = "Details";
$page_name = "";

//Header of the webpage
require_once 'includes/header.php';
require_once 'includes/database.php';

//if book id cannot be retrieved, terminate the script
if(!filter_has_var(INPUT_GET, 'id')) {
    $error = "Sad kek";
    $conn->close();
    header("Location:error.php?m=$error");
    die();
}

//retrieve the book id from a query string variable
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//select statement
$sql = "SELECT * FROM $tblVideo, $tblCategory WHERE videogames.category_id = categories.category_id AND id=$id";

//execute the query
$query =$conn->query($sql);

//error handling
if(!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location:error.php?m=$error");
    die();
}

$row = $query->fetch_assoc();
if(!$row) {
    $error = "Game not found.";
    $conn->close();
    header("Location:error.php?m=$error");
    die();
}

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$role = 0;
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
}

?>

<h2>Game Details</h2>
<div class="videodetails">
    <div class="cover">
        <!-- display book image -->
        <img src="<?= $row['image'] ?>">
    </div>
    <div class="label">
        <!-- display book attributes  -->
        <div>Title:</div>
        <div>Company:</div>
        <div>Genres</div>
        <div>Date:</div>
        <div>Publisher:</div>
        <div>Price:</div>
        <div>Description</div>
    </div>
    <div class="content">
        <!-- display book details -->
        <div><?= $row['title'] ?></div>
        <div><?= $row['company'] ?></div>
        <div><?= $row['category'] ?></div>
        <div><?= $row['release_date'] ?></div>
        <div><?= $row['publisher'] ?></div>
        <div><?= $row['price'] ?></div>
        <div><?= $row['description'] ?></div>
    </div>
</div>
<?php
$confirm="";
if(isset($_GET['m'])) {
    if($_GET['m']== "insert") {
        $confirm = "You have successfully added the new video game.";
    } else if($_GET['m'] == 'update') {
        $confirm = "the video game has been successfully updated.";
    }
}
if ($role == 1) {
?>
<div>
    <input type = "button" onclick ="window.location.href='editgame.php?id=<?= $id ?>'" value="Edit">
    <input type = "button" onclick ="window.location.href='deletegame.php?id=<?=$id ?>'" value="Delete">
    <input type="button" onclick="window.location.href='inventory.php'" value="Cancel">
    <div style="color: white; display: inline-block;"><?= $confirm ?></div>
    <?php
    }
    ?>
    <input type = "button" onclick ="window.location.href='addtocart.php?id=<?=$id ?>'" value="Add To Cart">

</div>

<?php
include ('includes/footer.php');
?>
</html>

