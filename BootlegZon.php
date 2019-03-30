<?php
#session_start();

$animal = "cat";
#$_SESSION['uname'] = $_POST[uname];
#$_SESSION['toonses'] = $animal;
 print_r($_SESSION);

class BootlegZon {

    var $user;
    var $password;
    var $dbase;
    var $host;
    var $port;
    var $continue;
    var $table;

    public function displayLogin() {
        echo "<h1>Rockingham Random-Salt Repo</h1>";
        echo "<h3><i>Testing PHP for CS205 Final Project</i></h3>";
	echo "<hr><br>";

	echo "<form action=\"\" method=\"POST\" id='inputForm' name=\"userLogin\">";
	echo "<fieldset>";
	echo "<legend>Rockingham Store Login Page</legend>";
	echo "<label for=\"name\">Username:</label><input type='text' id=\"uname\" name='uname'>";
	echo "<label for=\"name\">Password:</label><input type='password' id=\"upasswd\" name='upasswd'>";
	echo "<input type=\"submit\" name = 'Submit' value = 'Submit'>";
	echo "</fieldset>";
	echo "</form>";

	#FORMDATA;
	} // end displayLogin function


    public function displayProcessing() {
        # Looks like I'm just using this to start a new html page.
	} // end displayProcessing


    public function connDB() {

        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbase, $this->port);

        $username = $_POST[uname];
        $upasswd = $_POST[upasswd];
        #$username = 'barry';
        #$upasswd = 'passb';
        if (mysqli_connect_errno()) {
            printf("What? Connect error: %s\n", mysqli_connect_errno());
            exit();
        }
        $this->continue = FALSE;
        $query = "Select * FROM ".$this->table." WHERE name = '".$username."' AND passwd = '".$upasswd."';";
        $credentials = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if (mysqli_num_rows($credentials) > 0) {
            echo "Status: User <i> ".$username. " </i> is now logged in.";
            $continue = TRUE;
        }

        if ($continue == FALSE){
            echo "Username/password combination not in system.";
            /* Do something like (one possibility):

             * $URL = 'baduser_pw.php';
             * header("Location: $URL");
             return;

             Put some kind of return button in here. This brings user to a
             separate web page.
            */
        }

        mysqli_free_result($credentials);

    } // end connDB

    public function showMerch() {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbase, $this->port);
        //display the records in a table
        echo "<hr>";
        echo "<h3>Merchandise:</h3>";
        echo "<table border = '1'>";

        //display table headers
        echo "<tr>
        <th>Choose</th>
        <th>ID</th>
        <th>Item</th>
        <th>Cost</th>
        <th>Quantity in Stock</th>
        <th>Detail</th>
        <th>Image</th>
        </tr>";

        $this->table = 'MERCH';
        $query = "Select * FROM ".$this->table.";";
        $items = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($items) > 0) {
        // Print out the items
            while($row = mysqli_fetch_assoc($items)) {
                echo "<tr>"
		    ."<td><input type=\"checkbox\" name=" .$row[item] .  "/>&nbsp;</td>"
		    ."<td>".$row[ID]."</td>"
		    ."<td>".$row[Item]."</td>"
		    ."<td>" .$row[Cost]. "</td>"
		    ."<td>".$row[Quantity]."</td>"
		    ."<td>".$row[Detail]."</td>"
            .'<td><img src="data:image/jpeg;base64,'.base64_encode($row[Img]).'"/></td>'
		    ."</tr>";
            }
        }
        mysqli_free_result($items);
        mysqli_close($conn);
        echo "</table>";

        # Button to show cart, which brings user to a separate cart page
        echo "<form action=cart.php>";
        echo "<input type=\"submit\" value=\"View cart\" />";
        echo "</form>";

    } // end showMerch function

    public function showCart() {
        #$username = $_POST[uname];
        #echo "Here is your cart, " . $username;

        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbase, $this->port);
        //display the records in a table
        echo "<hr>";
        echo "<h3>Shopping Cart:</h3>";
        echo "<table border = '1'>";

        //display table headers
        echo "<tr>
        <th>Item Number</th>
        <th>Item</th>
        <th>Number Purchased</th>
        <th>Detail</th>
        </tr>";

        $this->table = 'cart';
        $query = "Select * FROM ".$this->table.";";
        $items = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($items) > 0) {
        // Print out the items
            while($row = mysqli_fetch_assoc($items)) {
                echo "<tr>"
		    ."<td>".$row[itemno]."</td>"
		    ."<td>".$row[item]."</td>"
		    ."<td>" .$row[number]. "</td>"
		    ."<td>".$row[detail]."</td>"
		    ."</tr>";
            }
        }
        mysqli_free_result($items);
        mysqli_close($conn);
        echo "</table>";

    }
} // end BootlegZon class
?>