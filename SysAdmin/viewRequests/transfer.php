<?php
	require("db.php");
 
	if( isset($_GET['del']) )
	{
		$requestID = $_GET['del']; //getting the order number of the related button in the vieworder.php
        $sql1="INSERT INTO complete (`requestID`,`coName`,`coEmail`,`companyName`,`package`,`electionDate`) 
        SELECT `requestID`,`coName`,`coEmail`,`companyName`,`package`,`electionDate` FROM `request` WHERE `requestID` = '$requestID'  "; //query to transfer details from order table to compltedorder table
		
        $res1= mysqli_query($db,$sql1) or die("Failed".mysqli_error($db));
        $sql2= "DELETE FROM `request` WHERE `requestID` = '$requestID' "; //deleting the details from order table
		
		$res2= mysqli_query($db,$sql2) or die("Failed".mysqli_error($db));
        echo "<meta http-equiv='refresh' content='0;url=viewRequest.php'>";
        
        
		
	}
?>