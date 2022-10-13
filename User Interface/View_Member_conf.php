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
		<li class="menu"><a href="check_view_details.php">View member</a></li>
		<li class="menu"><a href="check_highlight_product.php">Highlight Products</a></li>
		<li class="menu"><a href="check_generate_product.php">Product report</a></li>
		<li class="menu"><a href="check_highlight_type.php">Highlight Product Types</a></li>
		<li class="menu"><a href="check_generate_type.php">Product type report</a></li>
    </ul>		
</nav>

<hr> 
    <?php
    //Starts the session
    session_start();

    //Delcearse the rest of the vairables to be used
    $orderID = $_POST["orderID"];
    $servername = "localhost";
	$user = "root";
	$pwd = "";
	$sql_db = "goto_gro_databases";
    //Makes the connection to the database
    $conn = new mysqli($servername, $user, $pwd, $sql_db);
	
	$id = $_SESSION['id'];
	

    //Checks that an error message doesn't exits and  increments the count value 
	$results = $conn->query("SELECT SaleID, date
										FROM sales NATURAL JOIN stock
										WHERE userID = $id
										GROUP BY SaleID
										ORDER BY SaleID ASC");
	
	$validID = array();
	
	while($row = mysqli_fetch_array($results)) {			
				$validID[] = $row['SaleID'];
		}
	
	$checkID = in_array($orderID, $validID);


	
	if ($checkID == false) {
		echo 'You have entered a sale ID that is not yours. Redirecting to the login page';
		
		header("refresh:3; url=check_view_details.php");
		exit();
	}
	
	else {
		$results2 = $conn->query("SELECT saleID, stockName, itemQuantityBought, stockPrice_AUD, itemQuantityBought * stockPrice_AUD as Item_Total_Price, date
								FROM sales NATURAL JOIN stock
								WHERE saleID = $orderID");
		
		
		echo "<table border='1'>
		<tr>
		<th>Order ID</th>
		<th>Item name</th>
		<th>Item quantity</th>
		<th>Item unit price</th>
		<th>Total</th>
		<th>Date purchase</th>
		</tr>";
		
		while($row = mysqli_fetch_array($results2)) {
			echo "<tr>";
  
			echo "<td>" . $row['saleID'] . "</td>";
			echo "<td>" . $row['stockName'] . "</td>";
			echo "<td>" . $row['itemQuantityBought'] . "</td>";
			echo "<td>" . $row['stockPrice_AUD'] . "</td>";
			echo "<td>" . $row['Item_Total_Price'] . "</td>";
			echo "<td>" . $row['date'] . "</td>";
  
			echo "</tr>";
  }
  
	echo "</table>";
	}
	
	
	


	
	//Close the connection
	$conn->close();
            
        
    ?>  
    <footer>
    <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>


</body>
 


</html>
