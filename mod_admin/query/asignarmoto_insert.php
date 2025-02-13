<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';

    if(empty($_POST["id"])){
        $errors[]="Seleccione el Registro";
    }elseif (empty($_POST["id_usuario"])) {
        $errors[] = "Selecciona un usuario.";
    } elseif(
            !empty($_POST["id"]) &&
            !empty($_POST["id_usuario"]) 
        ){
        $id = $_POST["id"];
        $pedidoId = $_POST["id_usuario"];
        $sql ="UPDATE pedido SET codUsu = '".$pedidoId."' WHERE codPedi='".$id."'";
        //$sql = "INSERT INTO pedido (codUsu) VALUES('".$id."')";
        //$sql = "UPDATE pedido SET codUsu = ? WHERE id = ?"; // Modifica el nombre de la columna aquí
        $update = $conector->query($sql);
        if($update){
            $messages[]= "Datos actualizados correctamente";
        }else{
            $errors[]="No se actualizo la contraseña"; 
        }
    
    }

    if (!empty($errors)) {
        echo '<div class="alert alert-danger" role="alert">';
        echo '<b>Error</b>! ';
        foreach ($errors as $error) {
            echo $error;
        }
        echo '</div>';
    }

    if (!empty($messages)) {
        echo '<div class="alert alert-success" role="alert">';
        echo '<b>Éxito</b>! ';
        foreach ($messages as $sms) {
            echo $sms;
        }
        echo '</div>';
    }
?>
