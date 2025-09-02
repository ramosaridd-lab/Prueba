<?php
if (isset($_GET["id"])) {
    $id = $_GET["id_mascota"];

    session_start();
    require "conexionDB.php";

    $sql = "DELETE FROM mascotas WHERE id_mascota=$id";
    $conexion->query($sql);
}

header("location: mascotas.php");
exit;
?>