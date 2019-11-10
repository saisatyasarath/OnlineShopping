<?php
include 'connect.php';
session_start();
if(isset($_SESSION["uid"])){
  //echo $_SESSION["uid"];  
}else{
  header("Location:login.php");
}
$error1 ='';
$error2 ='';
$error3 ='';
$error4 ='';
$error5 ='';
$error6 ='';

if(isset($_GET['err1']))
{
    if($_GET['err1']=='empty_dno')
    {
        $error1 = "*Dno required";
    }
    if($_GET['err2']=='empty_city')
    {
        $error2 = "*City required";
    }
    if($_GET['err3']=='empty_state')
    {
        $error3 = "*State required";
    }
    if($_GET['err4']=='empty_phone')
    {
        $error4 = "*Phone number required";
    }
    if($_GET['err5']=='empty_email')
    {
        $error5 = "*Name required";
    }
}


?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
body {
  font-family: "Lato", sans-serif;
}

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}
.size{
	margin-left: 25%;
	width: 800px;
}

.bcolor{
	color: white;
	background-color: blue;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.error{
	color: red;
}
</style>
</head>
<body>
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="dashboard.php">Home</a>
  <a href="shop.php">Shop</a>
  <a href="sellItem.php">Sell Items</a>
  <a href="addAddress.php">Add Address</a>
  <a href="#">Contact Us</a>
  <a href="logout.php">Logout</a>

</div>

<div id="main">
    <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

	<form class="form-horizontal size" action="addAddressToDatabase.php" method="post">
    <div class="form-group">
    <label class="control-label col-sm-2" for="email">Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="name" name = "name" placeholder="Enter Name"><span class="error"><?php echo $error5; echo $error6; ?></span><br>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="dno">DNo:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="dno" name = "dno" placeholder="Enter Dno"><span class="error"><?php echo $error1;?></span><br>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="city">City:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="city" name="city" placeholder="Enter City"><span class="error"><?php echo $error2;?></span><br>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="state">State:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="state" name="state" placeholder="Enter State"><span class="error"><?php echo $error3;?></span><br>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="phone">Phone No:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone"><span class="error"><?php echo $error4;?></span><br>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default bcolor" name="add">Submit</button>
    </div>
  </div>
</form>
</div>
</body>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>
</html>