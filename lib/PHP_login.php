<?php
@session_start();
error_reporting(0);
include_once '../admin/conexion/conectar.php';
include_once 'functions.php';
include_once 'config.php';

// Verifica si la geolocalización está habilitada
if (!isset($_POST['latitude']) || !isset($_POST['longitude'])) {
    // La geolocalización no está habilitada
    $errors[] = "Debes habilitar la geolocalización para iniciar sesión.";
} else {
    // Verifica si el correo está vacío
    if (empty($_POST['email'])) {
        $errors[] = "Ingrese el Correo";
    } else {
        $llave = $template['clave_publica'];
        $email = $_POST['email'];
        $password = encrypt($_POST['pass'], $llave);

        $sql = "SELECT * FROM cliente WHERE emaCli='$email' OR celCli='$email'";
        $consulta = $conector->query($sql);
        $correo_consulta = $consulta->num_rows;

        if ($correo_consulta < 1) {
            $errors[] = "El Correo o el número de celular no es válido";
        } else {
            // Verifica si la contraseña está vacía
            if (empty($_POST['pass'])) {
                $errors[] = "Ingrese la contraseña";
            } else {
                $sql = "SELECT * FROM cliente WHERE (emaCli='$email' OR celCli='$email') AND pasCli = '$password'";
                $consulta = $conector->query($sql);
                $pass_consulta = $consulta->num_rows;

                if ($pass_consulta < 1) {
                    $_SESSION['intentos'] = $_SESSION['intentos'] + 1;
                    $int_rest = 5 - $_SESSION['intentos'];

                    if ($int_rest <= 0) {
                        $sql_est = "UPDATE cliente SET estCli = 0 WHERE emaCli = '$email'";
                        $bloqueo = $conector->query($sql_est);

                        if ($bloqueo) {
                            $errors[] = "Usuario Bloqueado por el sistema";
                        } else {
                            $errors[] = "No se puede bloquear al usuario";
                        }

                        unset($_SESSION['intentos']);
                    } else {
                        $errors[] = "La contraseña no es válida, quedan " . $int_rest . " intentos";
                    }
                } else {
                    while ($fila = $consulta->fetch_array()) {
                        $id_user = $fila['codCli'];
                        $nom_user = $fila['nomCli'];
                        $app_user = $fila['appCli'];
                        $est_user = $fila['estCli'];
                    }

                    if ($est_user == 1) {
                        // Almacenar datos del cliente en la sesión
                        $_SESSION['codCli'] = $id_user;
                        $_SESSION['nomCli'] = $nom_user;
                        $_SESSION['appCli'] = $app_user;
                        $_SESSION['apmCli'] = $app_user;

                        // Redirigir a una carpeta de nombre mod_admin
                        $messages[] = $nom_user;
                        $url = "restaurant_main/";
                        redireccionar($url);
                    } else {
                        $errors[] = "Usuario Bloqueado, contactarse con soporte técnico";
                    }
                }
            }
        }
    }
}

if (isset($errors)) {
    echo '<div class="alert alert-danger" role="alert">';
    echo '<b>Error</b>! ';
    foreach ($errors as $error) {
        echo $error;
    }
    echo '</div>';
}

if (isset($messages)) {
    echo '<div class="alert alert-success" role="alert">';
    echo '<b>Bienvenido</b>! ';
    foreach ($messages as $sms) {
        echo $sms;
    }
    echo '</div>';
}
?>