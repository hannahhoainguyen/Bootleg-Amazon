<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$animal = "cat";
$_SESSION['toonses'] = $animal;
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
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

<!-- <ul>
    <li><a class="active" href="#home">Home</a></li>
    <li><a href="#rockets">Rockets</a></li>
    <li><a href="#planets">Planets</a></li>
    <li><a href="#apparel">Apparel</a></li>
  </ul> -->

<?php
#ini_set('display_errors',1);
#error_reporting(-1);
    include('BootlegZonTestBarry.php');
    $obj = new BootlegZonTestBarry();
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
</body>
</html>
