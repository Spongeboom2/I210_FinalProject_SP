<?php
// Adding game code please do not touch c:
if (!$_POST) {
    $error = "Direct access to this script is not allowed.";
    header("Location: error.php?m=$error");
    die();
}

if (!filter_has_var(INPUT_POST, 'title') ||
        !filter_has_var(INPUT_POST, 'company') ||
        !filter_has_var(INPUT_POST, 'category') ||
        !filter_has_var(INPUT_POST, 'release_date') ||
        !filter_has_var(INPUT_POST, 'publisher') ||
        !filter_has_var(INPUT_POST, 'price') ||
        !filter_has_var(INPUT_POST, 'image') ||
        !filter_has_var(INPUT_POST, 'description')) {
    
    echo "There were problems retrieving game details. New Game cannot be added.";
    header("Location: error.php?m=$error");
    die();
}

require_once 'includes/database.php';
$title = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING)));
$company = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'company', FILTER_SANITIZE_STRING)));
$category = $conn->real_escape_string(filter_input(INPUT_POST, 'category', FILTER_DEFAULT));
$release_date = $conn->real_escape_string(filter_input(INPUT_POST, 'release_date', FILTER_DEFAULT));
$publisher = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'publisher', FILTER_SANITIZE_STRING)));
$price = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING)));
$image = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING)));
$description = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING)));

$sql = "INSERT INTO $tblVideo VALUES (NULL, '$title', '$company', '$release_date', '$publisher', '$price', '$category',
            '$image', '$description')";

$query = @$conn->query($sql);

if(!$query) {
    $error = "Insertion failed: " . $conn->error;
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}

$id = $conn->insert_id;

//close the database connection
$conn->close();
header("Location:details.php?id=$id&m=insert");