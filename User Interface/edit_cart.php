<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Allows ability to add members to database" />
    <meta name="author" content="Kipp STRATMANN" />
    <title>GotoGrow-MRM Member Management</title>
</head>
<body>
    <header>
        <?php
         /* Add_Member.php
        Author: K. Stratmann
        Last Edited: 15/09/2022
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
	<h2>GotoGrow-MRM Member Management - Add Members</h2>
    <p>This page is used to add members to the membership database.</p>

    <?php

    session_start ();
        $count = $_SESSION['$count'];
        $a = $_SESSION['$a'];
        $b = $_SESSION['$b'];
        $customerid = $_SESSION['$id'];
        $servername = "localhost";
        $user = "root";
        $pwd = "";
        $sql_db = "goto_gro_databases";
        $conn = new mysqli($servername, $user, $pwd, $sql_db);
    


    $sql_table = "stock";
    $query = "SELECT stockName, stockPrice_AUD, stockQuantity FROM $sql_table WHERE stockQuantity > 0";
    $result = mysqli_query($conn, $query);

    

echo"    <form method='post' action='add_cart_conf.php'
        <fieldset>
            <legend><strong>Member Details</strong></legend>
            <p><label for='id'>Member ID:</label>
            <input type='text' name='id' id='id' value='$customerid'/></p>
        </fieldset>
        <hr>
        <filedset>
        <legend><strong>Select Items</strong></legend>";
        if ($result->num_rows > 0) {
            // output data of each row
            echo "<table><tr><th>Item</th><th>Quantity</th>";
            $i = 0;
            $j = -1;
            $k = 1;
            while($row = $result->fetch_assoc()) {
                echo "<tr><td><input type='text' name=$j id=$j value='$row[stockName]' size='50'/> </td><td> 
                <input type='number' name=$k id=$k max='$row[stockQuantity]' value=$a[$i] min='0'/></td>";
                $j--;
                $k++;
                $i++;
            }
               
            echo "</table>";

        }
    
        echo"<input type= 'submit' value='Submit Form'/>
        <input type= 'reset' value='Clear Form'/>

    
    </div></form>";



?>

	<footer>
        <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>


</body>
 


</html>
