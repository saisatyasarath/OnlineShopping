<?php
session_start();
if(isset($_SESSION["uid"])){
  header("Location:dashboard.php");   
}
$error1 ='';
$error2 ='';
$error3 ='';
$error4 ='';
if(isset($_GET['err1']))
{
    if($_GET['err1']=='empty_u')
    {
        $error1 = "username required";
    }
    if($_GET['err2']=='empty_p')
    {
        $error2 = "password required";
    }
}
if(isset($_GET['err3'])){
    if($_GET['err3']=='wrong username')
    {
        $error3 = "Wrong Username";
    }
    if($_GET['err4']=='wrong password')
    {
        $error4 = "Wrong Password";
    }
    
    
}
?>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}


button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}


.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}


 .loginbtn {
  float: left;
  width: 100%;
}


.container {
  padding: 16px;
}


.clearfix::after {
  content: "";
  clear: both;
  display: table;
}
.space{
    margin-left: 30%;
    width: 500px;
    height: 100%;
}
span{
    color :red ;
}


@media screen and (max-width: 300px) {
  .loginbtn {
     width: 100%;
  }
}
</style>
<body>

<form action="loginController.php" method = "post" style="border:1px solid #ccc">
  <div class="container space">
    <h1>Login</h1>
    <p>Please fill in this form to Login.</p>
    <br>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" ><span><?php echo $error1;echo $error3; ?></span><br><br>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" ><span><?php echo $error2;echo $error4; ?></span><br><br>

        

    <div class="clearfix">
      <button type="submit" class="loginbtn" name="login">Login</button>
    </div>
    <br>
    <label ><b>Not Registered? <a href="signup.php">Register here</a></b></label>
  </div>
</form>

</body>
</html>


