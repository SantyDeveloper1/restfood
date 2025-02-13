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
        $sql = "SELECT *FROM producto WHERE idProd='".$id."'";
        $query = $conector->query($sql);
        $exit_logeo = $query->num_rows;
        
            $sql= "DELETE FROM producto WHERE idProd='".$id."'";
            $delete = $conector->query($sql);
            if($delete){
                $messages[]= "Registro Eliminado correctamente";
            }else{
                $errors[]="No se elimino el registro"; 
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