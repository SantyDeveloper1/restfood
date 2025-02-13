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
   <title>Inicio de sesión</title>
</head>

<body>
   <img class="wave" src="login/img/wave.png">
   <div class="container">
      <div class="img">
         <img src="login/img/food.svg">
      </div>
      <div class="login-content">
      <form id="login_php" class="form-horizontal form-bordered form-control-borderless">
            <img src="login/img/avatar.svg">
            <h2 class="title">BIENVENIDO</h2>
            <div class="input-div one">
               <div class="i">
                  <i class="fas fa-user"></i>
               </div>
               <div class="div">
                  <h5>Usuario o Numero de celular</h5>
                  <input id="email" type="text" class="input" name="email">
               </div>
            </div>
            <div class="input-div pass">
               <div class="i">
                  <i class="fas fa-lock"></i>
               </div>
               <div class="div">
                  <h5>Contraseña</h5>
                  <input type="password" id="input" class="input" name="pass">
               </div>
            </div>
            <div class="view">
               <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
            </div>
            <div id="div_login" class="col-xs-12"></div>
            <input name="submit" class="btn" type="submit" value="INICIAR SESION">
            <div class="text-center">
               <a id="forgotPasswordLink" class="font-italic isai5" href="reset_password.php" data-form-id="forgotPasswordForm">Olvidé mi contraseña</a>
                  <div id="forgotPasswordForm" style="display: none;">
                     <h5>Recuperación de contraseña</h5>
                     <input type="text" id="forgotEmail" class="input" placeholder="Correo Electrónico">
                     <input type="button" id="submitForgotPassword" class="btn" value="Enviar solicitud">
                  </div>
               <a class="font-italic isai5" href="registrar.php">Registrarse</a>
            </div>
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
   <script src="lib/login.js?v=281023"></script>
</body>
</html>