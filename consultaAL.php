<?php
session_start(); //Sí existe una sesión
if(!isset($_SESSION['userAL'])){
    header('location: login.php');
} else if(isset($_SESSION['userAL'])){
    include 'conexion.php';

    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql=$conn->prepare('SELECT * FROM usuarios WHERE matricula=:Matricula'); //Sentencia preparada
    $sql->execute(array('Matricula'=>$_SESSION['userAL']));   //Ejecuta sentencia
    $rows=$sql->fetchAll(); //Se obtiene resultado de la consulta

    $sentencia=$conn->prepare('SELECT * FROM inscripcion WHERE matricula=:Matricula'); //Sentencia preparada
    $sentencia->execute(array('Matricula'=>$_SESSION['userAL']));   //Ejecuta sentencia
    $asignaturas=$sentencia->fetchAll(PDO::FETCH_OBJ);
    
    foreach($rows as $row){ //Almacena cuatro resultados del usuario
        $row['matricula'];
        $row['nombre'];
        $row['apellidopaterno'];
        $row['apellidomaterno'];
    }
    $count=$sql->rowCount();//Busca coincidencias en la base de datos
} else {
    echo "Error en el sistema";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta asignaturas Alumnos</title>
    <link href="css/headerfooter.css" rel="stylesheet" type="text/css" media="screen"/>
    <link href="css/table.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" />
    <script src="https://kit.fontawesome.com/e8b7e951e4.js" crossorigin="anonymous"></script>  
</head>
<body>  
    
    <!-- Menú de BOOTSTRAP -->
  <header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark indigo">
        <a class="navbar-brand"><img src="imagenes/logo.jpg" width="50" alt="logo Preparatoria ES1921013978"></a>
        <a class="navbar-brand" href="index.html" width="50" alt="logo Preparatoria ES1921013978"><strong>Preparatoria ES1921013978</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="usuarioAL.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="preinscripcionAL.php">Preinscribir asignatura</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="consultaAL.php">Consultar inscripción</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="salir.php">Salir</a>
                </li>
            </ul>
        </div>
    </nav>
  </header>


    <?php
        if($count==1){
            echo "<h3> Alumno: $row[0], Nombre: $row[1] $row[2] $row[3] </h3>"; //Muestra la matrícula y el nombre del alumno 
        } else {
            echo "<h3>Usuario no encontrado</h3>";
        }
    ?>

    <h1>Estatus de inscripción</h1>

    <section class="intro">
    <div class="bg-image h-100" style="background-color: #f5f7fa;">
        <div class="mask d-flex align-items-center h-100">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 700px">
                    <table class="table table-striped mb-0">
                        <thead style="background-color: #002d72;">
                        <tr>
                            <th scope="col">Asignatura</th> <!-- Genera la tabla para insertar la base de datos -->
                            <th scope="col">Grupo</th>
                            <th scope="col">Profesor</th>
                            <th scope="col">Turno</th>
                            <th scope="col">Semestre</th>
                            <th scope="col">Estatus</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($asignaturas as $asignatura){ //Obtiene los datos de las asignaturas que correspondan con la matrícula del alumno
                                ?>
                                <tr>
                                    <td><?php echo $asignatura->asignatura ?></td> 
                                    <td><?php echo $asignatura->grupo ?></td>
                                    <td><?php echo $asignatura->profesor ?></td>
                                    <td><?php echo $asignatura->turno ?></td>
                                    <td><?php echo $asignatura->semestre ?></td>
                                    <td><?php echo $asignatura->estatus ?></td>
                                </tr>
                            <?php } ?>               
                        </tbody> 
                    </table>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    </section>  
    <footer class="footer">            
            <div class="grupo1">
                <div class="box">
                    <h2>Dirección</h2>
                        <p>Av. del Ferrocarril S/N, La Cañada, Querétaro, Qro, C.P. 76240</p>
                </div>
                <div class="box">
                    <h2>Contacto</h2>
                    <div class="contacto">
                        <a href="#" class="fa fa-facebook"></a>
                        <a href="#" class="fa fa-instagram"></a>
                        <a href="#" class="fa fa-twitter"></a>
                        <a href="#" class="fa fa-youtube"></a>
                    </div>
                </div>
            </div>
                    
            <div class="grupo2">
                <small>&copy; 2023 <b>Universidad ES1921013978 </b> - Todos los derechos reservados.</small>
            </div>       
        </footer>
</body>

</html>