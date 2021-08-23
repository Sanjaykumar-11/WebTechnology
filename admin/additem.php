<?php
$message="";
if(count($_POST)>0) 
{
	$conn = mysqli_connect("localhost","root","","canteen");
	if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
	$result = mysqli_query($conn," insert into food_items values ('"  . $_POST["Item_name"] . "','" . $_POST["Item_cost"] . "','1')");
    $message = "Item is added successfully";
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>


<!DOCTYPE html>
<html>
<title>Add Item</title>
<head>
    <img class="header" src="../images/header.png" alt="TCE FOOD COURT" height="80">  
    <br><br>
    <div class="navbar">
        <a href="admin.php">Home</a>
        <a href="addcredit.php">Add credits</a>
        <a href="updateavailablity.php">Update Availablity</a>
        <a href="">View Orders</a>
        <div class="dropdown">
          <button class="dropbtn">Users
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="adduser.php">Add user</a>
            <a href="removeuser.php">Remove user</a>
          </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Items
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="removeitem.php">Remove Items</a>
            </div>
        </div>
        <a href="../index.php">Logout</a>
    </div>
</head>

<style>
    body
    {
        font-family:sans-serif;
        background-color: lemonchiffon;
    }
    .header 
    {
        background-repeat:no-repeat;
        background-size:cover;
        width: 100%;
    }
    .navbar 
    {
        overflow: hidden;
        background-color: brown;
    }

    .navbar a 
    {
        float: left;
        font-size: 16px;
        color: white;
        text-align: center;
        padding: 16px 58px;
        text-decoration: none;
    }

    .dropdown 
    {
        float: left;
        overflow: hidden;
    }

    .dropdown .dropbtn 
    {
        font-size: 16px;  
        border: none;
        outline: none;
        color: white;
        padding: 16px 75px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }

    .navbar a:hover, .dropdown:hover .dropbtn 
    {
        background-color: red;
    }

    .dropdown-content 
    {
        display: none;
        position: absolute;
        background-color: lemonchiffon;;
        min-width: 160px;
        box-shadow: 0px 8px 50px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a 
    {
        float: none;
        color: black;
        padding: 14px 50px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover 
    {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content 
    {
        display: block;
    }
    input[type=number], select 
    {
        width: 70%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type=text], select 
    {
        width: 70%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type=password], select 
    {
        width: 70%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] 
    {
        width: 10%;
        background-color: brown;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover 
    {
        background-color: red;
    }
</style>


<body>
    <center><br><br><br><br><h2 style="color:brown;">Add Items</h2><br></center>

    <center>
        <form action="" method="post">
          <label for="Item name">Item name&ensp;</label>
          <input type="text" name="Item_name" placeholder="Item name"><br>
      <label for="price">Price  &ensp;&ensp;&ensp;&ensp;&ensp;</label>
      <input type="number" name="Item_cost" placeholder="cost">
      <br>
          <input type="submit" value="ADD">
        </form>
    </center>
</body>
</html>
