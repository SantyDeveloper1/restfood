<?php
    @session_start();
    error_reporting(0);
    include_once 'admin/conexion/conectar.php';
    include_once 'lib/functions.php';
    include_once 'lib/config.php';    

        if(empty($_POST["documento"])){
            $errors[]="Ingrese el DNI";
        }elseif(empty($_POST["nombre"])){
            $errors[]="Ingrese el Nombre";
        }elseif(empty($_POST["apellidoPaterno"])){
            $errors[]="Ingrese el apellido Paterno";
        }elseif(empty($_POST["apellidoMaterno"])){
            $errors[]="Ingrese el apellido Materno";
        }elseif(empty($_POST["cel"])){
            $errors[]="Ingrese el nuemro de celular";
        }elseif(empty($_POST["sexo"])){
            $errors[]="Marque su genero";
        }elseif(empty($_POST["dir"])){
            $errors[]="Ingrese su direccion";
        }elseif(empty($_POST["email"])){
            $errors[]="Ingrese el correo electronico";
        }elseif(empty($_POST["pass1"])){
            $errors[]="Ingrese su contraseña";
        }elseif(empty($_POST["pass2"])){
            $errors[]="Repetir contraseña es obligatorio";
        }elseif(
            !empty($_POST["documento"])&&
            !empty($_POST["nombre"]) &&
            !empty($_POST["apellidoPaterno"]) &&
            !empty($_POST["apellidoMaterno"])
        ){
        $dni = $_POST["documento"];
        $nom = $_POST["nombre"];
        $app_Cli = $_POST["apellidoPaterno"];
        $apm_Cli = $_POST["apellidoMaterno"];
        $cel = $_POST["cel"];
        $sexo = $_POST["sexo"];
        $dir = $_POST["dir"];
        $email = $_POST['email'];
        $est = 1;
        $img = "assets/uploads/2023/05/perfil.png";
        $llave = $template['clave_publica'];
        $pass1 = $_POST["pass1"];
        $pass2 = $_POST["pass2"];
        $reg = date("Y-m-d H:i:s");
        if($pass1 == $pass2){
        $password = encrypt($_POST['pass1'], $llave);

        $sql = "SELECT * FROM cliente WHERE dni = '$dni'";
        $consulta= $conector->query($sql);
        $uno_verificar=$consulta->num_rows;
            if($uno_verificar>0){
                $errors[]="N° DNI  ya esta registrado, intenta con otro diferente";    
            }else{
                $sql = "SELECT * FROM cliente WHERE  celCli='$cel'";
                $consulta= $conector->query($sql);
                $uno_verificar=$consulta->num_rows;
                if($uno_verificar>0){
                    $errors[]="N° Celular  ya esta registrado, intenta con otro diferente";    
                }else{
                    $sql = "SELECT * FROM cliente WHERE  celCli='$cel' OR emaCli ='$email'";
                    $consulta2= $conector->query($sql);
                    $verificarEma=$consulta2->num_rows;
                    if($verificarEma>0){
                        $errors[]="Correo  ya esta registrado, intenta con otro diferente";    
                    }else{
                        if (preg_match("/^[0-9]{8}$/", $dni)){
                            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                if (preg_match("/^[0-9]{9}$/", $cel)) {
                                    $sql = "INSERT INTO cliente (dni,nomCli,appCli,apmCli,
                                    emaCli,celCli,sexCli,dirCli,pasCli,estCli,imgCli,regCli) VALUES
                                    ('".$dni."','".$nom."','".$app_Cli."','".$apm_Cli."','".$email."'
                                    ,'".$cel."','".$sexo."','".$dir."','".$password."'
                                    ,'".$est."','".$img."','".$reg."')";
                                    $insert = $conector->query($sql);
                                    if($insert===TRUE){
                                        $messages[]= "Ingreso los datos correctamente";
                                    }else{
                                        $errors[]="No se registro los datos"; 
                                    }
                                }else {
                                    $errors[]="Ingrese N° Celular válido de 9 dígitos";
                                }
                            } else {
                                $errors[]= "Ingrese una dirección de correo electrónico válida";
                            }       
                        }else {
                            $errors[]="Ingrese N° DNI válido de 9 dígitos";  
                        }          
                    }
                }
            } 
            }else{
                $errors[]="Las contraseñas no son iguales"; 
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