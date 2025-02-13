<?php
@session_start();
include_once '../../lib/config.php';
include_once '../../lib/functions.php';
include_once '../../conexion/conectar.php';

if(empty($_POST["id"])){
    $errors[]="Seleccione el Registro";
}elseif(
    !empty($_POST["id"])  
){
    $id = $_POST['id'];
    $est = $_POST["est"];
    
    // Validar que el estado sea uno de los valores permitidos
    if($est == 1){
        $sms = "Pedido sin confirmar";
    } elseif ($est == 2) {
        $sms = "Pedido en proceso";
    } elseif ($est == 3) {
        $sms = "Pedido entregado";
    }
        // Actualizar el estado en la tabla "pedido"
        $sql = "UPDATE pedido SET estado = '$est' WHERE codPedi = '$id'";
        $update = $conector->query($sql);
        
        if($update){
            $messages[]= $sms;
        }else{
            $errors[]="No se actualizo el estado"; 
        }
    }else{
        $errors[]="Error Desconocido";
    }


// Manejo de errores y mensajes de éxito
if (!empty($errors)) {
    echo '<div class="alert alert-danger">';
    foreach ($errors as $error) {
        echo $error . '<br>';
    }
    echo '</div>';
}

if (!empty($messages)) {
    echo '<div class="alert alert-success">';
    foreach ($messages as $message) {
        echo $message . '<br>';
    }
    echo '</div>';
}
?>
