<?php
include('BootlegZon.php');
session_start();

$obj = $_SESSION['object'];
echo "Check Login page";
/*if ($_POST(uname)) {
    $obj->connDB();
    #echo $obj->continue;
}
else {
    header('StoreFront.php');
} */
$obj->connDB();
#$obj->table = 'merchandise';
$_SESSION['uname'] = $_POST[uname];
#header("Location: StoreFront.php");
#$obj->showMerch();
echo '<p><a href="StoreFront.php">Back to store</a><p>';

?>