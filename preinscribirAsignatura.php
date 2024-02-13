<?php 
if(!isset($_POST['matricula'])||!isset($_POST['asignatura'])||!isset($_POST['grupo'])||!isset($_POST['profesor'])||!isset($_POST['turno'])||!isset($_POST['semestre'])||!isset($_POST['estatus']))
echo "<script> alert ('Ha ocurrido un error con el registro'); window.location='preinscripcion.php' </script>"; //Redirecciona a la página de preinscripción  

include_once 'conexion.php';

$matricula=$_POST['matricula'];
$asignatura=$_POST['asignatura'];
$grupo=$_POST['grupo'];
$profesor=$_POST['profesor'];
$turno=$_POST['turno'];
$semestre=$_POST['semestre'];
$estatus=$_POST['estatus'];

$sentencia=$conn->prepare("INSERT INTO inscripcion(matricula,asignatura,grupo,profesor,turno,semestre,estatus) VALUES (?,?,?,?,?,?,?);");
$resultado=$sentencia->execute([$matricula,$asignatura,$grupo,$profesor,$turno,$semestre,$estatus]);

if($resultado===TRUE) echo "<script> alert ('La asignatura $asignatura se ha modificado correctamente y su estatus ahora es: $estatus'); window.location='consultaAL.php' </script>"; //Redirecciona a la página de consulta de materias registradas
else echo "Error insesperado"
?>