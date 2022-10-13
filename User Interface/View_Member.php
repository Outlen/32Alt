<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Display member details in accordance with their login" />
    <meta name="author" content="Allen" />
    <title>GotoGrow-MRM Member Management</title>
</head>
<body>
    <header>
        <?php
         /* Add_Member.php
        Author: Allen
        Last Edited: 5/10/2022
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
	<h2>GotoGrow-MRM Member Management - View member</h2>
    <p>This page is used to see the details of a member.</p>

    <?php
	session_start();
	$saleID = array();
    $proid = $_POST["proid"];
    $propass = $_POST["propass"];
    $servername = "localhost";
    $user = "root";
	$pwd = "";
	$sql_db = "goto_gro_databases";
    $sql_table = "users";
    $conn = new mysqli($servername, $user, $pwd, $sql_db);
    $query = "SELECT userID, userType, userLoginName, userPassword, userFirstName, userLastName, userEmail, userPhone, userAddress  FROM $sql_table WHERE userLoginName = '$proid'";
    $result1 = mysqli_query($conn, $query);
    if ($result1->num_rows > 0) {
            while($row = $result1->fetch_assoc()) {
                $type = $row["userType"];
                $login = $row["userLoginName"];
				$id = $row["userID"];
                $pass = $row["userPassword"];
				$gname = $row["userFirstName"];
				$fname = $row["userLastName"];
				$email = $row["userEmail"];
				$phone = $row["userPhone"];
				$address = $row["userAddress"];
				
				$_SESSION['id']  = $id;
				
				echo "
					<p>Name: $gname $fname</p>
					<p>Membership: $type</p>
					<p>Email: $email</p>
					<p>Address: $address</p>
					<p>Phone: $phone</p>
				";
					
						
				$results2 = $conn->query("SELECT SaleID, date
										FROM sales NATURAL JOIN stock
										WHERE userID = $id
										GROUP BY SaleID
										ORDER BY SaleID ASC");
				
				echo "<table border='1'>
				<tr>
				<th>Order Number</th>
				<th>Date of transaction</th>
				</tr>";
		
				while($row = mysqli_fetch_array($results2)) {
				echo "<tr>";
				
				$saleID[] = $row['SaleID'];
  
				echo "<td>" . $row['SaleID'] . "</td>";
				echo "<td>" . $row['date'] . "</td>";
  
				echo "</tr>";
				}
  
				echo "</table>";
				
				print_r($saleID);
				
					echo "
					<form method='post' action='View_Member_conf.php'
						<fieldset>
							<legend><strong>Enter order number if you want to view the detailed sale</strong></legend>
							<p><label for='orderID'>Order number:</label>
							<input type='text' name='orderID' id='orderID'/></p>
						</fieldset>
					<br>

					<input type= 'submit' value='Submit Form'/>
					<input type= 'reset' value='Clear Form'/>

					</div></form>
					";
			}
    }


?>

	<footer>
        <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>


</body>
 


</html>
