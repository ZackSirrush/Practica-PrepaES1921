<?php
    
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        
        include_once 'conexion.php';
        
        $sent=$conn->prepare('SELECT * FROM inscripcion WHERE id=?;'); //Sentencia preparada
        $sent->execute([$id]);   //Ejecuta sentencia
        $asignaturas=$sent->fetch(PDO::FETCH_OBJ);
        if($asignaturas===FALSE){
            echo "¡No existe el registro!";
            header("location: consultaSE.php");
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
        <title>Editar asignatura</title>
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

                <section class="form-register">
                    <div class="wrapper">
                        <h1 id="titulo">Editar asignaturas de alumno</h1>
                        <div class="logo">
                            <img src="imagenes/alumno.jpg" alt=""> <!-- Mostrar foto del alumno guardada en BD-->
                        </div>
                        <div class="text-center mt-4 name">
                        </div>
                        <form class="p-3 mt-3" action="modificar_registroSE.php" method="post">
                            <div class="form-field d-flex align-items-center"><!-- ID -->
                                <input class="usrimpt" type="hidden" id="id" name="id" value="<?php echo $asignaturas->id;?>"/>
                            </div>
                            <div class="form-field d-flex align-items-center"> <!-- Matrícula -->
                                <input class="usrimpt" type="text" id="matricula" name="matricula" value="<?php echo $asignaturas->matricula; ?>" title="Ingresa solo números" minlength="4" maxlength="4" placeholder="Matrícula" pattern="[0-9]+" disabled/>
                            </div>
                            <div class="form-field d-flex align-items-center"> <!-- Asignatura -->
                                <input class="usrimpt" type="text" id="asignatura" name="asignatura" value="<?php echo $asignaturas->asignatura; ?>" title="Ingresa solo letras y espacios (puede llevar acentos)" minlength="2" maxlength="30" placeholder="Asignatura" required pattern="^[a-zA-ZÀ-ÿ\s]{2,30}$"/>
                            </div>
                            <div class="form-field d-flex align-items-center"> <!-- Grupo -->
                                <input class="usrimpt" type="text" id="grupo" name="grupo" value="<?php echo $asignaturas->grupo; ?>" title="Ingresa el grupo al que pertenece el alumno" minlength="2" maxlength="20" placeholder="Grupo" required/>
                            </div>
                            <div class="form-field d-flex align-items-center"> <!-- Profesor -->
                            <input class="usrimpt" type="text" id="profesor" name="profesor" value="<?php echo $asignaturas->profesor; ?>" title="Ingresa solo letras y espacios (puede llevar acentos)" minlength="2" maxlength="90" placeholder="Profesor asignado" required pattern="^[a-zA-ZÀ-ÿ\s]{2,30}$"/>
                            </div>
                            <div class="form-field d-flex align-items-center"> <!-- Turno -->
                            <select name="turno" id="turno">
                                <option <?php echo $asignaturas->turno === 'Matutino' ? "selected='selected'": "" ?> value="Matutino">Matutino</option>
                                <option <?php echo $asignaturas->turno === 'Vespertino' ? "selected='selected'": "" ?> value="Vespertino">Vespertino</option>
                            </select>
                            </div>
                            <div class="form-field d-flex align-items-center"> <!-- Semestre -->
                                <input class="usrimpt" type="text" id="semestre" name="semestre" value="<?php echo $asignaturas->semestre; ?>" title="Ingresa solo números" minlength="1" maxlength="1" placeholder="Semestre" required pattern="[0-9]+"/>
                            </div>
                            <div class="form-field d-flex align-items-center"> <!-- Estatus de inscripción -->
                            <select name="estatus" id="estatus">
                                <option <?php echo $asignaturas->estatus === 'Preinscrita' ? "selected='selected'": "" ?> value="Preinscrita">Preinscrita</option>
                                <option <?php echo $asignaturas->estatus === 'Cancelada' ? "selected='selected'": "" ?> value="Cancelada">Cancelada</option>
                                <option <?php echo $asignaturas->estatus === 'Inscrita' ? "selected='selected'": "" ?> value="Inscrita">Inscrita</option>
                            </select>
                            </div>
                            <input class="btn mt-3" type="submit" value="Editar asignatura" name="registrar"></input>
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