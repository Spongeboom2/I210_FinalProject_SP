<?php

require_once'includes/database.php';
$page_name = "come back soon!";
$page_title = "Logout";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['login_status'] = 2;
$username = $passcode = "";

if (isset($_POST['username']))
    $username = $conn->real_escape_string(trim($_POST['username']));

if (isset($_POST['password']))
    $password = $conn->real_escape_string(trim($_POST['password']));

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$query = $conn->query($sql);

if($query->num_rows) {
    $row = $query->fetch_assoc();
    $_SESSION['login'] = $username;
    $_SESSION['name'] = $row['firstname'] . " " . $row['lastname'];
    $_SESSION['role'] = $row['role'];
    $_SESSION['login_status'] = 1;
}

$conn->close();

header("Location: loginform.php");
