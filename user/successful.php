<!DOCTYPE html>
<html>
<head>
    <img class="header" src="../images/header.png" alt="TCE FOOD COURT" height="80"> 
    <div class="btn-group">
        <a button class="button" href="user.php">Home</button></a>
        <a button class="button" href="myorder.php">My Orders</button></a>
        <a button class="button" href="../index.php">Logout</button></a>
    </div>

</head>
<style>
    body 
    {
        font-family: sans-serif;
        background-color: lemonchiffon;
    }

    .header 
    {
        background-repeat:no-repeat;
        background-size:cover;
        width: 100%;
    }

    .btn-group .button 
    {
        background-color: brown;
        border: 1px solid brown;
        color: white;
        padding: 20px 196.5px;
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

    button
    {
      font-size: 16px;
      width: 50%;
      background-color: brown;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button:hover 
    {
      background-color: red;
    }

    fieldset
    {
        background-color:#ccc;
        max-width:500px;
        padding:40px;	
    }
    legend
    {
        color: brown;
        font-size: 20px;
        border:2px brown;
        border-radius:8px;
    }
    h1
    {
        font-size: 20px;
    }

</style>
<body>
    <?php

    session_start();
    if($_SESSION["Page_NO"]==1)
    {
        $conn = mysqli_connect("localhost", "root", "", "canteen") or die("Connection Error: " . mysqli_error($conn));
        echo "<center>";
        foreach($_SESSION["order_details"] as $key=>$val) 
        {
            $result= mysqli_query($conn," insert into order_details(username,item_name,item_qty) values('".$_SESSION["userid"]."','$key','$val')");
        }

        $result = mysqli_query($conn," select credit_amount from user where username= '" . $_SESSION["userid"] . "' ");
        $temp=0;

        while($row = mysqli_fetch_assoc($result)) 
        {
            $temp=$row["credit_amount"] ;
        }

        $temp= $temp - $_SESSION["total_bill"];


        $result = mysqli_query($conn," update user SET credit_amount=$temp where username= '" . $_SESSION["userid"] . "' ");

        echo "<br><br><br><br><br><br><h1>Order placed successfully </h1>" ;
        echo "<br>";
        $result = mysqli_query($conn," select credit_amount from user where username= '" . $_SESSION["userid"] . "' ");

        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                echo "<h1>Your balance: " . $row["credit_amount"]. "</h1>";
            }
        } 
        else 
        {
            echo "0 results";
        }
        $_SESSION["Page_NO"]=2;
    }
    ?>

    <center>
    <a href= "order.php">  <button >Order Again</button></a> 
    </center>
</body>

</html>

<?php
  mysqli_close($conn);
?>