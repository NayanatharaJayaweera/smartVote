<!DOCTYPE html>


<html>
<head>
   <title> Accepted Requests </title>
	<link rel = "stylesheet" href = "../tridenta/assets/css/viewRequestStyles.css" />

	
	<script type="text/javascript" src="../../jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/jquery.validate.min.js"></script>

</head>
<body>
<div class="container" id="processing" style="margin-left:10px;">
    <h3 id="header">Accepted Requests</h3>
    <?php
    require("db.php"); //provides database connection
    $sql="SELECT * FROM `accept` "; //SQL query toretrieve all details from complete table
    $result=mysqli_query($db,$sql); // performs a query against the database
    echo "
<form method='POST'><table class='req-table'>
    <thead>
    <tr>
        <th text-align='center'>Co-ordinator Name</th>
        <th>Email Address</th>
        <th class='center'>Company Name</th>
        <th class='center'>Package</th>
        <th class='center'>Election Date</th>
		
    </tr>
    </thead>";

    while($row=mysqli_fetch_array($result))
    {
        echo"
	
	
    <tr id='rowNum".$row['requestID']."'>
	<td >".$row['coName']."</td>
	<td >".$row['coEmail']."</td>
	<td >".$row['companyName']."</td>
	<td >".$row['package']."</td>
	<td >".$row['electionDate']."</td>";

        
       


        echo"</tr>";

    }

    echo"</table>";

   
    echo"</div>";
        
echo"</form>";

        
echo  "
 <a href='viewRequest.php'> 
    	
  <button  type='button'  class='btn'  >Back</button> 
    
    </a>
    </div>";
        
echo"</body>";

   ?> 