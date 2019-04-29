<html lang="en">
<!-- This is the main "jump off" page. It brings in the BootlegZon class and creates a new object out of it, and then starts working by calling the object's methods. -->

<?php
session_start();
# Session testing
# $animal = "cat";
# $_SESSION['Toonces'] = $animal;
?>
  <head>
    <title>Nebula Knick-Knacks</title>
    <meta charset="utf-8">
    <meta name="author" content="Orbital Enterprises">
    <meta name="description" content="Selling our space-related merchandise">
    <link rel = "stylesheet" type = "text/css" href = "style.css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

  </head>
  <div class="storehead">
      <img src="WebsiteLogo.png" alt="Orbital Enterprises" id="logo">

 <body>

    <?php
    #ini_set('display_errors',1);
    #error_reporting(-1);

    include('BootlegZon.php');
    $obj = new BootlegZon();

    # Put our new object in the session array, so we can travel around web pages with it
    $_SESSION['object'] = $obj;

    # Set up main page when a user is logged in
    if (isset($_SESSION["uname"])) {
      $username = $_SESSION["uname"];
      echo "<i>" . $username . "</i> is logged in via post. <p>";
      echo '<a href="Logout.php" >Logout</a><p>';

      # Set up connection to database
      $obj->displayProcessing();
      $obj->user = 'bfsmith_reader';
      $obj->password = 'Xm8av2CKT7rSG2k7';
      $obj->dbase = 'BFSMITH_STORE';
      $obj->host = '132.198.101.199';
      $obj->port = 3306;
      $obj->table = 'customers';
      #$obj->userAuth();
      $obj->table = 'merchandise';
      #$_SESSION['uname'] = $_POST[uname];

      # Show the main page
      $obj->showMerch();
    }

    # Set up main page when a user is *not* logged in
    else {
      #echo '<a href = "SimpleLogin.php">Sign in</a><p>';
      #echo '<a href = "SimpleSignUp.php">Create a new account</a><p>';
      echo '<a href = "SimpleLogin.php" id="login" class="button">Sign in</a>';
      echo '<a href = "SimpleSignUp.php" id="signup" class="button">Create a new account</a>';
      echo '<a href = "#Cart"><img src="Cart.png" id="cart"></a><br></div>';
      echo '<div class="space"></div>';
      $obj->displayProcessing();
      $obj->user = 'bfsmith_reader';
      $obj->password = 'Xm8av2CKT7rSG2k7';
      $obj->dbase = 'BFSMITH_STORE';
      $obj->host = '132.198.101.199';
      $obj->port = 3306;
      $obj->table = 'customers';
      #$obj->userAuth();
      $obj->table = 'merchandise';

      # Show the main page
      $obj->showMerch();
    }
     ?>

  </body>
</html>
