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
if (isset($_POST['addbutton'])) 
{
    if (isset($_POST['ddate']) && isset($_POST['dcid']) && isset($_POST['dfid']) && isset($_POST['dqty'])) 
        {

    $ddate = $_POST['ddate'];
    $dcid = $_POST['dcid'];
    $dfid = $_POST['dfid'];
    $dqty = $_POST['dqty'];
    validatecid($ddate,$dcid,$dfid,$dqty);
       echo '<script language="javascript">';
       echo 'alert("Item added Successfully")';
       echo '</script>';

        }
}

if (isset($_POST['billbtn']))
    {
    if (isset($_POST['ddate']) && isset($_POST['dcid']) && isset($_POST['dfid']) && isset($_POST['dqty'])) 
        {

    $ddate = $_POST['ddate'];
    $dcid = $_POST['dcid'];
    $dfid = $_POST['dfid'];
    $dqty = $_POST['dqty'];
    validatecid($ddate,$dcid,$dfid,$dqty);
    $_SESSION['ddate'] = $ddate;
    $_SESSION['C_id'] = $dcid;
    header('location:generatebill.php');

        } 
    }
   


function validatecid($ddate,$dcid,$dfid,$dqty)
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'cms';
        $con = mysqli_connect($host, $user, $pass,$db);
        if (!$con) {
            die('Can not connect mysqli');
            exit;}
            $sql = "SELECT * from login_table WHERE `C_id`='$dcid'"; 

             $result = $con->query($sql);

                            if ($result->num_rows > 0) 
                                {  

                                    getname($ddate,$dcid,$dfid,$dqty);         
                                }
                            else{
                              header('location:/canteen/superuser/billing.php');
                                }    

                            if (!mysqli_query($con,$sql)) {
                   die('Error: ' . mysqli_error($con));
                       }

               
              else
                {
                    mysqli_close($con);
                  }
    }
function getname($ddate,$dcid,$dfid,$dqty)
    {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'cms';
        $con = mysqli_connect($host, $user, $pass,$db);
        if (!$con) {
            die('Can not connect mysqli');
            exit;}
            $sql = "SELECT `Food_Name`,`Cost` from food_menu WHERE `Food_id`='$dfid'"; 

             $result = $con->query($sql);

                            if ($result->num_rows > 0) 
                                {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) 
                                        {
                                            $fname = $row["Food_Name"];
                                            $price = $row["Cost"];
                                            
                                }
                            // else{
                            //   header('location:../login.html');
                            //     }    

                            if (!mysqli_query($con,$sql)) {
                   die('Error: ' . mysqli_error($con));
                       }

               
              else
                {
                    mysqli_close($con);
                  }
        }

        additem($ddate,$dcid,$dfid,$dqty,$fname,$price);


    }

    function additem($ddate,$dcid,$dfid,$dqty,$fname,$price)
        {
            $amnt = $price*$dqty;

        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'cms';

        $con = mysqli_connect($host, $user, $pass,$db);
        if (!$con) {
            die('Can not connect mysqli');
            exit;}
            $sql = " INSERT INTO `purchase`(`C_id`, `Food_Name`, `Date`, `Amount`) VALUES ('$dcid','$fname','$ddate','$amnt')"; 

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
                    <h1>BILLING</h1>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="row-fluid">	   

                    <div class="span2">
                    <ul><label style="font-size: 20px;color: #FECE1A;"><i>Date :</i></label></ul>
                    <ul><label style="font-size: 20px;color: #FECE1A;"><i>Customer ID:</i></label></ul>
                    <ul><label style="font-size: 20px;color: #FECE1A;"><i>Food ID :</i></label></ul>
                     <ul><label style="font-size: 20px;color: #FECE1A;"><i>Quantity:</i></label></ul>
                        
                       
                    </div>
                    <div class="span4">
                        <input type="date" name="ddate" style="font-size: 18px;" required="">
                        <input type="text" name="dcid" style="font-size: 18px;" required="">
                        <input type="number" name="dfid" style="font-size: 18px;" required="">
                        <input type="number" name="dqty" style="font-size: 18px;" required="">

                        <div class="span4">
                            <div class="higlighted-box center">
                            <button class="button button-sp" style="color:#181A1C ; background-color: #fece1a;" name="addbutton">Add Item</button>
                            </div>
                        </div>
                        <div class="span5">
                            <div class="higlighted-box center">
                            <button class="button button-sp" name="billbtn" style="color:#181A1C ; background-color: #fece1a;">Bill Now</button>
                            </div>
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