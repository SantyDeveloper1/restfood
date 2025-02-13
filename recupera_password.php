<?php 
    @session_start();
	include_once 'admin/conexion/conectar.php';
    include_once 'lib/config.php';
    include_once 'lib/functions.php';
    if(!empty($_SESSION['codCli'])){
        if($_SESSION['estCli']==1){
            $url = "restaurant_main/";
            redireccionar2($url);        
        }else{
            $url = "restaurant_main/";
            redireccionar2($url);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="stylesheet" href="login/css/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="login/css/style.css">
   <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
   <title>Recuperar Contraseña</title>
</head>

<body>
   <img class="wave" src="login/img/wave.png">
   <div class="container">
      <div class="img">
         <img src="login/img/food.svg">
      </div>
      <div class="login-content">
      <form id="login_newpass" class="form-horizontal form-bordered form-control-borderless">
            <img src="login/img/avatar.svg">
            <h1>Recupera tu contraseña</h1>
            <div class="input-div one">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div">
                  <h5>Nueva contraseña</h5>
                  <input id="id" type="hidden" class="input" name="id" value="<?php echo $_GET['id'];?>">
                  <input id="pass1" type="password" class="input" name="pass1">
               </div>
            </div>
            <div class="input-div one">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div">
                  <h5>Repetir la contraseña</h5>
                  <input id="pass2" type="password" class="input" name="pass2">
               </div>
            </div>
            <div id="div_newpass" class="col-xs-12"></div>
            <input name="submit" class="btn" type="submit" value="Recuperar contraseña">
            
         </form>
      </div>
   </div>
   <script src="login/js/fontawesome.js"></script>
   <script src="login/js/main.js"></script>
   <script src="login/js/main2.js"></script>
   <script src="login/js/jquery.min.js"></script>
   <script src="login/js/bootstrap.js"></script>
   <script src="login/js/bootstrap.bundle.js"></script>
   <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="login/assets/template/admin/js/vendor/jquery.min.js"></script>
	<script src="login/assets/template/admin/js/vendor/bootstrap.min.js"></script>
	<script src="login/assets/template/admin/js/plugins.js"></script>
	<script src="login/assets/template/admin/js/app.js"></script>
   <script src="login/assets/template/admin/js/pages/login.js"></script>
        <script>$(function(){ Login.init(); });</script>
   <script src="lib/login.js?v=120225"></script>
</body>
</html>