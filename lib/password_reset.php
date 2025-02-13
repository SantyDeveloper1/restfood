<?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;
    @session_start();
    error_reporting(0); 
        include_once '../admin/conexion/conectar.php';
        include_once 'functions.php';
        include_once 'config.php';
        // Cargar la clase PHPMailer
        require '../PHPMailer/src/Exception.php';
        require '../PHPMailer/src/PHPMailer.php';
        require '../PHPMailer/src/SMTP.php';

    if(empty($_POST["email"])){
            $errors[]="Ingrese su nueva contraseña";
    }elseif(
            !empty($_POST["email"])
    ){
    $email = $_POST['email'];
    $sql = "SELECT codCli FROM cliente WHERE emaCli = '$email'";
        $consulta= $conector->query($sql);
        $uno_verificar=$consulta->num_rows;
        $row = $consulta->fetch_assoc();

        if($uno_verificar>0){
            // Crear una instancia de PHPMailer
            $mail = new PHPMailer(true);
            try {
                // Configurar el servidor SMTP
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';  // Cambiar esto por tu servidor SMTP
                $mail->SMTPAuth = true;
                $mail->Username = 'ramirezlimasdanny@gmail.com'; // Cambiar esto por tu dirección de correo
                $mail->Password = 'mcfthljuyybavfay'; // Cambiar esto por tu contraseña de correo
                //$mail->SMTPSecure = 'tls'; // tls o ssl, dependiendo de tu configuración
                $mail->Port = 587; // Puerto SMTP, 587 para TLS o 465 para SSL

                // Configurar remitente y destinatario
                $mail->setFrom('ramirezlimasdanny@gmail.com', 'Ramirez Limas Danny');
                $mail->addAddress($email); // Utiliza la variable $email

                // Contenido del correo
                $mail->isHTML(true); 
                $mail->Subject = 'Recuperacion de password';
                $mail->Body    = 'Hola, este es un correo generado para solicitar tu recuperacion de password, por favor visita la pagina
                                  <a href="localhost/restfood/recupera_password.php?id='.$row['codCli'].'">Recuperacion de contraseña</a>';
                $mail->AltBody = 'Este es el cuerpo del correo en texto sin formato';

                // Enviar el correo
                $mail->send();
                $messages[] = "El correo ha sido enviado correctamente!";
            } catch (Exception $e) {
                $errors[]="Hubo un error al inviarel correo: {$mail->ErrorInfo}";
            }   
        }else{
            header("Location: ../index.php");
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