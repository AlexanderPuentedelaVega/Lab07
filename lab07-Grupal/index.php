<?php include 'template/header.php' ?>

<?php
include_once "model/conexion.php";
$sentencia = $bd->query("select * from pedido");
$pedido = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($persona);
?>
<body style="background-image: url('images/FondoPantalla1.jpg'); background-size: cover; background-position: center; background-repeat: no-repeat;">

    <div class="container mt-5 ">

    <div class="row justify-content-center">
        <div class="col-7">
            <?php include 'mensajes/mensajes.php' ?>
            <div class="card">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Lista de pedidos</h4>
                    <a href="registrarProceso.php?codigo">
                        <i class="text-dark bi bi-plus" style="font-size: 32px;"></i>

                    </a>
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombres</th>
                                <th scope="col">Direccion</th>
                                <th scope="col">Nombre del producto</th>
                                <th scope="col">F.Entrega</th>
                                <th scope="col">Celular</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($pedido as $dato) {
                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->id; ?></td>
                                    <td><?php echo $dato->nombres; ?></td>
                                    <td><?php echo $dato->direccion; ?></td>
                                    <td><?php echo $dato->nombre_producto; ?></td>
                                    <td><?php echo $dato->fecha_entrega; ?></td>
                                    <td><?php echo $dato->celular; ?></td>
                                    <td><a class="text-success" href="editar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a class="text-primary" href="agregarPromocion.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-cursor"></i></a></td>
                                    <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                                </tr>

                            <?php
                            }
                            ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>
</body>
<?php include 'template/footer.php' ?>