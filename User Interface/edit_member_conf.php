<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Edits members from database" />
    <meta name="author" content="Kipp STRATMANN" />
    <title>GotoGrow-MRM Member Management</title>
    </head>
<body>
    <header>
        <?php   
        /* edit_member_conf.php
        Edits members to the SQL database. 
        Author: K. Stratmann
        Last Edited: 20/09/2022
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
    $oldgname = $_POST["oldgname"];
    $oldfname = $_POST["oldfname"];
    $oldphone = $_POST["oldphone"];
    $oldloginid = $_POST["oldloginid"];
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
    $conn = new mysqli($servername, $user, $pwd, $sql_db);
    echo "<h2>Add Member Confirmation</h2>";

    //Checks that an error message doesn't exits and  increments the count value
            //Displays the results of the quiz back to the student
            echo "<h3>Below is the membership that you have just edited</h3>
            <p>Your Name: $gname $fname</p>
            <p>Your Membership Type: $type</p>
            <p>Your Email: $email</p>
            <p>Your Phone Number: $phone</p>
            <p>Your Address: $address</p>
            <p>Your Login ID & Password have not been displayed for your privacy</p>";
            //Checks if the user can have another attempts and displays the option to do so to the user
 
            //Checks if the database connection is successful
            if (!$conn) {
                echo "<p>Database connection failure, try again</p>";
            } else {
				//check if any of the old user data is missing
				if ($oldgname == '' || $oldfname == '' || $oldphone == '' || $oldloginid == '') {
					echo "<p>Result: Failed</p>";
					echo "<p>One or more of the old details is blank</p>";
				}
				
				if ($gname == '' || $fname == '' || $type == '' || $email == ''|| $phone == '' || $address == '' || $loginid == '' || $loginpass == ''){
					echo "<p>Result: Failed</p>";
					echo "<p>One or more of the new details is blank</p>";
				}
				
				else {
					//If the connection is successful add the data to the appropirate table
					$sql_table = "users";
					$query = "UPDATE $sql_table SET 
					userFirstName='$gname',
					userLastName='$fname',
					userType='$type',
					userEmail='$email',
					userPhone='$phone',
					userAddress='$address',
					userLoginName='$loginid',
					userPassword='$loginpass'
					WHERE userFirstName='$oldgname' && userLastName='$oldfname' && userPhone='$oldphone' && userLoginName='$oldloginid'";                 
					$result = mysqli_query($conn, $query);
					if (!$result) {
						echo "<p>An error has been encounted, please contact site developers</p>";
					} else {
						//Provide feedback to the user on the result
						echo "<p>Result: Success</p>";
						echo "<p>Your result has been recorded successfully</p>";
					}
					//Close the connection
					$conn->close();
				}
            }
        
    ?>  
    <footer>
    <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>


</body>
 


</html>
