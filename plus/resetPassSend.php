<?php

require_once("./bdConexio.php");
require_once("./funcions.php");
require_once("../main/mail.php");


if(isset($_POST['email']) && !empty($_POST['email']))
{
    $mailOK = false;
    $db = openDB();
    $mail = filter_input(INPUT_POST,'email');
   
    $sql = 'SELECT mail FROM `users` WHERE `mail` = ?';
    $gmail = $db->prepare($sql);
    $gmail->execute(array($mail));
 //   $results = $gmail->fetchAll();

    foreach ($gmail as $fila) {

        if ($fila['mail'] == $mail)
        {
            $mailOK = true;
            break;
        }
    }

    if ($mailOK == true)
    {
        $resetPassCode = hash('sha256', rand());

        insertResetPassCode($resetPassCode, $mail);
    
        mailResetPassword($mail, $resetPassCode);
        
        passwordTemps($mail, $resetPassCode);
        
    }else {
        header('Location: ../index.php');
    }
}
?>