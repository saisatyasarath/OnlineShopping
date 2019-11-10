<?php
include 'connect.php';
session_start();
if(isset($_SESSION["uid"])){  
}else{
  header("Location:login.php");
}
$sid = $_SESSION["uid"];
$error1 ='';
$error2 ='';
$error3 ='';
$error4 ='';
$error5='';
$error6='';
$error10 = '';

if(isset($_GET['err1']))
{
    if($_GET['err1']=='empty_itemname')
    {
        $error1 = "*Itemname required";
    }
    if($_GET['err2']=='empty_quantity')
    {
        $error2 = "*Quantity required";
    }
    if($_GET['err3']=='empty_price')
    {
        $error3 = "*Price required";
    }
    if($_GET['err4']=='empty_email')
    {
        $error4 = "*email required";
    }
    if($_GET['err5']=='empty_description')
    {
        $error5 = "*Description required";
    }
    if($_GET['err6']=='empty_img')
    {
        $error6 = "*Add Image";
    }
    if($_GET['err7'] == 'empty_cat'){
      $error10 = "*Category Required";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.size{
	margin-left: 25%;
	width: 800px;
}

.bcolor{
	color: white;
	background-color: blue;
}
span{
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
  <a href="items.php">Bag</a>
  <a href="#">Contact Us</a>
  <a href="logout.php">Logout</a>

</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

	<form class="form-horizontal size" action="additemtodatabase.php" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label class="control-label col-sm-2" for="itemname">Item name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="itemname" name = "itemname" placeholder="Enter Item"><span><?php echo $error1;?></span><br>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="quantity">Quantity:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity"><span><?php echo $error2;?></span><br>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="price">Enter Price:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="price" name="price" placeholder="Enter price"><span><?php echo $error3;?></span><br>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Enter Email:</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"><span><?php echo $error4;?></span><br>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="category">Category:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="category" name="category" placeholder="Enter Category"><span><?php echo $error10;?></span><br>
    </div>
  </div>
  
  <div class="form-group">
    <label class="control-label col-sm-2" for="description">Description:</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="description" name="description" placeholder="Enter description"></textarea><span><?php echo $error5;?></span><br>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="photo">Image:</label>
    <div class="col-sm-10">
      <input type="file" name="fileToUpload" ><span><?php echo $error6;?></span><br>
    </div>
  </div>
  <div class="form-group">
    <input type="hidden" name="sid" value="<?php $sid ?>">
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