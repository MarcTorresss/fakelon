<?php
require_once("../plus/bdConexio.php");

if(isset($_GET['like']))
{
    $db = openDB();
    $like = filter_input(INPUT_GET,'like');
    $sql = "UPDATE fak SET likes = (likes+1) WHERE Id = ?";
    $megusta = $db->prepare($sql);
    $megusta->execute(array($like));

    
    header('Location: ./home.php');
}



?>