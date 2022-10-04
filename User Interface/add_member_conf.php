<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Adds members from database" />
    <meta name="author" content="Kipp STRATMANN" />
    <title>GotoGrow-MRM Member Management</title>
    </head>
<body>
    <header>
        <?php   
        /* add_member_conf.php
        Adds members to the SQL database. 
        Author: K. Stratmann
        Last Edited: 19/09/2022
        */
        ?>
        <link href="styles/style.css" rel="stylesheet" />
    </header>
    <h1>GotoGrow-MRM Website</h1>
<nav>
    <ul>
    <li class="menu"><a href="index.php">Home</a></li>
        <li class="menu"><a href="check_add.php">Add Member</a></li>
        <li class="menu"><a href="check_edit.php">Edit Member</a></li>
        <li class="menu"><a href="check_delete.php">Delete Member</a></li>
        <li class="menu"><a href="check_sales_add.php">Add Sales</a></li>
        <li class="menu"><a href="check_sales_edit.php">Edit Sales</a></li>
        <li class="menu"><a href="check_sales_delete.php">Delete Sales</a></li>
        <li class="menu"><a href="check_item_add.php">Add item</a></li>
        <li class="menu"><a href="check_item_edit.php">Edit item</a></li>
        <li class="menu"><a href="check_item_delete.php">Delete item</a></li>
    </ul>		
</nav>
<hr> 
    <?php
    //Starts the session
    session_start();

    //Delcearse the rest of the vairables to be used
    $gname = $_POST["gname"];
    $fname = $_POST["fname"];
    $type = $_POST["type"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $loginid = $_POST["loginid"];
    $loginpass = $_POST["loginpass"];
    $servername = "localhost";
	$user = "root";
	$pwd = "";
	$sql_db = "goto_gro_databases";
    //Makes the connection to the database
    $conn = new mysqli($servername, $user, $pwd);
    $conn2 = new mysqli($servername, $user, $pwd, $sql_db);
    echo "<h2>Add Member Confirmation</h2>";

    //Checks that an error message doesn't exits and  increments the count value
            //Displays the results of the quiz back to the student
            echo "<h3>Below is the membership that you have just created</h3>
            <p>Your Name: $gname $fname</p>
            <p>Your Membership Type: $type</p>
            <p>Your Email: $email</p>
            <p>Your Phone Number: $phone</p>
            <p>Your Address: $address</p>
            <p>Your Login ID & Password have not been displayed for your privacy</p>";
            //Checks if the user can have another attempts and displays the option to do so to the user
 
            //Checks if the database connection is successful
            if ($conn2->connect_error) {
                $createdatabse = "CREATE DATABASE $sql_db";
                mysqli_query($conn, $createdatabse);
                $conn->close();
                echo "<p>Database connection failure, try again</p>";
            } else {
				//check if any of the input is blank
				if ($gname == '' || $fname == '' || $type == '' || $email == ''|| $phone == '' || $address == '' || $loginid == '' || $loginpass == ''){
				echo "<p>Result: Failed</p>"; 
				echo "<p>Some of the inputs have been left blank</p>"; 
				}
				
				
				else {
					//If the connection is successful add the data to the appropirate table
					$sql_table = "users";
					$query = "INSERT into $sql_table (userFirstName, userLastName, userType, userEmail, userPhone, userAddress, userLoginName, userPassword) 
					values ('$gname', '$fname', '$type', '$email', '$phone', '$address', '$loginid', '$loginpass')";
					$result = mysqli_query($conn2, $query);
					if (!$result) {
						//If the table doesn't exist then create it and add the relevant data
						$query_fix = "CREATE TABLE $sql_table (userID int (11) NOT NULL AUTO_INCREMENT primary key,
						userFirstName varchar(12) NOT NULL, 
						userLastName varchar(12) NOT NULL, 
						userType varchar(12) NOT NULL, 
						userEmail varchar(255) NOT NULL,
						userPhone char(10) NOT NULL,
						userAddress varchar(50) DEFAULT NULL,
						userLoginName varchar(16) NOT NULL,
						userPassword varchar(16) NOT NULL)";
						$query_repair = mysqli_query($conn2, $query_fix);
						$result = mysqli_query($conn2, $query);
						echo "<p>Your result has been recorded successfully</p>";
					} else {
						//Provide feedback to the user on the result
						echo "<p>Your result has been recorded successfully</p>";
					}
					//Close the connection
					$conn2->close();
				}
            }
        
    ?>  
    <footer>
    <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>


</body>
 


</html>
