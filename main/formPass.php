<!doctype html>
<html lang="en">
  <head>
  	<title>FakeLon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Security-Policy" content="script-src ‘self’">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/x-icon" href="../images/porky.ico">
	<link rel="stylesheet" href="../css/style.css">
	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@700&display=swap" rel="stylesheet">
	</head>
<body class="img js-fullheight" style="background-image: url(../images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 id="hola" class="heading-section">Cambia la constrasenya en FakeLon</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<form method="POST" action="../verificar/verificarResetPass.php">
						<?php
							if(isset($_GET["error"]) && $_GET["error"]==1)
							{
								echo "<div id='failM'> Tiempo Expirado </div>";
							}?>  
							<div class="form-group">
	              				<input id="password-field" type="password" class="form-control" placeholder="Password" id="pass" name="password1" required>
	              				<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            			</div>
	            			<div class="form-group">
	              				<input id="password-field" type="password" class="form-control" placeholder="Password" id="pass" name="password2" required>
	              				<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            			</div>
	            			<div class="form-group">
	            				<button type="submit" class="form-control btn btn-primary submit px-3" value="Login" name="login">Cambiar contrasenya</button>
								<input type="hidden" name="code" value='<?php echo $_GET['code']; ?>'>
                				<input type="hidden" name="mail" value='<?php echo $_GET['mail']; ?>'>
	            			</div>
						</form>
		      		</div>
				</div>
			</div>
		</div>
	</section>
		<script src="../js/jquery.min.js"></script>
		<script src="../js/popper.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/main.js"></script>
</body>
</html>
