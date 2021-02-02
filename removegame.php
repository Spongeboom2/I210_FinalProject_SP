<?php

$page_title = "Delete Game";
require_once 'includes/header.php';
require_once 'includes/database.php';

//if book id cannot retrieved, terminate the script.
if (!filter_has_var(INPUT_GET, 'id')) {
    $error = "There was a problem retrieving book id.";
    header("Location: error.php?m=$error");
    die();
}

//retrieve book id from a query string variable.
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

//define the sql statement
$sql = "DELETE FROM $tblVideo WHERE id=$id";

//execute the query
$query = $conn->query($sql);

//handling errors
if(!$query) {
    $error = "Deletion failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

echo "<p> The video game has been successfully deleted from the database.";
require_once'includes/footer.php';