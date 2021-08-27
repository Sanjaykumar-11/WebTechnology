<!DOCTYPE html>
<html>
  <title>Admin</title>
<link rel="stylesheet" href="../admincss.css"> 
<head>
  <center>
  <img class="header" src="../images/header.png" alt="TCE FOOD COURT">  
  </center>
    <br><br>
    <div class="navbar">
        <a href="updateavailablity.php">Update Availablity</a>
        <a href="addcredit.php">Add Credits</a>
        <a href="vieworder.php">View Orders</a>
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
                <a href="additem.php">Add Items</a>
                <a href="removeitem.php">Remove Items</a>
            </div>
        </div>
        <a href="../index.php">Logout</a>
    </div>
</head>
<style>
    .header 
    {
      background-repeat:no-repeat;
      background-size:cover;
      height: 50px;
      width: 500px;
    }
    body
    {
        background-attachment: fixed;
        font-family: sans-serif;
        background-image: url("../images/bg.jpg");
        background-repeat:no-repeat;
        background-size:cover;
        height: 750px;
    }
    .navbar 
    {
        overflow: hidden;
        background-color: brown;
    }
    .navbar a 
    {
        float: left;
        font-size: 16px;
        color: white;
        text-align: center;
        padding: 16px 75px;
        text-decoration: none;
    }

    .dropdown 
    {
        float: left;
        overflow: hidden;
    }

    .dropdown .dropbtn 
    {
        font-size: 16px;  
        border: none;
        outline: none;
        color: white;
        padding: 16px 75px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }
    .navbar a:hover, .dropdown:hover .dropbtn 
    {
        background-color: red;
    }

    .dropdown-content 
    {
        display: none;
        position: absolute;
        background-color: transparent;
        min-width: 160px;
        box-shadow: 0px 8px 50px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a 
    {
        float: none;
        color: black;
        padding: 14px 50px;
        text-decoration: none;
        display: block;
        text-align: left;
    }

    .dropdown-content a:hover 
    {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content 
    {
        display: block;
    }

    .container 
    {
        margin: 30px auto;
        width: 350px;
        background-color: transparent;
    }

    h1 
    {
        letter-spacing: 1px;
        margin: 0;
    }

    h3 
    {
        color: white;
        border-bottom: 1px solid var(--line);
        padding: 10px;
        margin: 40px 0 10px;
        background-color: #333;
    }

    h4 
    {
        margin: 0;
        text-transform: uppercase;
        color: white;
    }

    p 
    {
        color: var(--bg);
        font-weight: bold;
    }
    .inc-exp-container 
    {
        background-color: #333;
        padding: 20px;
        box-shadow: var(--box-shadow);
        display: flex;
        justify-content: space-between;
        margin: 20px 0;
    }
    .inc-exp-container > div 
    {
        flex: 1;
        text-align: center;
    }

    .inc-exp-container > div:first-of-type 
    {
        border-right: 1px solid var(--last);
    }
    .money 
    {
        font-size: 20px;
        letter-spacing: 1px;
        margin: 5px 0;
    }
    .money.plus 
    {
        color: #76ff26;
    }
    .money.minus 
    {
        color: #ff0000;
    }

    label {
    display: inline-block;
    margin: 10px 0;
    font-size: large;
    font-weight: bold;
    text-decoration: underline;
    }

    input[type="text"],
    input[type="number"] {
    border: 1px solid var(--last);
    border-radius: 5px;
    display: block;
    font-size: 16px;
    padding: 10px;
    width: 94%;
    }

    .btn {
    cursor: pointer;
    background-color: #333;
    box-shadow: var(--box-shadow);
    color: white;
    display: block;
    font-size: 16px;
    font-weight: bold;
    margin: 10px 0 30px;
    padding: 10px;
    width: 100%;
    }

    .btn:focus,
    .delete-btn:focus
     {
    outline: none;
    }

    .list 
    {
    list-style-type: none;
    color: black;
    padding: 0;
    margin-bottom: 40px;
    }

    .list li 
    {
    background-color: var(--text);
    color: var(--bg);
    display: flex;
    justify-content: space-between;
    position: relative;
    padding: 10px;
    margin: 10px 0;
    }

    .list li.plus 
    {
    border-right: 5px solid #76ff26;
    }

    .list li.minus 
    {
    border-right: 5px solid #ff0000;
    }

    .delete-btn 
    {
    cursor: pointer;
    background-color: var(--line);
    border: 0;
    font-size: 20px;
    line-height: 20px;
    padding: 2px 5px;
    position: absolute;
    top: 50%;
    left: 0;
    transform: translate(-100%, -50%);
    opacity: 0;
    transition: opacity 0.3s ease-in;
    }
    
    .list li:hover .delete-btn 
    {
    opacity: 1;
    }
</style>
<script src="../script.js" async defer></script>
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
