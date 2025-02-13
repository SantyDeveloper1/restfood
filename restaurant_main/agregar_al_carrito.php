<?php
@session_start();
include_once '../lib/config.php';
include_once '../lib/functions.php';
include_once '../admin/conexion/conectar.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $idProd = $_POST['id'];
    $codCli = $_SESSION['codCli'];
    // Verificar si el producto ya está en el carrito del usuario
    $sql_verificar_carrito = "SELECT * FROM carrito WHERE codCli = '$codCli' AND codProd = '$idProd'";
    $resultado_verificar_carrito = $conector->query($sql_verificar_carrito);
    if ($resultado_verificar_carrito->num_rows > 0) {
        echo json_encode(array("status" => "error", "message" => "El producto ya está en el carrito."));
    } else {
        // Insertar el producto en el carrito junto con la fecha y hora actual
        $sql_insertar = "INSERT INTO carrito (codProd, cantCar, codCli, regCar) VALUES ('$idProd', 1, '$codCli', NOW())";
        $insert = $conector->query($sql_insertar);

        if ($insert === TRUE) {
            echo json_encode(array("status" => "success", "message" => "Producto agregado al carrito correctamente."));
        } else {
            echo json_encode(array("status" => "error", "message" => "No se pudo agregar el producto al carrito."));
        }
    }
} else {
    echo json_encode(array("status" => "error", "message" => "Solicitud no válida."));
}
?>
