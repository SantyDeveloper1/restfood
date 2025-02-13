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
        if($est == 0){
            $sms = "Usuario Bloqueado con Exito";
        }else{
            $sms = "Usuario Activado con Exito";
        }
        $sql ="UPDATE cliente SET estCli = '".$est."' WHERE codCli='".$id."'";
        $update = $conector->query($sql);
        if($update){
            $messages[]= $sms;
        }else{
            $errors[]="No se actualizo el estado"; 
        }
    }else{
        $errors[]="Error Desconocido";
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