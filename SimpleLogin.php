<?php
include('BootlegZon.php');
session_start();
?>

<html lang="en">

<head>
<title>Nebula Knick Knacks Shopping Cart</title>
<link rel = "stylesheet" type = "text/css" href = "style.css"/>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
<div class="storehead">
      <img src="WebsiteLogo.png" alt="Orbital Enterprises" id="logo">
</div>
<div class="space"></div>

<?php
# This file creates a blank page allowing displayLogin() to show a username/password entry form.
echo "<link rel = \"stylesheet\" type = \"text/css\" href = \"style.css\"/>";
$obj = $_SESSION['object'];
#$obj->displayProcessing();
$obj->displayLogin();
# $obj->table = 'customers';

?>