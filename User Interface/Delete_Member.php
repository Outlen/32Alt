<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Allows ability to delete members from database" />
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
        <li class="menu"><a href="check_sales_add.php">Add Sales</a></li>
        <li class="menu"><a href="check_sales_edit.php">Edit Sales</a></li>
        <li class="menu"><a href="check_sales_delete.php">Delete Sales</a></li>
        <li class="menu"><a href="check_item_add.php">Add item</a></li>
        <li class="menu"><a href="check_item_edit.php">Edit item</a></li>
        <li class="menu"><a href="check_item_delete.php">Delete item</a></li>
    </ul>		
</nav>
<hr> 
	<h2>GotoGrow-MRM Member Management - Delete Members</h2>
    <p>This page is used to delete members from the membership database.</p>

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



if ($proid === "admin" && $propass === "Pa55w.rd" || $type == "Manager" && $id == $proid && $pass == $propass) { echo"
    <form method='post' action='delete_member_conf.php'>
        <fieldset>
            <legend><strong>Member Details</strong></legend>
            <p><label for='gname'>Given Name:</label>
            <input type='text' name='gname' id='gname'/></p>
            <p><label for='fname'>Family Name:</label>
            <input type='text' name='fname' id='fname'/></p>
            <p><label for='phone'>Phone Number:</label>
            <input type='text' name='phone' id='phone' pattern='[0-9]{10}' maxlength='10' minlength='10'/></p>
            <p><label for='loginid'>Login ID:</label>
            <input type='text' name='loginid' id='loginid'/></p>

        </fieldset>
        <br>

        <input type= 'submit' value='Submit Form'/>
        <input type= 'reset' value='Clear Form'/>
            
    </div></form>";
}
else {
    echo "<p>You are not permitted to access this page, sorry!</p>";
}
}
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
