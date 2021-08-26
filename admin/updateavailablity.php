<?php
    $conn = mysqli_connect("localhost", "root", "", "canteen") or die("Connection Error: " . mysqli_error($conn));
    $result = mysqli_query($conn, "SELECT * FROM food_items ");
?>

<!DOCTYPE html>
<html>
  <title>Update Availablity</title>

<link rel="stylesheet" href="../admincss.css"> 


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
        padding: 18px 129.5px;
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

    fieldset
    {
        max-width:500px;
        padding:40px;	
    }
    legend
    {
        color: brown;
        font-size: 20px;
        border:2px brown;
        border-radius:8px;
        font-weight: bold;
    }

</style>
<head>
    <center>
    <img class="header" src="../images/header.png" alt="TCE FOOD COURT">  
    </center>
    <br><br>
    <div class="navbar">
        <a href="admin.php">Home</a>
        <a href="addcredit.php">Add Credits</a>
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
                <a href="additem.php">Add Items</a>
                <a href="removeitem.php">Remove Items</a>
            </div>
        </div>
        <a href="../index.php">Logout</a>
    </div>
</head>

<style>
  input[type=submit] 
    {
        width: 60%;
        background-color: brown;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type=submit]:hover 
    {
        background-color: red;
    }
    input[type=checkbox] 
    {
        zoom: 1.5;
    }
</style>

<body>
<br><br><br><br>

<form action="" method='post'>
<center>
    <fieldset style="border:solid 5px ; border-color:brown">
    <legend>ITEMS AVAILABLE</legend>
        <?php
            $i=0;
            while($row = mysqli_fetch_array($result)) 
            {
        ?>
        <div style="text-align:left;  margin-left: 160px; padding:10px 10px; font-size:large"> <input type="checkbox" name="<?=$row["item_name"];?>"  >&emsp;&emsp; <?=$row["item_name"];?><br></div>
        <?php
            $i++;
        }
        ?>
        <br><br>
        <center><input type="submit" value="submit"></center>
    </fieldset>
</center>
</form>

<?php
if(count($_POST)>0) 
{
    session_start();
    $total =0;
    $_SESSION["Page_NO"]=1;
    $conn = mysqli_connect("localhost", "root", "", "canteen") or die("Connection Error: " . mysqli_error($conn));
    $result = mysqli_query($conn," update food_items set include=0 where 1");
    foreach($_POST as $x => $x_value) 
    {
        $temp = str_replace("_"," ","$x");
        $age[$temp] = $x_value;
        if($x_value=="on")
        {
            $result = mysqli_query($conn," update food_items set include=1 where item_name='" . $temp . "'");
        }
    }
    $message = "Availablity updated!";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>
</body>
</html>
