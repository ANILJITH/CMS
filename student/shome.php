<?php
session_start();

if(isset($_SESSION['cid'])){
   $id=$_SESSION['cid'];
}else{
    //echo 'no session found';exit;
    header('location:../login.html');
    exit();
}

if(isset($_SESSION['cid']))
	{
		student($id);
	}

if (isset($_POST['message']))
	{
		$msg = $_POST['message'];
			msgstore($msg,$id);
	}


function student($id)
	{
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'cms';

		$con = mysqli_connect($host, $user, $pass,$db);
		if (!$con) {
    		die('Can not connect mysqli');
    		exit;}

    		$sql = "SELECT * from students WHERE `Stud_id`='$id'";
        		$result = $con->query($sql);

                            if ($result->num_rows > 0)
                            	{
                            		// output data of each row
                            		while($row = $result->fetch_assoc())
                            			{
                            				$GLOBALS['fname'] = $row["First_Name"];
                            				$GLOBALS['lname'] = $row["Last_Name"];
                            				$GLOBALS['batch'] = $row["batch"];
                            				$GLOBALS['phone'] = $row["Phone_No"];
                            				$GLOBALS['email'] = $row["Email"];
                            				$GLOBALS['points'] = $row["Points"];
                            	 		}
                            	}
                            else{
                              header('location:../login.html');
                            	}
	}

function msgstore($msg,$id)
	{
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'cms';

		$con = mysqli_connect($host, $user, $pass,$db);
		if (!$con) {
    		die('Can not connect mysqli');
    		exit;}
    		$sql = " INSERT INTO `feedback`(`C_id` ,`Usr_Flag`,`Feedback`,`fdbk_Staus`) VALUES ('$id','0','$msg','0')";

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
<html>
<head>
<title>hello </title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resume Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Acme' rel='stylesheet' type='text/css'><!-- //fonts -->

<!-- glyficons -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<!-- start-smoth-scrolling -->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
	<!-- start-smoth-scrolling -->

<!-- skills -->
<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#10A7AF',
                trackColor: '#fff',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#10A7AF',
                trackColor: '#fff',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#10A7AF',
                trackColor: '#fff',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

			$('#demo-pie-4').pieChart({
                barColor: '#10A7AF',
                trackColor: '#fff',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });
        });
    </script>
<!-- skills -->
<script type="text/javascript" src="js/numscroller-1.0.js"></script>

</head>
<body>
<div class="header-top">
		<div class="container">
			<ul>
				<li><a href="shome.php"><span class="glyphicon glyphicon-file"></span>HOME</a></li>
				<li><a href="preorder.php"><span class="glyphicon glyphicon-envelope"></span>PREBOOKING</a></li>
				<li><a href="action/logout.php">SIGN OUT</a></li>
			</ul>
		</div>
	</div>

	<!--banner-->
	<div id="home" class="banner">
		<div class="banner-info">
			<div class="container">
				<div class="col-md-4 header-left">
					<img src="images/img1.jpg" alt="" style="width: 225px;height: 225px;"/>
				</div>
				<div class="col-md-8 header-right">

					<h2>Hello <?php echo "$fname $lname,"; ?></h2>
					<h6>Beloved member of CMS</h6>
					<ul class="address">
						<li>
							<ul class="address-text">
								<li><b>STUDENT ID</b></li>
								<li><?php echo "$id"; ?></li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>BATCH </b></li>
								<li><?php echo "$batch"; ?></li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>PHONE </b></li>
								<li><?php echo "$phone"; ?></li>
							</ul>
						</li>
						<li>
							<ul class="address-text">
								<li><b>E-MAIL </b></li>
								<li><a href="<?php echo "$email"; ?>"><?php echo "$email"; ?></a></li>
							</ul>
						</li>

					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>

<div class="num-scroller">
	<div class="container">
		<h3 class="tittle ">CREDITS </h3>

		<div class="col-md-12 capabil-grid text-center">
			<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='<?php echo "$points"; ?>' data-delay='.5' data-increment="1"><?php echo "$points"; ?></div>
			<p><h1>CREDITS ACHIEVED</h1></p>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div id="emailme" class="contact">
	<div class="container">
		<h3 class="tittle">FEEDBACK</h3>
		<div class="col-md-12 contact-left ">
			<div class="horizontal-tab">
						<div class="contact-form">

							<form method="POST">
								<textarea  type="text" name="message" required></textarea>
								<input type="submit" value="SEND" >
							</form>
            </div>
            </div>
              <div id="respond" class="contact">
                <div class="container">
                  <h3 class="tittle">RESPONSE</h3>
                  <div class="col-md-12 contact-left ">

                    <div class="horizontal-tab">
                        <div class="contact-form">
                            <form method="POST">
                              <textarea  type="text" name="message" required></textarea>
                              <!-- <input type="submit" value="SEND" > -->
                            </form>
                            </div>
                          </div>
                          </div>








		</div>
		<div class="clearfix"></div>

	</div>

</div>
<script src="js/bootstrap.js"></script>

	<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {

		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->

</body>
</html>
