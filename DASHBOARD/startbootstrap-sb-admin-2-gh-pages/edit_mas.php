<?php
    session_start();
    require "conexionDB.php";

    $nombre = "";
    $raza = "";
    $color = "";
    $especie = "";
    $fn_mascota = "";
    $id_cli = "";
if ($_SERVER['REQUEST_METHOD'] =='GET'){

        $id_mascota = $_GET["id_mascota"];

        $sql = "SELECT * FROM mascotas WHERE id_mascota=$id";
        $result = $conexion->query($sql);
        $row = $result->fetch_assoc();

        $nombre = $row["nom_mascota"];
        $raza = $row["raza_mascota"];
        $color = $row["color_mascota"];
        $especie = $row["especie_mascota"];
        $fn_mascota = $row["fn_mascota"];
        $id_cli = $row["id_cliente"];
}else {
    $nombre = $_POST["nom_mascota"];
    $raza = $_POST["raza_mascota"];
    $color = $_POST["color_mascota"];
    $especie = $_POST["especie_mascota"];
    $fn_mascota = $_POST["fn_mascota"];
    $id_cli = $_POST["id_cliente"];

    do {
        if (empty($nombre) || empty($raza) || empty($color) || empty($especie) || empty($fn_mascota) || empty($id)) {
            $errorMessage = "Todos los campos requeridos";
            break;
        }

        $sql = "UPDATE mascotas ".
                "SET nom_mascota = '$nombre', raza_mascota = '$raza', color_mascota = '$color', especie_mascota = '$especie', fn_mascota = '$fn_mascota', id_cliente = '$id_cli' ".
                "WHERE id_mascota = $id";

        $result = $conexion->query($sql);

        header("location: mascotas.php");

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
            <input type="hidden" value="<?php echo $id; ?>">
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
                    <input type="text" class="form-control" name="id_cliente" value="<?php echo $id_cli; ?>">
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