<?php

if (!$_POST) {
    $error = "Direct access to this script is not allowed.";
    header("Location: error.php?m=$error");
    die();
}

if (!filter_has_var(INPUT_POST, 'id')) {
    $error = "There was a problem retrieving book id.";
    header("Location: error.php?m=$error");
    die();
}

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);

//include code from the database.php file
require_once('includes/database.php');

$title = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
$company = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'company', FILTER_SANITIZE_STRING)));
$category_id = $conn->real_escape_string(filter_input(INPUT_POST, 'category', FILTER_DEFAULT));
$release_date = $conn->real_escape_string(filter_input(INPUT_POST, 'release_date', FILTER_DEFAULT));
$publisher = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'publisher', FILTER_SANITIZE_STRING)));
$price = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

$sql = "UPDATE $tblVideo SET title='$title', company='$company', release_date='$release_date',
        publisher ='$publisher', price='$price', image='$image', description='$description', category_id='$category_id'
        WHERE id=$id";


$query = $conn->query($sql);


if(!$query) {
    $error = "Update failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$conn->close();
header( "Location:details.php?id=$id&m=update");




