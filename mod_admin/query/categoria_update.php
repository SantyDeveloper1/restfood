<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';
    if(empty($_POST["id"])){
        $errors[]="Seleccione el Registro";
    }elseif(empty($_POST["nom"])){
        $errors[]="Ingrese el Nombre";
    }elseif(
        !empty($_POST["nom"]) 
    ){ 
        $id = $_POST['id'];
        $nom = $_POST["nom"];


        $sql = "SELECT *FROM categoria WHERE nomCateg='".$nom."' AND codCateg<>'".$id."'";
        $query = $conector->query($sql);
        $exit_cel = $query->num_rows;
            if($exit_cel>0){
                $errors[]="La categoria con el nombre asignado ya esta registrado";
            }else{
                $sql ="UPDATE categoria SET nomCateg = '".$nom."' WHERE codCateg='".$id."'";
                $update = $conector->query($sql);
                    if($update){
                        $messages[]= "Datos actualizados correctamente";
                    }else{
                        $errors[]="No se actualizo la contraseña"; 
                    }
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