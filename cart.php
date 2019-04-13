<?php
session_start();
print_r($_SESSION);
print_r($_SESSION['checkbox']);
include('BootlegZon.php');

$username = $_SESSION['uname'];
$kitty = $_SESSION['toonses'];
$obj = $_SESSION['object'];
echo $_SESSION['checkbox[3]'];
var_dump($_SESSION);
var_dump($_POST);
foreach($_POST['checkbox'] as $selected){
echo $selected."</br>";
}
# So far, checkbox[] has NULL values in it. Why?

?>

<html lang="en">

  <head>
    <title>Nebula Knick Knacks Shopping Cart</title>
  </head>

  <body>
    <?php

    echo "Hello, this is the cart, " . $username . "<br>";
    echo "And here is the identity of toonses, " . $kitty . "<br>";
    echo "Hello again.<br>";

    #if (isset($_POST['Headphones'])) {
    #    echo "So you want headphones?";
    #}

    $obj = new BootlegZon();
    $obj->user = 'bfsmith_reader';
    $obj->password = 'Xm8av2CKT7rSG2k7';
    $obj->dbase = 'BFSMITH_STORE';
    $obj->host = '132.198.101.199';
    $obj->port = 3306;


      // Don't really need to do this in cart. Causing error
      #$obj->table = 'customers';
      #$obj->connDB();
      #$obj->table = 'merchandise';
      $obj->showCart();
      # session_destroy();
     ?>

  </body>
</html>
