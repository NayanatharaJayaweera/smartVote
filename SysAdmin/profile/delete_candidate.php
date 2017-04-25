<?php
	require("db/db.php");
	
	$id = $_GET['del'];
	
	$sql = "DELETE FROM profiledata WHERE id=$id";
	//print($sql);
	
	$res = mysqli_query($db,$sql) or die(mysqli_error($db));
	
	mysqli_close($db);
	
	header("Location: view_candidate_details.php");
?>