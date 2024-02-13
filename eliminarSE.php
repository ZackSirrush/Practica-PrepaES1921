<?php

if(!isset($_GET["id"])) echo "<script> alert ('Ha ocurrido un error con el registro seleccionado'); window.location='consultaSE.php' </script>"; //Redirecciona a la página de consumlta  

$id=$_GET['id']; //Recibe el valor del id seleccionado

include_once 'conexion.php';

//Realiza la consulta sql DELETE
$sentencia = $conn->prepare("DELETE FROM inscripcion WHERE id=?;");
$resultado=$sentencia->execute([$id]);

if($resultado === TRUE) echo "<script> alert ('El registro se ha eliminado correctamente'); window.location='consultaSE.php' </script>"; //Redirecciona a la página de alumnos

else echo "Algo salió mal";

echo "<script> alert ('El registro con el CURP: $curp se ha eliminado correctamente'); window.location='consultar.php' </script>";
 //Muestra mensaje que indica cuál registro se ha eliminado
?>