<?php
//print_r($_POST);
if (empty($_POST["oculto"]) || empty($_POST["txtNombres"]) || empty($_POST["txtDireccion"]) || empty($_POST["txtProducto"]) || empty($_POST["txtFechaEntrega"]) || empty($_POST["txtCelular"])) {
    header('Location: index.php?mensaje=falta');
    exit();
}

include_once 'model/conexion.php';
$nombres = $_POST["txtNombres"];
$direccion = $_POST["txtDireccion"];
$nombre_producto = $_POST["txtProducto"];
$fecha_entrega = $_POST["txtFechaEntrega"];
$celular = $_POST["txtCelular"];

$sentencia = $bd->prepare("INSERT INTO pedido(nombres,direccion,nombre_producto,fecha_entrega,celular) VALUES (?,?,?,?,?);");
$resultado = $sentencia->execute([$nombres, $direccion, $nombre_producto, $fecha_entrega, $celular]);

if ($resultado === TRUE) {
    header('Location: index.php?mensaje=registrado');
} else {
    header('Location: index.php?mensaje=error');
    exit();
}
