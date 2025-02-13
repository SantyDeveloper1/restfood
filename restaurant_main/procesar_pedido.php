<?php
@session_start();
include_once '../lib/config.php';
include_once '../lib/functions.php';
include_once '../admin/conexion/conectar.php';

// Verificar si se ha enviado el formulario de confirmación
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_order'])) {
    // Obtener el valor de $codCli desde la sesión o el formulario
    $codCli = $_SESSION['codCli']; // Cambia esto por cómo obtienes el valor
    $costoEnvio = 10.00; // Define el costo del envío
    $total = 0; // Inicializa la variable total antes del bucle
    $totalConEnvio = 0; // Inicializa la variable totalConEnvio antes del bucle
    // Verificar si el carrito contiene productos
    if ($result && $result->num_rows > 0) {
        // Calcular el valor de $total y $totalConEnvio dentro del bucle
        foreach ($result as $row) {
            $subtotal = $row['precio'] * $row['cantCar'];
            $total += $subtotal; // Agrega el subtotal al total
        }
        $totalConEnvio = $total + $costoEnvio; // Calcula el total sumando el envío
		$estPedido = 1; //el estado se registra con un valor 1, significa esta sin confirmar el pedido
		// Obtener las coordenadas de latitud y longitud desde el formulario
		$latitud = isset($_POST['latitud']) ? floatval($_POST['latitud']) : null;
		$longitud = isset($_POST['longitud']) ? floatval($_POST['longitud']) : null;
		// Verificar si se han proporcionado coordenadas válidas
		if ($latitud !== null && $longitud !== null) {
			// Realiza la inserción en la tabla "pedido" con las coordenadas
			$sql_insert_pedido = "INSERT INTO pedido (codCli, totalPrecio, envio, estado, regPedi, latitud, longitud) VALUES ('$codCli', '$totalConEnvio', '$costoEnvio', '$estPedido', NOW(), '$latitud', '$longitud')";
			$insert_pedido = $conector->query($sql_insert_pedido);
        if ($insert_pedido === TRUE) {
            $codPedi = $conector->insert_id; // Obtener el ID del pedido recién insertado
            // Agregar registros a la tabla detalle_pedido
            foreach ($result as $row) {
                $idProd = $row['codProd'];
                $precio = $row['precio'];
                $cantidad = $row['cantCar'];
                $subtotal = $precio * $cantidad;
                $sql_insert_detalle = "INSERT INTO detalle_pedido (codPedi, codProd, precioProd, cantProd, totalProd, regDetPedi) VALUES ('$codPedi', '$idProd', '$precio', '$cantidad', '$subtotal', NOW())";
                $insert_detalle = $conector->query($sql_insert_detalle);
        
                if (!$insert_detalle) {
                    $error_message = "Error al agregar detalles de pedido.";
                    break; // Salir del bucle si hay un error en la inserción
                }
            }
            // Después de insertar en detalle_pedido, eliminar los productos del carrito
            $sql_delete_carrito = "DELETE FROM carrito WHERE codCli = '$codCli'";
            $delete_carrito = $conector->query($sql_delete_carrito);
        
            if ($delete_carrito) {
				// Llamar a la función para redirigir al usuario a index.php
                redireccionar2("index.php");
                exit();
            } else {
                $error_message = "Error al eliminar productos del carrito.";
            }
        } else {
            $error_message = "Error al agregar pedido.";
        }
    } else {
        $error_message = "El carrito está vacío. No se puede confirmar un pedido sin productos.";
    }
}
} else {
    $error_message = "Coordenadas de geolocalización inválidas.";
}
?>