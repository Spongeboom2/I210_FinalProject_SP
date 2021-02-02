<?php
/**
 * Authors: Ryan Stump, Parker Staph, Alex Young, Sean Birkle
 */

$page_title = "Shopping Cart";
$page_name = "Hello";

//Header of the webpage
require_once ('includes/header.php');
require_once('includes/database.php');

if (!isset($_SESSION['cart']) || !$_SESSION['cart']) {
    echo "Your shopping cart is empty.<br><br>";
    include('includes/footer.php');
    exit();
}

//proceed since the cart is not empty
$cart = $_SESSION['cart'];

?>
<h2> Users shopping cart</h2>
<!--  display shopping cart content -->
<div class="videolist">
    <div class="row header">
        <div class="col1">Title</div>
        <div class="col2">Price</div>
        <div class="col3">Quantity</div>
        <div class="col4">Subtotal</div>
        <div class="col5">Delete</div>
    </div>

    <?php
    //select statement
    $sql = "SELECT id, title, price FROM videogames WHERE 0";
    foreach(array_keys($cart) as $id) {
        $sql .= " OR id=$id";
    }
    //execute the query
    $query = $conn->query($sql);

    //fetch inventory
    while ($row = $query->fetch_assoc()) {
    $id = $row['id'];
    $title = $row['title'];
    $price = $row['price'];
    $qty = $cart[$id];
    $subtotal = $qty * $price;
    ?>
    <div class="row">
        <br>
        <div class="col1"><a href="videodetails.php?id=<?= $id ?>"><?= $title ?></a></div>
        <div class="col2"><?= $price ?></div>
        <div class="col3"><?= $qty ?></div>
        <div class="col4">$<?php printf("%.2f", $subtotal) ?></div>
        <div class="col5">
            <form action="showcart.php" method="get">
                <button type="submit" name="deleteyo" value="Submit">Delete</button>
            </form>
        </div>
    </div>
        <?php
        } ?>
        <?php
        if(isset($_GET['deleteyo'])) {
            unset($_SESSION['cart'][$id]);
        }

        ?>
    </div>

    <div class="row">
    <input type="button" value="Checkout" onclick="window.location.href = 'checkout.php'"/>
    <input type="button" value="Cancel" onclick="window.location.href = 'inventory.php'"/>
</div>
<br><br>


<!--Footer Starts here-->
<?php
include ('includes/footer.php');
?>

