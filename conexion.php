<?php
$server='localhost'; //Parámetros de conexión
$usuario='root';
$contraseña='';
$db='prepaes1921013978';

try{
    $conn = new PDO( //Conexión con objetos PDO
        "mysql:host=$server;dbname=$db",
    $usuario,
    $contraseña);
    
}catch(PDOException $error){
    echo "ERROR: ".$error->getMessage();
}
?>