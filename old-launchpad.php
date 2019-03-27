<html> 

  <head>
    <title>Rockingham Random-Salt Repo</title>
  </head>

  <body>
    <?php
    #ini_set('display_errors',1);
    #error_reporting(-1);

    #include('LoginArea.php');
    include('/users/b/f/bfsmith/www-root/LoginArea.php');
    $obj = new LoginArea();
    if (isset($_POST["uname"])) {
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
    }
    else {
      $obj->displayLogin();
    }


     ?>

  </body>

</html>
