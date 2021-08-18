<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <h1 style="color:brown; font-size:40px; text-align: center;">TCE FOOD COURT</h1> 
    <div class="btn-group">
        <a button class="button" href="user.php">Home</button></a>
        <a button class="button" href="order.php">Order Now</button></a>
        <a button class="button" href="../index.php">Logout</button></a>
    </div>
</head>
<style>
    body 
    {
        font-family:sans-serif;
        background-color: lemonchiffon;
    }

    .btn-group .button 
    {
        background-color: brown;
        border: 1px solid brown;
        color: white;
        padding: 20px 193px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
        float: left;
    }

    .btn-group .button:not(:last-child) 
    {
        border-right: none; 
    }

    .btn-group .button:hover 
    {
        background-color: red;
    }

    #menu 
    {
        border-collapse: collapse;
        width: 65%;
        text-align: center;
        font-size: 20px;
    }

    #menu td, #menu th 
    {
        background-color: lemonchiffon;
        border: 1px solid brown;
        padding: 8px;
        font-size: 20px;
    }

    #menu th 
    {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: brown;
        color: white;
        font-size: 20px;
    }
</style>

<body>
    <center><br><br><br><br><h2 style="color:brown;"> My Orders</h2><br></center>
    <center>
    <table id="menu">
    <tr>
    <th>Item_name</th>
    <th>QTY</th>
    <th>Time</th>
    <th>Date </th>
    <tr>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "canteen");
    $sql = "SELECT * FROM order_details WHERE username= '" . $_SESSION["userid"] . "';";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) 
    {
        $temp1 = substr($row["timestamp"],11,9);
        $temp2= substr($row["timestamp"],0,10);
        echo "<tr><td>" . $row["item_name"]. "</td><td>".$row["item_qty"]."</td><td>".$temp1."</td><td>".$temp2."</td><tr>";
    }
    echo "</table></center>"
    ?>
      
</body>
</html>
