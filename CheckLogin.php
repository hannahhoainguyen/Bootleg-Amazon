<?php
include('BootlegZon.php');
session_start();

/* This page simply attempts to log in the user. If success, it emits a message indicating this and allows the user to follow a link back to the store. If the login fails, the userAuth() method shunts the user to the BadUserPassword.php page.
*/
$obj = $_SESSION['object'];
echo "Check Login page<p><p>";
$obj->userAuth();
$_SESSION['uname'] = $_POST[uname];
echo '<p><a href="StoreFront.php">Back to store</a><p>';
?>
