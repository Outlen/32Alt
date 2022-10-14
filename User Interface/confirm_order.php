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

    //Delcearse the rest of the vairables to be used
    $servername = "localhost";
	$user = "root";
	$pwd = "";
	$sql_db = "goto_gro_databases";
    $a = $_SESSION['$a'];
    $b = $_SESSION['$b'];
    $quantity = $_SESSION['$quantity'];
    $customerid = $_SESSION['$id'];
    $count = array();
    $id = array();
    date_default_timezone_set("Australia/Melbourne");
    //Makes the connection to the database
    $conn = new mysqli($servername, $user, $pwd, $sql_db);
    echo "<h2>Add Member Confirmation</h2>";

    $z = count ($a);
    $i = 0;
    while ($i < $z) {
        if ($a[$i] != 0) {
            $temp = $a[$i];
            array_push($count, $temp);
        }
        $i++;
    }

    $_SESSION['$count']=$count;
    
    $sql_table = "stock";
    $i = 0;
    $c = count ($count);
    while ($i<$c){
	    $query = "SELECT SKU FROM $sql_table WHERE stockName = '$b[$i]'";
	    $result = mysqli_query($conn, $query);
        $i++;
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $temp = $row["SKU"];
              array_push($id, $temp);
            }
          }
    }


	$query = 'SELECT MAX(saleID) AS max FROM sales;';
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_array( $result );
	$lastID = $row['max'];
	$nextID = $lastID + 1;



    $i = 0;
    $sql_table = "sales";
    $date = date("Y-m-d");
    while ($i < $c) {
        $query = "INSERT into $sql_table (saleID, userID, SKU, itemQuantityBought, date)
        values ($nextID, '$customerid', '$id[$i]', '$count[$i]', '$date')";
        $result = mysqli_query($conn, $query);
        $i++;
    }
    if (!$result) {
        echo "<p>Error, plese contant the system administrator</p>";
    } else {
        //Provide feedback to the user on the result
        echo "<p>Your order has been successfuly placed</p>
        Your order number is: " .$nextID;
    }


    $i = 0;
    $sql_table = "stock";
    while ($i < $c) {
        $idforquantity = $id[$i];
        $query = "UPDATE $sql_table SET stockQuantity = ($quantity[$idforquantity]-$count[$i]) WHERE SKU=$id[$i]";
        $result = mysqli_query($conn, $query);
        $i++;
    }
                
					




    /*
				
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
      */  
    ?>  
    <footer>
    <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>


</body>
 


</html>
