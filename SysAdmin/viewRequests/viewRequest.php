<head>
	<title> Requests </title>
	<link rel = "stylesheet" href = "../assets/css/viewRequestStyles.css" /> 

	
	<script type="text/javascript" src="../../jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/jquery.validate.min.js"></script>

</head>
<style>
	
</style>
<div class="container" id="processing" style="margin-left:10px;">
	<h3 id="header">Request</h3>
	<?php
	 require("db.php"); //provides database connection
    $sql="SELECT * FROM request ORDER BY  electionDate DESC "; //SQL query toretrieve all details from order table
    $result=mysqli_query($db,$sql); // performs a query against the database
    echo "
<form method='POST'><table class='req-table'>
    <thead>
    <tr>
        <th>Co-ordinater Name</th>
			<th>Email Address</th>
			<th>Company Name</th>
			<th>Package</th>
			<th>Election Date</th>
    </tr>
    </thead>";

	while($row=mysqli_fetch_array($result))
	{
		echo"
	
	
    <tr id='rowNum".$row['coName']."'>
	<td >".$row['coName']."</td>
	<td >".$row['coEmail']."</td>
	<td >".$row['companyName']."</td>
	<td >".$row['package']."</td>
	<td >".$row['electionDate']."</td>";


		echo"<td  height=50px>";

		echo "<td align=center>";


		echo "<a href='accepted.php?del=";
		echo $row['requestID'];
		echo "'><input type='button' id='acceptBtn'   value='ACCEPT' ></a>"; //Transfer0
		echo "<br>";
		echo"</td>";
		

		
		echo "<td align=center>";


		echo "<a href='transfer.php?del=";
		echo $row['requestID'];
		echo "'><input type='button' id='deleteBtn'   value='DELETE' ></a>"; //Transfer0
		echo "<br>";
		echo"</td>";
		echo "</tr>";

	}

	echo"</table>";
	echo  "
 <a href='completeorders.php'>
 <button  type='button' name='processorder' class='btn' >DELETED REQUESTS</button> 
  </a>
   
    
   
    </div>";
	echo  "
 <a href='acceptedorders.php'>
 <button  type='button' name='processorder' class='btn' >ACCEPTED REQUESTS </button> 
  </a>
   
    
   
    </div>";
	

	echo"</form>";



	?>
	
