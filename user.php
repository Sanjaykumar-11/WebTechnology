<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<title>User</title>
<head>
    <h1 style="color:brown; font-size:40px; text-align: center;">TCE FOOD COURT</h1> 

    <div class="btn-group" center>

        <a button class="button" href="order.php">Order Now</button></a>
        <a button class="button" href="myorder.php">My Orders</button></a>
        <a button class="button" href="index.php">Logout</button></a>

        <?php
            $conn = mysqli_connect("localhost","root","","canteen");
            if (mysqli_connect_errno())
            {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
            }
            $result = mysqli_query($conn," select credit_amount from user where username= '" . $_SESSION["userid"] . "' ");
            if (mysqli_num_rows($result) > 0) 
            {
                while($row = mysqli_fetch_assoc($result)) 
                {
                    echo "<br><br><br><br><center><h2>Your Balance: " . $row["credit_amount"]. " INR</h2><center>";
                }
            } 
            else 
            {
                echo "0 results";
            }
        ?>

    </div>

</head>
<style>
    body 
    {
        font-family: Arial, Helvetica, sans-serif;
        background-color: lemonchiffon;
    }

    .btn-group .button 
    {
        background-color: brown;
        border: 1px solid brown;
        color: white;
        padding: 20px 191px;
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
    
    h2
    {
        color: #333;
        font-size: 25px;
    }
</style>

<body>
    <center><br><br><br><br><h2 style="color:brown;"> Menu </h2><br></center>
    <table id="menu" align="center">
        <tr>
          <th>Item name</th>
          <th>Cost</th>
        </tr>
        <tr>
          <td>Dosa</td>
          <td>15</td>
        </tr>
        <tr>
          <td>Parota</td>
          <td>10</td>
        </tr>
        <tr>
          <td>Puri</td>
          <td>30</td>
        </tr>
      </table>
      
</body>


</html>