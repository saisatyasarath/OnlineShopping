<?php

if(isset($_POST['submit']) || isset($_POST['cancel']))
{
    include 'connect.php';
    $error1 = $error2 =$error3=$error4=$error5=$error6=$error7='';
    $un = $_POST['email'];
    $pw = $_POST['password'];
    $cpw = $_POST['confirmPassword'];
    if(isset($_POST['cancel'])){
        header("Location:signup.php");
        exit();
    }
    if(empty($un))
    {
        $error1="empty_u"; 
        
    }
    if(empty($pw))
    {
        $error2="empty_p";
    }
    if(empty($cpw))
    {
        $error3="empty_cp";
    }
    
    if(empty($un) || empty($pw)|| empty($cpw))
    {
      
    header("Location:signup.php?err1=$error1&err2=$error2&err3=$error3&err4=$error4");
    exit();
    }
    else
    {
        $q = "SELECT * from users where email =?";

        $sp = mysqli_prepare($conn,$q);
        mysqli_stmt_bind_param($sp,'s',$un);
        mysqli_stmt_execute($sp);
        $result = mysqli_stmt_get_result($sp);

// echo mysqli_num_rows($result);
        if(mysqli_num_rows($result))
        {
            header("Location:signup.php?err5=already");
            exit();
        }
    }


 

    }
    else
    {
    
        header("Location:signup.php?sfgd=xyz");
        exit();
    }







$stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
$stmt->bind_param('ss', $un, $pw);
$stmt->execute();

        

header("Location:login.php");

?>
