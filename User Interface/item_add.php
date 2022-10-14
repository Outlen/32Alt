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
<h2>GotoGrow-MRM Item Management - Add Item</h2>
<p>This page is used to add an item to the stock database.</p>

<?php

$proid = $_POST["proid"];
$propass = $_POST["propass"];
 $servername = "localhost";
 $user = "root";
 $pwd = "";
 $sql_db = "goto_gro_databases";
 $sql_table = "users";
 $conn = new mysqli($servername, $user, $pwd, $sql_db);
 $query = "SELECT userType, userLoginName, userPassword FROM $sql_table WHERE userLoginName = '$proid'";
 $result = mysqli_query($conn, $query);
 if ($result->num_rows > 0 || $proid === "admin" && $propass === "Pa55w.rd") {
         while($row = $result->fetch_assoc()) {
             $type = $row["userType"];
             $id = $row["userLoginName"];
             $pass = $row["userPassword"];
		}
 }



if ($proid === "admin" && $propass === "Pa55w.rd" || $type == "Manager" && $id == $proid && $pass == $propass)    
{ echo"
    <form method='post' action='item_add_config.php'
        <fieldset>
            <legend><strong>Item Details</strong></legend>
            <p><label for='itemname'>Item Name: </label>
            <input type='text' name='itemname' id='itemname' maxlength='100' required/></p>
            <p><label for='itemprice'>Item Price (AUD): </label>
            <input type='number' step='0.05' name='itemprice' id='itemprice' maxlength='11' required/></p>
            <p><label for='itemquantity'>Item Quantity: </label>
            <input type='number' name='itemquantity' id='itemquantity' pattern='[0-9]+' maxlength='11' required/></p>
			<p><label for='itemname'>Item Category: </label>
            <input type='text' name='itemcat' id='itemcat' maxlength='100' required/></p>
        </fieldset>
        <br>

        <input type= 'submit' value='Submit Form'/>
        <input type= 'reset' value='Clear Form'/>
            
    </form>
    ";}
    else {
        echo "<p>You are not permitted to access this page, sorry!</p>";
    }
?>


<footer>
        <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>

</body>

</html>
