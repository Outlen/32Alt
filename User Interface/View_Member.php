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
    </ul>		
</nav>
<hr> 
	<h2>GotoGrow-MRM Member Management - View member</h2>
    <p>This page is used to see the details of a member.</p>

    <?php
	
    $proid = $_POST["proid"];
    $propass = $_POST["propass"];
    $servername = "localhost";
    $user = "root";
	$pwd = "";
	$sql_db = "goto_gro_databases";
    $sql_table = "users";
    $conn = new mysqli($servername, $user, $pwd, $sql_db);
    $query = "SELECT userType, userLoginName, userPassword, userFirstName, userLastName, userEmail, userPhone, userAddress  FROM $sql_table WHERE userLoginName = '$proid'";
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $type = $row["userType"];
                $id = $row["userLoginName"];
                $pass = $row["userPassword"];
				$gname = $row["userFirstName"];
				$fname = $row["userLastName"];
				$email = $row["userEmail"];
				$phone = $row["userPhone"];
				$address = $row["userAddress"];
				
				echo "
					<p>Name: $gname $fname</p>
					<p>membership: userType</p>
					<p>Email: $email</p>
					<p>Address: $address</p>
					<p>Phone: $phone</p>
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
