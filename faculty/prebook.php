<?php
session_start();

if(isset($_SESSION['cid'])){
   $id=$_SESSION['cid'];
}

else{
    //echo 'no session found';exit;
    header('location:fhome.php');
    exit();
}






maxdate();
function maxdate()
	{
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'cms';

		$con = mysqli_connect($host, $user, $pass,$db);
		if (!$con) {
    		die('Can not connect mysqli');
    		exit;}

    		$sql = "SELECT Food_id,max(Date) as max_date from Daily_Food";
        		$result = $con->query($sql);

                            if ($result->num_rows > 0)
                            	{
                            		// output data of each row
                            		while($row = $result->fetch_assoc())
                            			{
                            		      $fid= $row["Food_id"];
                                    $maxdate=$row["max_date"];
                            	 		}
                            	}
                                foodid($maxdate);


	}
  function foodid($maxdate)
  	{
      global $array;
      $array=array();
  		$host = 'localhost';
  		$user = 'root';
  		$pass = '';
  		$db = 'cms';


  		$con = mysqli_connect($host, $user, $pass,$db);
  		if (!$con) {
      		die('Can not connect mysqli');
      		exit;}



      		$sql2 = "SELECT `Food_id`  from Daily_Food WHERE `Date`='$maxdate'";
          		$result2 = $con->query($sql2);

                              if ($result2->num_rows > 0)
                              	{
                              		// output data of each row
                              		while($row2 = $result2->fetch_assoc())
                              			{
                              		      $fid2= $row2["Food_id"];
                                        $sql1="SELECT `Food_Name` FROM food_menu WHERE `Food_id`='$fid2'";
                              		        $result1 = $con->query($sql1);

                                                              if ($result1->num_rows > 0)
                                                            	{
                                                            		// output data of each row
                                                            		while($row1 = $result1->fetch_assoc())
                                                            			{
                                                            				$foodname = $row1["Food_Name"];

                                                                    $array[]=$foodname ;




                                                            	 		}



                                                            	}

                              	 		}
                                    // echo $array[0];
                              	}



  	}


?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Canteeen Pre-Booking</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap1.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive1.css" />
        <link rel="stylesheet" type="text/css" href="css/stylee1.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.jpg">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.jpg">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.jpg">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.jpg">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
    </head>
    
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">

                        <img src="images/logo.png" width="72 px" height="61" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                        <!-- <h1> Pre-Book our Hot Menu </h1> -->
                            <li><h1>Pre-Book our Hot Menu</h1></li>
                          <!--  <li><a></a></li>
                           <li><a></a></li> -->
                            <li class="active"><a href="shome.php">Home</a></li>
                            <li><a href="action/logout.php">Sign Out</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
<form method="post" action="items.php">
        <div class="section primary-section" id="about">
            <div class="triangle"></div>
            <div class="container">
                <div class="title">
                    <h>Book Today's Specials</h>
                </div>
                <div class="row-fluid team">
                    <div class="span4" id="first-person">
                        <div class="thumbnail">
                            <img src="images/<?php echo $array[0] ?>.jpg" alt="team 1">
                            <h3><?php echo $array[0] ?></h3>
                            <ul class="social">

                            </ul>
                        </div>
                    </div>


                    <div class="span4" id="second-person">
                        <div class="thumbnail">
                            <img src="images/<?php echo $array[1] ?>.jpg" alt="team 1">
                            <h3><?php echo $array[1] ?></h3>
                            <ul class="social">
                                
                            </ul>
                        </div>
                    </div>
                    <div class="span4" id="third-person">
                        <div class="thumbnail">
                            <img src="images/<?php echo $array[2] ?>.jpg" alt="team 1">
                            <h3><?php echo $array[2] ?></h3>
                            <ul class="social">
                               
                            </ul>
                        </div>
                    </div>
             
                            <div class="toggle-button toggle-button--aava">
                                <input id="toggleButton" name="btn1" value="<?php echo $array[0] ?>" type="checkbox">
                                <label for="toggleButton" data-on-text="Yes" data-off-text="No"></label>
                                 <div class="toggle-button__icon"></div>
                                </div>
                            <div class="toggle-button toggle-button--aava">
                                <input id="toggleButton1" name="btn2" value="<?php echo $array[1] ?>" name="btn2" type="checkbox">
                                <label for="toggleButton1" data-on-text="Yes" data-off-text="No"></label>
                                 <div class="toggle-button__icon"></div>
                                </div>    
                                <div class="toggle-button toggle-button--aava">
                                <input id="toggleButton2" name="btn3" value="<?php echo $array[2] ?>" name="btn3" type="checkbox">
                                <label for="toggleButton2" data-on-text="Yes" data-off-text="No"></label>
                                 <div class="toggle-button__icon"></div>
                                </div>                   
                </div>
                <div class="row-fluid team">
                    <div class="span4" id="first-person">
                        <div class="thumbnail">
                            <img src="images/<?php echo $array[3] ?>.jpg" alt="team 1">
                            <h3><?php echo $array[3] ?></h3>
                            <ul class="social">
                                
                            </ul>
                        </div>
                    </div>
                    <div class="span4" id="second-person">
                        <div class="thumbnail">
                            <img src="images/<?php echo $array[4] ?>.jpg" alt="team 1">
                            <h3><?php echo $array[4] ?></h3>
                            <ul class="social">
                               
                            </ul>
                        </div>
                    </div>
                    <div class="span4" id="third-person">
                        <div class="thumbnail">
                            <img src="images/<?php echo $array[5] ?>.jpg" alt="team 1">
                            <h3><?php echo $array[5] ?></h3>
                            <ul class="social">
                               
                            </ul>
                           
                        </div>
                    </div>
                    <div class="toggle-button toggle-button--aava">
                                <input id="toggleButton3" name="btn4" value="<?php echo $array[3] ?>" type="checkbox">
                                <label for="toggleButton3" data-on-text="Yes" data-off-text="No"></label>
                                 <div class="toggle-button__icon"></div>
                                </div>
                            <div class="toggle-button toggle-button--aava">
                                <input id="toggleButton4" name="btn5" value="<?php echo $array[4] ?>" type="checkbox">
                                <label for="toggleButton4" data-on-text="Yes" data-off-text="No"></label>
                                 <div class="toggle-button__icon"></div>
                                </div>    
                                <div class="toggle-button toggle-button--aava">
                                <input id="toggleButton5" name="btn6" value="<?php echo $array[5] ?>" type="checkbox">
                                <label for="toggleButton5" data-on-text="Yes" data-off-text="No"></label>
                                 <div class="toggle-button__icon"></div>
                                </div> 
                             <!-- <button class="btn btn-danger navbar-btn">Button</button> -->                     
                </div>
                <div class="span4"></div>
                <div class="span4">

                    <button class="btn btn-primary btn-lg">Pay Now</button> 
                </div>
</form>
        <!-- Footer section start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.mixitup.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/modernizr.custom.js"></script>
        <script type="text/javascript" src="js/jquery.bxslider.js"></script>
        <script type="text/javascript" src="js/jquery.cslider.js"></script>
        <script type="text/javascript" src="js/jquery.placeholder.js"></script>
        <script type="text/javascript" src="js/jquery.inview.js"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <script async="" defer="" type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&callback=initializeMap"></script>
        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
            <script src="js/respond.min.js"></script>
        <![endif]-->
        <script type="text/javascript" src="js/app.js"></script>

    </body>
</html>