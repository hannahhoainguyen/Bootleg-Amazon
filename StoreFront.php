<html lang="en">
<!-- This is the main "jump off" page. It brings in the BootlegZon class and creates a new object out of it, and then starts working by calling the object's methods. -->

<?php
session_start();
# Session testing
# $animal = "cat";
# $_SESSION['toonses'] = $animal;
?>
  <head>
    <title>Nebula Knick-Knacks</title>
  </head>

  <body>
  <h1>Nebula Knick-Knacks</h1>
  <h3><i>Orbital Enterprises Beta Website for CS205 Final Project</i></h3>

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
      echo '<a href="logout.php" >Logout</a><p>';

      # Set up connection to database
      $obj->displayProcessing();
      $obj->user = 'bfsmith_reader';
      $obj->password = 'Xm8av2CKT7rSG2k7';
      $obj->dbase = 'BFSMITH_STORE';
      $obj->host = '132.198.101.199';
      $obj->port = 3306;
      $obj->table = 'customers';
      #$obj->connDB();
      $obj->table = 'merchandise';
      $_SESSION['uname'] = $_POST[uname];

      # Show the main page
      $obj->showMerch();
    }

    # Set up main page when a user is *not* logged in
    else {
      echo "<i>Users can create an account at a link coming soon!</i> <p>";
      echo '<a href = "SimpleLogin.php">Sign in</a><br>';
      $obj->displayProcessing();
      $obj->user = 'bfsmith_reader';
      $obj->password = 'Xm8av2CKT7rSG2k7';
      $obj->dbase = 'BFSMITH_STORE';
      $obj->host = '132.198.101.199';
      $obj->port = 3306;
      $obj->table = 'customers';
      #$obj->connDB();
      $obj->table = 'merchandise';

      # Show the main page
      $obj->showMerch();
    }
     ?>

  </body>
</html>
