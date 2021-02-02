<?php
//Form for adding games.
require 'includes/library.php';
if(!is_admin()) {
    $error = "Access to this page is permitted for administrators only.";
    header("Location: error.php?m=$error");
    exit;
}
$page_title = "ADMINS ONLY";
$page_name = "Come and Add a game to our inventory!";
require_once 'includes/header.php';


?>

<h2>Add New Game</h2>

<div id="addGame">
    <form  margin="auto" action="insertgame.php" method="post" style="center">
        <table cellspacing="0" cellpadding="3" style="border: 1px solid silver; padding:5px; margin-bottom: 10px">
            <tr>
                <td style="text-align: right; width: 100px">Title: </td>
                <td><input name="title" type="text" size="100" required /></td>
            </tr>
            <tr>
                <td style="text-align: right">Company: </td>
                <td><input name="company" type="text" size="40" required /></td>
            </tr>
            <tr>
                <td style="text-align: right">Category:</td>
                <td>
                    <select name="category">
                        <option value="1">RPG</option>
                        <option value="2">FPS</option>
                        <option value="3">Horror</option>
                        <option value="4">MMO</option>
                        <option value="5">Party</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td style="text-align: right">Release date: </td>
                <td><input name="release_date" type="text" required /></td>
            </tr>
            <tr>
                <td style="text-align: right">Publisher:</td>
                <td><input name="publisher" type="text" required /></td>
            </tr>
            <tr>
                <td style="text-align: right">Price: </td>
                <td><input name="price" type="number" step="0.01" required /></td>
            </tr>
            <tr>
                <td style="text-align: right">Image: </td>
                <td><input name="image" type="text" size="100" required /></td>
            </tr>
            <tr>
                <td style="text-align: right; vertical-align: top">Description:</td>
                <td><textarea name="description" rows="6" cols="65"></textarea></td>
            </tr>
        </table>
</div>
        <div>
            <input type="submit" value="Add Game" />
            <input type="button" value="Cancel" onclick="window.location.href='inventory.php'" />
        </div>
</form>

<?php
require_once 'includes/footer.php';