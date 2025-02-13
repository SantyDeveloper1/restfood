<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATE</title>
    <link rel="icon" href="assets/images/icono1.ico" type="image/x-icon">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Normalize V8.0.1 -->
    <link rel="stylesheet" href="restaurant_main/css/normalize.css">
    <!-- MDBootstrap V5 -->
    <link rel="stylesheet" href="restaurant_main/css/mdb.min.css">
    <!-- Font Awesome V5.15.1 -->
    <link rel="stylesheet" href="restaurant_main/css/all.css">
    <!-- Sweet Alert V10.13.0 -->
    <script src="restaurant_main/js/sweetalert2.js" ></script>
    <!-- General Styles -->
    <link rel="stylesheet" href="restaurant_main/css/style.css">
</head>
<body>
    <!-- Header -->
    <?php include_once 'sections/header.php' ?>
    <!-- Content -->
    <div class="container container-web-page">
        <h3 class="font-weight-bold poppins-regular text-uppercase">Crear cuenta</h3>
        <p class="text-justify">Al crear una cuenta en nuestro sitio web usted acepta nuestros <a href="#">términos y condiciones</a>. La información introducida en el formulario debe de ser clara, precisa y legitima. Para crear una cuenta debe de llenar todos los campos que son obligatorios marcados con el icono <i class="fab fa-font-awesome-alt"></i></p>
        <div class="row">
            <div class="col-12">
                <form id="register_php" class="form-horizontal form-bordered form-control-borderless">
                    <fieldset>
					<center>
					<hr>
					<h3>CREAR TU CUENTA CON TU DNI</h3>
					<div class="btn-group">
						<input type="text"  class="form-control" name="documento" id="documento">
						<button type="button" class="btn btn-dark" id="buscar">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
								<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
							</svg>
						</button>
					</div>
					<br><br> 
					</center>
                        <legend><i class="far fa-address-card"></i> &nbsp; Información personal</legend>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="form-outline mb-4">
                                        <input type="text"  class="form-control" name="nombre" id="nombre">
                                        <label for="nombre" class="form-label">Nombres <i class="fab fa-font-awesome-alt"></i></label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno">
                                        <label for="apellidoPaterno" class="form-label">Apellido Paterno <i class="fab fa-font-awesome-alt"></i></label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno">
                                        <label for="apellidoMaterno" class="form-label">Apellido Materno  <i class="fab fa-font-awesome-alt"></i></label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" name="cel" id="cel">
                                        <label for="cliente_telefono" class="form-label">N° Celular <i class="fab fa-font-awesome-alt"></i></label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="">
                                    <label class="radio-inline">
                                        <input class="form-check-input" type="radio" name="sexo"  value="M">
                                            Masculino
                                    </label>   
                                    <label class="radio-inline">
                                        <input class="form-check-input" type="radio" name="sexo"  value="F">
                                            Femenino
                                    </label> 
                                    <label for="cliente_tipo_documento" class="form-label"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><i class="fas fa-map-marked-alt"></i> &nbsp; Información de envió</legend>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="form-outline mb-4">
                                        <input type="text" class="form-control" name="dir" id="dir">
                                        <label for="cliente_direccion" class="form-label">Direccion <i class="fab fa-font-awesome-alt"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><i class="fas fa-user-lock"></i> &nbsp; Información de inicio de sesión</legend>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="form-outline mb-4">
                                        <input type="email" class="form-control" name="email" id="email" maxlength="47">
                                        <label for="cliente_email" class="form-label">Email <i class="fab fa-font-awesome-alt"></i></label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-outline mb-4">
                                        <input type="password" class="form-control" name="pass1" id="pass1">
                                        <label for="cliente_clave_1" class="form-label">Contraseña <i class="fab fa-font-awesome-alt"></i></label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="form-outline mb-4">
                                        <input type="password" class="form-control" name="pass2" id="pass2">
                                        <label for="cliente_clave_2" class="form-label">Repetir contraseña <i class="fab fa-font-awesome-alt"></i></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div id="div_login" class="col-xs-12"></div>
                    <p class="text-center" style="margin-top: 40px;">
                        <button type="submit" class="btn btn-info btn-sm"><i class="far fa-paper-plane"></i> &nbsp; CREAR CUENTA</button>
                    </p>
                    <p class="text-center">
                        <small>Los campos marcados con <i class="fab fa-font-awesome-alt"></i> son obligatorios</small>
                    </p>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <?php include_once 'sections/footer.php' ?>
    <!-- MDBootstrap V5 -->
    <script src="restaurant_main/js/mdb.min.js" ></script>
    <!-- General scripts -->
    <script src="restaurant_main/js/main.js" ></script>
    <!-- General scripts -->
    <script src="restaurant_main/js/main.js" ></script>
   <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
    <script src="admin/assets/template/admin/js/vendor/jquery.min.js"></script>
    <script src="admin/assets/template/admin/js/vendor/bootstrap.min.js"></script>
    <script src="admin/assets/template/admin/js/plugins.js"></script>
    <script src="admin/assets/template/admin/js/app.js"></script>
   <script src="admin/assets/template/admin/js/pages/login.js"></script>
        <script>$(function(){ Login.init(); });</script>
   <script src="register.js?v=280324"></script>
</body>

<script>
    $('#buscar').click(function(){
        dni=$('#documento').val();
        $.ajax({
           url:'consultaDNI.php',
           type:'post',
           data: 'dni='+dni,
           dataType:'json',
           success:function(r){
            if(r.numeroDocumento==dni){
                $('#apellidoPaterno').val(r.apellidoPaterno);
                $('#apellidoMaterno').val(r.apellidoMaterno);
                $('#nombre').val(r.nombres);
            }else{
                alert(r.error);
            }
            console.log(r)
           }
        });
    });
</script>
</html>