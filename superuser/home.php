<?php 
session_start();

if(isset($_SESSION['id'])){
   $id=$_SESSION['id'];
}else{
    //echo 'no session found';exit;
    header('location:index.html');
    // echo "string";
    exit();
}


if (isset($_POST['dfid']) && isset($_POST['ddate'])) {

    $dfid = $_POST['dfid'];
    $ddate = $_POST['ddate'];
    dailyfood($dfid,$ddate);
}

if (isset($_POST['afid']) && isset($_POST['afname']) && isset($_POST['aprice']) && isset($_POST['aqty'])) {

    $afid = $_POST['afid'];
    $afname = $_POST['afname'];
    $aprice = $_POST['aprice'];
    $aqty = $_POST['aqty'];
    addfood($afid,$afname,$aprice,$aqty);
}

if (isset($_POST['gdate']) && isset($_POST['gfid'])) {
     $gdate = $_POST['gdate'];
    $gfid = $_POST['gfid'];
    dailyfood($gdate,$gfid);
}


function dailyfood($dfid,$ddate)
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'cms';

        $con = mysqli_connect($host, $user, $pass,$db);
        if (!$con) {
            die('Can not connect mysqli');
            exit;}
            $sql = " INSERT INTO `Daily_Food`(`Food_id`, `Date`) VALUES ('$dfid','$ddate')"; 

             if (!mysqli_query($con,$sql)) {
                   die('Error: ' . mysqli_error($con));
                       }

               
              else
                {
                    mysqli_close($con);
                  }
                                                
    }
    function addfood($afid,$afname,$aprice,$aqty)
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'cms';

        $con = mysqli_connect($host, $user, $pass,$db);
        if (!$con) {
            die('Can not connect mysqli');
            exit;}
            $sql = " INSERT INTO `food_menu`(`Food_Name`, `Food_id`, `Quantity`, `Cost`) VALUES ('$afname','$afid','$aqty','$aprice')"; 

             if (!mysqli_query($con,$sql)) {
                   die('Error: ' . mysqli_error($con));
                       }

               
              else
                {
                    mysqli_close($con);
                  }
                                                
    }
function collection($dfid,$ddate)
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'cms';

        $con = mysqli_connect($host, $user, $pass,$db);
        if (!$con) {
            die('Can not connect mysqli');
            exit;}
            $sql = " INSERT INTO `Daily_Food`(`Food_id`, `Date`) VALUES ('$dfid','$ddate')"; 

             if (!mysqli_query($con,$sql)) {
                   die('Error: ' . mysqli_error($con));
                       }

               
              else
                {
                    mysqli_close($con);
                  }
                                                
    }



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
                            <!-- <li class="active"><a href="#home">Home</a></li> -->
                            <!-- <li><a href="#service">Services</a></li>
                            <li><a href="#portfolio">Portfolio</a></li> -->
                            <li class="active"><a href="#billing">Billing</a></li>
                            <li><a href="#daily">DailyFood</a></li>
                            <li><a href="#addfood">Add Food</a></li>
                            <li><a href="action/logout.php">LogOut</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <div class="section primary-section" id="billing">
            <div class="container">
                <!-- Start title section -->
                <div class="title">
                    <h1>BILLING</h1>
                </div>
                <div class="row-fluid">
                    <div class="span4">
                    </div>
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <a href="billing.php">
                                    <img class="img-circle" src="images/Service2.png" alt="service 2" />
                                </a>
                                
                            </div>
                            <h3>Billing</h3>
                        </div>
                    </div>
                    <div class="span4">
                    </div>
                </div>
            </div>
        </div>
           <!-- Portfolio section start -->
        <div class="section secondary-section " id="daily">
            <div class="triangle"></div>
            <div class="container">
                <div class=" title">
                    <h1 style="color: #222222;">Daily Menu</h1>
                </div>
                <div class="row-fluid">
                    <form action="#" method="post">
                        <div class="span1">
                        
                        </div>

                        <div class="span2">
                           <ul><label style="font-size: 20px;color: #181A1C;"><i>Food ID :</i></label></ul>
                           <ul><label  style="font-size: 20px;color: #181A1C;""><i>Date :</i></label></ul>
                        </div>
                        <div class="span3">
                           <input type="number" name="dfid" style="font-size: 18px; " required>
                           <input type="date" name="ddate" style="font-size: 18px;" required>
                           <button class="button button-sp" name="dailyfood" style="padding-top: 20px">ADD</button>

                        </div>
                    </form>	
                	   
                        
                </div>
            </div>
        </div>
                <!-- Start details for portfolio project 1 -->
        <!-- Service section start -->
        
     
               
        <!-- About us section start -->
        <div class="section primary-section" id="addfood">
            <div class="triangle"></div>
            <div class="container">
                <div class="title">
                    <h1>ADD FOOD ITEM</h1>
                </div>
                <form action="#" method="post">
                <div class="row-fluid">	
                

                    <div class="span2">
                    <ul><label style="font-size: 20px;color: #FECE1A;"><i>Food ID :</i></label></ul>
                    <ul><label style="font-size: 20px;color: #FECE1A;"><i>Food Name :</i></label></ul>
                        
                       
                    </div>
                    <div class="span4">
                        <input type="number" name="afid" style="font-size: 18px;" required="">
                        <input type="text" name="afname" style="font-size: 18px;" required="">
                    </div>
                    <div class="span2">
                        <ul><label style="font-size: 20px;color: #FECE1A;"><i>Price :</i></label></ul>
                        <ul><label style="font-size: 20px;color: #FECE1A;"><i>Quantity :</i></label>

                    </div>
                    <div class="span3">
                        <input type="number" name="aprice" style="font-size: 18px;" required="">
                        <input type="number" name="aqty" style="font-size: 18px;" required="">
                    </div>
                    

                 </div>
                 <div class="higlighted-box center">                                                           <button class="button button-sp" style="color:#181A1C ; background-color: #fece1a;">Join Us    </button>
                    </div>
                </form>
                
                
            </div>
        </div>

        
        <div class="footer">
            <p>&copy; 2018 Batch. MiniProject | Designed by TechKnightz</p>
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