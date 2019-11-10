<?php
include 'connect.php';
session_start();
if(isset($_SESSION["uid"])){
  //echo $_SESSION["uid"];  
}else{
  header("Location:login.php");
}



$pid = $_GET['pid'];
$aid = $_GET['aid'];
$quantity = $_GET['quantity'];

?>


<!DOCTYPE html>
<html>


<head>
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

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.color2{
background-color:grey;
margin-left: 35px;
}
.color3{
background-color:yellow;
}
.color5{
	margin-left: 35px;
	background-color: skyblue;
	height: 400px;
	padding: 40px;
}
.text1{
color:red;
}
.pc{
  color: black;
}
.Round{
padding-top:30px;
}
.Round1{
padding-top:30px;
}
.Round2{
padding-top:30px;
padding-bottom:70px;
}

.jumbotron{
padding-bottom:0;
padding-top:10px;
}
.navbar-right{
padding-bottom:0;
}
.hello{
background-color:purple;
}
</style>

</head>




<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="dashboard.php">Home</a>
  <a href="shop.php">Shop</a>
  <a href="sellItem.php">Sell Items</a>
  <a href="addAddress.php">Add address</a>
  <a href="items.php">Bag</a>
  <a href="#">Contact Us</a>
  <a href="logout.php">Logout</a>
</div>
<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

<section id="RectangleFrames" class="color1 Round1">
<div class="container">
  <div class="card-group">
  	<?php
  		$uid = $_SESSION["uid"];
        $q = "SELECT * from items where id = $pid";
        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        $count = 0;
        
        while($rows = $result->fetch_assoc()){
        	$price = $rows['price']*$quantity;
            echo '<div class="col-auto mb-2">';
            echo '<div style="width: 18rem;" class="card color2">';
            echo '<img style="width:100%;height: 200px;" src="'.$rows['imagepath'].'" class="card-img-top" alt="EyeGlasses">
            <div class="card-body ">
            <h5 class="card-title">'.$rows['itemname'].'</h5>
            <p class="card-text"><h6>'.$rows['description'].'</h6></p>
            <p class="card-text text1"><label class="pc">Price is '.$price.'</label></p> <form action = "confirmBackened.php" method = "post">
            <input type = "hidden" value = '."".$pid."".' name = "pid"><input type = "hidden" value = '."".$aid."".' name = "aid"><input type = "hidden" value = '."".$quantity."".' name = "quantity">
            <input type = "submit" name="confirm" class="btn btn-primary" value="Confirm"></form>
            </div>';
            echo '</div>';
            echo '</div>';            
       }

       $r = "select * from userdetails where ind = $aid";
       $sp1 = mysqli_prepare($conn,$r);
       mysqli_stmt_execute($sp1);
       $result1 = mysqli_stmt_get_result($sp1);
       while($rows1 = $result1->fetch_assoc()){
       	 	echo '<div class="col-auto mb-2">';
            echo '<div style="width: 40rem;" class="card color5">';
            echo '
            <div class="card-body ">
            <h1>Address</h1>
            <h5 class="card-title"> <b>Name : </b>'.$rows1['name'].'</h5>
            <p class="card-text"><h6><b>HouseNo : </b>'.$rows1['houseno'].'</h6></p>
            <p class="card-text"><h6><b>City : </b>'.$rows1['city'].'</h6></p>
            <p class="card-text"><h6><b>State : </b>'.$rows1['state'].'</h6></p>
            <p class="card-text"><h6><b>Phone : </b>'.$rows1['phone'].'</h6></p>
            </div>';
            echo '</div>';
            echo '</div>';
            
       }



       
            

      
     
  ?>
</div>
</div>
</section>
</div>



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
   
</body>
</html>	