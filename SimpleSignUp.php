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

<?php
# This file creates a blank page allowing the displaySignUp() to show a username/password entry form.

$obj = $_SESSION['object'];
#$obj->displayProcessing();
$obj->displaySignUp();
# $obj->table = 'customers';


?>