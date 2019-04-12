<?php
include('BootlegZon.php');
session_start();

# This file creates a blank page allowing the displaySignUp() to show a username/password entry form.

$obj = $_SESSION['object'];
#$obj->displayProcessing();
$obj->displaySignUp();
# $obj->table = 'customers';


?>