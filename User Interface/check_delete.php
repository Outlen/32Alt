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
        <li class="menu"><a href="check_sales_add.php">Add Sales</a></li>
        <li class="menu"><a href="check_sales_edit.php">Edit Sales</a></li>
        <li class="menu"><a href="check_sales_delete.php">Delete Sales</a></li>
        <li class="menu"><a href="check_item_add.php">Add item</a></li>
        <li class="menu"><a href="check_item_edit.php">Edit item</a></li>
        <li class="menu"><a href="check_item_delete.php">Delete item</a></li>
    </ul>		
</nav>
<hr> 
	<h2>GotoGrow-MRM Member Management - Add Members</h2>
    <p>This page is used to add members to the membership database.</p>

    <form method='post' action='Delete_Member.php'>
        <p><label for='proid'>Login ID:</label>
        <input type='text' name='proid' id='proid'/></p>
        <p><label for='propass'>Login Password:</label>
        <input type='password' name='propass' id='propass'/></p>

    <input type= 'submit' value='Submit Form'/>
    <input type= 'reset' value='Clear Form'/>
    </form>

	<footer>
        <hr>
        <p>Site Designed and Created by: MSP32</p> 
</footer>


</body>
 


</html>
