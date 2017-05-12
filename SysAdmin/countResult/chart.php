<!DOCTYPE html>

<head>

<link href="../assets/css/stylesheet.css" />

<div class="">
<?php include '../profile/header.php';?>
</div>

<!-- MAIN STYLE SECTION-->
<meta charset="utf-8">
	<title>Digital Team HTML5 Layout - Tooplate</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
<!--

Template 2075 Digital Team

http://www.tooplate.com/view/2075-digital-team

-->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/font-awesome.min.css">
	<link rel="stylesheet" href="../../css/animate.min.css">
	<link rel="stylesheet" href="../../css/et-line-font.css">
	<link rel="stylesheet" href="../../css/nivo-lightbox.css">
	<link rel="stylesheet" href="../../css/nivo_themes/default/default.css">
	<link rel="stylesheet" href="../../css/style.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>

<!-- MAIN STYLE SECTION-->
	
<head>

<body>

<section class="navbar navbar-fixed-top custom-navbar" role="navigation" style="background-color:black;">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<!--a href="#" class="navbar-brand">Smart Vote</a-->
		</div>
		<!--div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#home" class="smoothScroll">HOME</a></li>
				<li><a href="#about" class="smoothScroll">ABOUT</a></li>
				<li><a href="#work" class="smoothScroll">WORK</a></li>
				<li><a href="#pricing" class="smoothScroll">PACKAGE</a></li>
				<li><a href="#team" class="smoothScroll">TEAM</a></li>
				<li><a href="#portfolio" class="smoothScroll">PORTFOLIO</a></li>
				<li><a href="#contact" class="smoothScroll">CONTACT</a></li>
			</ul>
		</div-->
	</div>
</section>

<?php

require("db/db.php"); //provides database connection

require("charts/fusioncharts.php"); //loading the library for charts


?>


<!-- You need to include the following JS file to render the chart.
When you make your own charts, make sure that the path to this JS file is correct.
Else, you will get JavaScript errors. -->

<script type="text/javascript" src="charts/fusioncharts.js"></script>

<?php

    
    $sql = "SELECT total_votes,name FROM candidate GROUP BY name"; //sql query to get the number of orders on each day

    // Execute the query
    $result =mysqli_query($db,$sql);

    // If the query returns a valid response prepare the JSON string
    if ($result) {
        // The `$arrData` array holds the chart attributes and data
		
        $arrData = array(
            "chart" => array(
              "caption" => "Election Results",
              "paletteColors" => "#0075c2",
              "bgColor" => "#ffffff",
              "borderAlpha"=> "50",
              "canvasBorderAlpha"=> "0",
              "usePlotGradientColor"=> "0",
              "plotBorderAlpha"=> "10",
              "showXAxisLine"=> "1",
			   "xAxisName"=> "Candidate",
              "xAxisLineColor" => "#999999",
              "showValues" => "0",
              "divlineColor" => "#999999",
              "divLineIsDashed" => "1",
              "showAlternateHGridColor" => "0",
			   "yAxisName"=> "Number of Votes"
            )
        );

        $arrData["data"] = array();

// Push the data into the array
        while($row = mysqli_fetch_array($result)) {
        array_push($arrData["data"], array(
            "label" => $row["name"],
            "value" => $row["total_votes"]
            )
        );
        }

        /*JSON Encode the data to retrieve the string containing the JSON representation of the data in the array. */

        $jsonEncodedData = json_encode($arrData);



		//fusinchart(type of chart,chart id,chart width,height,division id to render the chart,data format,data source)
        $columnChart = new FusionCharts("column2D", "myFirstChart" , 700, 500, "chart-1", "json", $jsonEncodedData);

        // Render the chart
        $columnChart->render();

        // Close the database connection
        $db->close();
    }
	
?>
<div class="back" style="height:50px;width:50px;float:right;margin-right:20px; margin-top:60px;">
		<a href="viewResult.php"><button  id="back" type="button" class="btn btn-danger">Back</button></a>
	</div>
<div id="chart-1" style="margin-top:100px; margin-left:300px;"><!-- Fusion Charts will render here--></div>