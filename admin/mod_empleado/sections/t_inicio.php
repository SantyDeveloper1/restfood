<?php 
    @session_start();
    include_once '../lib/config.php';
    include_once '../lib/functions.php';
    include_once '../conexion/conectar.php';
    if(!empty($_SESSION['codUsu'])){
       $priv_user = $_SESSION['priUsu'];
       $id_user = $_SESSION['codUsu'];
       if($priv_user <> 2){
            redireccionar2("../mod_admin/");
       }
       $sql = "SELECT *FROM usuario WHERE codUsu='".$id_user."' AND estUsu=1";
       $consulta = $conector->query($sql);
       while($fila = $consulta->fetch_array()){
            $nom_user = $fila['nomUsu'];
            $img_user = $fila['imgUsu'];
            $app_user = $fila['appUsu'];
            $apm_user = $fila['apmUsu'];
            $ema_user = $fila['emaUsu'];
            $doc_user = $fila['docUsu'];
            $cel_user = $fila['celUsu'];
            if($fila['sexUsu']=="M"){     
                $masculino = "checked";
                $feminino = "";
             }else{
                $masculino = "";
                $feminino = "checked";
             }
            /*if($fila['tdoUsu']==1){
                $dni = "checked";
                $pasaporte = "";
                $carnetExtrajro = "";
            }elseif($fila['tdoUsu']==2){
                $dni = "";
                $pasaporte = "checked";
                $carnetExtrajro = "";
            }else{
                $dni = "";
                $pasaporte = "";
                $carnetExtrajro = "checked";
            }*/
       }
    }else{
        redireccionar2("../");
    }
?>
<!DOCTYPE html>
<!--[if IE 9]>         <html class="no-js lt-ie10" lang="es"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="es"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title><?php echo "ADMINISTRADOR | ".$template['nom_proyecto']?></title>

        <meta name="description" content="<?php echo $template['descripcion'];?>">
        <meta name="author" content="<?php echo $template['author'];?>">
        <meta name="robots" content="<?php echo $template['robots'];?>">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="../<?php echo $template['icono'];?>">
        <link rel="apple-touch-icon" href="../<?php echo $template['icono'];?>" sizes="57x57">
        <link rel="apple-touch-icon" href="../<?php echo $template['icono'];?>" sizes="72x72">
        <link rel="apple-touch-icon" href="../<?php echo $template['icono'];?>" sizes="76x76">
        <link rel="apple-touch-icon" href="../<?php echo $template['icono'];?>" sizes="114x114">
        <link rel="apple-touch-icon" href="../<?php echo $template['icono'];?>" sizes="120x120">
        <link rel="apple-touch-icon" href="../<?php echo $template['icono'];?>" sizes="144x144">
        <link rel="apple-touch-icon" href="../<?php echo $template['icono'];?>" sizes="152x152">
        <link rel="apple-touch-icon" href="../<?php echo $template['icono'];?>" sizes="180x180">
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="../assets/template/admin/css/bootstrap.min.css">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="../assets/template/admin/css/plugins.css">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="../assets/template/admin/css/main.css">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="../assets/template/admin/css/themes.css">
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) -->
        <script src="../assets/template/admin/js/vendor/modernizr.min.js"></script>
    </head>