<?php session_start();

$username = $_SESSION['uname'];
$kitty = $_SESSION['toonses'];
?>

<html lang="en">

  <head>
    <title>Rockingham Random-Salt Repo Cart</title>
  </head>

  <body>
    <?php

    echo "Hello, this is the cart, " . $username . "<br>";
    echo "And here is the identity of toonses, " . $kitty;

     ?>

  </body>

</html>
