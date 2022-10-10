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
    </ul>		
</nav>

<hr> 
    <?php
    //Starts the session
    session_start();

    //Delcearse the rest of the vairables to be used
    $month = $_POST["month"];
	$year = $_POST["year"];
    $servername = "localhost";
	$user = "root";
	$pwd = "";
	$sql_db = "goto_gro_databases";
    //Makes the connection to the database
    $conn = new mysqli($servername, $user, $pwd, $sql_db);

    //Checks that an error message doesn't exits and  increments the count value 
	$results = $conn->query("SELECT stockCategory, SUM(itemQuantityBought) as BoughtQuantity
								FROM sales NATURAL JOIN STOCK
								WHERE monthname(date) = '$month' AND year(date) = '$year'
								GROUP BY stockCategory
								ORDER BY BoughtQuantity DESC");

	echo "<table border='1'>
		<tr>
		<th>stockCategory</th>
		<th>BoughtQuantity</th>
		</tr>";
		
	while($row = mysqli_fetch_array($results)) {
		echo "<tr>";
  
		echo "<td>" . $row['stockName'] . "</td>";
		echo "<td>" . $row['BoughtQuantity'] . "</td>";
  
		echo "</tr>";
  }
  
	echo "</table>";	
	
	//Close the connection
	$conn->close();
            
        
    ?>  
    <footer>
    <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>


</body>
 


</html>
