<?php
if(!empty($_POST["create"])) {
	/* Form Required Field Validation */
	foreach($_POST as $key=>$value) {
		if(empty($_POST[$key])) {
		$error_message = "All Fields are required";
		break;
		}
	}
	

	
	

	

	if(!isset($error_message)) {
		require_once("dbcontroller.php");
		$db_handle = new DBController();
		$query = "INSERT INTO datePick (Date,time1,time2,package) VALUES
		('" . $_POST["datepicker"]. "','".$_POST["time1"]. "','".$_POST["time2"]. "','".$_POST["names"]. "')";
		$result = $db_handle->insertQuery($query);
		if(!empty($query)) {
			$error_message = "";
			$success_message = "You have created successfully!";	
			unset($_POST);
		} else {
			$error_message = "Problem in election creation. Try Again!";	
		}
	}
}
?>
	
<!doctype html>
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

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  
  </script>
</head>
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
<body>

 <div class="panel panel-primary" style="margin:100px;">
	<div class="panel-heading">
        	<h3 class="panel-title">Create Your Election</h3>
	</div>
<div class="panel-body">
   
<form name="frmRegistration" method="post" action="">
<table border="0" width="500" align="center" class="demo-table">
<?php if(!empty($success_message)) { ?>	
<div class="success-message"><?php if(isset($success_message)) echo $success_message; ?></div>
<?php } ?>
<?php if(!empty($error_message)) { ?>	
<div class="error-message"><?php if(isset($error_message)) echo $error_message; ?></div>
<?php } ?>
<div class="col-md-12 col-sm-12">
	<div class="form-group col-md-6 col-sm-6">
            <label for="name">Date	</label>
			<input type="text" class="form-control input-sm" name="datepicker" id="datepicker" value="<?php if(isset($_POST['datepicker'])) echo $_POST['datepicker']; ?>">
</div>
<div class="form-group col-md-6 col-sm-6">
            <label for="name">package	</label>
			<!--input type="dropdown" class="form-control input-sm"--><select name = "names" class="form-control input-sm">
  <option value="package1">Package 1</option>
  <option value="package2">Package 2</option>
 
</select>
   <name="package" id="package" value="<?php if(isset($_POST['names'])) echo $_POST['names']; ?>">


</div>

<div class="form-group col-md-6 col-sm-6">
            <label for="name"> Start Time 	</label>
			<input type="time" class="form-control input-sm" name="time1" id="time1" value="<?php if(isset($_POST['time1'])) echo $_POST['time1']; ?>">
</div>

<div class="form-group col-md-6 col-sm-6">
</div>

<div class="form-group col-md-6 col-sm-6">
            <label for="name"> End Time 	</label>
			<input type="time" class="form-control input-sm" name="time2" id="time2" value="<?php if(isset($_POST['time2'])) echo $_POST['time2']; ?>">
</div>
<div class="form-group col-md-12 col-sm-12">
 <input type="submit" name="create" value="Create" class="btnRegister">
 <input type="submit" name="cancel" value="Cancel" class="btnRegister">
 

<!--p>Date: <input type="text" id="datepicker"></p-->
 
 </div>
 </div>
</body>
</html>