<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<title>User</title>
<head>
    <center>
    <img class="header" src="../images/header.png" alt="TCE FOOD COURT" height="80">  
    </center>
    <br><br><br>
    <div class="btn-group" center>

        <a button class="button" href="order.php">Order Now</button></a>
        <a button class="button" href="myorder.php">My Orders</button></a>
        <a button class="button" href="../index.php">Logout</button></a>

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
                    echo "<br><br><br><br><br><br><br><br><br><center><h2>Your Balance: " . $row["credit_amount"]. " INR</h2><center>";
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

    .btn-group .button 
    {
        background-color: brown;
        border: 1px solid brown;
        color: white;
        padding: 20px 184px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 18px;
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
        background-color: rgb(231, 229, 230);
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
<th>Item</th>
<th>Cost</th>
</tr>
<?php
    $sql = "SELECT * FROM food_items where include=1";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            echo "<tr><td>" . $row["item_name"]. "</td><td>" . $row["price"] . "</td>";
        }
        echo "</table>";
    }
    $conn->close();
?>
</table>
      
</body>
</html>