<?php
  session_start();
?>

<!DOCTYPE html>
<html>

<title>Login</title>

<head>
   <center>
   <img class="header" src="images/header.png" alt="TCE FOOD COURT" height="80"> 
   </center>
</head>     

<style>
  .header 
  {
    background-repeat:no-repeat;
    background-size:cover;
    height: 60px;
    width: 600px;
  }
  body 
  {
    background-image: url("images/bg.jpg");
    background-repeat:no-repeat;
    background-size:cover;
    height: 750px;
  }
  .main
  {
      width: 320px;
      height: 420px;
      background-repeat: no-repeat;
      background-position: left top;
      background-attachment: fixed;
      background-size: cover;
      color: brown;
      top: 50%;
      left: 50%;
      position: absolute;
      transform: translate(-50%,-50%);
      box-sizing: border-box;
      padding: 70px 30px;
  }
  .main input
  {
      width: 100%;
      margin-bottom: 20px;
  }
  .main label
  {
      margin: 0;
      padding: 0;
      font-weight: bold;
  }
  h1
  {
      margin: 0;
      padding: 0 0 20px;
      text-align: center;
      font-size: 22px;
  }
  .main input[type="text"], input[type="password"]
  {
      border: none;
      border-bottom: 2px solid brown;
      background: white;
      outline: 1px;
      height: 50px;
      color: black;
      font-size: 15px;
  }
  .main input[type="submit"]
  {
      border: none;
      outline: none;
      height: 40px;
      background: brown;
      color: white;
      font-size: 20px;
      border-radius: 20px;
  }
  .main input[type="submit"]:hover
  {
      cursor: pointer;
      background: red;
      color:white;
  }
  .logo
  {
      width: 100px;
      height: 100px;
      border-radius: 80%;
      position: absolute;
      top: 5px;
      left: calc(50% - 50px);
  }
</style>

<body>
  <div class="main">
      <form method="post">       
      <img src="icon.jpeg" class="logo">
      <br><br><br><br>
        <h1 style="color:brown;" > LOGIN </h1><br>

        <label for="username">Username </label><br><br>
        <input type="text" id="username" name="userName" required>
        <br>

        <label for="password">Password </label><br><br>
        <input type="password" id="password" name="password" required>
        <br>

        <input type="submit" value="Sign In" name="submit">
      </form>
  </div>
</body>

<?php
  $message="";
  if(count($_POST)>0) 
  {
    $conn = mysqli_connect("localhost","root","","canteen");
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $result = mysqli_query($conn,"SELECT * FROM user WHERE username='" . $_POST["userName"] . "' and password = '". $_POST["password"]."'");
    $result1=mysqli_query($conn,"SELECT * FROM user WHERE username='" . $_POST["userName"] . "' and password = '". $_POST["password"]."' and type = '1' ");
    $count  = mysqli_num_rows($result);
    $count1  = mysqli_num_rows($result1);
    if($count==0) 
    {
      $message = "Invalid Username or Password!";
    } 
    else 
    {
      $message = "You are successfully authenticated!";
      $_SESSION["userid"] = $_POST["userName"];

      if($count1==0)
        header("Location: user/user.php");
      else 
      {
        header("Location: admin/admin.php");
      }
      exit;
    }
  }
  ?>
</html>
