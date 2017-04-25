<!DOCTYPE html>

<head>

<link href="../assets/css/stylesheet.css" type="text/css" rel="stylesheet"/>
<link href="table.css" type="text/css" rel="stylesheet"/>

<div class="header">
<?php include 'header.php';?>
</div>

</head>

<body>

<div class="viewdetails">

<div class="">
<?php

	require("db/db.php");
	
	$sql = "SELECT * FROM profiledata";
	
	$res = mysqli_query($db,$sql) or die(mysql_error());
	
	if($res){
		echo "<table class='req-table'>
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
			<td><a href=profile.php?id=".$row['id']."><button name='id'>Create Profile</button></td>
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
		<a href="all_candidate.php"><button type="button" class="btn btn-success">View All</button></a>
	</div>

</div>

</body>