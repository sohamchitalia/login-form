<?php

require "formconfig.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register.php</title>
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
<h2>Register Here</h2>
  	<form class="form-horizontal" action="register.php" method="post">
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
      		<label class="control-label col-sm-2" for="cpwd">Confirm password:</label>
      		<div class="col-sm-8">          
        		<input type="password" name="cpassword" class="form-control" id="cpwd" placeholder="Confirm password" required>
      		</div>
    	</div>

    	<div class="form-group">        
      		<div class="col-sm-offset-2 col-sm-10">
        		<button type="submit" name="submit_btn" class="btn btn-default">Submit</button>
      		</div>
    	</div>

    	<div class="form-group">        
      		<div class="col-sm-offset-2 col-sm-10">
        		<a href="login.php" > <button type="button" name="loginnow_btn" class="btn btn-warning">Login page</button> 
        		</a>
      		</div>
    	</div>

  	</form>
</div>
</div>

<?php


$email = $password = $cpassword =  " ";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


if(isset($_POST['submit_btn']))
{
	
	if (isset($_POST['email'])) {
    	$email = $_POST['email'];
	}

	if (isset($_POST['password'])) {
    	$password = test_input($_POST['password']);
    	$pass_len = strlen((string)$password);
	}
	if (isset($_POST['cpassword'])) {
    	$cpassword = test_input($_POST['cpassword']);
	}
	/* check password range */
	//if (filter_var($password, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$passmin, "max_range"=>$passmax))) === false)
	if($pass_len < 8)
	{
    	echo '<script type= "text/javascript"> alert ("password should have atleast 8 characters") </script> ';
	}
	else
	{

		if($password == $cpassword)
		{
			$query = "select * from user where email = '$email' ";
			$query_run1 = mysqli_query($con,$query);

			if(mysqli_num_rows($query_run1)>0)
			{
				echo '<script type= "text/javascript"> alert ("email already exists") </script> ';
			}
			else
			{
				$query = "insert into user values ('$email','$password')";
				$query_run2 = mysqli_query($con,$query);
			
				if($query_run2)
				{
					echo '<script type= "text/javascript"> alert ("registered successfully...Go to login page") </script> ';
				}
				else
				{
					echo '<script type= "text/javascript"> alert ("error") </script> ';
				}

			}
		}
	
		else
		{
			echo '<script type= "text/javascript"> alert ("passwords do not match") </script> ';
		}
	}

}



?>

</body>
</html>
