<?php
include('BootlegZon.php');
session_start();

# This file creates a blank page allowing displayLogin() to show a username/password entry form.

$obj = $_SESSION['object'];
#$obj->displayProcessing();
$obj->displayLogin();
# $obj->table = 'customers';


?>