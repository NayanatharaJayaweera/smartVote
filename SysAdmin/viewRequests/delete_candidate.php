<?php
	require("db/db.php");
	
	$id = $_GET['del'];
	
	$sql = "DELETE * FROM profiledata WHERE id=$id";
	
	$res = mysqli_query($db,$sql)
	
	mysqli_close($db);
	
	header("Location: view_candidate_details.php");
?>