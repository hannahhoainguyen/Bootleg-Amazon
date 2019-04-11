<!DOCTYPE html>

<html lang="en">

<?php
session_start();
$animal = "cat";
$_SESSION['toonses'] = $animal;
?>
  <head>
    <title>Nebula Knick-Knacks</title>

    <style>
    div.gallery {
      border: 1px solid #ccc;
    }

    div.gallery:hover {
      border: 1px solid #777;
    }

    div.gallery img {
      width: auto;
      height: auto;
      justify-content: center;

    }

    div.desc {
      padding: 15px;
      text-align: center;
    }

    * {
      box-sizing: border-box;
    }

    .responsive {
      padding: 0 6px;
      float: left;
      width: 24.99999%;
    }

    @media only screen and (max-width: 700px) {
      .responsive {
        width: 49.99999%;
        margin: 6px 0;
      }
    }

    @media only screen and (max-width: 500px) {
      .responsive {
        width: 100%;
      }
    }

    .clearfix:after {
      content: "";
      display: table;
      clear: both;
    }

/* Navbar on side */
/* body {
margin: 0;
}

ul {
list-style-type: none;
margin: 0;
padding: 0;
width: 25%;
background-color: #f1f1f1;
position: fixed;
height: 100%;
overflow: auto;
}

li a {
display: block;
color: #000;
padding: 8px 16px;
text-decoration: none;
}

li a.active {
background-color: #4CAF50;
color: white;
}

li a:hover:not(.active) {
background-color: #555;
color: white;
}
*/

    </style>

  </head>

  <body>
  <h1>Nebula Knick-Knacks</h1>
  <h3><i>Orbital Enterprises Beta Website for CS205 Final Project</i></h3>
  hello!


  <ul>
    <li><a class="active" href="#home">Home</a></li>
    <li><a href="#rockets">Rockets</a></li>
    <li><a href="#planets">Planets</a></li>
    <li><a href="#apparel">Apparel</a></li>
  </ul>


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
