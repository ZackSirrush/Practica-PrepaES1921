<?php
//Registro
//incluye la conexión a base de datos
include_once("conexion.php");

//Recupera variables del formulario
$matricula = $_POST["matricula"];
$nombre = $_POST["nombre"];
$apaterno = $_POST["apaterno"];
$amaterno = $_POST["amaterno"];
$turno = $_POST["turno"];
$tipo = $_POST["tipo"];
$pass = $_POST["password"];
$checkpass = $_POST["checkpassword"];

    if($pass==$checkpass){ //si las contraseñas coinciden
        try{
            if(isset($_POST["registrar"])){//Al presionar el botón "enviar" compara datos vacíos
                if(!empty($matricula) || !empty($nombre) || !empty($apaterno) || !empty($amaterno) || !empty($turno) || !empty($tipo)
                || !empty($pass)){//Sí ninguno está vacío, compara que no exista la matrícula
                    
                    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                    $sql=$conn->prepare('SELECT * FROM usuarios WHERE matricula=:Matricula');
                    $sql->execute(array('Matricula'=>$matricula));
    
                    $count=$sql->rowCount();//Sí existe la matrícula en la base de datos 
                    if($count==1){
                        echo "<script> alert ('El alumno con la matrícula $matricula ya se encuentra registrado, operación cancelada'); window.history.go(-1);</script>";
                        //indica que el alumno ya ha sido registrado, y se regresa al formulario                         
                    } else { //en caso contrario                        
                        $sql="INSERT INTO usuarios (matricula, nombre, apellidopaterno, apellidomaterno, turno, tipousuario, password) VALUES (?,?,?,?,?,?,?)";
                        $conn->prepare($sql)->execute([$matricula,$nombre,$apaterno,$amaterno,$turno,$tipo,$checkpass]);
                        echo "<script> alert ('Alumno registrado con éxito'); window.location='registrarse.php'</script>"; //Regresa a la página de registro
                    }
    
                }else { //Sí hay campos vacíos indica que se deben llenar todos los datos.
                    echo "<script> alert ('Todos los datos son obligatorios'); window.history.go(-1);</script>";
                }                 
            }
        }catch(PDOException $e){
            echo "ERROR: ". $e->getMessage();
        }
    
    }else{ //Si la contraseña no coincide, se regresa al registro
        echo "<script> alert ('Las contraseñas no coinciden');window.history.go(-1);</script>)";
    }
?>