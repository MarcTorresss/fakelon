<?php
require_once("../plus/bdConexio.php");

if(isset($_GET['fav']))
{
    $db = openDB();
    $fav = filter_input(INPUT_GET,'fav');
    $sql = "UPDATE fak SET fav = 1 WHERE Id = ?";
    $megusta = $db->prepare($sql);
    $megusta->execute(array($fav));

    
    header('Location: ./home.php');
}



?>