<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';
    if(empty($_SESSION['codUsu'])){
        redireccionar2("../../");
    }elseif(empty($_POST["pass"])){
        $errors[]="Ingrese su contraseña actual";
    }elseif(empty($_POST["pass1"])){
        $errors[]="Ingrese su nueva contraseña";
    }elseif(empty($_POST["pass2"])){
        $errors[]="Repita su nueva contraseña";
    }elseif(
        !empty($_POST["pass"]) &&
        !empty($_POST["pass1"]) &&
        !empty($_POST["pass2"])
    ){
        $id = $_SESSION['codUsu'];
        $pass = $_POST["pass"];//Contreseña Actual
        $pass1 = $_POST["pass1"];//Nueva Contraseña
        $pass2 = $_POST["pass2"];//Repite Contraseña Nueva
        $llave=$template["clave_publica"];
        $pass = encrypt($pass,$llave);//Encriptar la contraseña actual
        $sql = "SELECT *FROM usuario WHERE codUsu='$id' AND pasUsu ='$pass'";
        $consulta= $conector->query($sql);
        $pass_consulta=$consulta->num_rows;
        if($pass_consulta<1){
            $errors[]="Contraseña actual incorrecta"; 
        }else{
            if($pass1 == $pass2){
                $password = encrypt($pass1,$llave);//Encriptar la contraseña nueva
                $sql = "UPDATE usuario SET pasUsu='".$password."' WHERE codUsu='".$id."'";
                $update = $conector->query($sql);
                if($update){
                    $messages[] = "Contraseña Actualizada Con Exito";
                    $url ="../lib/PHP_cerrar.php";
                    redireccionar($url);
                }else{
                    $errors[]="No se actualizo la contraseña"; 
                }
            }else{
                $errors[]="Las nuevas contraseñas no son iguales"; 
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