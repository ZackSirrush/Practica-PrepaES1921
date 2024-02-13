<?php

if( //retoma los valores incorporados en el formulario "editar" y valida que existan

    !isset($_POST["id"]) ||
    !isset($_POST["asignatura"]) ||
    !isset($_POST["grupo"]) ||
    !isset($_POST["profesor"]) ||
    !isset($_POST["turno"]) ||
    !isset($_POST["semestre"]) ||
    !isset($_POST["estatus"])
    ) echo "<script> alert ('Ha ocurrido un error con el registro seleccionado'); window.location='consultaSE.php' </script>"; //Redirecciona a la página de consulta de alumnos  

include_once 'conexion.php'; //incluye conexión a BD

$id=$_POST['id'];  
$asign=$_POST['asignatura'];  
$grupo=$_POST['grupo'];
$profesor=$_POST['profesor'];
$turno=$_POST['turno'];                        
$semestre=$_POST['semestre'];
$estatus=$_POST['estatus'];
    
$consulta=$conn->prepare("UPDATE inscripcion SET asignatura=?, grupo=?, profesor=?, turno=?, semestre=?, estatus=? WHERE id=?;"); //sentencia preparada de la consulta
$resultado=$consulta->execute(array($asign, $grupo, $profesor, $turno, $semestre, $estatus, $id));

if($resultado === TRUE) echo "<script> alert ('La asignatura $asign se ha modificado correctamente y su estatus ahora es: $estatus'); window.location='consultaSE.php' </script>"; //Redirecciona a la página de alumnos  //Regresa a la página para buscar el registro modificado.

else echo "Algo salió mal";

?>