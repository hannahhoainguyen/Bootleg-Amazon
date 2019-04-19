<!DOCTYPE html>

<html lang="en">

<?php
session_start();
$animal = "cat";
$_SESSION['toonses'] = $animal;
?>
  <head>
    <title>Nebula Knick-Knacks</title>
      <meta charset="utf-8">
      <meta name="author" content="Orbital Enterprises">
      <meta name="description" content="Selling our space-related merchandise">
      <link ref = "stylesheet" type = "text/css" href = "style.css"/>
  </head>

  <body>
  <div class="storehead">
    <h1>Nebula Knick-Knacks</h1>
    <h3><i>Orbital Enterprises Beta Website for CS205 Final Project</i></h3>
        hello!


    <ul>
        <li><a class="active" href="#home">Home</a></li>
        <li><a href="#rockets">Rockets</a></li>
        <li><a href="#planets">Planets</a></li>
        <li><a href="#apparel">Apparel</a></li>
    </ul>
  </div>

    <?php
#ini_set('display_errors',1);
#error_reporting(-1);
    include('BootlegZonTest.php');
    $obj = new BootlegZonTest();
    $_SESSION['object'] = $obj;
    if (isset($_SESSION["uname"])) {
      $username = $_SESSION["uname"];
      echo "<i>" . $username . "</i> is logged in via post. <p>";
      echo '<a href="logout.php" >Logout</a><p>';

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

      $obj->showMerch();
    }

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
      $obj->showMerch();

      #$obj->displayLogin();
    }


     ?>
<div class="clearfix"></div>
  </body>

</html>
