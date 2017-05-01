<?php
session_start();

if(isset($_SESSION['cid'])){
   $id=$_SESSION['cid'];
}else{
    //echo 'no session found';exit;
    header('location:../login.html');
    exit();
}

$id = $_SESSION['cid'];
$b = $_SESSION['bill1'];


if(isset($_POST['pay']))
 {  
 	$amnt = $_POST['name'];
 	if ($amnt>$b) {
 		 echo '<script language="javascript">';
       echo 'alert("Can not pay more than your total amount to be payed")';
       echo '</script>';
 	}
 	else{
 		$amount = $b-$amnt;
 		remamount($id,$amount);
 	}
    
 }

function remamount($id,$amount)
	{

         $host = 'localhost';
         $user = 'root';
         $pass = '';
         $db = 'cms';
         $con = mysqli_connect($host, $user, $pass,$db);
         if (!$con) {
             die('Can not connect mysqli');
             exit;}

                  $sql1="UPDATE faculty SET `Bill`='$amount' WHERE `Fa_id` = '$id'";  
                  if (!mysqli_query($con,$sql1)) {
                                  die('Error: ' . mysqli_error($con));
         if (!mysqli_query($con,$sql)) {
          die('Error: ' . mysqli_error($con));
                       }
	}
	header('location:/canteen/faculty/fhome.php');
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
				<h6><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Cancel your payment</a></h6>
			</div>
			<div class="w3pay-right wthree-pay-grid">
				<div class="card-bounding agileits">
					<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<div class="card-details">
							<aside>Total Amount to be Paid:</aside>
							<input type="text" name="name" placeholder="Rupees" required=""/>
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
