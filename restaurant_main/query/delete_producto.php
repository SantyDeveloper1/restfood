<?php
@session_start();
error_reporting(0);

@session_start();
include_once '../../lib/config.php';
include_once '../../lib/functions.php';
include_once '../../admin/conexion/conectar.php';

if (isset($_POST['idCarrito'])) {
    $idCarrito = $_POST['idCarrito'];

    // Realizar la consulta SQL para eliminar el producto del carrito
    $sql_eliminar = "DELETE FROM carrito WHERE codCar = ?";
    $stmt_eliminar = $conector->prepare($sql_eliminar);
    $stmt_eliminar->bind_param("i", $idCarrito);

    if ($stmt_eliminar->execute()) {
        echo "Producto eliminado exitosamente.";
    } else {
        echo "Error al eliminar el producto.";
    }
} else {
    echo "ID de carrito no proporcionado.";
}
?>