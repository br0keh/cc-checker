<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Fake Payment Gateway</title>
</head>
<body>
	<center>
	<h1>Fake Gateway</h1>
	
		<form action="" method="post">
		<p>Card number</p>
		<input type="text" required name="cardnumber">
		<p>Mouth</p>
		<input type="text" required name="mouth">
		<p>Year</p>
		<input type="text" required name="year">
		<p>CVV</p>
		<input type="text" required name="cvv">
		<br><br>
		<input type="submit" name="buy" value="Buy">
	</form>

<?php 
	if(isset($_POST['buy'])){
		$random_number = rand(0, 10);
		if($random_number > 5){
			echo "<br><b style='color: green'>Paid successfully!</b>";
		}else{
			echo "<br><b style='color: red'>Decline payment!</b>";
		}
	}
?>
	</center>
	
</body>
</html>