
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
					<form action="fhome.php" method="post">
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
						<input type="submit" value="Pay Now">
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
