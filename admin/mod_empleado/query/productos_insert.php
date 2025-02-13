<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';
    if(empty($_FILES["imagen1"]['size'])){
    $errors[]="Elige la imagen";
    }elseif(empty($_POST["nom"])){
        $errors[]="Ingrese el Nombre del producto";
    }elseif(empty($_POST["des"])){
        $errors[]="Ingrese su descripcion del producto";
    }elseif(empty($_POST["precio"])){
        $errors[]="Ingrese el precio del producto";
    }elseif(empty($_POST["stock"])){
        $errors[]="Ingrese el stock del producto";
    }elseif(empty($_POST["stock_minimo"])){
        $errors[]="Ingrese el stock minimo del producto";
    }elseif(empty($_POST["estado"])){
        $errors[]="Marca el estado del producto";
    }elseif(empty($_POST["categ"])){
        $errors[]="Marca la categoria del producto";
    }elseif(
        !empty($_POST["nom"]) &&
        !empty($_POST["des"]) &&
        !empty($_POST["precio"])
    ){
        $nom = $_POST["nom"];
        $des = $_POST["des"];
        $precio = $_POST["precio"];
        $stock = $_POST["stock"];
        $stock_minimo = $_POST["stock_minimo"];
        $categ = $_POST["categ"];
        $est = 1;
        $reg = date("Y-m-d H:i:s");
        
        $sql = "INSERT INTO producto (codCateg,nomProd,descripcion,precio,stok,stok_min,estProd, regProd) 
        VALUES('".$categ."','".$nom."','".$des."','".$precio."','".$stock."','".$stock_minimo."','".$est."','".$reg."')";
        $insert = $conector->query($sql);
        if ($insert) {
            $sql = "SELECT * FROM producto ORDER BY idProd DESC LIMIT 1";
            $query = $conector->query($sql);
            while ($fila = $query->fetch_array()) {
                $id = $fila['idProd'];
            }
        
            $year = date('Y');
            $mes = date('m');
            $ruta = "assets/uploads";
            $cadena = $ruta . "/" . $year . "/" . $mes . "/"; //ruta para guardar el archivo
            $folder = "../../" . $cadena; //Folder donde estara el archivo
        
            // Crear folder si no existe
            if (!file_exists($folder)) {
                mkdir($folder, 0777, true);
            }
        
            $maxlimit = 90000000000000; // Máximo límite de tamaño (en bits)
            $allowed_ext = "jpg,png,jpeg,gif"; // Extensiones permitidas (usar una coma para separarlas)
            $allowed_ext_array = explode(",", $allowed_ext); // Convertir a array
        
            $success = false; // Variable para controlar si se ha registrado con éxito
        
            // Verificar y procesar imagen1 (obligatorio)
            if (!empty($_FILES['imagen1']['name'])) {
                $fotoKey = 'imagen1';
                $filesizeImagen = $_FILES[$fotoKey]['size'];
                $filenameImagen = strtolower($_FILES[$fotoKey]['name']);
                $exten1 = pathinfo($filenameImagen, PATHINFO_EXTENSION);
                $dir_img1 = $id . '_imagen1.' . $exten1;
        
                if ($filesizeImagen < 1) {
                    $errors[] = "La foto está vacía.";
                } elseif ($filesizeImagen > $maxlimit) {
                    $errors[] = "La <b>imagen 1</b> supera el máximo tamaño permitido.";
                } else {
                    if (in_array($exten1, $allowed_ext_array)) {
                        if (move_uploaded_file($_FILES[$fotoKey]['tmp_name'], $folder . $dir_img1)) {
                            $foto = $cadena . $dir_img1;
                            $sql = "UPDATE producto SET imagen1='" . $foto . "' WHERE idProd='" . $id . "'";
                            $query_update = $conector->query($sql);
        
                            if ($query_update) {
                                $success = true; // Marcar como éxito
                                
                            } else {
                                $errors[] = "Algo ha salido mal al intentar registrar la imagen 1: " . mysqli_error($con);
                            }
                        }
                    } else {
                        $errors[] = "La imagen 1 elegida no está permitida.";
                    }
                }
            }
        
            // Verificar y procesar imagen2 (opcional)
            if (!empty($_FILES['imagen2']['name'])) {
                $fotoKey = 'imagen2';
                $filesizeImagen = $_FILES[$fotoKey]['size'];
                $filenameImagen = strtolower($_FILES[$fotoKey]['name']);
                $exten1 = pathinfo($filenameImagen, PATHINFO_EXTENSION);
                $dir_img2 = $id . '_imagen2.' . $exten1;
        
                if ($filesizeImagen < 1) {
                    $errors[] = "La foto está vacía.";
                } elseif ($filesizeImagen > $maxlimit) {
                    $errors[] = "La <b>imagen 2</b> supera el máximo tamaño permitido.";
                } else {
                    if (in_array($exten1, $allowed_ext_array)) {
                        if (move_uploaded_file($_FILES[$fotoKey]['tmp_name'], $folder . $dir_img2)) {
                            $foto = $cadena . $dir_img2;
                            $sql = "UPDATE producto SET imagen2='" . $foto . "' WHERE idProd='" . $id . "'";
                            $query_update = $conector->query($sql);
        
                            if ($query_update) {
                                $success = true; // Marcar como éxito
                            } else {
                                $errors[] = "Algo ha salido mal al intentar registrar la imagen 2: " . mysqli_error($con);
                            }
                        }
                    } else {
                        $errors[] = "La imagen 1 elegida no está permitida.";
                    }
                }
            }
        
            // Verificar y procesar imagen3 (opcional)
            if (!empty($_FILES['imagen3']['name'])) {
                $fotoKey = 'imagen3';
                $filesizeImagen = $_FILES[$fotoKey]['size'];
                $filenameImagen = strtolower($_FILES[$fotoKey]['name']);
                $exten1 = pathinfo($filenameImagen, PATHINFO_EXTENSION);
                $dir_img3 = $id . '_imagen3.' . $exten1;
        
                if ($filesizeImagen < 1) {
                    $errors[] = "La foto está vacía.";
                } elseif ($filesizeImagen > $maxlimit) {
                    $errors[] = "La <b>imagen 1</b> supera el máximo tamaño permitido.";
                } else {
                    if (in_array($exten1, $allowed_ext_array)) {
                        if (move_uploaded_file($_FILES[$fotoKey]['tmp_name'], $folder . $dir_img3)) {
                            $foto = $cadena . $dir_img3;
                            $sql = "UPDATE producto SET imagen3='" . $foto . "' WHERE idProd='" . $id . "'";
                            $query_update = $conector->query($sql);
        
                            if ($query_update) {
                                $success = true; // Marcar como éxito
                               // $messages[] = "Imagen 3 registrada con éxito.";
                            } else {
                                $errors[] = "Algo ha salido mal al intentar registrar la imagen 3: " . mysqli_error($con);
                            }
                        }
                    } else {
                        $errors[] = "La imagen 3 elegida no está permitida.";
                    }
                }
            }
        
            if ($success) {
                $messages[] = "Eventos registrados con éxito.";
            } elseif (empty($messages)) {
                $errors[] = "No se han registrado imágenes.";
            }
        } else {
            $errors[] = "Error Desconocido";
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