<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="../CSS/Ingresar.css">
    <link rel="stylesheet" href="../css/sb-admin-2.css">
</head>
<body>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2>Iniciar sesión</h2>
        <span class="line"></span>
        <div class="info_inicio_sesion">
            <label for="correo">Usuario</label>
            <input type="text" id="inputUsuario" name="usuario" placeholder="Usuario">

            <label for="contraseña">Contraseña</label>
            <input type="password" id="inputPassword" name="password" placeholder="Contraseña">
                <div class="registrarte_is">
                    <span class="mensajeDB">
                        <?php
                            require 'conexionDB.php';
                            session_start();
                        
                            if($_POST){
                                $usuario = $_POST['usuario'];
                                $password = $_POST['password'];
                        
                                $sql= "SELECT id, password, nombre, tipo_usuario FROM usuario WHERE usuario='$usuario'";
                                $resultado = $conexion-> query($sql);
                                $num = $resultado->num_rows;
                        
                                if($num>0){
                        
                                    $row = $resultado->fetch_assoc();
                                    $password_bd = $row['password'];
                        
                                    $pass_c = $password;
                        
                                    if($password_bd == $pass_c){
                        
                                        $_SESSION['id']=$row ['id'];
                                        $_SESSION['nombre']=$row ['nombre'];
                                        $_SESSION['tipo_usuario']=$row ['tipo_usuario'];
                        
                                        header("Location: ../DASHBOARD/startbootstrap-sb-admin-2-gh-pages/principal.php");
                        
                                    }else{
                                        echo "La contraseña no coincide";
                                    }
                        
                                }else{
                                    echo "NO existe usuario";
                                }
                            }
                        ?>
                    </span>
                </div>
            <a><input type="submit" class="boton_iniciar_sesion" value="INGRESAR"></a>
        </div>
    </form>
</body>
</html>