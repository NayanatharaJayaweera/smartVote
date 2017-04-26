<!DOCTYPE html>

<html class="no-js">

      <!-- HEAD SECTION-->
<head>
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
    <!-- END MAIN STYLE SECTION-->
</head>
<!-- END HEAD SECTION-->

     <!-- BODY SECTION-->
<body>

     <!-- HEADER SECTION-->
    <div class="navbar navbar-fixed-top" role="navigation">
        
    </div>
     <!-- END HEADER SECTION-->

    <!--PAGE CONTENT--> 
    
     <!-- ABOUT SECTION-->
    <section id="section-about" class="section">
       
    </section>
	
    <section  class="section bgcolor-whitesmoke">
	
	<div class="back" style="height:50px;width:50px;float:right;margin-right:20px;">
		<button onclick="goBack()" id="back" type="button" class="btn btn-danger">Back</button>
	</div>
	
        <div class="container" data-scrollreveal='wait 0.10s'>
            <div class="row ">
			
			<?php
			
			require("db/db.php");
			
			$id = $_GET['id'];
			
			$sql = "SELECT * FROM profiledata WHERE id=$id";
	
			$res = mysqli_query($db,$sql) or die(mysql_error());
			
			if($res){
		
			while($row = mysqli_fetch_array($res)){
				
                echo "<div class='col-md-4'>";
                    echo "<div class='team-member text-center'>";
                        echo "<figure class='member-photo'>";
                            echo "<img src=".$row['path']." alt='' width='200' height='200'/></figure>";
                        echo "<div class='team-detail'>";
                            echo "<h4>".$row['name']."</h4>";
							echo "<span class='text-bold'>Birthday</span>";
							echo "<p>".$row['birthday']."</p>";
                            echo "<span class='text-bold'>Gmail</span>";
							echo "<p>".$row['email']."</p>";
                            echo "<span class='text-bold'>Position</span>";
							echo "<p>".$row['position']."</p>";
							echo "<span class='text-bold'>Section</span>";
							echo "<p>".$row['section']."</p>";
                        echo "</div>";
                    echo "</div>";
                    
                echo "</div>";
			}
			}else{
				echo "Error : " . mysqli_error($db); 
			}
				
			//Close Connection
			mysqli_close($db);
			?>
                <div class="col-md-offset-1 col-md-6">
                    <div data-scrollreveal="enter right">
                        <ul class="timeline">
                            <li class="time-label">
                                <!--span class="bg-orange">
                                </span-->
                                <br />
                                <br />
                            </li>

                            <li class="time-label">
                                <!--span class="bg-light-blue"> Year 2014
                                </span-->
                            </li>

                            <li>
                                <!--i class="fa fa-envelope bg-blue"></i-->
                                <div class="timeline-item">
                                    <!--span class="time"><i class="fa fa-clock-o"></i>20 Feburary</span-->
                                    <h3 class="timeline-header"><a href="#"><?php echo $row['name'];?></a></h3>
                                    <div class="timeline-body">
                                        
                                    </div>
                                    <div class='timeline-footer'>
                                        <a class="btn btn-primary btn-xs">Submit</a>
                                        <!--a class="btn btn-danger btn-xs">Read More</a-->
                                    </div>
                                </div>
                            </li>

                            <li>
                                <!--i class="fa fa-user bg-aqua"></i-->
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i>02 January</span>
                                    <h3 class="timeline-header no-border"><a href="#">Venenatis blandit.</a>  Duis auctor hendrerit metus</h3>
                                </div>
                            </li>

                            <li class="time-label">
                                <!--span class="bg-green"> Year 2013
                                </span-->
                            </li>

                            <li>
                                <!--i class="fa fa-camera bg-purple"></i-->
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i>20 December</span>
                                    <h3 class="timeline-header"><a href="#">Blandit</a> New Photo Show</h3>
                                    <div class="timeline-body">
                                        <img src="assets/img/about/imgTime.jpg" alt="" class='margin' />
                                        <img src="assets/img/about/imgTime.jpg" alt="" class='margin' />
                                    </div>
                                </div>
                            </li>

                            <li>
                                <!--i class="fa fa-video-camera bg-maroon"></i-->
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i>15 June</span>
                                    <h3 class="timeline-header"><a href="#">Venenatis blandit</a> New Event</h3>
                                    <div class="timeline-body">
                                        <iframe width="300" height="169" src="//www.youtube.com/embed/Ycv5fNd4AeM"></iframe>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <!--i class="fa fa-clock-o"></i-->
                            </li>
                        </ul>
                    </div>
                </div>
			
			
			
            </div>

        </div>
    </section>
	
	<section>
		<div>
			
		</div>
	</section>
     <!-- END ABOUT SECTION-->
	 
    <script>
		function goBack() {
			window.history.back();
		}
	</script>
	
    <!-- FOOTER SECTION-->
    <section id="footer" class="section footer">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="social-network social-circle">
                        <li><a href="#" class="icoRss" title="Rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#" class="icoFacebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="icoTwitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="icoGoogle" title="Google +"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="icoLinkedin" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-sm-6 align-center">
                    <div class="col-sm-12">
                        <p>Copyright &copy; yourcompanyname.com</p>
                        <p>2014 All Rights Reserved</p>
                    </div>
                </div>
            </div>


        </div>

    </section>
     <!-- END FOOTER SECTION-->
     <!-- SCROLLUP LINK SECTION-->
    <a href="#Homepage" class="scrollup"><i class="fa fa-chevron-up"></i></a>
     <!--END SCROLLUP LINK SECTION-->
    <!-- STYLE SWITCHER SECTION-->
    <div  class="panel" style="color:white">
        <div id="styledemo"  style="left: 0px;">
		<span id="theme_blue" style="background-color:#37AFFF" ></span>
		<span id="theme_green" style="background-color:#469E66" ></span>
		<span id="theme_brown" style="background-color:#E69351" ></span>
		<span id="theme_red" style="background-color:#E7484E" ></span>
            </div>
</div>

    <!-- END STYLE SWITCHER SECTION-->
    <!-- MAIN SCRIPTS SECTION-->
    <script src="assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/scrollReveal.js"></script>
    <script>
        window.scrollReveal = new scrollReveal(); //please put this script here to show animation at the time of scroll
    </script>
    <script src="assets/js/jquery.easing.1.3.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/isotope/jquery.isotope.min.js"></script>
    <script src="assets/plugins/fancybox/jquery.fancybox.pack.js"></script>
    <script src="assets/js/jquery.localscroll-1.2.7-min.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/scripts/main.js"></script>
   
     <!--END MAIN SCRIPTS SECTION-->
</body>

    <!--END  BODY SECTION-->
</html>
