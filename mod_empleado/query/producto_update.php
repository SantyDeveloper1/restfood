<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';
    if(empty($_POST["id"])){
        $errors[]="Seleccione el Registro";
    }elseif(empty($_POST["nom"])){
        $errors[]="Ingrese el Nombre del producto";
    }elseif(empty($_POST["descripcion"])){
        $errors[]="Ingrese la discripcion del producto";
    }elseif(empty($_POST["precio"])){
        $errors[]="Ingrese el precio";
    }elseif(empty($_POST["stock"])){
        $errors[]="Seleccione el stock";
    }elseif(empty($_POST["stock_minimo"])){
        $errors[]="Ingrese el Nro. de stock minimo";
    }elseif(
        !empty($_POST["nom"]) &&
        !empty($_POST["descripcion"]) &&
        !empty($_POST["precio"])
    ){ 
        $id = $_POST['id'];
        $nom = $_POST["nom"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $stock = $_POST["stock"];
        $stock_minimo = $_POST["stock_minimo"];
        $est = isset($_POST["est"]) ? $_POST["est"] : 0;
        
            if($nom > 0){
            $sql = "SELECT *FROM producto WHERE nomProd='".$nom."' AND idProd<>'".$id."'";
            $query = $conector->query($sql);
            $exit_doc = $query->num_rows;
                if($exit_doc>0){
                        $errors[]="El nombre del producto ya se encuentra registrado";
                }else{
                    $sql ="UPDATE producto SET nomProd = '".$nom."', descripcion = '".$descripcion."',precio = '".$precio."',
                    stok = '".$stock."',stok_min = '".$stock_minimo."', estProd = '".$est."' WHERE idProd='".$id."'";
                    $update = $conector->query($sql);
                    
                    if ($update) {
                        $year = date('Y');
                        $mes = date('m');
                        $ruta = "assets/uploads";
                        $cadena = $ruta . "/" . $year . "/" . $mes . "/"; //ruta para guardar el archivo
                        $folder = "../../" . $cadena; //Folder donde estará el archivo
                        
                        // Crear folder si no existe
                        if (!file_exists($folder)) {
                            mkdir($folder, 0777, true);
                        }
                        
                        $maxlimit = 90000000000000; // Máximo límite de tamaño (en bits)
                        $allowed_ext = "jpg,png,jpeg,gif"; // Extensiones permitidas (usar una coma para separarlas)
                        $overwrite = "yes"; // Permitir sobreescritura? (yes/no)
                        $match1 = "";  
                        
                         // Verificar y procesar imagen1 (opcional)
                         if (!empty($_FILES['imagen1']['size'])) {
                            $fotoKey = 'imagen1';
                            $filesizeImagen = $_FILES[$fotoKey]['size']; // toma el tamaño del archivo
                            $filenameImagen = strtolower($_FILES[$fotoKey]['name']); // toma el nombre del archivo y lo pasa a minúsculas
                            $exten1 = pathinfo($filenameImagen, PATHINFO_EXTENSION);
                            $dir_img1 = $id . '_imagen1.' . $exten1; // renombrarlo
                            
                            if ($filesizeImagen < 1) {
                                $errors[] = "La foto está vacía.";
                            } elseif ($filesizeImagen > $maxlimit) {
                                $errors[] = "La <b>foto</b> supera el máximo tamaño permitido.";
                            } else {
                                $file_ext = preg_split("/\./", $filenameImagen);
                                $allowed_ext_arr = preg_split("/\,/", $allowed_ext); // Cambio de nombre de variable
                                foreach ($allowed_ext_arr as $ext) {
                                    if ($ext == $file_ext[1]) $match1 = "1";
                                }
                                // Extensión no permitida
                                if (!$match1) {
                                    $errors[] = "La imagen elegida no está permitida.";
                                } else {
                                    if (move_uploaded_file($_FILES[$fotoKey]['tmp_name'], $folder . $dir_img1)) {
                                        $foto = $cadena . $dir_img1;
                                        $sql = "UPDATE producto SET imagen1='" . $foto . "' WHERE idProd='" . $id . "'";
                                        $query_update = $conector->query($sql);
                                        if (!$query_update) {
                                            $errors[] = "Lo siento, algo ha salido mal al intentar actualizar la imagen 1: " . mysqli_error($con);
                                        }
                                    }
                                }
                            }
                        }
                        
                        // Verificar y procesar imagen2 (opcional)
                        if (!empty($_FILES['imagen2']['size'])) {
                            $fotoKey = 'imagen2';
                            $filesizeImagen = $_FILES[$fotoKey]['size']; // toma el tamaño del archivo
                            $filenameImagen = strtolower($_FILES[$fotoKey]['name']); // toma el nombre del archivo y lo pasa a minúsculas
                            $exten1 = pathinfo($filenameImagen, PATHINFO_EXTENSION);
                            $dir_img2 = $id . '_imagen2.' . $exten1; // renombrarlo
                            
                            if ($filesizeImagen < 1) {
                                $errors[] = "La foto está vacía.";
                            } elseif ($filesizeImagen > $maxlimit) {
                                $errors[] = "La <b>foto</b> supera el máximo tamaño permitido.";
                            } else {
                                $file_ext = preg_split("/\./", $filenameImagen);
                                $allowed_ext_arr = preg_split("/\,/", $allowed_ext); // Cambio de nombre de variable
                                foreach ($allowed_ext_arr as $ext) {
                                    if ($ext == $file_ext[1]) $match1 = "1";
                                }
                                // Extensión no permitida
                                if (!$match1) {
                                    $errors[] = "La imagen elegida no está permitida.";
                                } else {
                                    if (move_uploaded_file($_FILES[$fotoKey]['tmp_name'], $folder . $dir_img2)) {
                                        $foto = $cadena . $dir_img2;
                                        $sql = "UPDATE producto SET imagen2='" . $foto . "' WHERE idProd='" . $id . "'";
                                        $query_update = $conector->query($sql);
                                        if (!$query_update) {
                                            $errors[] = "Lo siento, algo ha salido mal al intentar actualizar la imagen 2: " . mysqli_error($con);
                                        }
                                    }
                                }
                            }
                        }
                        
                        // Verificar y procesar imagen3 (opcional)
                        if (!empty($_FILES['imagen3']['size'])) {
                            $fotoKey = 'imagen3';
                            $filesizeImagen = $_FILES[$fotoKey]['size']; // toma el tamaño del archivo
                            $filenameImagen = strtolower($_FILES[$fotoKey]['name']); // toma el nombre del archivo y lo pasa a minúsculas
                            $exten1 = pathinfo($filenameImagen, PATHINFO_EXTENSION);
                            $dir_img3 = $id . '_imagen3.' . $exten1; // renombrarlo
                            
                            if ($filesizeImagen < 1) {
                                $errors[] = "La foto está vacía.";
                            } elseif ($filesizeImagen > $maxlimit) {
                                $errors[] = "La <b>foto</b> supera el máximo tamaño permitido.";
                            } else {
                                $file_ext = preg_split("/\./", $filenameImagen);
                                $allowed_ext_arr = preg_split("/\,/", $allowed_ext); // Cambio de nombre de variable
                                foreach ($allowed_ext_arr as $ext) {
                                    if ($ext == $file_ext[1]) $match1 = "1";
                                }
                                // Extensión no permitida
                                if (!$match1) {
                                    $errors[] = "La imagen elegida no está permitida.";
                                } else {
                                    if (move_uploaded_file($_FILES[$fotoKey]['tmp_name'], $folder . $dir_img3)) {
                                        $foto = $cadena . $dir_img3;
                                        $sql = "UPDATE producto SET imagen3='" . $foto . "' WHERE idProd='" . $id . "'";
                                        $query_update = $conector->query($sql);
                                        if (!$query_update) {
                                            $errors[] = "Lo siento, algo ha salido mal al intentar actualizar la imagen 3: " . mysqli_error($con);
                                        }
                                    }
                                }
                            }
                        }
                        $messages[] = "Información actualizada con éxito.";
                    } else{
                        $errors[] = "No se actualizó tu perfil.";
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