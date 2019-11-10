<?php
if(isset($_POST['confirm']))
{
	include 'connect.php';
	session_start();
	$uid = $_SESSION['uid'];
	$pid = $_POST['pid'];
	$aid = $_POST['aid'];
	$quantity = $_POST['quantity'];
	$q = "SELECT * from items where id =?";
    $sp = mysqli_prepare($conn,$q);
    mysqli_stmt_bind_param($sp,'i',$pid);
    mysqli_stmt_execute($sp);
    $result = mysqli_stmt_get_result($sp);
    $tablequantity = null;
    $sid = null;
    while($rows = $result->fetch_assoc()){
        $tablequantity = $rows['quantity'];
        $sid = $rows['sid'];
    }
    if($quantity<=$tablequantity){
    	
    }else{
    	echo "<script>if (window.confirm('Insufficient quantity')) 
            {
                window.location.href='http://localhost/WebProject/dashboard.php'
            };</script>";    	
    	exit();
    }

    $tablequantity = $tablequantity - $quantity;
    $q = "UPDATE items set quantity = $tablequantity where id = $pid";
    $sp = mysqli_prepare($conn,$q);
    mysqli_stmt_execute($sp);

    $stmt = $conn->prepare("INSERT INTO sellersandusers (uid,sid,pid,uaid) VALUES (?, ?,?,?)");
	$stmt->bind_param('iiii', $uid, $sid,$pid,$aid);
	$stmt->execute();

	echo "<script>if (window.confirm('Successfully Bought')) 
            {
                window.location.href='http://localhost/WebProject/dashboard.php'
            };</script>";    	
    	exit();

}else{
	header("Location:login.php?sfgd=NotAllowed");
    exit();
}
?>