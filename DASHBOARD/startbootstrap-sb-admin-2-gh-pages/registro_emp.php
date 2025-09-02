<?php
    session_start();
    require "conexionDB.php";

    $nombre = "";
    $apellido = "";
    $dni = "";
    $area = "";
    $cel = "";
    $direccion = "";
    $fecha = "";
if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $nombre = $_POST["nom_empleado"];
    $apellido = $_POST["ape_empleado"];
    $dni = $_POST["dni_empleado"];
    $area = $_POST["area_empleado"];
    $cel = $_POST["cel_empleado"];
    $direccion = $_POST["direc_empleado"];
    $fecha = $_POST["fechIng_empleado"];
    do {
        if (empty($nombre) || empty($apellido) || empty($dni) || empty($area) || empty($cel) || empty($direccion) || empty($fecha)) {
            $errorMessage = "Todos los campos requeridos";
            break;
        }

        $sql = "INSERT INTO empleado (nom_empleado, ape_empleado, dni_empleado, area_empleado, cel_empleado, direc_empleado, fechIng_empleado)
        VALUES('$nombre', '$apellido', '$dni', '$area', '$cel', '$direccion', '$fecha')";
        $result = $conexion->query($sql);

        if (!$result) {
            $errorMessage = "Consulta invalida: " . $conexion->error;
            break;
        }
        $nombre = "";
        $apellido = "";
        $dni = "";
        $area = "";
        $cel = "";
        $direccion = "";
        $fecha = "";

        $successMessage = "Mascota agregada correctamente";

        header("location: empleados.php");
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
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nom_empleado" value="<?php echo $nombre; ?>" >
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Apellido</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="ape_empleado" value="<?php echo $apellido; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">DNI</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="dni_empleado" value="<?php echo $dni; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Area</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="area_empleado" value="<?php echo $area; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Celular</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="cel_empleado" value="<?php echo $cel; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Direccion</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="direc_empleado" value="<?php echo $direccion; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Fecha de Ingreso</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="fechIng_empleado" value="<?php echo $fecha; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="empleados.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>