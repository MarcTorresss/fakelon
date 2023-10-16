<?php
require_once "bdConexio.php";

$target_dir = "../imagenes/"; //directorio en el que se subira

if (isset($_COOKIE["GON"])) {
    session_name("GON");
    session_start();
    if (isset($_SESSION["username"])) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $textfak = null;
            if($_FILES["fitxer"]["tmp_name"]!=""){
                $imageFileType = strtolower(pathinfo($_FILES["fitxer"]["name"], PATHINFO_EXTENSION));
                // Definir el texto a hashear
                $texto = $_FILES["fitxer"]["name"];
                // Generar un valor de sal aleatorio
                $sal = bin2hex(random_bytes(10));
                // Concatenar el valor de sal con el texto
                $texto_con_sal = $sal . $texto;
                // Hashear el texto con sal utilizando el algoritmo sha256
                $hash = hash('sha256', $texto_con_sal);
                $target_file = $target_dir . basename($hash.'.'.$imageFileType); //se añade el directorio y el nombre del archivo
                $uploadOk = 2; //se añade un valor determinado en 1
            // Comprueba si el archivo de imagen es una imagen real o una imagen falsa
                $check = getimagesize($_FILES["fitxer"]["tmp_name"]);
                if ($check !== false) { //si es falso es una imagen y si no lanza error
                    $uploadOk = 1;
                } else {
                    $uploadOk = 0;
                }
                if (file_exists($target_file)) {
                    echo "El archivo ya existe";
                    $uploadOk = 0; //si existe lanza un valor en 0
                }
                if ($_FILES["fitxer"]["size"] > 500000) {
                    echo "Perdon pero el archivo es muy pesado";
                    $uploadOk = 0;
                }
                // Permitir ciertos formatos de archivo
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo "Perdon solo, JPG, JPEG, PNG & GIF Estan soportados";
                    $uploadOk = 0;
                }
                //Comprueba si $ uploadOk se establece en 0 por un error
                if ($uploadOk == 1) {
                    if (move_uploaded_file($_FILES["fitxer"]["tmp_name"], $target_file)) {
                        echo "El archivo " . basename($hash) . " Se subio correctamente";
                    } else {
                        echo "Error al cargar el archivo";
                    }
                }
            }
            if (isset($_POST['textfak']) && !empty($_POST['textfak'])) {
                $textfak = filter_input(INPUT_POST, 'textfak');
                if ($textfak != null) {
                    $username = $_SESSION["username"];
                    $db = openDB();
                    $sql = 'INSERT INTO `fak`(Text,Data_Publicacio,ImatgeURL,NomUser) 
                    VALUES(:text,now(),:img,:user)';
                    $fak = $db->prepare($sql);
                    if($uploadOk==1){
                        $fak->execute(array(':text' => $textfak, ':img' => 'http://localhost/imagenes/'.$hash.'.'.$imageFileType, ':user' => $username));
                    }else {
                        $fak->execute(array(':text' => $textfak, ':img' => null, ':user' => $username));                        
                    }
                    header('Location: ../main/home.php');
                }
            }
        }
    }
}
?>