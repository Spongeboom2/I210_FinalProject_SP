<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(!isset($_SESSION['login'])) {
    header("Location:loginform.php");
    exit;
}

$_SESSION['cart'] = array();

//page title
$page_title = "Checkout";
$page_name = "Galaxy Games";
//display header
require_once 'includes/header.php';

?>

<h2>Checkout<h2>
<p>Thank you for shopping at GALAXY GAMES! You will be notified when the items are shipped.</p>

<?php
require_once 'includes/footer.php';

