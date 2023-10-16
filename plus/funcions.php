<?php

require_once("bdConexio.php");
require_once("../main/mail.php");

function crearUsuario($email, $username, $password, $firstName, $lastName, $activationCode){
    $db = openDB();
    $sql = 'INSERT INTO `users`(mail,username,passHash,userFirstName,userLastName,creationDate,removeDate,lastSignIn, 
    activationDate,activationCode,resetPassExpiry,resetPassCode,active) 
    VALUES(:email,:username,:passwordx,:firstname,:lastname, NOW(), null, null,null,:activationcode,null,null, 0)';
        $usuaris = $db->prepare($sql);
        $usuaris->execute(array(':email'=>$email, ':username'=>$username, ':passwordx'=>$password, 
        ':firstname'=>$firstName, ':lastname'=>$lastName, ':activationcode'=>$activationCode));
        mailActivacio($email, $activationCode);
}

function obtenirUsuari($username){
    $db = openDB();
    $sql = 'SELECT username, mail, passHash FROM `users` WHERE (`username` = ? OR `mail` = ?) and active = 1';
    $usuaris = $db->prepare($sql);
    $usuaris->execute([$username, $username]);
    return $usuaris;
}

function activarUsuari($mail){

    $db = openDB();
    $sql = "UPDATE users SET active = 1, activationCode = null, activationDate = now() WHERE mail = ?";
    $result = $db->prepare($sql);
    $result->execute([$mail]);
}

function comptarUsuariNoActiu($activationCode, $email){
        
    $db = openDB(); 
    $sql = "SELECT count(*) FROM users WHERE mail = ?  AND activationCode = ? AND active = 0";
    $result = $db->prepare($sql);
    $result->execute([$email,$activationCode]);
    $rows = $result->fetchColumn();
    return $rows;
}

function updateLastSingIn($xUsername){
    $db = openDB();
    $sql = "UPDATE `users` SET lastSignIn = now() WHERE `username` = ?";
    $result = $db->prepare($sql);
    $result->execute([$xUsername]);
}

function insertResetPassCode($resetPassCode, $email){
    $db = openDB();
    $sql = "UPDATE `users` SET resetPassCode = ? WHERE mail = ?";
    $result = $db->prepare($sql);
    $result->execute([$resetPassCode,$email]);
}

function comptarUsuariResetPassword($resetCode, $mail){
        
    $db = openDB(); 
    $sql = "SELECT count(*) FROM users WHERE mail = ?  AND resetPassCode = ?";
    $result = $db->prepare($sql);
    $result->execute([$mail, $resetCode]);
    $rows = $result->fetchColumn();
    return $rows;
}

function resetPassword($password, $mail, $resetCode){
    $db = openDB();
    $sql = "UPDATE `users` SET passHash = '$password', resetPassExpiry = null, resetPassCode = null WHERE `mail` = ? and resetPassCode = ?";
    $result = $db->prepare($sql);
    $result->execute([$mail, $resetCode]);
    mailConfirmartCambiPass($mail, $resetCode);
}

function passwordTemps($email, $passCodeReset){
    $db = openDB(); //Abre la BBDD;
    $sql = "UPDATE `users` SET resetPassExpiry = ADDTIME(now(), 3000) WHERE mail = ? and resetPassCode = ?";
    $result = $db->prepare($sql);
    $result->execute(array($email, $passCodeReset));
}

function hashExpirat($email, $passCodeReset){
    $expirat = true;

    $db = openDB();

    $fechaActual = date("Y-m-d H:i:s");
    $fechaExpiracio = "SELECT resetPassExpiry FROM `users` WHERE mail = ? and resetPassCode = ?";
    
    $result = $db->prepare($fechaExpiracio);
    $result->execute(array($email, $passCodeReset));

    foreach ($result as $fechaexp)
    {
        $fechaActual = strtotime($fechaActual);
        $fechaexp[0] = strtotime($fechaexp[0]);

        if($fechaActual < $fechaexp[0])
        {
            $expirat = false;
        }
    }
    
    return $expirat;
}
?>