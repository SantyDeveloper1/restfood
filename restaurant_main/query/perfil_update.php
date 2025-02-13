<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../admin/conexion/conectar.php';
    if(empty($_SESSION['codCli'])){
        redireccionar2("../../");
    }elseif(empty($_POST["nom"])){
        $errors[]="Ingrese el Nombre";
    }elseif(empty($_POST["app"])){
        $errors[]="Ingrese su Apellido Paterno";
    }elseif(empty($_POST["apm"])){
        $errors[]="Ingrese su Apellido Materno";
    }elseif(empty($_POST["dni"])){
        $errors[]="Ingrese su DNI";
    }elseif(empty($_POST["cel"])){
        $errors[]="Ingrese su numero de celular";
    }elseif(
        !empty($_POST["nom"]) &&
        !empty($_POST["app"]) &&
        !empty($_POST["apm"])
    ){
        $id = $_SESSION['codCli'];
        $nom = $_POST["nom"];
        $app = $_POST["app"];
        $apm = $_POST["apm"];
        $dni = $_POST["dni"];
        $cel = $_POST["cel"];

        $sql = "SELECT * FROM cliente WHERE celCli='$cel' AND codCli<>'$id'";
        $consulta= $conector->query($sql);
        $uno_verificar=$consulta->num_rows;
            if($uno_verificar>0){
                $errors[]="N° Celular  ya esta registrado, intenta con otro diferente";    
            }else{
                if (preg_match("/^[0-9]{8}$/", $dni)){
                // Verificar que solo sean números de 9 dígitos
                if (preg_match("/^[0-9]{9}$/", $cel)) {
                    $sql = "UPDATE cliente SET nomCli='".$nom."', appCli='".$app."', apmCli='".$apm."', celCli='".$cel."' WHERE codCli='".$id."'";
                    $update = $conector->query($sql);
                        if($update){
                            if(empty($_FILES["foto"]['size'])){
                                $messages[]="Informacion Actualizada con Exito";
                            }else{
                                $year = date('Y');
                                $mes = date('m');
                                $ruta = "assets/uploads";
                                $cadena = $ruta."/".$year."/".$mes."/"; //ruta para guardar el archivo
                                $folder = "../../".$cadena; //Folder donde estara el arcivo
                                //Crear folder si no existe
                                    if (!file_exists($folder)) {
                                        mkdir($folder, 0777, true);
                                    }
                                    $maxlimit = 90000000000000; // Máximo límite de tamaño (en bits)
                                    $allowed_ext = "jpg,png,jpeg,gif"; // Extensiones permitidas (usad una coma para separarlas)
                                    $overwrite = "yes"; // Permitir sobreescritura? (yes/no)
                                    $match1 = "";  
                                    $filesizeImagen = $_FILES['foto']['size']; // toma el tamaño del archivo
                                    $filenameImagen = strtolower($_FILES['foto']['name']); // toma el nombre del archivo y lo pasa a minúsculas
                                    $exten1 = pathinfo($filenameImagen, PATHINFO_EXTENSION);
                                    $dir_img1 = $id.'_foto.'.$exten1;//renombrarlo
                                    if($filesizeImagen < 1){ // el archivo está vacío
                                        $errors[]= "La foto esta vacía.";
                                    }elseif($filesizeImagen > $maxlimit){ // el archivo supera el máximo
                                        $errors[]= "La <b>foto</b> supera el máximo tamaño permitido.";
                                    }else{
                                        $file_ext = preg_split("/\./",$filenameImagen); //verifica las extensiones
	                                    $allowed_ext = preg_split("/\,/",$allowed_ext); // ídem extensiones
                                        foreach($allowed_ext as $ext){
                                            if($ext==$file_ext[1]) $match1 = "1"; // Permite el archivo
                                        }
                                        // Extensión no permitida
                                        if(!$match1){
                                            $errors[]= "La imagen elegida no esta permitida: ";
                                        }else{
                                            if(move_uploaded_file($_FILES['foto']['tmp_name'], $folder.$dir_img1)){
                                            $foto = $cadena.$dir_img1;
                                            $sql="UPDATE cliente SET  imgCli='".$foto."' WHERE codCli='".$id."'";
                                            $query_update = $conector->query($sql);
                                                if ($query_update){
                                                    $messages[] = "Evento Registrado con Éxito!.                                                       
                                                <script type='text/javascript'>
                                                                function redireccionar(){
                                                                    window.location='./';
                                                                } 
                                                                setTimeout ('redireccionar()', 3000);
                                                </script>";
                                            } else{
                                                $errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
                                            }
                                        }
                                    }
                                }
                            }
                        }else{
                            $errors[]="No se actualizo la contraseña"; 
                        }
                    }else {
                        // El N° no es válido
                        $errors[]="Ingrese N° Celular válido de 9 dígitos";
                    }
                }else {
                    // El N° no es válido
                    $errors[]="Ingrese N° DNI válido de 8 dígitos";
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