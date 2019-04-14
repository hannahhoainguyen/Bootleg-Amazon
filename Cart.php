<?php
session_start();

# Debugging
print_r($_SESSION);
echo "<p>";
echo "just printed the whole session<br>";
print_r($_SESSION['checkbox']);
echo "just printed checkbox?<br>";
echo $_SESSION['checkbox'][0];
echo $_SESSION['checkbox'][1];
echo "<p>";

include('BootlegZon.php');
$checkBoxArray = $_POST['checkbox'];

$username = $_SESSION['uname'];
$obj = $_SESSION['object'];
# $obj->displaySignUp();

# Debugging
$kitty = $_SESSION['Toonces'];

# Get the BootlegZon object stored in the $_SESSION
$obj = $_SESSION['object'];

# Debugging
var_dump($_SESSION);
var_dump($_POST);

# Debugging
echo "<p>";
foreach($_POST['checkbox'] as $selected){
echo "Here" . $selected."<br>";
}
?>

<!-- Start web page   Start web page   Start web page     -->
<html lang="en">

  <head>
    <title>Nebula Knick Knacks Shopping Cart</title>
  </head>

  <body>

    <?php
    # Debugging
    echo "Hello, this is the cart, " . $username . "<br>";
    echo "And here is the identity of Toonces, " . $kitty . "<br>";
    echo "Hello again.<br>";

     print_r($checkBoxArray);
     print_r($_SESSION['checkbox']);

    $obj = new BootlegZon();
    $obj->user = 'bfsmith_writer';
    $obj->password = 'd7WJWjLABFHzCqv8';
    $obj->dbase = 'BFSMITH_STORE';
    $obj->host = '132.198.101.199';
    $obj->port = 3306;


     #$obj->showCart();
     $obj->showCart($checkBoxArray);

    ?>
  </body>
</html>
