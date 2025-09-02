<?php
    session_start();
    require "conexionDB.php";

    $nombre = "";
    $raza = "";
    $color = "";
    $especie = "";
    $fn_mascota = "";
    $id = "";
if ($_SERVER['REQUEST_METHOD'] =='POST'){

    $nombre = $_POST["nom_mascota"];
    $raza = $_POST["raza_mascota"];
    $color = $_POST["color_mascota"];
    $especie = $_POST["especie_mascota"];
    $fn_mascota = $_POST["fn_mascota"];
    $id = $_POST["id_cliente"];
    do {
        if (empty($nombre) || empty($raza) || empty($color) || empty($especie) || empty($fn_mascota) || empty($id)) {
            $errorMessage = "Todos los campos requeridos";
            break;
        }

        $sql = "INSERT INTO mascotas (nom_mascota, raza_mascota, color_mascota, especie_mascota, fn_mascota, id_cliente)
        VALUES('$nombre', '$raza', '$color', '$especie', '$fn_mascota', '$id')";
        $result = $conexion->query($sql);

        if (!$result) {
            $errorMessage = "Consulta invalida: " . $conexion->error;
            break;
        }
        $nombre = "";
        $raza = "";
        $color = "";
        $especie = "";
        $fn_mascota = "";
        $id = "";

        $successMessage = "Mascota agregada correctamente";

        header("location: mascotas.php");
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
                    <input type="text" class="form-control" name="nom_mascota" value="<?php echo $nombre; ?>" >
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Raza</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="raza_mascota" value="<?php echo $raza; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Color</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="color_mascota" value="<?php echo $color; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Especie</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="especie_mascota" value="<?php echo $especie; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Fecha de nacimiento</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="fn_mascota" value="<?php echo $fn_mascota; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">ID del cliente</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="id_cliente" value="<?php echo $id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="mascotas.php" role="button">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>