<?php

session_start();
if(isset($_SESSION["uid"])){
  echo $_SESSION["uid"];  
}else{
  header("Location:login.php");
}
if(isset($_POST['add'])){
	include 'connect.php';
	$error1 = $error2 =$error3=$error4=$error5=$error6='';
	$name = $_POST['name'];
	$dno = $_POST['dno'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$phone = $_POST['phone'];
	if(empty($name))
    {
        $error5="empty_name"; 
        
    }

	if(empty($dno))
    {
        $error1="empty_dno"; 
        
    }
    if(empty($city))
    {
        $error2="empty_city"; 
        
    }
    if(empty($state))
    {
        $error3="empty_state"; 
        
    }
    if(empty($phone))
    {
        $error4="empty_phone"; 
        
    }
    if(empty($dno) || empty($city)|| empty($state) || empty($phone) || empty($name))
    {
    header("Location:addAddress.php?err1=$error1&err2=$error2&err3=$error3&err4=$error4&err5=$error5");
    exit();
    }else{
        $id = $_SESSION["uid"];
    	$stmt = $conn->prepare("INSERT INTO userdetails (id,name,houseno,city,state,phone) VALUES (?,?,?,?,?,?)");
		$stmt->bind_param('isssss',$id,$name, $dno,$city,$state,$phone);
		$stmt->execute();
        
		echo "<script>if (window.confirm('Address added successfully')) 
            {
                window.location.href='http://localhost/WebProject/addAddress.php';
            };</script>";
 }   
}else{
	header("Location:addAddress.php?Not entered");
    exit();
}

?>