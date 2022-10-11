<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Allows ability to record an item in the database" />
    <meta name="author" content="Ashraful Alam Ridoy" />
    <title>GotoGrow-MRM Item Management</title>
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
        <li class="menu"><a href="short_stock_login.php">Stock Monitoring</a></li>
    </ul>		
</nav>

<hr> 

<?php
    //Starts the session
    
    session_start();

    // disables fatal errors from breaking the code execution. Used for mysqli_query() method

    
    //Delcearse the rest of the vairables to be used
    $itemname = $_POST["itemname"];
    $itemprice = $_POST["itemprice"];
    $itemquantity = $_POST["itemquantity"];
    $servername = "localhost";
	$user = "root";
	$pwd = "";
	$sql_db = "goto_gro_databases";
    //Makes the connection to the database
    $conn2 = new mysqli($servername, $user, $pwd, $sql_db);
    echo "<h2>Add Item Confirmation</h2>";

    
        //Displays the form input
        echo "<h3>Below is the Item data: </h3>
        <p>Item Name: $itemname</p>
        <p>Item Price (AUD): $itemprice</p>
        <p>Item Quantity: $itemquantity</p>";

        //Checks if the database connection is successful
        if ($conn2->connect_error) {
            $createdatabse = "CREATE DATABASE $sql_db";
            mysqli_query($conn, $createdatabse);
            $conn->close();
            echo "<p>Database connection failure, try again</p>";
        } else {
            //If the connection is successful add the data to the appropirate table
            $sql_table = "stock";
            $query = "INSERT into $sql_table (stockName, stockPrice_AUD, stockQuantity)
            values ('$itemname', '$itemprice', '$itemquantity')";
            $result = mysqli_query($conn2, $query);
            
            if (!$result) {
                echo "<p>Failure! the record cannot be updated</p>";
            } else {
                //Provide feedback to the user on the result
                echo "<p>Your result has been recorded successfully</p>";
            }
            //Close the connection
            $conn2->close();
        }

?>


<footer>
        <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>

</body>

</html>