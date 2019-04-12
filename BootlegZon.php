<?php
#session_start();
/* BARRY SMITH CS205 FINAL PROJECT */

/* This is the file that contains the one class used by our online store project for CS205. It has methods in it for logging in, connecting to our database as a user, displaying the main page, and displaying the shopping cart.
*/

# Testing sessions. We need a session to keep a user "live" and logged in across web pages.
$animal = "cat";
$_SESSION['toonses'] = $animal;
# print_r($_SESSION);

class BootlegZon {

    # CLASS PROPERTIES
    var $user;
    var $password;
    var $dbase;
    var $host;
    var $port;
    var $continue;
    var $table;

    # CLASS METHODS BELOW HERE ---------------
    public function displayLogin() {
        echo "<h1>Nebula Knick-Knacks</h1>";
        echo "<h3><i>Orbital Enterprises Beta Website for CS205 Final Project</i></h3>";
	echo "<hr><br>";

	echo "<form action=\"CheckLogin.php\" method=\"POST\" id='inputForm' name=\"userLogin\">";
	echo "<fieldset>";
	echo "<legend>Rockingham Store Login Page</legend>";
	echo "<label for=\"name\">Username:</label><input type='text' id=\"uname\" name='uname'>";
	echo "<label for=\"name\">Password:</label><input type='password' id=\"upasswd\" name='upasswd'>";
	echo "<input type=\"submit\" name = 'Submit' value = 'Submit'>";
	echo "</fieldset>";
	echo "</form>";

	} // end displayLogin function



    public function displaySignUp() {
        echo "<h1>Nebula Knick-Knacks</h1>";
        echo "<h3><i>Orbital Enterprises Beta Website for CS205 Final Project</i></h3>";
	echo "<hr><br>";

	echo "<form action=\"SignupClose.php\" method=\"POST\" id='inputForm' name=\"userLogin\">";
	echo "<fieldset>";
	echo "<legend>Nebula Knick-Knacks Signup Page</legend>";
	echo "<label for=\"name\">Username:</label><input type='text' id=\"uname\" name='uname'>";
    echo "<p>";
	echo "<label for=\"name\">Password:</label><input type='password' id=\"upasswd\" name='upasswd'>";
    echo "<br>";
	echo "<label for=\"name\">Repeat password:</label><input type='password' id=\"upasswd2\" name='upasswd2'>";
	echo "<input type=\"submit\" name = 'Submit' value = 'Submit'>";
	echo "</fieldset>";
	echo "</form>";

	} // end displayLogin function




    # This is only used to start a new html page.
    public function displayProcessing() {
	}

    # Method to connect to dbase and authenticate users
    public function connDB() {

        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbase, $this->port);

        $username = $_POST[uname];
        $upasswd = $_POST[upasswd];
        $this->table = 'customers';
        #$username = 'barry';
        #$upasswd = 'passb';
        if (mysqli_connect_errno()) {
            printf("Attention - connect error: %s\n", mysqli_connect_errno());
            exit();
        }
        # The continue variable - only true is user has been authenticated
        $this->continue = FALSE;
        $query = "Select * FROM ".$this->table." WHERE name = '".$username."' AND passwd = '".$upasswd."';";
        $credentials = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if (mysqli_num_rows($credentials) > 0) {
            echo "Status: User <i> ".$username. " </i> is now logged in.";
            $this->continue = TRUE;
        }

        /* If user wasn't authenticated, then destroy the session so the user is effectively removed from memory, and then send user to a "bad password" page that shows them what happened and allows them to return to the main page.
         */
        if ($this->continue == FALSE){
            # echo "Username/password combination not in system.";
            session_destroy();
            header("Location: BadUserPassword.php");
        }

        mysqli_free_result($credentials);

    } // end connDB


    # Method to connect to dbase and authenticate users
    public function addCustomer() {

        # Change to MySQL-user "bfsmith_writer" so that we can
        # update dbase
        $this->user = 'bfsmith_writer';
        $this->password = 'd7WJWjLABFHzCqv8';

        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbase, $this->port);

        $username = $_POST[uname];
        $upasswd = $_POST[upasswd];
        $this->table = 'customers';
        if (mysqli_connect_errno()) {
            printf("Attention - connect error: %s\n", mysqli_connect_errno());
            exit();
        }
        #$query = "Select * FROM ".$this->table." WHERE name = '".$username."' AND passwd = '".$upasswd."';";
        $queryNewCustomer = "Insert INTO " . $this->table. " VALUES (NULL, '" . $username."', '".$upasswd."');";
        mysqli_query($conn, $queryNewCustomer) or die(mysqli_error($conn));

        # mysqli_free_result($credentials);

        # Change back to MySQL-user "bfsmith_reader" for stability
        $this->user = 'bfsmith_reader';
        $this->password = 'Xm8av2CKT7rSG2k7';

/* COMMAND TO ADD USER FROM CHRIS E
INSERT INTO `customers` (`id`, `name`, `passwd`) VALUES (NULL, ’X', ‘Y’);
ALSO: this works - with *writer*:
MySQL [BFSMITH_STORE]> INSERT INTO customers VALUES ('6', 'Ishmael', 'moby');
* Change X and Y to user inputed name and password respectively
* Need to get ID for user. Just get number rows of table, and add one. No need -
* can just add NULL, like Chris said, and it will automatically update.
* See what kind of access I need. Write or admin? Can I change to that here?
*/

    } // end addCustomer





    # Function that shows table of images/info on page
    # Notice how PHP is just echoing HTML throughout this code.
    public function showMerch() {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbase, $this->port);
        //display the records in a table
        echo "<hr>";
        echo "<h3>Merchandise:</h3>";
        echo "<table border = '1'>";

        //Display table headers
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

            /* This while-loop prints out the items, as can be seen
             * from the HTML below. As long as there's a row with
             * data in it in the table, it will print it out.
             * We can easily incorporate CSS into this.
             */
            while($row = mysqli_fetch_assoc($items)) {
            echo "<tr>"
		    ."<td><input type=\"checkbox\" name='checkbox[]' ></td>"
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
        #$_SESSION['uname'] = $_POST[uname];
        echo "<form action=cart.php>";
        echo "<input type=\"submit\" value=\"View cart\" />";
        echo "</form>";

    } // end showMerch function

    # The showCart() method - allows users to see a shopping-cart page, where they can see their currently-chosen items.
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