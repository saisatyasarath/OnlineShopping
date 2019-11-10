<?php
include 'connect.php';
session_start();
if(isset($_SESSION["uid"])){
     
}else{
  header("Location:login.php");
}

$uid = $_SESSION["uid"];

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
.link{
	color: red;
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
background-color:orange;
margin-left: 35px;
}
.color3{
background-color:yellow;
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
h2{
  margin-left: 20px;
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
  <a href="addAddress.php">Add address</a>
  <a href="items.php">Bag</a>
  <a href="#">Contact Us</a>
  <a href="logout.php">Logout</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
  
  <br>
  <section id="RectangleFrames" class="color1 Round1">
<div class="container">
	<h1>Sold Items</h1>
<div class="card-group">

  <?php
        $q = "SELECT * from sellersandusers where sid = $uid";
        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        $count = 0;
        
        while($rows = $result->fetch_assoc()){
            $count++;
            $pid = $rows['pid'];
            $aid = $rows['uaid'];
            $q1 = "select * from items where id = $pid";
            $sp1 = mysqli_prepare($conn,$q1);
        	mysqli_stmt_execute($sp1);
        	$result1 = mysqli_stmt_get_result($sp1);
        	while ($rows1 = $result1->fetch_assoc()) {
            echo '<div class="col-auto mb-3">';
            echo '<div style="width: 18rem" class="card color2">';
            echo '<img style="width:100%;height: 200px;" src="'.$rows1['imagepath'].'" class="card-img-top" alt="EyeGlasses">
            <div class="card-body ">
            <h5 class="card-title">'.$rows1['itemname'].'</h5>
            <p class="card-text"><h6>'.$rows1['description'].'</h6></p>
            <p class="card-text text1"><label class="pc">Price is '.$rows1['price'].'</label></p><button  name="view" class="btn btn-primary" value="View Address"><a href = "/webproject/viewDetails.php?aid='.$aid.'"><label class = "link">View Details</label></a></button>
            </div>';
            echo '</div>';
            echo '</div>';
        }
        
            
       }
       if($count == 0){
          echo '<h2>You have not sold any item</h2>';
        }
     
  ?>
</div>
<h1>Purchased Items</h1>
<div class="card-group">

  <?php
        $q = "SELECT * from sellersandusers where uid = $uid";
        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        $count = 0;
        
        while($rows = $result->fetch_assoc()){
            $pid = $rows['pid'];
            $aid = $rows['uaid'];
            $q1 = "select * from items where id = $pid";
            $sp1 = mysqli_prepare($conn,$q1);
        	mysqli_stmt_execute($sp1);
        	$result1 = mysqli_stmt_get_result($sp1);
          $count= 0;
        	while ($rows1 = $result1->fetch_assoc()) {
            $count++;
            echo '<div class="col-auto mb-3">';
            echo '<div style="width: 18rem" class="card color2">';
            echo '<img style="width:100%;height: 200px;" src="'.$rows1['imagepath'].'" class="card-img-top" alt="EyeGlasses">
            <div class="card-body ">
            <h5 class="card-title">'.$rows1['itemname'].'</h5>
            <p class="card-text"><h6>'.$rows1['description'].'</h6></p>
            <p class="card-text text1"><label class="pc">Price is '.$rows1['price'].'</label></p>
            </div>';
            echo '</div>';
            echo '</div>';
        }
        
            
       }
       if($count == 0){
          echo '<h2>You have not purchased any item</h2>';
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