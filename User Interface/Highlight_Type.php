<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="author" content="Allen" />
    <title>GotoGrow-MRM Member Management</title>
</head>
<body>
    <header>
        <?php
         /* Highlight.php
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
	<h2>GotoGrow-MRM Member Management - Highlight product type</h2>
    <p>See what product types members are buying</p>

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

	if ($proid === "admin" && $propass === "Pa55w.rd" || $type == "Manager" && $id == $proid && $pass == $propass) { echo"
    <form method='post' action='Highlight_Type_conf.php'
        <fieldset>
            <legend><strong>Select the month and year</strong></legend>
            <p><label for='month'>Month:</label>
            <input type='text' name='month' id='month' pattern = '(?:[Jj]anuary|[Ff]ebruary|[Mm]arch|[Aa]pril|[Mm]ay|[Jj]une|[Jj]uly|[Aa]ugust|[Ss]eptember|[Oo]ctober|([Nn]ov|[Dd]ec)ember)' required/></p>
			<p><label for='year'>Year:</label> 
			<input type='number' name='year' id='year' min=2010 max=2099 required/>
			

        </fieldset>
        <br>

        <input type= 'submit' value='Submit Form'/>
        <input type= 'reset' value='Clear Form'/>

    
    </div></form>";
    }

?>

	<footer>
        <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>


</body>
 


</html>
