<?php 
session_start();

if(isset($_SESSION['id'])){
   $id=$_SESSION['id'];
}else{
    //echo 'no session found';exit;
    header('location:login.html');
    exit();
}

if (isset($_POST['usrtype']) && isset($_POST['fid'])) 
  {
    $fid = $_POST['fid'];
    addfaculty($fid);
    
  }


  function addfaculty($fid)
  	{
  		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$db = 'cms';

		$con = mysqli_connect($host, $user, $pass,$db);
		if (!$con) {
    		die('Can not connect mysqli');
    		exit;}
    		$sql = " INSERT INTO `faculty_list`(`Fa_id`) VALUES ('$fid')";

    		 if (!mysqli_query($con,$sql)) {
                   die('Error: ' . mysqli_error($con));
                       }


              else
              	{
              		mysqli_close($con);
                  }


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

<script src="js/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body>
<div id="wrapper">
        <nav class="navbar-default navbar-static-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <h1> <a class="navbar-brand" href="index.php">CMS</a></h1>
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


            <!-- Brand and toggle get grouped for better mobile display 

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
		     </div><!-- /.navbar-collapse -->
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
				<a href="index.html">Home</a>
				<i class="fa fa-angle-right"></i>
				<span>Dashboard</span>
				</h2>
		    </div>
		<!--//banner-->
		<!--content-->
<div class="grid-system">
    <!---->
    <div class="horz-grid">
    <div class="grid-hor">
    <h3 id="grid-example-basic">Add Faculty</h3>
      </div>
        <div class="grid-form1">

             <div class="tab-content">
            <div class="tab-pane active" id="horizontal-form">
		<div class="content-top">
			<form class="form-horizontal" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-group">
                  <label for="selector1" class="col-sm-2 control-label">User Type</label>
                  <div class="col-sm-8"><select name="usrtype" id="selector1" class="form-control1">
                    <option>Faculty</option>
                  </select></div>
                </div>
                <div class="form-group">
                  <label for="smallinput" class="col-sm-2 control-label label-input-sm">Id : </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control1 input-sm" name="fid" required="">
                  </div>
                </div>
                <div class="form-group">
                  <label for="smallinput" class="col-sm-2 control-label label-input-sm">Name : </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control1 input-sm" name="fname" required="">
                  </div>
                </div>
                <div class="panel-footer">
   			 <div class="row">
    		  <div class="col-sm-8 col-sm-offset-2">
    		    <button class="btn-primary btn">Submit</button>
    		  </div>
    		</div>
   				</div>
              </form>
		  </div>
          </div>
 </div>
</div>
</div>

			<div class="col-md-1 top-content"></div>

		<div class="clearfix"> </div>
		</div>
		<!---->


		<div class="content-mid">

			<div class="col-md-6">
					 <div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">July 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
			  <!---Calender -------->
			<link rel="stylesheet" href="css/clndr.css" type="text/css" />
			<script src="js/underscore-min.js" type="text/javascript"></script>
			<script src= "js/moment-2.2.1.js" type="text/javascript"></script>
			<script src="js/clndr.js" type="text/javascript"></script>
			<script src="js/site.js" type="text/javascript"></script>
		</div>






	<div class="col-md-6">

				<div class="weather">
					<div class="weather-top">
						<div class="weather-top-left">
							<div class="degree">
							<figure class="icons">
								<canvas id="partly-cloudy-day" width="64" height="64">
								</canvas>
							</figure>
							<span>37°</span>
							<div class="clearfix"></div>
							</div>
				<script>
							 var icons = new Skycons({"color": "#1ABC9C"}),
								  list  = [
									"clear-night", "partly-cloudy-day",
									"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
									"fog"
								  ],
								  i;

							  for(i = list.length; i--; )
								icons.set(list[i], list[i]);

							  icons.play();
						</script>
							<p>TUESDAY
								<label>4</label>
								<sup>th</sup>
								APRIL
							</p>
						</div>
						<div class="weather-top-right">
							<p><i class="fa fa-map-marker"></i>Chengannur</p>
							<label>Chengannur</label>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="weather-bottom">
			<div class="weather-bottom1">
				<div class="weather-head">
				<h4>Cloudy</h4>
				<figure class="icons">
					<canvas id="cloudy" width="58" height="58"></canvas>
				</figure>
					<script>
							 var icons = new Skycons({"color": "#999"}),
								  list  = [
									"clear-night", "cloudy",
									"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
									"fog"
								  ],
								  i;

							  for(i = list.length; i--; )
								icons.set(list[i], list[i]);

							  icons.play();
						</script>
				<h6>20°</h6>
				<div class="bottom-head">
					<p>APRIL 5</p>
					<p>Wednesday</p>
				</div>
			</div>
			</div>
			<div class="weather-bottom1 ">
				<div class="weather-head">
			<h4>Sunny</h4>
			<figure class="icons">
				<canvas id="clear-day" width="58" height="58">
				</canvas>
			</figure>
					<script>
							 var icons = new Skycons({"color": "#999"}),
								  list  = [
									"clear-night", "clear-day",
									"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
									"fog"
								  ],
								  i;

							  for(i = list.length; i--; )
								icons.set(list[i], list[i]);

							  icons.play();
						</script>
			<h6>37°</h6>
			<div class="bottom-head">
					<p>APRIL 6</p>
					<p>Thursday</p>
				</div>
			</div>
			</div>
			<div class="weather-bottom1">
				<div class="weather-head">
				<h4>Rainy</h4>
				<figure class="icons">
					<canvas id="sleet" width="58" height="58">
					</canvas>
				</figure>
				<script>
							 var icons = new Skycons({"color": "#999"}),
								  list  = [
									"clear-night", "clear-day",
									"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
									"fog"
								  ],
								  i;

							  for(i = list.length; i--; )
								icons.set(list[i], list[i]);

							  icons.play();
						</script>

				<h6>7°</h6>
				<div class="bottom-head">
					<p>APRIL 7</p>
					<p>Friday</p>
				</div>
			</div>
			</div>
			<div class="weather-bottom1 ">
				<div class="weather-head">
			<h4>Snowy</h4>
			<figure class="icons">
					<canvas id="snow" width="58" height="58">
					</canvas>
				</figure>
				<script>
							 var icons = new Skycons({"color": "#999"}),
								  list  = [
									"clear-night", "clear-day",
									"partly-cloudy-night", "cloudy", "rain", "sleet", "snow", "wind",
									"fog"
								  ],
								  i;

							  for(i = list.length; i--; )
								icons.set(list[i], list[i]);

							  icons.play();
						</script>
			<h6>-10°</h6>
			<div class="bottom-head">
					<p>APRIL 8</p>
					<p>Saturday</p>
				</div>
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>

				</div>
			</div>




			<div class="clearfix"> </div>
		</div>

<div class="copy">
            <p> &copy; 2018 Batch. MiniProject | Designed by TechKnightz</p>
	    </div>
		</div>
		<div class="clearfix"> </div>
       </div>
     </div>
<!---->
<!--scrolling js-->
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!--//scrolling js-->
	<script src="js/bootstrap.min.js"> </script>
</body>
</html>
