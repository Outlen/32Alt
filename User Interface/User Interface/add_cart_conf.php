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
    $id = $_POST["id"];
    $i = 1;
    $a = array();
    $b = array();
    $servername = "localhost";
	$user = "root";
	$pwd = "";
	$sql_db = "goto_gro_databases";
    $conn = new mysqli($servername, $user, $pwd, $sql_db);
    $sql_table = "stock";
    $query = "SELECT stockName, stockPrice_AUD, stockQuantity FROM $sql_table WHERE stockQuantity > 0";
    $result = mysqli_query($conn, $query);

    while($row = $result->fetch_assoc()) {
        $temp = $_POST["$i"];
        array_push($a, $temp);
        $i += 1;
    }   
    


    echo "<h2>Add Cart Confirmation</h2>";

            echo "<h3>Below is the cart you have just ordered</h3>
            <p>Your Member ID: $id</p>
            <p>Your Ordered Items:";
            $result = mysqli_query($conn, $query);
            if ($result->num_rows > 0) {
                // output data of each row
                echo "<table><tr><th>Name</th><th>Quantity</th>";
                
                $z = 0;
                while($row = $result->fetch_assoc()) {
                    if ($a[$z] != 0) {
                    echo "<tr><td>" . $row["stockName"]. "</td><td>" .$a[$z]. " </td>";
                    $temp = $row["stockName"];
                    array_push($b, $temp);
                    }
                    $z++;
                }   
                echo "</table></p>";
                $_SESSION['$a']=$a;
                $_SESSION['$b']=$b;
                $_SESSION['$id'] =$id;

                } 
                echo "<a href='confirm_order.php'><input type='submit' value='Confirm Order'/></a>";
                echo "<a href='edit_cart.php'><input type='submit' value='Edit Order'/></a>";
                echo "<a href='delete_order.php'><input type='submit' value='Delete Order'/></a>";


 /*
            //Checks if the database connection is successful
            if ($conn2->connect_error) {
                $createdatabse = "CREATE DATABASE $sql_db";
                mysqli_query($conn, $createdatabse);
                $conn->close();
                echo "<p>Database connection failure, try again</p>";
            }		
				
				else {
					//If the connection is successful add the data to the appropirate table
					$sql_table = "sales";
					$query = "INSERT into $sql_table (userFirstName, userLastName, userType, userEmail, userPhone, userAddress, userLoginName, userPassword) 
					values ('$gname', '$fname', '$type', '$email', '$phone', '$address', '$loginid', '$loginpass')";
					$result = mysqli_query($conn2, $query);
					} else {
						//Provide feedback to the user on the result
						echo "<p>Your result has been recorded successfully</p>";
					}
					//Close the connection
					$conn2->close();
		*/
        

        $z = count ($a);
        $i = 0;
        $count = array();
        while ($i < $z) {
            if ($a[$i] != 0) {
                $temp = $a[$i];
                array_push($count, $temp);
            }
            $i++;
        }
    
        $_SESSION['$count']=$count;

    ?>  
    <footer>
    <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>


</body>
 


</html>
