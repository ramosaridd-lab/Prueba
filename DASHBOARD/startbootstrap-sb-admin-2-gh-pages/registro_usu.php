<?php
    session_start();
    require "conexionDB.php";

    $usuario = "";
    $password = "";
    $id = "";
    $nombre = "";
    $tipo = "";

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $usuario = $_POST["usuario"];
    $password = $_POST["contra"];
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];
    do {
        if (empty($usuario) || empty($password) || empty($id) || empty($nombre) || empty($tipo)) {
            $errorMessage = "Todos los campos requeridos";
            break;
        }

        $sql = "INSERT INTO usuario (usuario, password, id_empleado, nombre, tipo_usuario)
        VALUES('$usuario', '$password', '$id', '$nombre', '$tipo')";
        $result = $conexion->query($sql);

        if (!$result) {
            $errorMessage = "Consulta invalida: " . $conexion->error;
            break;
        }
        $usuario = "";
        $password = "";
        $id = "";
        $nombre = "";
        $tipo = "";

        $successMessage = "Cliente agregado correctamente";

        header("location: usuarios.php");
        exit;

    } while (false);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <h2>Nueva Mascota</h2>
        <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Usuario</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="usuario" value="<?php echo $usuario; ?>" >
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contraseña</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="contra" value="<?php echo $password; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">ID</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id" value="<?php echo $id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Tipo</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="tipo" value="<?php echo $tipo; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="usuarios.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>