<!DOCTYPE html>

<head>

<link href="../assets/css/stylesheet.css" />

<div class="">
<?php include 'header.php';?>
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

<div class="candidate_profile">
	<div class="profile">
		
	</div>
</div>

<!-- team section -->
<section id="team">

	<div class="back" style="height:50px;width:50px;float:right;margin-right:20px;">
		<button onclick="goBack()" id="back" type="button" class="btn btn-danger">Back</button>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="section-title">
					<!--strong>03</strong-->
					<h1 class="heading bold" style="color:black;">CANDIDATES</h1>
					<hr>
				</div>
			</div>
			
			<?php
			
			require("db/db.php");
	
			$sql = "SELECT * FROM profiledata";
	
			$res = mysqli_query($db,$sql) or die(mysql_error());
			
			if($res){
		
			while($row = mysqli_fetch_array($res)){
	
			echo "<div class='col-md-3 col-sm-6 wow fadeIn' data-wow-delay='0.9s'>";
				echo "<div class='team-wrapper'>";
					
					echo "<img src=".$row['path']." class='img-responsive' alt='' style='width:500px;height:200px;'>";
					
						echo "<div class='team-des'>
							<a style='color:#ffffff;text-decoration:none;'><h4>".$row['name']."</h4></a>
							<h3>".$row['email']."</h3>
							<hr>";
							//echo "<ul class=''>";
								echo "<a href=profile.php?id=".$row['id']."><span class='glyphicon glyphicon-eye-open' style='color:#ffffff;'></span></a>";
								//echo "<li><a href='#' class='fa fa-facebook wow fadeIn' data-wow-delay='0.3s'></a></li>";
								//echo "<li><a href='#' class='fa fa-twitter wow fadeIn' data-wow-delay='0.6s'></a></li>";
								//echo "<li><a href='#' class='fa fa-dribbble wow fadeIn' data-wow-delay='0.9s'></a></li>";
							//echo "</ul>";
						echo "</div>";
				echo "</div>";
			echo "</div>";
			
			}
			
			}
			else{
				echo "Error : " . mysqli_error($db); 
			}
			
			//Close Connection
			mysqli_close($db);
			
			?>		
		</div>
	</div>
</section>

	<div class="send" style="height:50px;width:100px;margin:20px;float:right">
	<button type="button" class="btn btn-info">Send Link</button>
	</div>
</body>

<script>
	function goBack() {
		window.history.back();
	}
</script>