<?php
include('BootlegZon.php');
session_start();

# This file creates a blank page allowing displayLogin() to show a username/password entry form.
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"style.css\"/>";
$obj = $_SESSION['object'];
#$obj->displayProcessing();
$obj->displayLogin();
# $obj->table = 'customers';


?>