<?php 
	if(empty($_POST['cc-list'])){
		header("Location: index.php");
	}
	error_reporting(0);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Open-Source Card Credit Checker</title>
	<link rel="stylesheet" href="style/style.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<script src="https://use.fontawesome.com/6ed0465ccd.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
  	<script>
  		$(document).ready(function() {
  			$("#cc-clear").click(function(e) {
  				
  				e.preventDefault();
  				$("#cc-list").empty();
  			});
  		});
  	</script>
</head>
<body>
	<!-- Start Content -->
	<div class="content">

		<h1>Results</h1>
		<br>
		<table style="width: 100%">
			<tr>
				<th>Result</th>
				<th>Card number</th>
				<th>Month</th>
				<th>Year</th>
				<th>CVV</th>
			</tr>



		
			<?php
			// Card Verification Process
				$list = explode("\n", $_POST['cc-list']);
				foreach ($list as $key => $cc) {
					
					$card = explode("|", $cc)[0];
					$month = explode("|", $cc)[1];
					$year = explode("|", $cc)[2];
					$cvv = explode("|", $cc)[3];
					if(!(empty($card) && empty($month) && empty($year) && empty($cvv))){
						//POST DATA OF PAYMENT




					/*
						
								GATEWAY INFORMATION
								GATEWAY INFORMATION
								GATEWAY INFORMATION

					*/

					$payment_url = 	"http://localhost/site/fake-gate.php";	
					$postdata = "cardnumber=$card&mouth=$month&year=$year&cvv=$cvv&buy=Buy";
					$success_message = "Paid successfully!";

					/*

							END OF GATEWAY INFORMATION
					*/






					// Start a curl in some payment gateway 
					$curl = curl_init($payment_url); //This is a fake Gateway, create by me..
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($curl, CURLOPT_POST, 1);
					curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
					$result = curl_exec($curl);

					//If contains the Success Message in result page, cc is live
					if(strpos($result, $success_message)){
						echo "<tr style='color: green'>";
						echo "<td>LIVE</td>";
						echo "<td>$card</td>";
						echo "<td>$month</td>";
						echo "<td>$year</td>";
						echo "<td>$cvv</td>";
						echo "</tr>";
					}else{
						echo "<tr style='color: #fe3131'>";
						echo "<td>DIE</td>";
						echo "<td>$card</td>";
						echo "<td>$month</td>";
						echo "<td>$year</td>";
						echo "<td>$cvv</td>";
						echo "</tr>";
					}

					}


					
					
					

				}





			?>

			



		</table>
		

				<!-- CREDITS -->
			<br><br>
			<center>
			<span title="Github"><a href="https://github.com/viniciusbrokeh"><p class="credits"><i class="fa fa-github-alt"></i> /viniciusbrokeh</p></a></span>

			<span title="Twitter"><a href="https://twitter.com/Br0keh"><p class="credits"><i class="fa fa-twitter"></i> /Br0keh</p></a></span>
			</center>


	</div>
	<!-- End Content -->
</body>
</html>