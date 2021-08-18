<?php
$conn = mysqli_connect("localhost", "root", "", "canteen") or die("Connection Error: " . mysqli_error($conn));
$result = mysqli_query($conn, "SELECT * FROM food_items ");
?>

<!DOCTYPE html>
<html>
  <title>Admin</title>
<link rel="stylesheet" href="admincss.css"> 

<head>
    <h1 style="color:brown; font-size:40px; text-align: center;">TCE FOOD COURT</h1> 
    <br><br>
    <div class="navbar">
        <a href="index.html">Home</a>
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
<style>
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
  <br><br><br><br>
<form action="" method='post'>
<fieldset style="border:solid 5px ; ">

  <legend>ITEMS AVAILABLE</legend>
<?php
$i=0;
while($row = mysqli_fetch_array($result)) {
?>

  <div style="float:bottom;  margin-top:50px; margin-left:50px"><input type="checkbox" name="<?=$row["item_name"];?>"  > <?=$row["item_name"];?> <br></div>
<?php
$i++;
}
?>
<br>
<br>
<center><input type="submit" value="submit"></center>
</fieldset>
</div>
</form>

<?php
if(count($_POST)>0) {
session_start();
$total =0;
$_SESSION["Page_NO"]=1;
$conn = mysqli_connect("localhost", "root", "", "canteen") or die("Connection Error: " . mysqli_error($conn));
$result = mysqli_query($conn," update food_items set include=0 where 1");
foreach($_POST as $x => $x_value) {
$temp = str_replace("_"," ","$x");

$age[$temp] = $x_value;
if($x_value=="on"){
$result = mysqli_query($conn," update food_items set include=1 where item_name='" . $temp . "'");
$message = "Availablity updated!";
echo "<script type='text/javascript'>alert('$message');</script>";
}
}
}
?>
</body>
</html>
