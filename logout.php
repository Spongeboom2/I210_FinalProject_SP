<?php
/**
 *Author: Parker Staph
 *Date: 12/9/2020
 *File: logout.php
 *Description: logout
 */

$page_title = "Logout";
$page_name = "See you soon!";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//unset variables
$_SESSION = array();

//delete the session cookie
setcookie(session_name(), "", time()-60);

//destory the session
session_destroy();

$page_title = "PHP online bookstore logout";
include_once 'includes/header.php';
?>
<h2>Logout</h2>
<p>Thank you for visit. You are now logged out.</p>

<?php
include_once 'includes/footer.php'
?>