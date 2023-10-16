



<!doctype html>
<html lang="en">+
  <head>
  	<title>FakeLon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Security-Policy" content="script-src ‘self’">
	<link rel="icon" type="image/x-icon" href="../images/porky.ico">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@700&display=swap" rel="stylesheet">
	</head>
	<body class="img js-fullheight" style="background-image: url(../images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div>
					<h2 class="heading-section" align="center">Benvingut a FakeLon</h2>
					<?php
					if(isset($_COOKIE["GON"])){
						session_name("GON");
						session_start();
						if(isset($_SESSION["username"])){
							echo "<h2 class=\"heading-section\" align=\"center\"> " . $_SESSION['username'] . "</h2>";
							echo "<br>";
							echo "<a href=\"./logout.php\"><button type=\"button\" class=\"form-control btn btn-primary submit\">LogOut</button></a>";
						}else{
							header("Location: ../index.php");
							exit();
						}
					}
					else{
						header("Location: ../index.php");
						exit();
					}
					?>
			</div>
		</div>
	</section>

<script src="../js/jquery.min.js"></script>
<script src="../js/popper.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>

	</body>
</html>

