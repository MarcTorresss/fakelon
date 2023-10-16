<?php
    use PHPMailer\PHPMailer\PHPMailer;
    require '../vendor/autoload.php';
    require_once('../plus/bdConexio.php');

function mailActivacio($email, $activationCode)
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        //Configuració del servidor de Correu
        //Modificar a 0 per eliminar ms gerror
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'atotaweb-cat.correoseguro.dinaserver.com';
        $mail->Port = 465;

        //Credencials del compte GMAIL
        $mail->Username = 'dam2php@atotaweb.cat';
        $mail->Password = 'Educem00.';

        //Dades del correu electrònic
        $mail->SetFrom('dam2php@atotaweb.cat', 'Marc Torres - Fakelon');
        $mail->Subject = 'Activacio de compte';
        $mail->isHTML(true);
        $message = '
        <html>
            <body>
                <head>
                    <title>Activar la teva compte</title>
                </head>
                <h2>Gracies per registrarte a Fake</h2>
                <p>La teva compte ha estat creada correctament, necessites activarla amb el seguent link</p>
                <br>
                <a href="http://localhost/verificar/verificarmail.php?code='.$activationCode.'&mail='.$email.'">Activa tu cuenta  ahora!</a>
                <hr>
                <img src="https://i.pinimg.com/736x/59/c4/98/59c4989e8d2cccc7722c35fe80e1d862--warner-brothers-warner-bros.jpg" width="75" height="75">
            </body>
        </html>';
        $mail->MsgHTML($message);
        //Destinatari
        $address = $email;
        $mail->AddAddress($address, 'Codi Activacio');
        //Enviament
        $result = $mail->Send();
        if (!$result) {
            echo 'Error:' . $mail->ErrorInfo;
        } else {
            echo "Correu enviat";
            echo '<script type="text/javascript">window.location.assign("../index.php?error=true");</script>';

        }
    }

    function mailResetPassword($email, $resetPassCode)
{

    $mail = new PHPMailer();
    $mail->IsSMTP();

    //Configuració del servidor de Correu
    //Modificar a 0 per eliminar msg error
    $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'atotaweb-cat.correoseguro.dinaserver.com';
        $mail->Port = 465;

        //Credencials del compte GMAIL
        $mail->Username = 'dam2php@atotaweb.cat';
        $mail->Password = 'Educem00.';

        //Dades del correu electrònic
        $mail->SetFrom('dam2php@atotaweb.cat', 'Marc Torres - Fakelon');
        $mail->Subject = 'Cambiar el Password';
        $mail->isHTML(true);
    $message = '
    <html>
        <body>
            <head>
                <title>Reset Password</title>
            </head>
            <strong>Clika al seguent enllaç per resetejar el password de la teva compte de FakeLon:</strong>
            <br>
            <a href="http://localhost/main/formPass.php?code='.$resetPassCode.'&mail='.$email.'">Cambiar la meva contrasenya</a>
            <hr>
            <img src="https://i.pinimg.com/736x/59/c4/98/59c4989e8d2cccc7722c35fe80e1d862--warner-brothers-warner-bros.jpg" width="75" height="75">
        </body>
    </html>';
    $mail->MsgHTML($message);
    //Destinatari
    $address = $email;
    $mail->AddAddress($address, 'Reset Pass User');

    //Enviament
    $result = $mail->Send();
    if(!$result){
        echo 'Error: ' . $mail->ErrorInfo;
    }//else echo "Correu enviat";
    echo '<script type="text/javascript">window.location.assign("../main/home.php");</script>';

    
}

function mailConfirmartCambiPass($email, $resetPassCode)
{

    $mail = new PHPMailer();
    $mail->IsSMTP();

    //Configuració del servidor de Correu
    //Modificar a 0 per eliminar msg error
    $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'atotaweb-cat.correoseguro.dinaserver.com';
        $mail->Port = 465;

        //Credencials del compte GMAIL
        $mail->Username = 'dam2php@atotaweb.cat';
        $mail->Password = 'Educem00.';

        //Dades del correu electrònic
        $mail->SetFrom('dam2php@atotaweb.cat', 'Marc Torres - Fakelon');
        $mail->Subject = 'Confirmacio Reset Password';
        $mail->isHTML(true);
    $message = "
    <html>
        <body>
            <head>
                <title>Confirmacio Reset Password</title>
            </head>
            <strong>Et verifiquem que la teva contrasenya de FakeLon s'ha cambiat correctament</strong>
            <br>
            <a href='http://localhost/index.php'>Anar a FakeLon</a>
            <hr>
            <img src='https://i.pinimg.com/736x/59/c4/98/59c4989e8d2cccc7722c35fe80e1d862--warner-brothers-warner-bros.jpg' width='75' height='75'>
        </body>
    </html>";
    $mail->MsgHTML($message);
    //Destinatari
    $address = $email;
    $mail->AddAddress($address, 'Confirm Reset Pass User');

    //Enviament
    $result = $mail->Send();
    if(!$result){
        echo 'Error: ' . $mail->ErrorInfo;
    }//else echo "Correu enviat";
    echo '<script type="text/javascript">window.location.assign("../main/home.php");</script>';

    
}
?>