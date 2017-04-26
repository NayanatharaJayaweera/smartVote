<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';
 
 // it will never let you open index(login) page if session is set
 //if ( isset($_SESSION['user'])!="" ) {
 // header("Location: admin.php");
 // exit;
 //}
   
 
 $error = false;
 
 if( isset($_POST['btn-login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $email = trim($_POST['email']);
  $email = strip_tags($email);
  $email = htmlspecialchars($email);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($email)){
   $error = true;
   $emailError = "Please enter your email address.";
  } else if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  }
  
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $pass); // password hashing using SHA256
  
   $res=mysql_query("SELECT * FROM users WHERE userEmail='$email'");
   $row=mysql_fetch_array($res);
   $count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
   
   if( $count == 1   && $row['role']==="admin" && $row['userPass']==$password) {
			$_SESSION['user'] = $row['userId'];
			header("Location: admin.php");
	}else{
    $errMSG = "Incorrect Credentials, Try again...";
   }
	
	$res=mysql_query("SELECT * FROM sysadmin WHERE email='$email'");
	$row=mysql_fetch_array($res);
	$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row			
	if(  $count == 1 && $row['userPass']==$password){
			$_SESSION['user'] = $row['userId'];
			header("Location: reset.php");
	}
   else{
	   
	   
    $errMSG = "Incorrect Credentials, Try again...";
   }
    
  }
  
 }
?>

<!DOCTYPE html>
<html>
	<head>
		
<link rel="stylesheet" href="css/login.css">
<link rel="stylesheet" href="css/bootstrap.min.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
		
		<!-- Google Fonts -->
		
		<link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
</head>
<div class="container">
    <div class="row">
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title">Sign in here</h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="form-signin">
				
                <input type="text" class="form-control"  placeholder="Email" id = "email" name = "email" value ="<?php echo $email;?>" required autofocus>
				 <span class="text-danger"><?php echo $emailError; ?></span>
                <input type="password" class="form-control" placeholder="Password" id = "pass" name = " pass" required>
				 <span class="text-danger"><?php echo $passError; ?></span>
                <button class="btn btn-lg btn-primary btn-block" id = "btn-login" name = "btn-login"  type="submit">
                    Sign in</button>
                <!--label class="checkbox pull-left">
                    <!--input type="checkbox" value="remember-me">
                    Remember me
                </label-->
                <a href="reset.php" class="pull-right need-help">Forgot Password? </a><span class="clearfix"></span>
                </form>
            </div>
            <a href="signup.php" class="text-center new-account">Create an account </a>
        </div>
    </div>
</div>
 <script src="js/jquery-2.2.4.min.js"></script>
 
    <script type="text/javascript" src="js/bootstrap.js"></script>
   
    <script src="js/login.js"></script>

</html>