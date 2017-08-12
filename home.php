<?php

session_start();
?>

<html lang="en">
<head>
  <title>home.php</title>
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
<h2>HOME PAGE</h2>

<br>
<h3 style="color: blue"> Hi <?php echo $_SESSION['email']  ?> , welcome to home page! </h3>
<br>
  	<form class="form-horizontal" action="home.php" method="post">
    	
    	<div class="form-group">        
      		<div class="col-sm-offset-2 col-sm-10">
        		<a href="login.php" > <button type="submit" name="logout_btn" class="btn btn-danger">Logout</button> 
        		</a>
      		</div>
    	</div>

  	</form>
</div>
</div>
</body>
</html>
<?php
if(isset($_POST['logout_btn']))
{
	
	session_destroy();
	header('location:login.php');
}
?>
