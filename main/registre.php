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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@700&display=swap" rel="stylesheet">
</head>

<body class="img js-fullheight" style="background-image: url(../images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Register in FakeLon</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Don't have an account in FakeLon?</h3>
                        <form class="signin-form" method="post" action="../verificar/verificarpost.php">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" name="username" required="required">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="First Name" name="firstname"
                                            required="optional">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Last Name" name="lastname"
                                            required="optional">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password"
                                    name="password" required="required">
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control"
                                    placeholder="Verify Password" name="verifypassword" required="required">
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Registrate Now</button>
                            </div>
                        </form>
                            <div class="form-group ">
                                <a href="../index.php" class="w-50 text-md-left" >Already have an account?</a>
                            </div>
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