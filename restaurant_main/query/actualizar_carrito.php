<?php
@session_start();
include_once '../../lib/config.php';
include_once '../../lib/functions.php';
include_once '../../admin/conexion/conectar.php';


if (!empty($_SESSION['codCli'])) {
    $id_user = $_SESSION['codCli'];

    if (isset($_POST['id']) && isset($_POST['cantidad'])) {
        $idProd = $_POST['id'];
        $nuevaCantidad = $_POST['cantidad'];

        if (empty($nuevaCantidad)) {
            $errors[] = "Ingrese la cantidad que desea comprar del producto.";
        } else if (!is_numeric($nuevaCantidad)) {
            $errors[] = "Solo se aceptan números. Ingrese una cantidad válida.";
        } else {
            // Verificar si el producto existe en la base de datos
            $sql_verificar_producto = "SELECT COUNT(*) AS existencia FROM producto WHERE idProd = ?";
            $stmt_verificar_producto = $conector->prepare($sql_verificar_producto);
            $stmt_verificar_producto->bind_param("i", $idProd);
            $stmt_verificar_producto->execute();
            $resultado_verificar_producto = $stmt_verificar_producto->get_result();
            $fila_verificar_producto = $resultado_verificar_producto->fetch_assoc();
            $existencia_producto = $fila_verificar_producto['existencia'];

            if ($existencia_producto > 0) {
                // Verificar si el producto está en el carrito
                $sql_verificar_en_carrito = "SELECT COUNT(*) AS en_carrito FROM carrito WHERE codCli = ? AND codProd = ?";
                $stmt_verificar_en_carrito = $conector->prepare($sql_verificar_en_carrito);
                $stmt_verificar_en_carrito->bind_param("ii", $id_user, $idProd);
                $stmt_verificar_en_carrito->execute();
                $resultado_verificar_en_carrito = $stmt_verificar_en_carrito->get_result();
                $fila_verificar_en_carrito = $resultado_verificar_en_carrito->fetch_assoc();
                $en_carrito = $fila_verificar_en_carrito['en_carrito'];

                if ($en_carrito > 0) {
                    // Realiza la actualización en la base de datos
                    $sql_actualizar_cantidad = "UPDATE carrito SET cantCar = ? WHERE codCli = ? AND codProd = ?";
                    $stmt_actualizar_cantidad = $conector->prepare($sql_actualizar_cantidad);
                    $stmt_actualizar_cantidad->bind_param("iii", $nuevaCantidad, $id_user, $idProd);

                    if ($stmt_actualizar_cantidad->execute()) {
                        $messages[] = "Cantidad actualizada correctamente en el carrito.";
                    } else {
                        $errors[] = "Error al actualizar la cantidad en el carrito.";
                    }
                } else {
                    $errors[] = "El producto no está en el carrito.";
                }
            } else {
                $errors[] = "El producto no existe en la base de datos.";
            }
        }
    } else {
        $errors[] = "Datos insuficientes para actualizar la cantidad.";
    }
} else {
    $errors[] = "Usuario no autenticado.";
}

if(isset($errors)){
    echo '<div class="alert alert-danger" role="alert">';
    echo '<b>Error</b>! ';
          foreach($errors as $error){
                echo $error;
          } 
    echo '</div>';
}

if(isset($messages)){
    echo '<div class="alert alert-success" role="alert">';
    echo '<b>Bien</b>! ';
          foreach($messages as $sms){
                echo $sms;
          } 
    echo '</div>';
}
?>