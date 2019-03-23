<html lang="en">

<?php
# session_start();
# $_SESSION['uname'] = $_POST['uname']; ?>
  <head>
    <title>Rockingham Random-Salt Repo</title>
  </head>

  <body>
    <?php
#ini_set('display_errors',1);
#error_reporting(-1);
    include('LoginArea.php');
    $obj = new LoginArea();
    if (isset($_POST["uname"])) {
      $obj->displayProcessing();
      #$obj->displayLogin();
      $obj->user = 'root';
      $obj->password = 'root';
      $obj->dbase = 'store';
      $obj->host = 'localhost';
      $obj->port = 8889;
      $obj->table = 'customers';
      $obj->connDB();
      $obj->table = 'merchandise';
      $obj->showMerch();
    }
    else {
      $obj->displayLogin();
    }


     ?>

  </body>

</html>
