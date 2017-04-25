<!DOCTYPE html>


<html>
<head>
	
   <title> Accepted Requests </title>
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
	
<div class="container" id="processing" style="margin-left:10px;margin-top:50px;">
    <h3 id="header">Accepted Requests</h3>
    <?php
    require("db.php"); //provides database connection
    $sql="SELECT * FROM `accept` "; //SQL query toretrieve all details from complete table
    $result=mysqli_query($db,$sql); // performs a query against the database
    echo "
<form method='POST'><table class='req-table'>
    <thead>
    <tr>
        <th text-align='center'>Coordinator Name</th>
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
    	
  <button  type='button'  class='btn' style='margin-left:25px;' >Back</button> 
    
    </a>
    </div>";
        
echo"</body>";

   ?> 