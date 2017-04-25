<head>
	<title> Requests </title>
	<link rel = "stylesheet" href = "../assets/css/viewRequestStyles.css" /> 
	
	<script type="text/javascript" src="../../jquery/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/jquery-ui.js"></script>
	<script type="text/javascript" src="../js/jquery.validate.min.js"></script>
	
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

<div class="container" id="processing" style="margin-left:10px; margin-top:50px;">

<div class="back" style="height:50px;width:50px;float:right;margin-top:20px;">
		<a href="../index.html"><button  id="back" type="button" class="btn btn-danger">Back</button></a>
	</div>
	
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
		echo "'><input type='button' id='acceptBtn'   value='ACCEPT' class='btn btn-success'></a>"; //Transfer0
		echo "<br>";
		echo"</td>";
		

		
		echo "<td align=center>";


		echo "<a href='transfer.php?del=";
		echo $row['requestID'];
		echo "'><input type='button' id='deleteBtn'   value='DELETE' class='btn btn-danger'></a>"; //Transfer0
		echo "<br>";
		echo"</td>";
		echo "</tr>";

	}

	echo"</table>";
	
	echo "<div style='width;300px;height:50px;'>";
	echo  "
 <a href='completeorders.php'>
 <button  type='button' name='processorder' class='btn btn-success' style='float:left;'>DELETED REQUESTS</button> 
  </a>
   
    
   
    </div>";
	echo  "
 <a href='acceptedorders.php'>
 <button  type='button' name='processorder' class='btn btn-success' style='float:left;'>ACCEPTED REQUESTS </button> 
  </a>
   
    
   
    </div>";
	
	echo "</div>";
	

	echo"</form>";



	?>
	
</body>

<script>
	function goBack() {
		window.history.back();
	}
</script>