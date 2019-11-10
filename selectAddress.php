<?php
include 'connect.php';
$pid = "";
session_start();
if(isset($_SESSION["uid"])){
  //echo $_SESSION["uid"];  
}else{
  header("Location:login.php");
}


$pid = $_GET['pro'];
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
.addre{
  color: white;
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
        $q = "SELECT * from userdetails where id = $uid";
        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);
        $count = 0;
        
        while($rows = $result->fetch_assoc()){
            $count++;
            $aid = $rows['ind'];
            
            echo '<div class="col-auto mb-3">';
            echo '<div style="width: 18rem;" class="card color2">';
            echo '
            <div class="card-body ">
            <h5 class="card-title">'.$rows['name'].'</h5>
            <p class="card-text"><h6>'.$rows['houseno'].'</h6></p>
            <p class="card-text"><h6>'.$rows['city'].'</h6></p>
            <p class="card-text"><h6>'.$rows['state'].'</h6></p>
            <p class="card-text"><h6>'.$rows['phone'].'</h6></p>
            <p class="card-text text1"> <button  name="add" class="btn btn-primary" value="Select Address"><a href = "/webproject/confirmItem.php?aid='.$aid.'&pid='.$pid.'&quantity='.$quantity.'"><label class="addre">Select Address</label></a></button>
            </div>';
            echo '</div>';
            echo '</div>';
            
       }
       if($count == 0){
          echo '<h1>Plaese add your address in the add Address section</h1>';
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