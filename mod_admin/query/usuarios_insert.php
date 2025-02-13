<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';
    if(empty($_POST["documento"])){
        $errors[]="Ingrese el Nro. de Documento";
    }elseif(empty($_POST["nombre"])){
        $errors[]="Ingrese el Nombre";
    }elseif(empty($_POST["apellidoPaterno"])){
        $errors[]="Ingrese su Apellido Paterno";
    }elseif(empty($_POST["apellidoMaterno"])){
        $errors[]="Ingrese su Apellido Materno";
    }elseif(empty($_POST["sexo"])){
        $errors[]="Seleccione el Genero";
    }elseif(empty($_POST["cel"])){
        $errors[]="Ingrese el nro. de Celular";
    }elseif(empty($_POST["ema"])){
        $errors[]="Ingrese el Correo Electronico";
    }elseif(

        !empty($_POST["nombre"]) &&
        !empty($_POST["apellidoPaterno"]) &&
        !empty($_POST["apellidoMaterno"])
    ){
        $clave = $template['clave_publica'];
        $id = $_SESSION['codUsu'];
        $nom = $_POST["nombre"];
        $app = $_POST["apellidoPaterno"];
        $apm = $_POST["apellidoMaterno"];
        $doc = $_POST["documento"];
        $sexo = $_POST["sexo"];
        $cel = $_POST["cel"];
        $ema = $_POST["ema"];
        $est = 1;
        $pri = 1;
        $sudo = 1;
        $img = "assets/uploads/noimagen.png";
        $reg = date("Y-m-d H:i:s");
        $pass=encrypt($doc,$clave);
        
        $sql = "SELECT * FROM usuario WHERE  emaUsu ='$ema'";
        $consulta= $conector->query($sql);
        $uno_verificar=$consulta->num_rows;
            if($uno_verificar>0){
                $errors[]="Correo  ya esta registrado, intenta con otro diferente";    
            }else{
                $sql = "SELECT * FROM usuario WHERE  emaUsu ='$ema' OR docUsu='$doc'";
                $consulta2= $conector->query($sql);
                $verificarDoc=$consulta2->num_rows;
                    if($verificarDoc>0){
                        $errors[]="DNI  ya esta registrado, intenta con otro diferente";    
                    }else{
                        $sql = "SELECT * FROM usuario WHERE  emaUsu ='$ema' OR docUsu='$doc'OR celUsu='$cel'";
                        $consulta2= $conector->query($sql);
                        $verificarDoc=$consulta2->num_rows;
                            if($verificarDoc>0){
                                $errors[]="N° Celular  ya esta registrado, intenta con otro diferente";    
                                }else{
                                 // Verificar que solo sean números de 8 dígitos
                            if (preg_match("/^[0-9]{8}$/", $doc)) {
                            // Validar la dirección de correo electrónico
                            if (filter_var($ema, FILTER_VALIDATE_EMAIL)) {
                            // Verificar que solo sean números de 9 dígitos
                            if (preg_match("/^[0-9]{9}$/", $cel)) {
                                    $sql = "INSERT INTO usuario (nomUsu,appUsu,apmUsu,docUsu,
                                    emaUsu,celUsu,sexUsu,pasUsu,priUsu,estUsu,superusuario,imgUsu,regUsu) VALUES
                                    ('".$nom."','".$app."','".$apm."','".$doc."','".$ema."'
                                    ,'".$cel."','".$sexo."','".$pass."','".$pri."'
                                    ,'".$est."','".$sudo."','".$img."','".$reg."')";
                                    $insert = $conector->query($sql);
                                    if($insert===TRUE){
                                        $messages[]= "Ingreso los datos correctamente";
                    
                                    }else{
                                        $errors[]="No se actualizo los datos"; 
                                    }
                                }else {
                                    // El DNI no es válido
                                    $errors[]="Ingrese N° Celular válido de 9 dígitos";
                                }
                            } else {
                                // El correo electrónico no es válido
                                $errors[]= "Ingrese una dirección de correo electrónico válida";
                        }
                        }else {
                            // El DNI no es válido
                            $errors[]="Ingrese un DNI válido de 8 dígitos";
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