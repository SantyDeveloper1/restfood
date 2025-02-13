<?php
@session_start();
include_once '../admin/conexion/conectar.php';
include_once 'functions.php';
include_once 'config.php';
if(empty($_POST["pass1"])){
    $errors[]="Ingrese su nueva contraseña";
}elseif(empty($_POST["pass2"])){
    $errors[]="Repita su nueva contraseña";
}elseif(
    !empty($_POST["pass1"]) &&
    !empty($_POST["pass2"])
){
    $id = $_POST['id'];
    $pass1 = $_POST["pass1"];//Nueva Contraseña
    $pass2 = $_POST["pass2"];//Repite Contraseña Nueva
    $llave=$template["clave_publica"];
    //$pass = encrypt($pass1,$llave);//Encriptar la contraseña actual
    
        if($pass1 == $pass2){
            $password = encrypt($pass1,$llave);//Encriptar la contraseña nueva
            $sql = "UPDATE cliente SET pasCli='".$password."' WHERE codCli='".$id."'";
            $update = $conector->query($sql);
            if($update){
                $messages[] = "Contraseña Actualizada Con Exito";
                $url ="../restfood/login.php";
                redireccionar($url);
            }else{
                $errors[]="No se actualizo la contraseña"; 
            }
        }else{
            $errors[]="Las nuevas contraseñas no son iguales"; 
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