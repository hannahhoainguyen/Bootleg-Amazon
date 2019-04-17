<?php
#session_start();
/* BARRY SMITH CS205 FINAL PROJECT */

/* This is the file that contains the one class used by our online store project for CS205. It has methods in it for logging in, connecting to our database as a user, displaying the main page, and displaying the shopping cart.
*/

# Testing sessions with a cat named 'Toonces.' We need a session to keep a user "live" and logged in across web pages.
/* https://www.youtube.com/watch?v=5fvsItXYgzk */
$animal = "cat";
$_SESSION['Toonces'] = $animal;

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

    # This function is only used to start a clean, new html page.
    public function displayProcessing() {
	}

    # Method to authenticate users, who should be in the 'customers' table
    public function userAuth() {

        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbase, $this->port);

        $username = $_POST[uname];
        $upasswd = $_POST[upasswd];
        $this->table = 'customers';

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

    } // end userAuth function

    # Method to add new users to database
    public function addCustomer() {

        /* Change to MySQL-user "bfsmith_writer" so we can update dbase */
        $this->user = 'bfsmith_writer';
        $this->password = 'd7WJWjLABFHzCqv8';

        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbase, $this->port);

        $username = $_POST[uname];
        $upasswd = $_POST[upasswd];
        $this->table = 'customers';
        if (mysqli_connect_errno()) {
            printf("Attention - database connect error: %s\n", mysqli_connect_errno());
            exit();
        }
        $queryNewCustomer = "Insert INTO " . $this->table. " VALUES (NULL, '" . $username."', '".$upasswd."');";
        mysqli_query($conn, $queryNewCustomer) or die(mysqli_error($conn));

        # Change back to MySQL-user "bfsmith_reader" for stability
        $this->user = 'bfsmith_reader';
        $this->password = 'Xm8av2CKT7rSG2k7';

    } // end addCustomer


    /*  For main page: function that shows table of images/info on page
     Notice how PHP is simply echoing HTML throughout this code. */
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

            echo "<form action=\"Cart.php\" method=\"post\">";
            /* This while-loop prints out the items, as can be seen
             * from the HTML below. As long as there's a row with
             * data in it in the table, it will print it out.
             * We can easily incorporate CSS into this.
             */
            while($row = mysqli_fetch_assoc($items)) {
            echo "<tr>"
		    ."<td><input type=\"checkbox\" name=\"checkbox[]\" value = \". {$row[ID]}. \"></td>"
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
        echo "<input type=\"submit\" name=\"submit\" value=\"View cart\"/>";
        echo "</form>";
        $_SESSION['checkbox[]'] = $_POST['checkbox[]'];
    } // end showMerch function


    # The showCart() method - allows users to see a shopping-cart page, where they can see their currently-chosen items.
    public function showCart($checkBoxArray) {
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

        $this->table = 'MERCH';

        foreach ($checkBoxArray as $value) {
            #$carrier = $checkBoxArray[$value];
            $carrier = $value;
            $carrier = str_replace(".", "", $carrier);
            $query = "Select * FROM ".$this->table." WHERE ID = '". $carrier ."';";

            $queryMinusOne = "UPDATE MERCH SET Quantity = Quantity - 1 WHERE ID = '". $carrier . "';";
            $checkQtyQuery = "Select Quantity FROM ".$this->table." WHERE ID = '".$carrier ."';";
            $queryAddToCart = "INSERT INTO " . $this->table. " VALUES (" . $row[ID]."', '". $row[Item] ."', " . 1 .", '" . $row[Detail] ."');";

            $items = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($items) > 0) {
                // Print out the items
                while($row = mysqli_fetch_assoc($items)) {

                    $qty = mysqli_query($conn,$checkQtyQuery) or die(mysqli_error($conn));
                    if($qty>0) {
                        mysqli_query($conn, $queryMinusOne) or die(mysqli_error($conn));
                        echo "<tr>"
                            . "<td>" . $row[ID] . "</td>"
                            . "<td>" . $row[Item] . "</td>"
                            . "<td>" . 1 . "</td>"
                            . "<td>" . $row[Detail] . "</td>"
                            . "</tr>";


                    }
                    else{
                        echo "Item out of stock call store";
                        echo "<tr>"
                            . "<td>" . $row[ID] . "</td>"
                            . "<td>" . $row[Item] . "</td>"
                            . "<td>" . "Item Out of Stock" . "</td>"
                            . "<td>" . $row[Detail] . "</td>"
                            . "</tr>";


                    }
                }


                # Experiment
                # $this->table = 'cart';
                # mysqli_query($conn, $queryAddToCart) or die(mysqli_error($conn));


            } // end if-statement
        } // end foreach

        mysqli_free_result($items);
        mysqli_close($conn);
        echo "</table>";

    } // end showCart() function

} // end BootlegZon class
?>
