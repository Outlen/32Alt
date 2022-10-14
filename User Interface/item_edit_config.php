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
		<li class="menu"><a href="check_cart.php">Add item to cart</a></li>
        <li class="menu"><a href="check_sales_add.php">Add Sales</a></li>
        <li class="menu"><a href="check_sales_edit.php">Edit Sales</a></li>
        <li class="menu"><a href="check_sales_delete.php">Delete Sales</a></li>
        <li class="menu"><a href="check_item_add.php">Add item to inventory</a></li>
        <li class="menu"><a href="check_item_edit.php">Edit item in inventory</a></li>
        <li class="menu"><a href="check_item_delete.php">Delete item from inventory</a></li>
		<li class="menu"><a href="check_view_details.php">View member</a></li>
		<li class="menu"><a href="check_highlight_product.php">Highlight Products</a></li>
		<li class="menu"><a href="check_generate_product.php">Product report</a></li>
		<li class="menu"><a href="check_highlight_type.php">Highlight Product Types</a></li>
		<li class="menu"><a href="check_generate_type.php">Product type report</a></li>
        <li class="menu"><a href="short_stock_login.php">Stock Monitoring</a></li>
    </ul>		
</nav>

<hr> 

<?php
    //Starts the session
    session_start();

    
    $oldsku = $_POST["oldsku"];
    $olditemname = $_POST["olditemname"];
    $olditemprice = $_POST["olditemprice"];
    $olditemquantity = $_POST["olditemquantity"];
    $olddate = $_POST["olddate"];
    $olditemc = $_POST["olditemc"];
    $olditemmonthlysupply = $_POST["olditemmonthlysupply"];
    $sku = $_POST["sku"];
    $itemname = $_POST["itemname"];
    $itemprice = $_POST["itemprice"];
    $itemquantity = $_POST["itemquantity"];
    $date = $_POST["date"];
    $itemc = $_POST["itemc"];
    $itemmonthlysupply = $_POST["itemmonthlysupply"];
    $servername = "localhost";
	$user = "root";
	$pwd = "";
	$sql_db = "goto_gro_databases";
    //Makes the connection to the database
    $conn = new mysqli($servername, $user, $pwd, $sql_db);
    echo "<h2>Edit Item Confirmation</h2>";

    
        //Displays the form input
        echo "<h3>Below is the edited data: </h3>
        <p>Item Stock Keeping Unit: $sku</p>
        <p>Item Name: $itemname</p>
        <p>Item Price (AUD): $itemprice</p>
        <p>Item Quantity: $itemquantity</p>
        <p>Item Expiry Date: $date</p>
        <p>Item Category: $itemc</p>
        <p>Item Monthly Supplier Purchases: $itemmonthlysupply</p>";
 
        //Checks if the database connection is successful
        if (!$conn) {
            echo "<p>Database connection failure, try again</p>";
        } else {
            //If the connection is successful add the data to the appropirate table
            $sql_table = "stock";
            $query = "UPDATE $sql_table SET 
            `SKU`='$sku',
            `stockName`='$itemname',
            `stockPrice_AUD`='$itemprice',
            `stockQuantity`='$itemquantity',
            `stockExpiryDate`='$date',
            `stockCategory`='$itemc',
            `stockMonthlySupplierPurchases`='$itemmonthlysupply'
            WHERE 
            `SKU`='$oldsku' &&
            `stockName`='$olditemname' &&
            `stockPrice_AUD`='$olditemprice' &&
            `stockQuantity`='$olditemquantity' &&
            `stockExpiryDate`='$olddate' &&
            `stockCategory`='$olditemc' &&
            `stockMonthlySupplierPurchases`='$olditemmonthlysupply'
            ";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo "<p>An error has been encounted, please contact site developers</p>";
            } else {
                //Provide feedback to the user on the result
                echo "<p>Your result has been recorded successfully</p>";
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