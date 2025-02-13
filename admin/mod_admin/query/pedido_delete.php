<?php
@session_start();
include_once '../../lib/config.php';
include_once '../../lib/functions.php';
include_once '../../conexion/conectar.php';

if (empty($_POST["id"])) {
    $errors[] = "Seleccione el Registro";
} elseif (!empty($_POST["id"])) {

    $id = $_POST['id'];

    // Eliminar registros de la tabla 'detalle_pedido'
    $sql_detalle = "DELETE FROM detalle_pedido WHERE codPedi='" . $id . "'";
    $delete_detalle = $conector->query($sql_detalle);

    // Eliminar registro de la tabla 'pedido'
    $sql_pedido = "DELETE FROM pedido WHERE codPedi='" . $id . "'";
    $delete_pedido = $conector->query($sql_pedido);

    if ($delete_detalle && $delete_pedido) {
        $messages[] = "Pedido eliminado correctamente";
    }
} else {
    $errors[] = "Error Desconocido";
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