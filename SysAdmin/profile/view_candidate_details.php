<!DOCTYPE html>

<head>

<link href="../assets/css/stylesheet.css" type="text/css" rel="stylesheet"/>
<link href="../assets/css/viewRequestStyles.css" type="text/css" rel="stylesheet"/>

<meta charset="utf-8">
    <title>Bootstrap Multipurpose Template - Tridenta</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
     <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!-- MAIN STYLE SECTION-->
    <link href="../assets/plugins/isotope/isotope.css" rel="stylesheet" media="screen" />
    <link href="../assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" />
    <link href="../assets/plugins/IconHoverEffects-master/css/component.css" rel="stylesheet" />
    <link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/about-achivements.css" rel="stylesheet" />
    <link id="mainStyle" href="../assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>

</head>

<body>

<div class="navbar navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="fa fa-bars mobile-bars" style=""></span>
                </button>
                <a class="navbar-brand" href="index.html" >
                    <!--img src="assets/img/logo.png" alt="" /--> <!-- logo here-->
                </a>
            </div>
            <div class="navbar-collapse collapse" data-scrollreveal="enter from the right 50px">
                <ul class="nav navbar-nav">
                    <li class=""><a href="#Homepage"></a></li><!-- menu links-->
                    <li><a href="#section-about"></a></li>  
                    <li><a href="#section-works"></a></li>
                    <li><a href="#section-services"></a></li>
                    <li><a href="#section-contact"></a></li>
                </ul>
            </div>

        </div>
    </div>

<div class="viewdetails" style="margin-top:100px;">

	<div class="back" style="height:50px;width:50px;float:right;margin-right:20px;">
		<button onclick="goBack()" id="back" type="button" class="btn btn-danger">Back</button>
	</div>

<div class="">
<?php

	require("db/db.php");
	
	$sql = "SELECT * FROM profiledata";
	
	$res = mysqli_query($db,$sql) or die(mysql_error());
	
	if($res){
		echo "<table class='req-table' style='margin-left:30px;'>
			<tr>
			<th>Name</th>
			<th>Birthday</th>
			<th>Email</th>
			<th>Position</th>
			<th>Section</th>
			<th>Create Profile</th>
			</tr>";
		while($row = mysqli_fetch_array($res)){
			echo "<tr>
			<td>".$row['name']."</td>
			<td>".$row['birthday']."</td>
			<td>".$row['email']."</td>
			<td>".$row['position']."</td>
			<td>".$row['section']."</td>
			<td><a href='delete_candidate.php?del=".$row['id']."'><button name='id' type='button' class='btn btn-danger'>Remove</button></td>
			</tr>";
		} 
		echo "</table>";
	}
	else{
		echo "Error : " . mysqli_error($db); 
	}
	
	//Close Connection
	mysqli_close($db);

?>
</div>

	<div class="view" style="height:50px;width:100px;float:right;margin-right:20px;">
		<a href="all_candidate.php"><button type="button" class="btn btn-success">Preview</button></a>
	</div>

</div>

</body>

<script>
	function goBack() {
		window.history.back();
	}
</script>