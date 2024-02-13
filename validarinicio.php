<?php
session_start(); //sesiones

include_once("conexion.php");

$usuario = $_POST['usuario']; //Recibe parámetros
$password = $_POST['password'];

//Login
if(isset($_POST['iniciar']))
{
    
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql=$conn->prepare('SELECT * FROM usuarios WHERE matricula=:Matricula AND password=:Pass'); //Sentencia preparada
    $sql->execute(array('Matricula'=>$usuario,'Pass'=>$password));   //Ejecuta sentencia
    $rows=$sql->fetchAll(); //Se obtiene resultado de la consulta

    foreach($rows as $row){ //Almacena cada resultado excepto la contraseña
        $row['matricula'];
        $row['nombre'];
        $row['apellidopaterno'];
        $row['apellidomaterno'];
        $row['turno'];
        $row['tipousuario'];
    }

    $count=$sql->rowCount();//Busca coincidencias en la base de datos
    if($count==1)//Sí existe la matrícula y la contraseña en la base de datos 
    { //Muestra el mensaje con el nombre, apellidos y tipo de usuario
         if($row[5]=='AL'){
            $_SESSION['userAL']=$usuario;//Si se inicia sesión como alumno
             echo "<script> alert ('¡Bienvenido, $row[1] $row[2] $row[3], has ingresado como usuario: $row[5]'); window.location='usuarioAL.php' </script>"; //Redirecciona a la página de alumnos            
         } else {
            $_SESSION['userSE']=$usuario; //Sí se inicia sesión como servicios escolares
            echo "<script> alert ('¡Bienvenido, $row[1] $row[2] $row[3], has ingresado como usuario: $row[5]'); window.location='usuarioSE.php' </script>"; //Redirecciona a la página de SE
         }
    } else
    {//Sí no, muestra el mensaje "usuario no registrado"
        echo "<script> alert ('Usuario no registrado'); window.location='login.php' </script>";
    }

}

?>