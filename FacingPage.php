<html lang="en">

<?php
session_start();
$animal = "cat";
$_SESSION['toonses'] = $animal;
?>
  <head>
    <title>Rockingham Random-Salt Repo</title>
  </head>

  <body>
    <?php
#ini_set('display_errors',1);
#error_reporting(-1);
    include('BootlegZon.php');
    $obj = new BootlegZon();
    if (isset($_POST["uname"])) {
      $username = $_POST["uname"];
      echo "<i>" . $username . "</i> is logged in. <p>";
      $obj->displayProcessing();
      $obj->user = 'bfsmith_reader';
      $obj->password = 'Xm8av2CKT7rSG2k7';
      $obj->dbase = 'BFSMITH_STORE';
      $obj->host = '132.198.101.199';
      $obj->port = 3306;
      $obj->table = 'customers';
      $obj->connDB();
      $obj->table = 'merchandise';
      $_SESSION['uname'] = $_POST[uname];

      $obj->showMerch();

    }
    else {
      echo "<i>Users can log in at a link coming soon!</i> <p>";
      echo '<a href = "simple_login.php">Sign in</a>';
      $obj->displayProcessing();
      $obj->user = 'bfsmith_reader';
      $obj->password = 'Xm8av2CKT7rSG2k7';
      $obj->dbase = 'BFSMITH_STORE';
      $obj->host = '132.198.101.199';
      $obj->port = 3306;
      $obj->table = 'customers';
      $obj->connDB();
      $obj->table = 'merchandise';
      $obj->showMerch();

      #$obj->displayLogin();
    }


     ?>

  </body>

</html>
