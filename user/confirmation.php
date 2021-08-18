<!DOCTYPE html>
<html>
<head>
    <h1 style="color:brown; font-size:40px; text-align: center;">TCE FOOD COURT</h1> 
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

    .btn-group .button 
    {
        background-color: brown;
        border: 1px solid brown;
        color: white;
        padding: 20px 194px;
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
    <br><br>    
    <br><br>    
    <br><br>
    <center>    
    <fieldset>
        <legend><b>&nbsp;&nbsp;CONFIRMATION&nbsp;&nbsp;</b></legend>
    <?php
    session_start();
    $total =0;
    $_SESSION["Page_NO"]=1;
    $_SESSION["Bal"]=0;
    $_SESSION["Bill"]=0;
    $conn = mysqli_connect("localhost", "root", "", "canteen") or die("Connection Error: " . mysqli_error($conn));
    foreach($_POST as $x => $x_value) 
    {
        $temp = str_replace("_"," ","$x");
        $age[$temp] = $x_value;
    }
    foreach($age as $x => $x_value) 
    {
        $result = mysqli_query($conn," select price from food_items  where item_name='" . $x . "'");
        echo "<center>";
        while($row = mysqli_fetch_assoc($result))
        {
            $cost=$row["price"];
            $total  = $total + ( intval($cost) * intval($x_value));
        }

    }
    $_SESSION["order_details"] = $age;
    $_SESSION["total_bill"] = $total;
    echo "<h1>Total Amount:  $total ";
    echo "</h1><br>";
    $temp;
    $result = mysqli_query($conn," select credit_amount from user where username= '" . $_SESSION["userid"] . "' ");
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            echo "<br>";
            echo " <h1>Your balance: " . $row["credit_amount"]. " ";
            echo "</h1><br>";
            echo "<br>";

            $temp = $row["credit_amount"];
            if($temp < $total)
            {
                $_SESSION["Bal"]=$row["credit_amount"];
                $_SESSION["Bill"]=$total;
                header("unsuccessful.php");
            }
        }
    }
    ?>      
                                    
    <a href ="successful.php">  <button  >Confirm</button></a>
    <a href='order.php'><button >Go Back</button></a>

    </fieldset>
    </center>

</body>

</html>

<?php
  mysqli_close($conn);
?>