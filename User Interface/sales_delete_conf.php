<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Allows ability to record a sale in the database" />
    <meta name="author" content="M Salim Sadman" />
    <title>GotoGrow-MRM Sales Management</title>
    <link href="styles/style.css" rel="stylesheet" />
</head>
<body>

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
    $sid = $_POST["sid"];
    $cusid = $_POST["cusid"];
    $isku = $_POST["isku"];
    $date = $_POST["date"];
    $servername = "localhost";
	$user = "root";
	$pwd = "";
	$sql_db = "goto_gro_databases";
    //Makes the connection to the database
    $conn = new mysqli($servername, $user, $pwd, $sql_db);
    echo "<h2>delete Sale Confirmation</h2>";

   
        //Displays the form input
        echo "<h3>Below is the Sale Data you want to remove</h3>
        <p>sale ID: $sid</p>
        <p>Customer ID: $cusid</p>
        <p>Item SKU: $isku</p>
        <p>Date: $date</p>";
 
        //Checks if the database connection is successful
        if (!$conn) {
            echo "<p>Database connection failure, try again</p>";
        } else {
            //If the connection is successful add the data to the appropirate table
            $sql_table = "sales";
            $query = "DELETE FROM $sql_table WHERE 
                `saleID`='$sid' &&
                `customerID`='$cusid' &&
                `itemSKU`='$isku' &&
                `date`='$date'";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                //Provide feedback to the user on the result
                echo "<p>An error has been encounted, please contact site developers</p>";    
            } else {
                echo "<p>Sales record deleted successfully</p>";    
            }
            //Close the connection
            $conn->close();
        }
?>


<footer>
        <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>

</body>

</html>