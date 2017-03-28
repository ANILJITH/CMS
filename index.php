<?php
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
        <title>CMS</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
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
                            <li class="active"><a href="#home">Home</a></li>
                            <!-- <li><a href="#service">Services</a></li>
                            <li><a href="#portfolio">Portfolio</a></li> -->
                            <li><a href="#today">Today</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="signup.php">Sign Up</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <!-- Start home section -->
        <div id="home">
            <!-- Start cSlider -->
            <div id="da-slider" class="da-slider">
                <div class="triangle"></div>
                <!-- mask elemet use for masking background image -->
                <div class="mask"></div>
                <!-- All slides centred in container element -->
                <div class="container">
                    <!-- Start first slide -->
                    <div class="da-slide">
                        <h2 class="fittext2">PUTTU <h2>
                        <h4>with KADALA CURRY & PAZHAM & EGG CURRY</h4>
                        <!-- <p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.</p> -->
                        <!-- <a href="#" class="da-link button">Read more</a> -->
                        <div class="da-img">
                            <img src="images/slider01.jpg" alt="image01" width="320">
                        </div>
                    </div>
                    <!-- End first slide -->
                    <!-- Start second slide -->
                    <div class="da-slide">
                        <h2>IDIYAPPOM</h2>
                        <h4>with KADALA CURRY & EGG CURRY & VEG CURRY</h4>
                       <!--  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p> -->
                        <!-- <a href="#" class="da-link button">Read more</a> -->
                        <div class="da-img">
                            <img src="images/slider02.jpg" width="320" alt="image02">
                        </div>
                    </div>
                    <!-- End second slide -->
                    <!-- Start third slide -->
                    <div class="da-slide">
                        <h2>PURI</h2>
                        <h4>with KADALA CURRY  & EGG CURRY & VEG CURRY</h4>
                        <!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p> -->
                        <!-- <a href="#" class="da-link button">Read more</a> -->
                        <div class="da-img">
                            <img src="images/slider03.jpg" width="320" alt="image03">
                        </div>
                    </div>
                    <!-- Start third slide -->
                    <!-- Start cSlide navigation arrows -->
                    <div class="da-arrows">
                        <span class="da-arrows-prev"></span>
                        <span class="da-arrows-next"></span>
                    </div>
                    <!-- End cSlide navigation arrows -->
                </div>
            </div>
        </div>
        <!-- End home section -->
        <!-- Service section start -->
        <div class="section primary-section" id="service">
            <div class="container">
                <div class="title">
                    <h1>PRE BOOK ITEM</h1>
                </div>
                <div class="row-fluid">
                    <div class="span4">

                    </div>
                    <div class="span4">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                            	<a href="login.html">
  									<img class="img-circle" src="images/Service3.png" alt="service 2" />
  								</a>
  							</div>
                            <h3>Online Order Item</h3>
                        </div>
                    </div>
                    <div class="span4">

                    </div>
                </div>
            </div>
          <!-- Service section start -->
        </div>
            <div class="section secondary-section " id="today">
                <div class="triangle"></div>
                <div class="container">
                    <div class=" title">
                        <h1>Our Today's Special</h1>
                    </div>

                      <ul id="portfolio-grid" class="thumbnails row">
                          <li class="span4 mix web">
                              <div class="thumbnail">
                                  <img src="images/<?php echo $array[0] ?>.jpg">
                                  <a href="#single-project" class="more show_hide" rel="#slidingDiv">
                                      <!-- <i class="icon-plus"></i> -->
                                  </a>
                                  <h3><?php echo $array[0]; ?> </h3>
                                  <p>Kerala Special...</p>
                                  <!-- <div class="mask"></div> -->
                              </div>
                          </li>
                          <li class="span4 mix photo">
                              <div class="thumbnail">
                                  <img src="images/<?php echo $array[1] ?>.jpg">
                                  <a href="#single-project" class="show_hide more" rel="#slidingDiv1">
                                      <!-- <i class="icon-plus"></i> -->
                                  </a>
                                  <h3><?php echo $array[1]; ?></h3>
                                  <p>Kerala Special...</p>
                                  <!-- <div class="mask"></div> -->
                              </div>
                          </li>
                          <li class="span4 mix identity">
                              <div class="thumbnail">
                                  <img src="images/<?php echo $array[2] ?>.jpg">
                                  <a href="#single-project" class="more show_hide" rel="#slidingDiv2">
                                      <!-- <i class="icon-plus"></i> -->
                                  </a>
                                <h3><?php echo $array[2]; ?></h3>
                                  <p>Kerala Special...</p>
                                  <!-- <div class="mask"></div> -->
                              </div>
                          </li>
                          <li class="span4 mix web">
                              <div class="thumbnail">
                                  <img src="images/<?php echo $array[3] ?>.jpg">
                                  <a href="#single-project" class="show_hide more" rel="#slidingDiv3">
                                      <!-- <i class="icon-plus"></i> -->
                                  </a>
                                    <h3><?php echo $array[3]; ?></h3>
                                  <p>Kerala Special...</p>
                                  <!-- <div class="mask"></div> -->
                              </div>
                          </li>
                          <li class="span4 mix photo " style="margin-top: -345px;">
                              <div class="thumbnail">
                                    <img src="images/<?php echo $array[4] ?>.jpg">
                                  <a href="#single-project" class="show_hide more" rel="#slidingDiv4">
                                      <!-- <i class="icon-plus"></i> -->
                                  </a>
                                  <h3><?php echo $array[4]; ?></h3>
                                <p>Kerala Special...</p>
                                  <!-- <div class="mask"></div> -->
                              </div>
                          </li>
                          <li class="span4 mix identity" style="margin-top: -345px;">
                              <div class="thumbnail">
                                  <img src="images/<?php echo $array[5] ?>.jpg">
                                  <a href="#single-project" class="show_hide more" rel="#slidingDiv5">
                                      <!-- <i class="icon-plus"></i> -->
                                  </a>
                                  <h3><?php echo $array[5]; ?></h3>
                                <p>Kerala Special...</p>
                                  <!-- <div class="mask"></div> -->
                              </div>
                          </li>
                            </ul>    <!--
                          <li class="span4 mix web">
                              <div class="thumbnail">
                                  <img src="images/Portfolio07.png" alt="project 7" />
                                  <a href="#single-project" class="show_hide more" rel="#slidingDiv6">
                                      <i class="icon-plus"></i>
                                  </a>
                                  <h3>Thumbnail label</h3>
                                  <p>Thumbnail caption...</p>
                                  <div class="mask"></div>
                              </div>
                          </li>
                          <li class="span4 mix photo">
                              <div class="thumbnail">
                                  <img src="images/Portfolio08.png" alt="project 8">
                                  <a href="#single-project" class="show_hide more" rel="#slidingDiv7">
                                      <i class="icon-plus"></i>
                                  </a>
                                  <h3>Thumbnail label</h3>
                                  <p>Thumbnail caption...</p>
                                  <div class="mask"></div>
                              </div>
                          </li>
                          <li class="span4 mix identity">
                              <div class="thumbnail">
                                  <img src="images/Portfolio09.png" alt="project 9">
                                  <a href="#single-project" class="show_hide more" rel="#slidingDiv8">
                                      <i class="icon-plus"></i>
                                  </a>
                                  <h3>Thumbnail label</h3>
                                  <p>Thumbnail caption...</p>
                                  <div class="mask"></div>
                              </div>
                          </li> -->

                  </div>
              </div>
          </div>
          <!-- Portfolio section end -->
          <!-- About us section start -->

          <!-- About us section end -->

          <!-- Client section start -->
          <!-- Client section start -->
         <!--  <div id="clients">
              <div class="section primary-section">
                  <div class="triangle"></div>
                  <div class="container">
                      <div class="title">
                          <h1>What Client Say?</h1>
                          <p>I get way too much happiness from good food.</p>
                      </div>
                      <div class="row">
                          <div class="span4">
                              <div class="testimonial">
                                  <p>"I've worked too hard and too long to let anything stand in the way of my goals. I will not let my teammates down and I will not let myself down."</p>
                                  <div class="whopic">
                                      <div class="arrow"></div>
                                      <img src="images/Client1.png" class="centered" alt="client 1">
                                      <strong>John Doe
                                          <small>Client</small>
                                      </strong>
                                  </div>
                              </div>
                          </div>
                          <div class="span4">
                              <div class="testimonial">
                                  <p>"In motivating people, you've got to engage their minds and their hearts. I motivate people, I hope, by example - and perhaps by excitement, by having productive ideas to make others feel involved."</p>
                                  <div class="whopic">
                                      <div class="arrow"></div>
                                      <img src="images/Client2.png" class="centered" alt="client 2">
                                      <strong>John Doe
                                          <small>Client</small>
                                      </strong>
                                  </div>
                              </div>
                          </div>
                          <div class="span4">
                              <div class="testimonial">
                                  <p>"Determine never to be idle. No person will have occasion to complain of the want of time who never loses any. It is wonderful how much may be done if we are always doing."</p>
                                  <div class="whopic">
                                      <div class="arrow"></div>
                                      <img src="images/Client3.png" class="centered" alt="client 3">
                                      <strong>John Doe
                                          <small>Client</small>
                                      </strong>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <p class="testimonial-text">
                          "Perfection is Achieved Not When There Is Nothing More to Add, But When There Is Nothing Left to Take Away"
                      </p>
                  </div>
              </div>
          </div> -->
          <!-- Price section end -->
          <!-- Contact section start -->
          <div id="contact" class="contact">
              <div class="section secondary-section">
                  <div class="container">
                      <div class="title">
                          <h1>Contact Us</h1>
                      </div>
                  </div>
                  <div class="map-wrapper">
                      <div class="container">
                          <!-- <div class="row-fluid">
                              <div class="span5 contact-form centered">
                                  <h3>Say Hello</h3>
                                  <div id="successSend" class="alert alert-success invisible">
                                      <strong>Well done!</strong>Your message has been sent.</div>
                                  <div id="errorSend" class="alert alert-error invisible">There was an error.</div>
                                  <form id="contact-form" action="php/mail.php">
                                      <div class="control-group">
                                          <div class="controls">
                                              <input class="span12" type="text" id="name" name="name" placeholder="* Your name..." />
                                              <div class="error left-align" id="err-name">Please enter name.</div>
                                          </div>
                                      </div>
                                      <div class="control-group">
                                          <div class="controls">
                                              <input class="span12" type="email" name="email" id="email" placeholder="* Your email..." />
                                              <div class="error left-align" id="err-email">Please enter valid email adress.</div>
                                          </div>
                                      </div>
                                      <div class="control-group">
                                          <div class="controls">
                                              <textarea class="span12" name="comment" id="comment" placeholder="* Comments..."></textarea>
                                              <div class="error left-align" id="err-comment">Please enter your comment.</div>
                                          </div>
                                      </div>
                                      <div class="control-group">
                                          <div class="controls">
                                              <button id="send-mail" class="message-btn">Send message</button>
                                          </div>
                                      </div>
                                  </form>
                              </div> -->
                          </div>
                      </div>
                  </div>
                  <div class="container">
                      <div class="span9 center contact-info">
                          <p class="info-mail">College of engineering</p>
                          <p class="info-mail">canteen@ceconline.edu</p>
                          <p class="info-mail">+9199999586524</p>
                          <div class="title">
                              <h3>We Are Social</h3>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- Contact section edn -->
          <!-- Footer section start -->
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
