<?php


if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

//check for session variable named cart
if(isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = array();
}

//retrieve ID
$id='';

if(filter_has_var(INPUT_GET, 'id')) {
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
}

//handling errors
if($id == false) {
    $error = "Invalid book id detected. Operation cannot proceed.";
    header("Location:error.php?m=$error");
    die();
}

//determine if the id already exists in the array
if(array_key_exists($id, $cart)) {
    $cart[$id] = $cart[$id] + 1;
} else {
    $cart[$id] = 1;
}

//update the session variable
$_SESSION['cart'] = $cart;


/*Used for testing the add to cart button
var_dump($_SESSION['cart']);
exit;
*/


//redirect user to showcart.php
header("Location:showcart.php");