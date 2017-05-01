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

if(isset($_POST['btn1'])) 
	{
			$btn1 = $_POST['btn1'];
	}
	else{$btn1=0;}
if(isset($_POST['btn2'])) 
	{
			$btn2 = $_POST['btn2'];
	}
	else{$btn2=0;}
if(isset($_POST['btn3'])) 
	{
			$btn3 = $_POST['btn3'];
	}
	else{$btn3=0;}
if(isset($_POST['btn4'])) 
	{
			$btn4 = $_POST['btn4'];
	}
	else{$btn4=0;}
if(isset($_POST['btn5'])) 
	{
			$btn5 = $_POST['btn5'];
	}
	else{$btn5=0;}
if(isset($_POST['btn6'])) 
	{
			$btn6 = $_POST['btn6'];
	}
	else{$btn6=0;}




?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Billing</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/stylei.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
    </head>
    
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="index.html">
                        <img src="images/logo.png" width="50" height="60" alt="Logo" />
                        <b style="font-size: 25px;color: #efc320;padding-top: 12px;padding-left: 5px;">CANTEEN MANAGEMENT SYSTEM</b>
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            <li><a href="home.php">Home</a></li>
                            <li class="active"><a href="#billing">Billing</a></li>
                            <li><a href="action/logout.php">LogOut</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>

        <div class="section primary-section" id="bill">
            <div class="triangle"></div>
            <div class="container">
                <div class="title">
                    <h1>ITEMS</h1>
                </div>
                <form action="generatebill.php" method="post">
                <div class="row-fluid">	   

                    <div class="span2">
                        
                       
                    </div>
                    <div class="span4">
                    <ul><label name="aa" style="font-size: 20px;color: #FECE1A;"><i><?php switch ($btn1) {
                    	case '0':break;
                    	default:echo "$btn1";break;}?></i></label></ul>
                    <ul><label style="font-size: 20px;color: #FECE1A;"><i><?php switch ($btn2) {
                    	case '0':echo "";break;
                    	default:echo "$btn2";break;}?></i></label></ul>
                    <ul><label style="font-size: 20px;color: #FECE1A;"><i><?php switch ($btn3) {
                    	case '0':break;
                    	default:echo "$btn3";break;}?></i></label></ul>
                    <ul><label style="font-size: 20px;color: #FECE1A;"><i><?php switch ($btn4) {
                    	case '0':break;
                    	default:echo "$btn4";break;}?></i></label></ul>
                    <ul><label style="font-size: 20px;color: #FECE1A;"><i><?php switch ($btn5) {
                    	case '0':break;
                    	default:echo "$btn5";break;}?></i></label></ul>
                    <ul><label style="font-size: 20px;color: #FECE1A;"><i><?php switch ($btn6) {
                    	case '0':break;
                    	default:echo "$btn6";break;}?></i></label></ul>
                    
                         <form action="generatebill.php" method="post">
                            <input type="hidden" id="btn1" name="btn1" value="<?php echo $btn1; ?>">
                            <input type="hidden" id="btn2" name="btn2" value="<?php echo $btn2; ?>">
                            <input type="hidden" id="btn3" name="btn3" value="<?php echo $btn3; ?>">
                            <input type="hidden" id="btn4" name="btn4" value="<?php echo $btn4; ?>">
                            <input type="hidden" id="btn5" name="btn5" value="<?php echo $btn5; ?>">
                            <input type="hidden" id="btn6" name="btn6" value="<?php echo $btn6; ?>">
                            <div class="higlighted-box center">
                            <button class="button button-sp" name="billbtn" style="color:#181A1C ; background-color: #fece1a;">Bill Now</button>
                            </div>
                        </form>

                        <div class="span4">

                        </div>
                        <div class="span5">
                            
                        </div>
                    </div>
                 </div>
                 
                </form>
                
                
            </div>

        </div>

        
        <div class="footer">
            <p>&copy;2017</p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
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