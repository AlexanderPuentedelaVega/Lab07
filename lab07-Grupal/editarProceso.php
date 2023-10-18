<?php
    print_r($_POST);
    if(!isset($_POST['codigo'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $codigo = $_POST['codigo'];
    $nombres = $_POST['txtNombres'];
    $direccion = $_POST['txtDireccion'];
    $nombre_producto = $_POST['txtProducto'];
    $fecha_entrega = $_POST['txtFechaEntrega'];
    $celular = $_POST['txtCelular'];

    $sentencia = $bd->prepare("UPDATE pedido SET nombres = ?, direccion = ?, nombre_producto = ?,fecha_entrega = ?,celular = ? where id = ?;");
    $resultado = $sentencia->execute([$nombres, $direccion, $nombre_producto, $fecha_entrega, $celular,$codigo]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }