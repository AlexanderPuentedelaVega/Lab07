<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
$sentencia = $bd->query("select * from pedido");
$pedido = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($pedido);
?>


    <div class="row justify-content-center">
        
            <div class="col-md-4">
                <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombres: </label>
                        <input type="text" class="form-control" name="txtNombres" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Direccion: </label>
                        <input type="text" class="form-control" name="txtDireccion" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre del Producto: </label>
                        <input type="text"" class=" form-control" name="txtProducto" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Entrega: </label>
                        <input type="date" class="form-control" name="txtFechaEntrega" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Celular: </label>
                        <input type="number" class="form-control" name="txtCelular" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php include 'template/footer.php' ?>