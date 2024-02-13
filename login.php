<?php
session_start(); //Sí existe una sesión
if(isset($_SESSION['userAL'])){ //si la sesión es de tipo Alumno, redierecciona al portal de alumnos
    header('location: usuarioAL.php');
} else if (isset($_SESSION['userSE'])){ //sí es de servicios escolares redirecciona al portal de SE
    header('location: usuarioSE.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="Zack-Sirrush">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Título -->
        <title>Iniciar sesión</title>
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="imagenes/book-fill.svg">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">      
        <!-- CSS Estilos personalizados -->
        <link href="css/headerfooter.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen" /> 
        <script src="https://kit.fontawesome.com/e8b7e951e4.js" crossorigin="anonymous"></script>          
    </head>
    <body>
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
                            <a class="nav-link" href="index.html">Inicio</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="direccion.html">Instalaciones</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="registrarse.html">Registrarse</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Iniciar sesión</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <section class="form-register">
            <div class="wrapper">
                <div class="logo">
                    <img src="imagenes/logo.jpg" alt="">
                </div>
                <div class="text-center mt-4 name">
                    Acceso Alumnos/Profesores
                </div>
                <form class="p-3 mt-3" action="validarinicio.php" method="post">
                    <div class="form-field d-flex align-items-center">
                        <span class="far fa-user"></span>
                        <input type="text" title="Ingresa tu matrícula" name="usuario" id="usuario" placeholder="Usuario" required>
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <span class="fas fa-key"></span>
                        <input type="password" name="password" id="password" title="Ingresa tu contraseña" required placeholder="Contraseña">
                    </div>
                    <input class="btn mt-3" type="submit" value="Iniciar Sesión" name="iniciar"></input>
                </form>
                <div class="text-center fs-6">
                    <a href="#">¿Olvidaste tu contraseña?</a>
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

        <!-- Javascript de Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script> 

        </body>
    </html>