<?php
/**
 * Authors: Ryan Stump, Parker Staph, Alex Young, Sean Birkle
   THIS IS ALSO THE MASTER PAGE AS NEEDED FOR THE DRAFT 1 */
$page = 'ourGames';
$page_title = "Ah yes come and look at my wares.";
$page_name = "Planet Gaming Inventory!";

//Header of the webpage
require 'includes/header.php';
require_once 'includes/database.php';

//Testing code
$limit = 4;
if(isset($_GET["page"])) {
    $p = $_GET["page"];
}
else {
    $p = 1;
};

$start_from = ($p-1) * $limit;

//SELECT statement to retrieve game id, title, author, price, and category id from the books table
$sql = "SELECT id, title, company, price, category, image FROM $tblVideo, $tblCategory WHERE $tblVideo.category_id = $tblCategory.category_id LIMIT $start_from, $limit";


//execute the query
$query = $conn->query($sql);

//handle errors
if(!$query) {
    $error = "Selection failed: " . $conn->error;
    header("Location:error.php?m=$error");
    $conn->close();
    die();
}
?>

<h2>What're ya buying?</h2>
<div class="videolist">
    <div class="row header">
        <div class="col1">Title</div>
        <div class="col2">Image</div>
        <div class="col3">Company</div>
        <div class="col4">Genres</div>
        <div class="col5">Price</div>
    </div>
    <?php
    while($row = mysqli_fetch_array($query)) {
        ?>
        <div style="display:flex; ">

            <div class="col1"><a href="details.php?id=<?= $row['id']?>"><?= $row['title'] ?></a></div>
            <div class="col2"><img src="<?= $row['image'] ?>" width="100" height="100"></div>
            <div class="col3"><?= $row['company'] ?></div>
            <div class="col4"><?= $row['category'] ?></div>
            <div class="col5"><?= $row['price'] ?></div>
        </div>
        <?php
        }
        ?>

        <?php
        $result_db = mysqli_query($conn,"SELECT COUNT(id) FROM $tblVideo");
        $row_db = mysqli_fetch_row($result_db);
        $total_records = $row_db[0];
        $total_pages = ceil($total_records / $limit);
        $pagLink = "<ul class='pagination'>";
        for ($i=1; $i<=$total_pages; $i++) {
            $pagLink .= "<li class='page-item'><a class='page-link' href='inventory.php?page=".$i."'>".$i."</a></li>";
        }
        echo $pagLink . "</ul>";

        ?>
</div>

<?php
include('includes/footer.php');
?>


