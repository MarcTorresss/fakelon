<!doctype html>
<html lang="en">
  <head>
  	<title>FakeLon</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Content-Security-Policy" content="script-src ‘self’">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="image/x-icon" href="../imatges/porky.ico">
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
                    <h2 id="hola" class="heading-section">FakeLon</h2>
                    <br>
					<h2 id="hola" class="heading-section">Responder Fak</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
						<form method="POST" action="../plus/responderFak.php" enctype="multipart/form-data">
							<input type="hidden" name="IdOG" value=<?php echo htmlspecialchars($_GET['IdOG']); ?>>
							<div class="">
                                <input id="textfak" type="text" class="form-control" placeholder="Text del Fak" name="textfak" required="required">
                            </div>
	            			<div class="form-group">
                                <input class="form-control" id="iFile" name="fitxer" type="file"/>
	            			</div>
	            			<div class="form-group">
	            				<button type="submit" class="form-control btn btn-primary submit px-3" value="saveFak" name="saveFak">Crear Fak</button>
	            			</div>
                            <div class="form-group d-md-flex">
	        
								<div class="w-50 text-md-left">
									<a href="./home.php" class="singwith" >Volver al home</a>
								</div>
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