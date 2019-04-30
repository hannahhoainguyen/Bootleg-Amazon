<?php
session_start();

/* This is the Cart page - the Shopping Cart. This is where users arrive after
pressing the "View cart" button at the bottom of the StoreFront page.
*/
include('BootlegZon.php');
$checkBoxArray = $_POST['checkbox'];

$username = $_SESSION['uname'];

# Debugging
# $kitty = $_SESSION['Toonces'];

# Get the BootlegZon object stored in the $_SESSION
$obj = $_SESSION['object'];

?>

<!-- Start web page   Start web page   Start web page     -->
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

    # Created a new object - not sure this was necessary
    $obj = new BootlegZon();
    $obj->user = 'bfsmith_writer';
    $obj->password = 'd7WJWjLABFHzCqv8';
    $obj->dbase = 'BFSMITH_STORE';
    $obj->host = '132.198.101.199';
    $obj->port = 3306;

    # Show the cart, via a method from the BootlegZon class
    $obj->showCart($checkBoxArray);

    echo "<p>";
    echo "<hr>";
    echo "<p>";
    echo '<p><a href="StoreFront.php" id="back">Back to store</a><p>';

    ?>
  </body>
</html>
