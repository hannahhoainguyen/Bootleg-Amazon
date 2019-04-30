<?php
include('BootlegZon.php');
session_start();
// This is the checkout page; users come here after checking out from Shopping Cart
?>

<html lang="en">

<head>
<title>Nebula Knick Knacks Checkout Page</title>
<link rel = "stylesheet" type = "text/css" href = "style.css"/>
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
<div class="storehead">
      <img src="WebsiteLogo.png" alt="Orbital Enterprises" id="logo">
</div>
<div class="space"></div>

<?php

$total = $_SESSION['totalCost'];
$obj = $_SESSION['object'];

# Again, making a new object. Probably unnecessary, since we carry one over in session
$obj1 = new BootlegZon();
$obj1->user = 'bfsmith_writer';
$obj1->password = 'd7WJWjLABFHzCqv8';
$obj1->dbase = 'BFSMITH_STORE';
$obj1->host = '132.198.101.199';
$obj1->port = 3306;

# Grab item IDs from SESSION
$chkBoxes4Buy = $_SESSION['chkBoxes4Buy'];
echo "Checkout page<p><p>";
echo "Here's the total cost of your items: $" . $total;
echo "<p>";
$obj->changeQuant($chkBoxes4Buy);

echo "Thanks for shopping with Nebula Knick Knacks. Have an out of this world day!";

echo '<p><a href="StoreFront.php"  id="back">Back to store</a><p>';
?>
