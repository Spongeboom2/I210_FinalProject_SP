
<?php
/**
 * Authors: Ryan Stump, Parker Staph, Alex Young, Sean Birkle
 */

$page_title = "searchGameResults";
$page_name = "Game Results";

//Header of the webpage
include ('includes/header.php');
require_once ('includes/database.php');

//retrieve search term
if(!filter_has_var(INPUT_GET, 'q')) {
    $error = "There was no search terms found.";
    $conn->close();
    header("location:error.php?m=$error");
    die();
}
$term = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
//explode the search terms into an array
$terms = explode(' ', $term);

//select statement using pattern search
$sql = "SELECT id, title, company, price, category, image
        FROM $tblVideo, $tblCategory 
        WHERE $tblVideo.category_id = $tblCategory.category_id AND ";
foreach($terms as $t) {
    $sql .= "title LIKE '%$t%' AND ";
}

$sql = rtrim($sql, "AND ");

//execute the query
$query = $conn->query($sql);

//handle errors
if(!$query) {
    $error = "Selection failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

?>

<!--HTML Starts Here-->
<!DOCTYPE html>
<html>
<Head>
    <link rel="stylesheet" href="www/css/Stylesheet.css">
    <title>Home Page</title>
</Head>

<h2>Game('s) search results for: '<?= $term ?>'</h2>
<?php
if($query->num_rows == 0) {
    echo "Your search '$term' did not match any games in our inventory.";
    include 'includes/footer.php';
    exit();
}
?>
<div class="videolist">
    <div class="row header">
        <div class="col1">Title</div>
        <div class="col2">Image</div>
        <div class="col3">Company</div>
        <div class="col4">Genres</div>
        <div class="col5">Price</div>
    </div>
    <?php
    while($row = $query->fetch_assoc()) {
        ?>
        <div class="row">

            <div class="col1"><a href="details.php?id=<?= $row['id']?>"><?= $row['title'] ?></a></div>
            <div class="col2"><img src="<?= $row['image'] ?>" width="100" height="100"></div>
            <div class="col3"><?= $row['company'] ?></div>
            <div class="col4"><?= $row['category'] ?></div>
            <div class="col5"><?= $row['price'] ?></div>
        </div>
        <?php
    }
    ?>
</div>




<!--Footer Starts here-->
<?php
include ('includes/footer.php');
?>

