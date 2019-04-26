include('BootlegZon.php');
session_start();

/* This page simply attempts to log in the user. If success, it emits a message indicating this and allows the user to follow a link back to the store. If the login fails, the userAuth() method shunts the user to the BadUserPassword.php page.
*/
$obj = $_SESSION['object'];
$total = $_SESSION['totalCost'];
$chkBoxes4Buy = $_SESSION['chkBoxes4Buy'];
echo "Checkout page<p><p>";
echo "Here's the total cost of your items: $" . $total;
echo "<p>";

echo "Here you can see the item numbers: <p>";
foreach ($chkBoxes4Buy as $value) {
    echo $value;
    echo "<br>";
    // code...
}
# $obj->userAuth();
# $_SESSION['uname'] = $_POST[uname];
echo '<p><a href="StoreFront.php">Back to store</a><p>';
?>
