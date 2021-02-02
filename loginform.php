<?php

$page_title = "Login Page";
$page_name = "Hello";
require_once 'includes/header.php';
?>
<h2>Login or Register Page for Galaxy Games</h2>

<?php
$message = "Please enter your username and password to login.";

$login_status = '';
if(isset($_SESSION['login_status'])) {
    $login_status = $_SESSION['login_status'];
}

if($login_status == 1) {
    echo "<p>You are logged in as an " . $_SESSION['login'] . ".</p>";
    echo "<a href='logout.php'>Logout</a><br>";
    include_once 'includes/footer.php';
    exit;
}
if($login_status == 2) {
    $message = "Username or password invalid! Please try again.";
}
if($login_status == 3) {
    echo "<p> Account Created!</p>";
    echo "<a href='logout.php'>Logout</a><br>";
    include_once 'includes/footer.php';
    exit;
}
?>
<div class="login-container">
    <!-- display the login form -->
    <div style="display: inline-flex;">
        <form method='post' action='login.php'>
            <table>
                <tr>
					<td colspan="2"><?php echo $message; ?></br><br></td>
                </tr>
                <tr>    
                    <td style="width: 80px">User name: </td>
                    <td><input type='text' name='username' required></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type='password' name='password' required></td>
                </tr>
                <tr>
                    <td colspan='2' style="display: inline-flex;">
                        <input type='submit' value='  Login  '>
                        <input type="submit" name="Cancel" value="Cancel" onclick="window.location.href = 'inventory.php'" />
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <!-- display the registration form -->
    <div style="display: inline-flex;">
        <form action="register.php" method="post">
            <table>
                <tr>
                    <td colspan="2" align="left">Create an account here!<br><br></td>
                </tr>
                <tr>
                    <td style="width: 85px">First Name: </td>
                    <td><input name="firstname" type="text" required></td>
                </tr>
                <tr>
                    <td>Last Name: </td>
                    <td><input name="lastname" type="text" required></td>
                </tr>
                <tr>
                    <td>User Name: </td>
                    <td><input name="username" type="text" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input name="password" type="password" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="display: inline-flex;">
                        <input type="submit" value="Register" />
                        <input type="button" value="Cancel" onclick="window.location.href = 'inventory.php'" />
                    </td>
                </tr>
            </table>

        </form>
    </div>
</div>

<?php
include ('includes/footer.php');
