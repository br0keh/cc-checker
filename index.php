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

		<h1>CC Checker</h1>
		<form action="check.php" method="post">
			<div class="textarea">
				<textarea name="cc-list" id="cc-list">Paste CC list here in this format: NUMBER|MONTH|YEAR|CVV</textarea>
			</div>
			<div class="button">
				<button id="cc-clear">Clear list</button>
				<input type="submit" id="cc-check" value="Start check">

			</div>

			<span title="Github"><a href="https://github.com/viniciusbrokeh"><p class="credits"><i class="fa fa-github-alt"></i> /viniciusbrokeh</p></a></span>

			<span title="Twitter"><a href="https://twitter.com/Br0keh"><p class="credits"><i class="fa fa-twitter"></i> /Br0keh</p></a></span>
		</form>


		


	</div>
	<!-- End Content -->
</body>
</html>