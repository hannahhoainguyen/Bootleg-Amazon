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

    <style type="text/css">

    ul {
      list-style-type: none;
    }

    li {
      display: inline-block;
    }

    input[type="checkbox"][id^="cb"] {
      display: none;
    }

    label {
      border: 1px solid #fff;
      padding: 10px;
      display: block;
      position: relative;
      margin: 10px;
      cursor: pointer;
      -webkit-touch-callout: none;
      -webkit-user-select: none;
      -khtml-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    label::before {
      background-color: white;
      color: white;
      content: " ";
      display: block;
      border-radius: 50%;
      border: 1px solid grey;
      position: absolute;
      top: -5px;
      left: -5px;
      width: 25px;
      height: 25px;
      text-align: center;
      line-height: 28px;
      transition-duration: 0.4s;
      transform: scale(0);
    }

    label img {
      height: 200px;
      width: 200px;
      transition-duration: 0.2s;
      transform-origin: 50% 50%;
    }

    :checked+label {
      border-color: #ddd;
    }

    :checked+label::before {
      content: "✓";
      background-color: grey;
      transform: scale(1);
    }

    :checked+label img {
      transform: scale(0.9);
      box-shadow: 0 0 5px #333;
      z-index: -1;
    }

    </style>

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
      echo '<a href = "SimpleLogin.php">Sign in</a><p>';
      echo '<a href = "SimpleSignUp.php">Create a new account</a><p>';
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
