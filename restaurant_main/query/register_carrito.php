<?php
@session_start();
include_once '../../lib/config.php';
include_once '../../lib/functions.php';
include_once '../../admin/conexion/conectar.php';

// Inicializar los mensajes en caso de éxito o error
$success_message = "Producto agregado al carrito correctamente.";
$error_message = "No se pudo agregar el producto al carrito.";
// Procesar el formulario para agregar al carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_cant']) && isset($_POST['id'])) {
    $cantidad = $_POST['product_cant'];
    $idProd = $_POST['id'];
    $codCli = $_SESSION['codCli'];
    // Verificar si el producto existe en la tabla de productos
    $sql_verificar_producto = "SELECT * FROM producto WHERE idProd = '$idProd'";
    $resultado_verificar_producto = $conector->query($sql_verificar_producto);
    if ($resultado_verificar_producto->num_rows > 0) {
        // Verificar si el producto ya está en el carrito del usuario
        $sql_verificar_carrito = "SELECT * FROM carrito WHERE codCli = '$codCli' AND codProd = '$idProd'";
        $resultado_verificar_carrito = $conector->query($sql_verificar_carrito);
        if ($resultado_verificar_carrito->num_rows > 0) {
            $errors []= "El producto ya está en el carrito.";
            $error_message = "El producto ya está en el carrito.";
        } else {
            // Insertar el producto en el carrito
            $sql_insertar = "INSERT INTO carrito (codProd, cantCar, codCli, regCar) VALUES ('$idProd', '$cantidad', '$codCli', NOW())";
            $insert = $conector->query($sql_insertar);

            if ($insert === TRUE) {
                $messages[] = "Informacion Actualizada con Exito";
            } else {
                $errors []= "No se pudo agregar el producto al carrito.";
                $error_message = "No se pudo agregar el producto al carrito.";
            }
        }
    } else {
        $errors []= "El producto no existe.";
        $error_message = "El producto no existe.";
    }
}
$response = array(); // Crear un arreglo vacío

if (isset($messages)) {
    $response["success"] = true;
    $response["message"] = $success_message;
} elseif (isset($errors)) {
    $response["success"] = false;
    $response["message"] = $error_message;
}

echo json_encode($response);
?>
