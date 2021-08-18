<?php
$conn = mysqli_connect("localhost", "root", "", "canteen") or die("Connection Error: " . mysqli_error($conn));
if(count($_POST)>0) 
{
  session_start();
  $total =0;
  foreach($_POST as $x => $x_value) 
  {
    $age[$x] = $x_value;
    if($x_value=="on")
    {
      $result = mysqli_query($conn," update order_details set status=1 where Order_id='" . $x . "'");
    }
  }
  $message = "Delivery status updated";
  echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="admincss.css"> 
<style>
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


<head>
    <h1 style="color:brown; font-size:40px; text-align: center;">TCE FOOD COURT</h1> 
    <br><br>
    <div class="navbar">
        <a href="">Home</a>
        <a href="">Update Availablity</a>
        <a href="addcredit.html">Add Credits</a>
        <div class="dropdown">
          <button class="dropbtn">Users
            <i class="fa fa-caret-down"></i>
          </button>
          <div class="dropdown-content">
            <a href="adduser.html">Add user</a>
            <a href="removeuser.html">Remove user</a>
          </div>
        </div>
        <div class="dropdown">
            <button class="dropbtn">Items
                <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                <a href="additem.html">Add Items</a>
                <a href="removeitem.html">Remove Items</a>
            </div>
        </div>
        <a href="index.html">Logout</a>
    </div>
</head>

<body>
<center><br><br><h2 style="color:brown;"> Orders </h2><br></center>
<center>
  <form action="" method="post">
      <table id="menu">
          <tr>
            <th>Delivered</th>
            <th>Username</th>
            <th>Item</th>
            <th>Quantity</th>
          </tr>

          <?php
          $conn = mysqli_connect("localhost", "root", "", "canteen") or die("Connection Error: " . mysqli_error($conn));
          $i=0;
          $result = mysqli_query($conn, "SELECT * FROM order_details where Status='0' ORDER BY timestamp DESC ");

          while($row = mysqli_fetch_array($result)) 
          {
          ?>
          <tr>
          <td><input type="checkbox" name="<?=$row["Order_id"];?>"  > </td><td><?=$row["username"];?></td> <td> <?=$row["item_name"];?></td> <td ><?=$row["item_qty"];?></td>
          </tr>
          <?php
          $i++;
          }
          ?>

          </table>

          <br>
          <br>
          <input type="submit" value="Confirm">
          </form>
          </center>

</body>

</html>