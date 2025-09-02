<?php
    session_start();
    require "conexionDB.php";

    $dni = "";
    $nombre = "";
    $apellido = "";
    $direccion = "";
    $celular = "";

if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $dni = $_POST["dni_cliente"];
    $nombre = $_POST["nom_cliente"];
    $apellido = $_POST["ape_cliente"];
    $direccion = $_POST["direc_cliente"];
    $celular = $_POST["cel_cliente"];
    do {
        if (empty($dni) || empty($nombre) || empty($apellido) || empty($direccion) || empty($celular)) {
            $errorMessage = "Todos los campos requeridos";
            break;
        }

        $sql = "INSERT INTO clientes (dni_cliente, nom_cliente, ape_cliente, direc_cliente, cel_cliente)
        VALUES('$dni', '$nombre', '$apellido', '$direccion', '$celular')";
        $result = $conexion->query($sql);

        if (!$result) {
            $errorMessage = "Consulta invalida: " . $conexion->error;
            break;
        }
        $dni = "";
        $nombre = "";
        $apellido = "";
        $direccion = "";
        $celular = "";

        $successMessage = "Cliente agregado correctamente";

        header("location: clientes.php");
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
                <label class="col-sm-3 col-form-label">DNI</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="dni_cliente" value="<?php echo $dni; ?>" >
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nom_cliente" value="<?php echo $nombre; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Apellido</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ape_cliente" value="<?php echo $apellido; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Direccion</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="direc_cliente" value="<?php echo $direccion; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Celular</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="cel_cliente" value="<?php echo $celular; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="clientes.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>