<?php
if (!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

include 'model/conexion.php';
$codigo = $_GET['codigo'];

$sentencia = $bd->prepare("SELECT pro.promocion, pro.duracion , pro.id_pedido, per.nombres , per.direccion ,per.nombre_producto,per.celular , per.fecha_entrega 
  FROM promociones pro 
  INNER JOIN pedido per ON per.id = pro.id_pedido 
  WHERE pro.id = ?;");
$sentencia->execute([$codigo]);
$pedido = $sentencia->fetch(PDO::FETCH_OBJ);

$url = 'https://api.green-api.com/waInstance7103867653/SendMessage/d804dfb70af949d58686a29d7cb86cb68ca24a6a63f54b39a1';
$data = [
    "chatId" => "51".$pedido->celular."@c.us",
    "message" =>  'Estimado(a) *'.strtoupper($pedido->nombres).'* su *'.strtoupper($pedido->nombre_producto).'* se le entregara el *'.strtoupper($pedido->fecha_entrega) .'*. No se pierda *'.strtoupper($pedido->promocion).'* valido solo *'.$pedido->duracion.'*'
];
$options = array(
    'http' => array(
        'method'  => 'POST',
        'content' => json_encode($data),
        'header' =>  "Content-Type: application/json\r\n" .
            "Accept: application/json\r\n"
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$response = json_decode($result);
header('Location: agregarPromocion.php?codigo='.$pedido->id_pedido);
?> 