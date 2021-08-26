<?php
  $conn = mysqli_connect("localhost", "root", "", "canteen") or die("Connection Error: " . mysqli_error($conn));
  $result = mysqli_query($conn, "SELECT * FROM food_items where include=1");
?>

<!DOCTYPE html>
<html>
<head>
  <center>
    <img class="header" src="../images/header.png" alt="TCE FOOD COURT" height="80">  
  </center>
  <br>
  <br>
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
        font-family: sans-serif;
        background-image: url("../images/bg.jpg");
        background-repeat:no-repeat;
        background-size:cover;
        height: 750px;
        background-attachment: fixed;
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

    input[type=submit] 
    {
      width: 10%;
      font-size: 16px;
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
    <center><br><br><br><br><h2 style="color:brown;"> PLACE ORDER </h2><br></center>
    <form action="confirmation.php" method='post'>
    <?php
      $i=0;
      while($row = mysqli_fetch_array($result)) 
      {
    ?>
    <center><?=$row["item_name"];?>&ensp;&ensp;<input type="number" name="<?=$row["item_name"];?>" min="0" ></center>
    <?php
      $i++;
      }
    ?>  
    <center><input type="submit" value="Submit">
    </form>
</body>

</html>

<?php
  mysqli_close($conn);
?>