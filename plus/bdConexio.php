<?php 
    function openDB(){
        $cadena_connexio = 'mysql:dbname=fakelon;host=localhost:5306';
        $usuari = 'root';
        $passwd = '';
        $db = false;
        try{
            $db = new PDO($cadena_connexio, $usuari, $passwd);
        }catch(PDOException $e){
            echo 'Error amb la BDs: ' . $e->getMessage();
        }
        return $db;
    }

?>