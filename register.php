<?php

if(!$_POST) {
    $error = "Server is down, contact admin";
    header("Location: error.php?m=$error");
    die();
}

require_once 'includes/database.php' ;

$firstname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)));
$lastname = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING)));
$username = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING)));
$password = $conn->real_escape_string(trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING)));

$role = 2;
$sql = "INSERT INTO users VALUES (NULL, '$firstname', '$lastname', '$username', '$password', '$role')";
$query = @$conn->query($sql);

if (!$query) {
    $error = "Insertion failed: $error = $conn->error.";
    $conn->close();
    header("Location: error.php?m=$error");
    die();
}
$conn->close();

//start session if it has not already started
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}
//create session variables
$_SESSION['login'] = $username;
$_SESSION['name'] = "$firstname $lastname";
$_SESSION['role'] = 2;

//set login status to 3 since this is a new user.
$_SESSION['login_status'] = 3;

//redirect the user to the loginform.php page
header("Location:loginform.php");
