<?php
 ob_start();
 session_start();
 require_once 'dbconnect.php';

 if ( isset($_SESSION['user'])!="" ) {
  header("Location: index.php");
  exit;
 }
   
 
 $error = false;
 
 if( isset($_POST['btn-login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
 
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  $newPass = trim($_POST['newPass']);
  $newPass = strip_tags($newPass);
  $newPass = htmlspecialchars($newPass);
  
  $confirmPass = trim($_POST['confirmPass']);
  $confirmPass = strip_tags($confirmPass);
  $confirmPass = htmlspecialchars($confirmPass);
 
  
	 /* Password Matching Validation */
	if($_POST['newPass'] != $_POST['confirmPassword']){ 
	$error_message = 'Passwords should be same<br>'; 
	}
  
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
   if(empty($newPass)){
   $error = true;
   $passError = "Please enter your password.";
  }
   if(empty($confirmPass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $pass); // password hashing using SHA256
   $newPassword = hash('sha256', $newPass);
   $confirmPassword = hash('sha256', $confirmPass);
  
   if( !$error ) {
   
   $query = "INSERT INTO reset(password,newPassword,confirmPassword) VALUES('$password','$newPassword','$confirmPassword')";
   $res = mysql_query($query);
    
   if(!empty($res)) {
    $error_message = "";
    $success_message = "Successfully registered, you may login now";
	unset($password);
    unset($newPass);
	unset($confirmPass);
   
   } else {
    
    $error_message = "Something went wrong, try again later..."; 
   } 
    
  }

   
   if( $count == 1 && $row['newPassword']==$newPass ) {
    $_SESSION['user'] = $row['userId'];
    header("Location: index.php");
   } else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
    
  }
  
 }
?>
 
<!DOCTYPE html>

<html>


<html lang="en">

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
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <h1 class="text-center login-title"></h1>
            <div class="account-wall">
                <img class="profile-img" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=120"
                    alt="">
                <form class="form-signin">
                
                <input type="password" class="form-control" name = "pass" placeholder="Password" required>
				<input type="password" class="form-control" name = "newPass" placeholder="new password" required>
				<input type="password" class="form-control" name = "confirmPass"  placeholder="Confirm password" required>
				
				
                <button class="btn btn-lg btn-primary btn-block" type="submit">
                    Sign in</button>
                <label class="checkbox pull-left">
                    <input type="checkbox" value="remember-me">
                    Remember me
                </label>
               
                </form>
            </div>
            
        </div>
    </div>
</div>

</html>