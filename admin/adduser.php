<?php
$message="";
if(count($_POST)>0) 
{
	$conn = mysqli_connect("localhost","root","","canteen");
	if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    else
    {
        $result = mysqli_query($conn," insert into user values ('" . $_POST["userName"] . "','" . $_POST["password"] . "','" . $_POST["privilage"] . "','" . $_POST["credit"] . "')");
        $message = "User added successfully!";
        if($result)
        {
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
}
   

?>
<!DOCTYPE html>
<html>
<title>Add user</title>
<head>
    <center>
    <img class="header" src="../images/header.png" alt="TCE FOOD COURT">
    </center>  
    <br><br>
    <div class="navbar">
        <a href="admin.php">Home</a>
        <a href="updateavailablity.php">Update Availablity</a>
        <a href="vieworder.php">View Orders</a>
        <div class="dropdown">
          <button class="dropbtn">Users
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="removeuser.php">Remove user</a>
          </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Items
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="additem.php">Add Items</a>
                <a href="removeitem.php">Remove Items</a>
            </div>
        </div>
        <a href="../index.php">Logout</a>
    </div>
</head>

<style>
    body
    {
        background-attachment: fixed;
        font-family: sans-serif;
        background-image: url("../images/bg.jpg");
        background-repeat:no-repeat;
        background-size:cover;
        height: 750px;
    }
    .header 
    {
        background-repeat:no-repeat;
        background-size:cover;
        height: 50px;
        width: 500px;
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
        padding: 16px 80px;
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
        background-color: #E7E5E6;
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
    <center><br><br><h2 style="color:brown;">Add User</h2><br></center>

    <center>
        <form action="" method="post">
          <label for="username">Username &ensp;&ensp;</label>
          <input type="text" name="userName" required>
        <br>
      <label for="pass">Password  &ensp;&ensp;&ensp;</label>
      <input type="password" name="password" required>
      <br>
      <label for="usertype">User Type&ensp;&ensp;&ensp;</label>
      <input type="number" name="privilage" placeholder="1 for admin 0 for normal" min="0" max="1"><br>
      <label for="usertype">Credit amount&ensp;</label>
      <input type="number" name="credit" min="100" required><br><br>
          <input type="submit" value="ADD">
      </form>
    </center>
</body>
</html>
