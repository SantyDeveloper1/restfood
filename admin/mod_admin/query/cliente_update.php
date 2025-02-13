<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';
    if(empty($_POST["id"])){
        $errors[]="Seleccione el Registro";
    }elseif(empty($_POST["nom"])){
        $errors[]="Ingrese el Nombre";
    }elseif(empty($_POST["app"])){
        $errors[]="Ingrese su Apellido Paterno";
    }elseif(empty($_POST["apm"])){
        $errors[]="Ingrese su Apellido Materno";
    }elseif(empty($_POST["sexo"])){
        $errors[]="Seleccione el Genero";
    }elseif(empty($_POST["cel"])){
        $errors[]="Ingrese el nro. de Celular";
    }elseif(empty($_POST["mail"])){
        $errors[]="Ingrese el Correo Electronico";
    }elseif(empty($_POST["dir"])){
        $errors[]="Ingrese la direccion";
    }elseif(
        !empty($_POST["nom"]) &&
        !empty($_POST["app"]) &&
        !empty($_POST["apm"])
    ){ 
        $id = $_POST['id'];
        $nom = $_POST["nom"];
        $app = $_POST["app"];
        $apm = $_POST["apm"];
        $sexo = $_POST["sexo"];
        $cel = $_POST["cel"];
        $mail = $_POST["mail"];
        $dir = $_POST["dir"];
        
        if (preg_match("/^[0-9]{9}$/", $cel)) {
            $sql = "SELECT *FROM cliente WHERE celCli='".$cel."' AND codCli<>'".$id."'";
            $query = $conector->query($sql);
            $exit_cel = $query->num_rows;
                if($exit_cel>0){
                    $errors[]="El Celular ya pertenece a otro Cliente";
                }else{
                        $sql = "SELECT *FROM cliente WHERE emaCli='".$mail."' AND codCli<>'".$id."'";
                        $query = $conector->query($sql);
                        $exit_mail = $query->num_rows;
                        if($exit_mail>0){
                            $errors[]="El Correo ya pertenece a otro Cliente";
                        }else{
                                    $sql ="UPDATE cliente SET nomCli = '".$nom."', appCli = '".$app."',apmCli = '".$apm."',
                                    emaCli = '".$mail."',celCli = '".$cel."',
                                    sexCli = '".$sexo."', dirCli = '".$dir."' WHERE codCli='".$id."'";
                                    $update = $conector->query($sql);
                                    if($update){
                                        $messages[]= "Datos actualizados correctamente";
                                    }else{
                                        $errors[]="No se actualizo los datos del cliente"; 
                                    }
                                }
                             
                        }   
                    }else{
                        // El Numero de celular no es válido
                        $errors[]="Ingrese un Numero de celular válido de 9 dígitos";   
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