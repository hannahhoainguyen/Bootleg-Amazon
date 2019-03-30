<?php
include('BootlegZon.php');
session_start();
#echo "hello";
$obj = $_SESSION['object'];
#$obj->displayProcessing();
$obj->displayLogin();
$obj->connDB();


?>