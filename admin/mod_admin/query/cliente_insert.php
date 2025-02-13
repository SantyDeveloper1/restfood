<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';

    if(empty($_POST["documento"])){
        $errors[]="Ingrese el Numero de documento de identidad";
    }elseif(empty($_POST["nombre"])){
        $errors[]="Ingrese el Nombre";
    }elseif(empty($_POST["apellidoPaterno"])){
        $errors[]="Ingrese su Apellido Paterno";
    }elseif(empty($_POST["apellidoMaterno"])){
        $errors[]="Ingrese su Apellido Materno";
    }elseif(empty($_POST["ema"])){
        $errors[]="Ingrese su correo electronico";
    }elseif(empty($_POST["cel"])){
        $errors[]="Ingrese el nro. de Celular";
    }elseif(empty($_POST["sexo"])){
        $errors[]="Seleccione el Genero";
    }elseif(empty($_POST["dir"])){
        $errors[]="Ingrese Su direccion";
    }elseif(
        !empty($_POST["documento"]) &&
        !empty($_POST["nombre"]) &&
        !empty($_POST["apellidoPaterno"]) &&
        !empty($_POST["apellidoMaterno"])
    ){
        $clave = $template['clave_publica'];
        $id = $_SESSION['codUsu'];
        $dni = $_POST["documento"];
        $nom = $_POST["nombre"];
        $app = $_POST["apellidoPaterno"];
        $apm = $_POST["apellidoMaterno"];
        $ema = $_POST["ema"];
        $cel = $_POST["cel"];
        $sexo = $_POST["sexo"];
        $dir = $_POST["dir"];
        $est = 1;
        $img = "assets/img/noimagen.jpg";
        $reg = date("Y-m-d H:i:s");
        $pass=encrypt($cel,$clave);
        $sql = "SELECT * FROM cliente WHERE  dni ='$dni'";
        $consulta= $conector->query($sql);
        $uno_verificar=$consulta->num_rows;
            if($uno_verificar>0){
                $errors[]="En Numero de DNI ya esta registrado, intenta con otro diferente";    
            }else{
                $sql = "SELECT * FROM cliente WHERE  emaCli ='$ema'";
                $consulta= $conector->query($sql);
                $uno_verificar=$consulta->num_rows;
                if($uno_verificar>0){
                    $errors[]="Correo  ya esta registrado, intenta con otro diferente";    
                }else{
                    $sql = "SELECT * FROM cliente WHERE  emaCli ='$ema' OR  celCli='$cel'";
                    $consulta2= $conector->query($sql);
                    $verificarDoc=$consulta2->num_rows;
                    if($verificarDoc>0){
                        $errors[]="N° Celular  ya esta registrado, intenta con otro diferente";    
                    }else{
                        if(preg_match("/^[0-8]{8}$/", $dni)) {
                            if (filter_var($ema, FILTER_VALIDATE_EMAIL)) {
                                if(preg_match("/^[0-9]{9}$/", $cel)) {
                                    $sql = "INSERT INTO cliente (dni,nomCli,appCli,apmCli,
                                    emaCli,celCli,sexCli,dirCli, pasCli,estCli,imgCli,regCli) VALUES
                                    ('".$dni."','".$nom."','".$app."','".$apm."','".$ema."'
                                    ,'".$cel."','".$sexo."','".$dir."','".$pass."'
                                    ,'".$est."','".$img."','".$reg."')";
                                    $insert = $conector->query($sql);
                                    if($insert===TRUE){
                                        $messages[]= "Ingreso los datos correctamente";
                                    }else{
                                        $errors[]="No se actualizo los datos"; 
                                    }
                                }else {
                                    $errors[]="Ingrese N° DNI válido de 8 dígitos";
                                }
                                
                            }else{
                                $errors[]="Ingrese N° Celular válido de 9 dígitos";
                            }
                        }else{
                            $errors[]= "Ingrese una dirección de correo electrónico válida";
                        }
                    }           
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