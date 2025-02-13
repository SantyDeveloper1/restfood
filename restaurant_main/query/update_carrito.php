
<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../admin/conexion/conectar.php';
    
    if (isset($_POST['idCarrito']) && isset($_POST['nuevaCantidad'])) {
        // Obtén los datos del cliente y valida la entrada
        $idCarrito = $_POST['idCarrito'];
        $nuevaCantidad = $_POST['nuevaCantidad'];
        // Realiza la actualización en la base de datos
        $updateSql = "UPDATE carrito SET cantCar = $nuevaCantidad WHERE codCar = $idCarrito";
        $updateResult = $conector->query($updateSql);
        if ($updateResult) {
            echo json_encode(['success' => true, 'message' => 'Cantidad actualizada exitosamente.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al actualizar la cantidad.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Datos insuficientes para actualizar la cantidad.']);
    }
        
?>