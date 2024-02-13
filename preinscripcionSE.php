<?php
session_start(); //Sí existe una sesión//Si se inicia sesión como alumno
if(!isset($_SESSION['userSE'])){
    header('location: index.php');
} else if(isset($_SESSION['userSE'])){
    include_once 'conexion.php';

    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql=$conn->prepare('SELECT * FROM usuarios WHERE matricula=:Matricula'); //Sentencia preparada
    $sql->execute(array('Matricula'=>$_SESSION['userSE']));   //Ejecuta sentencia
    $rows=$sql->fetchAll(PDO::FETCH_ASSOC); //Se obtiene resultado de la consulta
    
    foreach($rows as $row){ //Almacena cuatro resultados del usuario
        $matricula=$row['matricula'];
        $nombre=$row['nombre'];
        $ap=$row['apellidopaterno'];
        $am=$row['apellidomaterno'];
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
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <title>Preinscribir asignaturas</title>
        <link href="css/headerfooter.css" rel="stylesheet" type="text/css" media="screen" />
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
                            <a class="nav-link" href="usuarioSE.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="preinscripcionSE.php">Preinscribir asignatura</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="consultaSE.php">Consultar inscripción</a>
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
                echo "<h3> Usuario: $matricula, Nombre: $nombre $ap $am </h3>"; //Muestra la matrícula y el nombre del alumno 
            } else {
                echo "<h3>Usuario no encontrado</h3>";
            }
        ?>

                <section class="form-register">
                    <div class="wrapper">
                        <h1 id="titulo">Preinscribir asignaturas</h1>
                        <div class="logo">
                            <img src="imagenes/alumno.jpg" alt=""> <!-- Mostrar foto del alumno guardada en BD-->
                        </div>
                        <div class="text-center mt-4 name">
                            Preregistro de asignaturas por alumno matriculado
                        </div>
                        <form class="p-3 mt-3" action="preinscribirAsignaturaSE.php" method="post"> <!-- Matrícula -->
                            <div class="form-field d-flex align-items-center">
                                <input  type="text" id="matricula" name="matricula" value="<?php echo $row['matricula']; ?>" title="Ingresa solo números" minlength="4" maxlength="4" placeholder="Matrícula" pattern="[0-9]+"/>
                            </div>
                            <div class="form-field d-flex align-items-center"> <!-- Asignatura -->
                                <select name="asignatura" id="asignatura">
                                    <option value="" disabled selected>Selecciona una asignatura</option>
                                    <option value="Inglés I">Inglés I</option>
                                    <option value="TIC I">TIC I</option>
                                    <option value="Comunicación I">Comunicación I</option>
                                    <option value="Matemáticas I">Matemáticas I</option>
                                    <option value="Física I">Física I</option>
                                    <option value="Ciencias I">Ciencias I</option>
                                    <option value="Educación Física I">Educación Física I</option>
                                    <option value="Historia I">Historia I</option>
                                    <option value="Inglés II">Inglés II</option>
                                    <option value="TIC II">TIC II</option>
                                    <option value="Comunicación II">Comunicación II</option>
                                    <option value="Matemáticas II">Matemáticas II</option>
                                    <option value="Física II">Física II</option>
                                    <option value="Ciencias II">Ciencias II</option>
                                    <option value="Educación Física II">Educación Física II</option>
                                    <option value="Historia II">Historia II</option>
                                    <option value="Inglés III">Inglés III</option>
                                    <option value="TIC III">TIC III</option>
                                    <option value="Comunicación III">Comunicación III</option>
                                    <option value="Matemáticas III">Matemáticas III</option>
                                    <option value="Física III">Física III</option>
                                    <option value="Ciencias III">Ciencias III</option>
                                    <option value="Educación Física III">Educación Física III</option>
                                    <option value="Historia III">Historia III</option>
                                </select>
                            </div>
                            <div class="form-field d-flex align-items-center"> <!-- Grupo -->
                                <input type="text" id="grupo" name="grupo" title="Ingresa el grupo al que pertenece el alumno" minlength="2" maxlength="20" placeholder="Grupo" pattern="[0-9]+"/>
                            </div>
                            <div class="form-field d-flex align-items-center"> <!-- Profesor -->
                                <input type="text" id="profesor" name="profesor" title="Ingresa solo letras y espacios (puede llevar acentos)" minlength="2" maxlength="90" placeholder="Asignar profesor" pattern="^[a-zA-ZÀ-ÿ\s]{2,30}$"/>
                            </div>
                            <div class="form-field d-flex align-items-center"> <!-- Turno -->
                                <select class="form-control" id="turno" name="turno" required>
                                    <option value="" disabled selected>Selecciona un turno</option>
                                    <option value="Matutino">Matutino</option>
                                    <option value="Vespertino">Vespertino</option>
                                </select>
                            </div>
                            <div class="form-field d-flex align-items-center"> <!-- Semestre -->
                                <select class="form-control" name="semestre" id="semestre">
                                    <option value="" disabled selected>Selecciona un semestre</option>
                                    <option value="1">Primero</option>
                                    <option value="2">Segundo</option>
                                    <option value="3">Tercero</option>
                                    <option value="4">Cuarto</option>
                                    <option value="5">Quinto</option>
                                    <option value="6">Sexto</option>
                                </select>
                            </div>
                            <div class="form-field d-flex align-items-center"> <!-- Estatus de inscripción -->
                                <select class="form-control" name="estatus" id="estatus">
                                    <option value="Preinscrita" disabled selected>Preinscrita</option>
                                    <option value="Cancelada">Cancelada</option>
                                    <option value="Inscrita">Inscrita</option>
                                </select>
                            </div>
                            <input class="btn mt-3" type="submit" value="Preinscribir asignatura" name="registrar"></input>
                        </form>
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