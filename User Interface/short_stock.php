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
        <li class="menu"><a href="check_cart.php">Ordering</a></li>
    </ul>		
</nav>
<hr> 
    <?php
    //Starts the session
    session_start();

    //Delcearse the rest of the vairables to be used
    $servername = "localhost";
    $proid = $_POST["proid"];
    $propass = $_POST["propass"];
	$user = "root";
	$pwd = "";
	$sql_db = "goto_gro_databases";
    //Makes the connection to the database
    $conn = new mysqli($servername, $user, $pwd);
    $conn2 = new mysqli($servername, $user, $pwd, $sql_db);
    echo "<h2>Short Stock Levels</h2>";

	$query = "SELECT userType, userLoginName, userPassword FROM users WHERE userLoginName = '$proid'";
    $result = mysqli_query($conn2, $query);
    if ($result->num_rows > 0 || $proid === "admin" && $propass === "Pa55w.rd") {
            while($row = $result->fetch_assoc()) {
                $type = $row["userType"];
                $id = $row["userLoginName"];
                $pass = $row["userPassword"];
		}
    }


    if ($proid === "admin" && $propass === "Pa55w.rd" || $type == 'Floorstaff' && $id == $proid && $pass == $propass || $type == "Manager" && $id == $proid && $pass == $propass) {

            //Checks if the database connection is successful
            if ($conn2->connect_error) {
                $createdatabse = "CREATE DATABASE $sql_db";
                mysqli_query($conn, $createdatabse);
                $conn->close();
                echo "<p>Database connection failure, try again</p>";
            } else {
                //If the connection is successful add the data to the appropirate table
                $sql_table = "stock";
                $query = "SELECT stockName, stockQuantity FROM $sql_table WHERE stockQuantity < 10";
                $result = $conn2->query($query);
                if (!$result) {
                    echo "<p>Error! ontact the site delevlopers</p>";
                } else {
                    //Provide feedback to the user on the result
                    echo "<p>Your results are displayed below</p>";
                }

                if ($result->num_rows > 0) {
                // output data of each row
                echo "<table><tr><th>Name</th><th>Quantity</th>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["stockName"]. "</td><td>" . $row["stockQuantity"]. " </td>";
                }   
                echo "</table>";
                } else {
                echo "0 results";
                }
                //Close the connection
                $conn2->close();
                echo "<br><button onclick='window.print()'>Print this page</button>";
            }
        }
        else {
            echo "<p>You are not premitted to access this page, sorry!</p>";
        }
            
        
    ?>  
    <footer>
    <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>


</body>
 


</html>
