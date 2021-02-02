<?php
/**
 * Authors: Ryan Stump, Parker Staph, Alex Young, Sean Birkle
 */

$page_title = "Index";
$page_name = "Search Used Games";

//Header of the webpage
include ('includes/header.php');
?>

<!-- Search Form-->
<form action="searchGameResults.php" method="get">
    <input type="text" name="q" size="40" required />&nbsp;&nbsp;
    <input type="submit" name="Submit" id="Submit" value="Search Games" />
</form>

<!--Footer Starts here-->
<?php
include ('includes/footer.php');
?>
</html>
<!--HTML Ends here-->

