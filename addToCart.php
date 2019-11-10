<?php
if(isset($_POST['add']))
{
	include 'connect.php';
	$pid = "";
	$pid = (int)$_POST['pid'];
	session_start();
	$uid = (int)$_SESSION["uid"];
	$stmt = $conn->prepare("INSERT INTO cart (uid, pid) VALUES (?, ?)");
	$stmt->bind_param('ii', $uid, $pid);
	$stmt->execute();
	 
	echo "<script>if (window.confirm('successfully added to cart')) 
            {
                window.location.href='http://localhost/WebProject/dashboard.php';
            };</script>";

}
else if(isset($_POST['add1'])){
	include 'connect.php';
	$pid = (int)$_POST['pid'];
	session_start();
	$uid = (int)$_SESSION["uid"];
	$stmt = $conn->prepare("INSERT INTO cart (uid, pid) VALUES (?, ?)");
	$stmt->bind_param('ii', $uid, $pid);
	$stmt->execute(); 
	echo "<script>if (window.confirm('successfully added to cart')) 
            {
                window.location.href='http://localhost/WebProject/shop.php';
            };</script>";
}
else if(isset($_POST['buy']))
{
	include 'connect.php';
	$pid =  ''.$_POST['pro'];
	$quantity = $_POST['quantity'];
	$q = "SELECT * from items where id =?";
    $sp = mysqli_prepare($conn,$q);
    mysqli_stmt_bind_param($sp,'i',$pid);
    mysqli_stmt_execute($sp);
    $result = mysqli_stmt_get_result($sp);
    $tablequantity = null;
    while($rows = $result->fetch_assoc()){
        $tablequantity = $rows['quantity'];
    }
    if($quantity<=$tablequantity){
    	header("Location:selectAddress.php?pro=$pid&quantity=$quantity");
    	exit();	
    }else{
    	echo "<script>if (window.confirm('Insufficient quantity')) 
            {
                window.location.href='http://localhost/WebProject/dashboard.php'
            };</script>";    	
    	exit();
    }
	

}
else{
	header("Location:login.php?sfgd=xyz");
    exit();
}
?>