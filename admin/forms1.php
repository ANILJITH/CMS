<?php 
session_start();

if(isset($_SESSION['id'])){
   $id=$_SESSION['id'];
}else{
    //echo 'no session found';exit;
    header('location:login.html');
    exit();


}


if (isset($_POST['month']) && isset($_POST['salary'])&& isset($_POST['inventory'])) 
	{
		$month = $_POST['month'];
		$nmonth = date("m", strtotime("$month"));
		$salary = $_POST['salary'];
		$inventory = $_POST['inventory'];

		genreport($nmonth,$salary,$inventory);
		
		$profit = $sum-$salary-$inventory;
	}

function genreport($nmonth,$salary,$inventory)
	{
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'cms';

		$con = mysqli_connect($host, $user, $pass,$db);
		if (!$con) {
    		die('Can not connect mysqli');
    		exit;}
    		$total = 0;
    		$sql = "SELECT * from purchase ";
        		$result = $con->query($sql);

                            if ($result->num_rows > 0) 
                            	{
                            		// output data of each row
                            		while($row = $result->fetch_assoc()) 
                            			{	
                            				$ddate = $row['Date'];
											$d = date_parse_from_format("Y-m-d", $ddate);
											$m =  $d["month"];
                            				if ($m==$nmonth) 

                            					{
                            						$total+=$row['Amount'];
												}
                            	 		}
                            	}
                            else{
                              
                            	}
        $GLOBALS['sum'] = $total; 
	

	}






?>
<!DOCTYPE HTML>
<html>
<head>
<title>CMS Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet">
<script src="js/jquery.min.js"> </script>
<script src="js/Chart.js"></script>
<script src="js/bootstrap.min.js"> </script>

<!-- Mainly scripts -->
<script src="js/jquery.metisMenu.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<link href="css/custom.css" rel="stylesheet">
<script src="js/custom.js"></script>
<script src="js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}



			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});



		});
		</script>

<body>
<div id="wrapper">
     <!----->
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="index.html">CMS</a></h1>
			   </div>
			 <div class=" border-bottom">
        	<div class="full-left">
        	  <section class="full-top">
				<button id="toggle"><i class="fa fa-arrows-alt"></i></button>
			</section>
			<form class=" navbar-left-right">
              <input type="text"  value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
              <input type="submit" value="" class="fa fa-search">
            </form>
            <div class="clearfix"> </div>
           </div>


            <!-- Brand and toggle get grouped for better mobile display -->

		   <!-- Collect the nav links, forms, and other content for toggling -->




       <div class="drop-men" >
           <ul class=" nav_1">

           <li class="dropdown at-drop">
                 <a href="#" class="dropdown-toggle dropdown-at " data-toggle="dropdown"><i class="fa fa-globe"></i> <span class="number">1</span></a>
                 <ul class="dropdown-menu menu1 " role="menu">

                   <li><a href="#">
                     <div class="user-new">
                     <p>New feedbacks are waiting for responses</p>
                     <span>Last Week</span>
                     </div>
                     <div class="user-new-left">

                     <i class="fa fa-rss"></i>
                     </div>
                     <div class="clearfix"> </div>
                   </a></li>
                   <li><a href="#" class="view">View all messages</a></li>
                 </ul>
               </li>
         <li class="dropdown">
                 <a href="#" class="dropdown-toggle dropdown-at" data-toggle="dropdown"><span class=" name-caret">Admin<i class="caret"></i></span><img src="images/wo.jpg"></a>
                 <ul class="dropdown-menu " role="menu">

                   <li><a href="profile.html"><i class="fa fa-user"></i>View Profile</a></li>
                   <li><a href="calendar.html"><i class="fa fa-calendar"></i>Calender</a></li>
                     <li><a href="action/logout.php">Sign Out</a></li>



                 </ul>
               </li>

           </ul>
        </div>




<!-- /.navbar-collapse -->
			<div class="clearfix">

     </div>




     <div class="navbar-default sidebar" role="navigation">
             <div class="sidebar-nav navbar-collapse">
             <ul class="nav" id="side-menu">

                 <li>
                     <a href="index.php" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboards</span> </a>
                 </li>

                            <li>
                     <a href="layout.php" class=" hvr-bounce-to-right"><i class="fa fa-inbox nav_icon"></i> <span class="nav-label">Feedback</span> </a>
                 </li>

                 <li>
                   <a href="forms.php" class=" hvr-bounce-to-right"><i class="fa fa-list nav_icon"></i> <span class="nav-label">Reports</span> </a>



                 </li>

             </ul>
         </div>
     </div>




        </nav>
		 <div id="page-wrapper" class="gray-bg dashbard-1">
       <div class="content-main">

 	<!--banner-->
		     <div class="banner">
		    	<h2>
				<a href="index.php">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Forms</span>
				</h2>
		    </div>

	<div class="grid-form1">
	<h3 id="forms-example" class="">REPORT GRAPH</h3>
</div>
<div class="grid-from1">
	<div class="graph">
	<div class="col-md-12 graph-box1 clearfix">
							<div class="grid-1">
								<h4>Pie Chart Presentation</h4>
								<div class="grid-graph">

								<?php
										$salper = ($salary/$sum)*100;
										$sal = round($salper);
										$expens = ($inventory/$sum)*100;
										$ex = round($expens);
										$pro = ($profit/$sum)*100;
										$pr = round($pro);



								 ?>
									<div class="grid-graph1" style="font-size: 20px;">
									<div id="os-Win-lbl"><b>Salary</b><span><?php echo "$sal %"; ?></span></div>
									<div id="os-Mac-lbl"><b>Expenses</b><span><?php echo "$ex %"; ?></span></div>
									<div id="os-Other-lbl"><b>Profit</b><span><?php echo "$pr %"; ?></span></div>
								 </div>
								 </div>
							<div class="grid-2">
								<canvas id="pie" height="315" width="470" style="width: 470px; height: 315px;"></canvas>
								<script>
									var pieData = [
										{
											value: <?php echo "$profit"; ?>,
											color:"#D95459"
										},
										{
											value : <?php echo "$salary"; ?>,
											color : "#1ABC9C"
										},
										{
											value : <?php echo "$inventory"; ?>,
											color : "#3BB2D0"
										}

									];
									new Chart(document.getElementById("pie").getContext("2d")).Pie(pieData);
								</script>
							</div>
							<div class="clearfix"> </div>
						</div>

					</div>



			 
		 </div>

</div>


 	</div>
 	<!--//grid-->
		<!---->
<div class="copy">
            <p> &copy; 2018 Batch. MiniProject | Designed by TechKnightz </p>	    </div>
		</div>
		</div>
		<div class="clearfix"> </div>
       </div>


			 <script src="js/bootstrap.min.js"> </script>


			 <!-- Mainly scripts -->
			 <script src="js/jquery.metisMenu.js"></script>
			 <script src="js/jquery.slimscroll.min.js"></script>
			 <!-- Custom and plugin javascript -->
			 <link href="css/custom.css" rel="stylesheet">
			 <script src="js/custom.js"></script>
			 <script src="js/screenfull.js"></script>
			 		<script>
			 		$(function () {
			 			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			 			if (!screenfull.enabled) {
			 				return false;
			 			}



			 			$('#toggle').click(function () {
			 				screenfull.toggle($('#container')[0]);
			 			});



			 		});
			 		</script>




     <!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
<!---->

</body>
</html>
