<?php
session_start();
if(isset($_SESSION["uid"])){
  header("Location:dashboard.php");   
}
$error1 ='';
$error2 ='';
$error3 ='';
$error4 ='';
$error5='';


if(isset($_GET['err1']))
{
    if($_GET['err1']=='empty_u')
    {
        $error1 = "*username required";
    }
    if($_GET['err2']=='empty_p')
    {
        $error2 = "*password required";
    }
    if($_GET['err3']=='empty_cp')
    {
        $error3 = "*confirm password required";
    }
}

if(isset($_GET['err5']))
{
    if($_GET['err5']=='already')
    {
        $error5 = "*user alreday exists";
    }
}
?>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text],input[type=email], input[type=password] {
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


.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
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
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>

<form action="register.php" method = "post" style="border:1px solid #ccc">
  <div class="container space">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" ><span><?php echo $error1;echo $error5; ?></span><br><br>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" ><span><?php echo $error2; ?></span><br><br>

    <label for="confirmPassword"><b>Confirm Password</b></label>
    <input type="password" placeholder="Repeat Password" name="confirmPassword"><span><?php echo $error3;echo $error4;  ?></span><br><br>    

    <div class="clearfix">
        <button type="submit" class="signupbtn" name="submit">Sign Up</button>
      <button type="submit" class="cancelbtn" name="cancel">Cancel</button>
      
    </div>
    <br>
    <label ><b>Already Registered? <a href="login.php">Login here</a></b></label>
  </div>
  
</form>

</body>
</html>




