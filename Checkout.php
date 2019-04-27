<?php
include('BootlegZon.php');
session_start();

/* This page simply attempts to log in the user. If success, it emits a message indicating this and allows the user to follow a link back to the store. If the login fails, the userAuth() method shunts the user to the BadUserPassword.php page.
*/
$total = $_SESSION['totalCost'];
$obj = $_SESSION['object'];
$obj1 = new BootlegZon();
$obj1->user = 'bfsmith_writer';
$obj1->password = 'd7WJWjLABFHzCqv8';
$obj1->dbase = 'BFSMITH_STORE';
$obj1->host = '132.198.101.199';
$obj1->port = 3306;
$chkBoxes4Buy = $_SESSION['chkBoxes4Buy'];
echo "Checkout page<p><p>";
echo "Here's the total cost of your items: $" . $total;
echo "<p>";
$obj->changeQuant($chkBoxes4Buy);
//echo "Here you can see the item numbers: <p>";
//foreach ($chkBoxes4Buy as $value) {
//    echo $value;
//    echo "<br>";
    // code...
echo "Thanks for shopping with Nebula Knick Knacks. Have an out of this world day!";
//}
# $obj->userAuth();
# $_SESSION['uname'] = $_POST[uname];
echo '<p><a href="StoreFront.php">Back to store</a><p>';
?>
