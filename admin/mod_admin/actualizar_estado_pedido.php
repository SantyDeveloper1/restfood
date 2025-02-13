<?php
@session_start();
include_once '../lib/config.php';
include_once '../lib/functions.php';
include_once '../conexion/conectar.php';

if (empty($_GET["id"]) || empty($_GET["estado"])) {
    $errors[] = "Faltan parámetros necesarios";
} else {
    $id_pedido = $_GET["id"];
    $estado_pedido = $_GET["estado"];

    $sql = "UPDATE pedido SET estado = '$estado_pedido' WHERE codPedi = '$id_pedido'";
    $update = $conector->query($sql);

    if ($update) {
        $messages[] = "Estado del pedido actualizado con éxito";
    } else {
        $errors[] = "No se actualizó el estado del pedido";
    }
}

if (isset($errors)) {
    echo '<div class="alert alert-danger" role="alert">';
    echo '<b>Error</b>! ';
    foreach ($errors as $error) {
        echo $error;
    }
    echo '</div>';
}

if (isset($messages)) {
    echo '<div class="alert alert-success" role="alert">';
    echo '<b>Bien</b>! ';
    foreach ($messages as $sms) {
        echo $sms;
    }
    echo '</div>';
}
?>
