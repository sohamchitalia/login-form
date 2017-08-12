<?php
session_start();
require "formconfig.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>login.php</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href ="style.css">

  <style>
  .main{
    border: 2px solid lightgray;
  }
.main:hover{
  border: 2px solid lightblue;
}
</style>
</head>
<body>

<div class="container">
<div class="main" style="margin:50px; padding: 25px;">
<h2>Login Here</h2>
  	<form class="form-horizontal" action="login.php" method="post">
    	<div class="form-group">
      		<label class="control-label col-sm-2" for="email">Email:</label>
      		<div class="col-sm-8">
        		<input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
      		</div>
    	</div>

    	<div class="form-group">
      		<label class="control-label col-sm-2" for="pwd">Password:</label>
      		<div class="col-sm-8">          
        		<input type="password" name="password" class="form-control" id="pwd" placeholder="Enter password" required>
      		</div>
    	</div>


    	<div class="form-group">        
      		<div class="col-sm-offset-2 col-sm-10">
        		<button type="submit" name="login_btn" class="btn btn-default">Login</button>
      		</div>
    	</div>

    	<div class="form-group">        
      		<div class="col-sm-offset-2 col-sm-10">
        		<a href="register.php" > <button type="button" name="regnow_btn" class="btn btn-success">Register now</button> 
        		</a>
      		</div>
    	</div>

  	</form>
</div>
</div>
</body>
</html>

<?php

if(isset($_POST['login_btn']))
{
  $email = $_POST['email'];
  $password = $_POST['password'];
  $query = "select * from user where email = '$email' AND password = '$password' ";
  $query_run = mysqli_query($con,$query);
  if(mysqli_num_rows($query_run)>0)
  {
    $_SESSION['email']=$email;
    header('location:home.php');

  }
  else
  {
    echo '<script type= "text/javascript"> alert ("invalid credentials") </script> ';
  }
}


?>
