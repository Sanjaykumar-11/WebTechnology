<!DOCTYPE html>
<html>
  <title>Admin</title>
<link rel="stylesheet" href="admincss.css"> 
<head>
    <h1 style="color:brown; font-size:40px; text-align: center;">TCE FOOD COURT</h1> 
    <br><br>
    <div class="navbar">
        <a href="updateavailablity.php">Update Availablity</a>
        <a href="addcredit.php">Add Credits</a>
        <a href="vieworder.html">View Orders</a>
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
                <a href="additem.html">Add Items</a>
                <a href="removeitem.html">Remove Items</a>
            </div>
        </div>
        <a href="index.html">Logout</a>
    </div>
</head>

<script src="script.js" async defer></script>
<body>
    <br><br><br><br>
    <div class="container">
        <h4 style="color: black;">Your balance</h4>
        <h1 id="balance">0.0 INR</h1>
        <div class="inc-exp-container">
          <div>
            <h4>Income</h4>
            <p id="money-plus" class="money plus">0.00 INR</p>
          </div>
          <div>
            <h4>Expense</h4>
            <p id="money-minus" class="money minus">-0.00 INR</p>
          </div>
        </div>
        <h3>History</h3>
        <ul id="list" class="list">
        </ul>
        <h3>Add New Transation</h3>
        <form action="" id="form">
          <div class="form-control">
            <input type="text" id="text" placeholder="Please enter the name of your expenses..." />
          </div>
          <div class="form-control">
            <label for="amount"></label>
            <input type="number" id="amount" placeholder="Amount"/>
          </div>
          <button class="btn">Add transaction</button>
        </form>
      </div>  
</body>
</html>
