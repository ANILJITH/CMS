<?php
session_start();

if(isset($_SESSION['cid'])){
   $id=$_SESSION['cid'];
}else{
    //echo 'no session found';exit;
    header('location:../login.html');
    exit();
}

$amount = $_SESSION['sum'];
$id = $_SESSION['cid'];


if(isset($_POST['pay']))
 {
 		addcredit($id,$amount);
 		header('location:/canteen/faculty/fhome.php');

    
 }
 
function addcredit($id,$amount)
    {					  $host = 'localhost';
         $user = 'root';
         $pass = '';
         $db = 'cms';
         $con = mysqli_connect($host, $user, $pass,$db);
         if (!$con) {
             die('Can not connect mysqli');
             exit;}

                    	$pt = $amount/10;
                        $sql2 = "SELECT * from faculty WHERE `Fa_id`='$id'"; 
                         $result2 = $con->query($sql2);

                            if ($result2->num_rows > 0) 
                                {  

                                   while($row2 = $result2->fetch_assoc()) 
                                        {   $point=$row2['Points'];
                                        }
                                }
                                echo "$point";
                                $b=number_format(round((float)$pt,2),2);
                                echo "$b";
                                $a=number_format(round((float)$point,2),2);
                                echo "$a";
                                $credit=$a+$b;


                         $sql="UPDATE faculty SET Points='$credit' WHERE `Fa_id` = '$id'";
                         if (!mysqli_query($con,$sql)) {
                                                    die('Error: ' . mysqli_error($con));
                                                        }
                                                else{
                                                 header('location:billing.php');
                                             }
                      
            mysqli_close($con);
        }

?>

<!DOCTYPE html>
<html>
<head>
<title>UI Card Payment Flat Responsive Widget Template :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/stylep.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesomep.css" rel="stylesheet"> <!-- font-awesome icons -->
</head>
<body>
	<!-- main -->
	<div class="mainw3-agile">
		<h1> Card Payment</h1>
		<div class="main-agileinfo">
			<div class="w3pay-left">
				<div class="w3pay-left-text">
					<img src="images/i1.png" alt=""/>
					<h1><b>CMS</b></h1>
					<p>Pay off your pending dues .</p>
					<!-- <h3>$ 20</h3> -->
				</div>
				<h6><a href="/canteen/faculty/prebook.php"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Cancel your payment</a></h6>
			</div>
			<div class="w3pay-right wthree-pay-grid">
				<div class="card-bounding agileits">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<div class="card-details">
							<aside>Total Amount to be Paid:</aside>
							<aside><?php echo "$amount"; ?></aside>
						</div>
						<aside>Card Number:</aside>
						<div class="card-container">
							<!--- ".card-type" is a sprite used as a background image with associated classes for the major card types, providing x-y coordinates for the sprite --->
							<div class="card-type"></div>
							<input type="text" name="card number" placeholder="0000 0000 0000 0000" onkeyup="$cc.validate(event)" required=""/>
							<!-- The checkmark ".card-valid" used is a custom font from icomoon.io --->
							<div class="card-valid"><i class="fa fa-check" aria-hidden="true"></i></div>
						</div>
						<div class="card-details agileits-w3layouts">
							<div class="expiration">
								<aside>Expiration Date</aside>
								<input type="text" name="date" onkeyup="$cc.expiry.call(this,event)" maxlength="7" placeholder="mm/yyyy" required=""/>
							</div>
							<div class="cvv">
								<aside>CVV</aside>
								<input type="text" name="cvv" placeholder="XXX" maxlength="3" required=""/>
							</div>
							<div class="clear">	</div>
						</div>
						<input type="submit" name="pay" value="Pay Now">
					</form>
				</div>
			</div>
			<div class="clear">	</div>
		</div>
	</div>
	<!-- //main -->
	<!-- copyright -->
	<div class="w3lscopy-agile">
		<p>&copy; 2018 Batch. MiniProject | Designed by TechKnightz</p>
	</div>
	<!-- //copyright -->
	<!-- Validator js -->
	<script src="js/creditCardValidator.js" type="text/javascript"></script>
	<!-- //Validator -->
</body>
</html>
