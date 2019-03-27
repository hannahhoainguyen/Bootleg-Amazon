<?php

class LoginArea {

    #public $user = 'root';
    #public $password = 'root';
    #public $dbase = 'store';
    #public $table = 'customers';
    #public $host = 'localhost';
    #public $port = 8889;
    #public $continue = false;

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
       	# KEEP FORGETTING TO FIX THIS - KILLS SYNTAX HIGHLIGHTS
        #echo <<<FORMDATA

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
        # Looks like I'm just using this to start a new html page. (?)
        # echo "hi<br>";
        # This below works
        # echo $this->port;
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
        }

        mysqli_free_result($credentials);

        #mysqli_close($conn);
        #mysqli_free_result($credentials);

    } // end connDB

    public function showMerch() {
        #$conn = mysqli_connect($host, $user, $password, $dbase, $port);
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->dbase, $this->port);
        //display the records in a table
        echo "<hr>";
        echo "<h3>Merchandise:</h3>";
        echo "<table border = '1'>";

        //display table headers
        echo "<tr>
        <th>Item Number</th>
        <th>Item</th>
        <th>Cost</th>
        <th>Items in Stock</th>
        <th>Detail</th>
        </tr>";

        $this->table = 'merchandise';
        $query = "Select * FROM ".$this->table.";";
        $items = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($items) > 0) {
        // Print out the items
            while($row = mysqli_fetch_assoc($items)) {
                echo "<tr>"
		    ."<td>".$row[itemno]."</td>"
		    ."<td>".$row[item]."</td>"
		    ."<td>" .$row[cost]. "</td>"
		    ."<td>".$row[avail]."</td>"
		    ."<td>".$row[detail]."</td>"
		    ."</tr>";
            }
        }
        mysqli_free_result($items);
        mysqli_close($conn);
        echo "</table>";

    } // end showMerch function


} // end loginArea class
?>