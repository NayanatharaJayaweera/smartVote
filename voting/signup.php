<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
  header("Location: home.php");
 }
 include_once 'dbconnect.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {
	 foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}
  
  // clean user inputs to prevent sql injections
  $name = trim($_POST['name']);
  $name = strip_tags($name);
  $name = htmlspecialchars($name);
  
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  
  $organization = trim($_POST['organization']);
  $organization  = strip_tags($organization );
  $organization  = htmlspecialchars($organization );
  
  
  $mobile = trim($_POST['mobile']);
	$mobile = strip_tags($mobile);
  $mobile = htmlspecialchars($mobile);
  
  // basic name validation
  if (empty($name)) {
   $error = true;
   $nameError = "Please enter your full name.";
  } else if (strlen($name) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }
  
  //basic email validation
  if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT userEmail FROM users WHERE userEmail='$email'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   //if($count!=0){
    //$error = true;
    //$emailError = "Provided Email is already in use.";
   }
  }
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password ";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have atleast 6 characters.";
  }
  /* Password Matching Validation */
	if($_POST['pass'] != $_POST['confirm_password']){ 
	$error_message = 'Passwords should be same<br>'; 
	}
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO users(userName,userEmail,userPass,userOrg,userMobile) VALUES('$name','$email','$password','$organization','$mobile')";
   $res = mysql_query($query);
    
   if(!empty($res)) {
    $error_message = "";
    $success_message = "Successfully registered, you may login now";
    unset($name);
    unset($email);
    unset($pass);
	unset($organization);
	unset($mobile);
   } else {
    
    $error_message = "Something went wrong, try again later..."; 
   } 
    
  }
  
  
  
 
?>

<!DOCTYPE html>
<html lang="en">



  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Registration Form</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/dcalendar.picker.css" rel="stylesheet">
	
<style type="text/css">


.error-message {
	padding: 7px 10px;
	background: #fff1f2;
	border: #ffd5da 1px solid;
	color: #d6001c;
	border-radius: 4px;
}
.success-message {
	padding: 7px 10px;
	background: #cae0c4;
	border: #c3d0b5 1px solid;
	color: #027506;
	border-radius: 4px;
}

.btnRegister {
	padding: 10px 30px;
	background-color: #3367b2;
	border: 0;
	color: #FFF;
	cursor: pointer;
	border-radius: 4px;
	margin-left: 10px;
}
</style>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-1.12.4.js"></script>
	<script src="js/dcalendar.picker.js"></script>
    
	<script src="js/bootstrap.min.js"></script>
	<script type='text/javascript'>
	
	</script>
  
</head>
<body>
<div class="panel panel-primary" style="margin:20px;">
	<div class="panel-heading">
        	<h3 class="panel-title">Registration Form</h3>
	</div>
<div class="panel-body">
   
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
<table border="0" width="500" align="center" class="demo-table">
<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
<div class="col-md-12 col-sm-12">
	<div class="form-group col-md-6 col-sm-6">
            <label for="name">Name	</label>
<input type="text" class="form-control input-sm" name="name" value="<?php echo $name ?>";">
 <span class="text-danger"><?php echo $nameError; ?></span>

</div>
        <div class="form-group col-md-6 col-sm-6">
            <label for="email">Email</label>
<input type="text" class="form-control input-sm" name="email" value="<?php echo $email ?>";">
 <span class="text-danger"><?php echo $emailError; ?></span>

 </div>

        <div class="form-group col-md-6 col-sm-6">
            <label for="mobile">Mobile</label>
<input type="text" class="form-control input-sm" name="mobile" value="<?php echo $mobile ?>";">
</div>

	<div class="form-group col-md-6 col-sm-6">
	      <label for="organizationName">Organization Name</label>
		  <input type="text" class="form-control input-sm" name="organization" value="<?php echo $organization?>";">
		  </div>


<div class="form-group col-md-6 col-sm-6">
            <label for="password">Password</label>
            <input type="password" class="form-control input-sm" id="pass"name="pass" placeholder="">
			 <!--span class="text-danger"><?php echo $passError; ?></span-->
        </div>
	
	

	<div class="form-group col-md-6 col-sm-6">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" class="form-control input-sm" id="confirmpassword" name = "confirm_password" placeholder="">
        </div>
		</div>
		</div>
		</div>

<input type="checkbox" name="terms"> I accept Terms and Conditions <input type="submit" name="btn-signup"  class="btnRegister">

</form>
</body></html>