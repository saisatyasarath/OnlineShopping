<?php
if(isset($_POST['search'])){
	$cat = $_POST["searchtext"];
	if($cat == ""){
		header("Location:shop.php");
		exit();	
	}else{
		header("Location:shop.php?category=$cat");
		exit();
	}
	
}else{
	header("Location:login.php");
}


?>
