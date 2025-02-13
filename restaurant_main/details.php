<?php
    @session_start();
    error_reporting(0);
    include_once '../admin/conexion/conectar.php';
    include_once 'functions.php';
    include_once 'config.php';  
	
if (isset($_GET['id'])) {
    $idProd = $_GET['id'];
    // Realizar la consulta SQL usando el idProd
    $sql = "SELECT * FROM producto WHERE idProd = $idProd";
    $result = $conector->query($sql);
    if ($result->num_rows > 0) {
        // Resto del código para mostrar las imágenes
    } else {
        echo "No se encontraron imágenes.";
    }
}
if(!empty($_SESSION['codCli'])){
	//$priv_user = $_SESSION['priUsu'];
	$id_user = $_SESSION['codCli'];
// Obtén la cantidad actual del producto en el carrito desde la base de datos
$sql_obtener_cantidad = "SELECT cantCar FROM carrito WHERE codCli = '$id_user' AND codProd = '$idProd'";
$resultado_obtener_cantidad = $conector->query($sql_obtener_cantidad);

if ($resultado_obtener_cantidad->num_rows > 0) {
    $fila_cantidad = $resultado_obtener_cantidad->fetch_assoc();
    $cantidad_actual = $fila_cantidad['cantCar'];
}
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>RESTAURANT | REST FOOD</title>
	<link rel="icon" href="../assets/images/icono1.ico" type="image/x-icon">
	<link rel="stylesheet" href="./css/normalize.css">
	<link rel="stylesheet" href="./css/mdb.min.css">
	<link rel="stylesheet" href="./css/all.css">
	<script src="./js/sweetalert2.js" ></script>
	<link rel="stylesheet" href="./css/style.css">
</head>
<body>
	<!-- Header -->
	<?php include_once 'home/header.php' ?>
	<div class="container container-web-page">
	    <h3 class="font-weight-bold poppins-regular text-uppercase">Detalles de platillo</h3>
	    <hr>
	    <div class="container-fluid">
	        <div class="row">
				<div class="col-12 col-lg-5">
				<?php while ($row = $result->fetch_assoc()) { 
					$imagenUrl = !empty($row['imagen1']) ? $row['imagen1'] : 'assets/img/noimagen.jpg'; // Cambia 'ruta' a la URL de tu imagen por defecto
					$imagenUrl2 = !empty($row['imagen2']) ? $row['imagen2'] : 'assets/img/noimagen.jpg'; // Cambia 'ruta' a la URL de tu imagen por defecto
					$imagenUrl3 = !empty($row['imagen3']) ? $row['imagen3'] : 'assets/img/noimagen.jpg'; // Cambia 'ruta' a la URL de tu imagen por defecto
				?>
				<!--cover-->
				<figure class="full-box">
					<img class="img-fluid" src="../admin/<?php echo $imagenUrl; ?>" alt="platillo_">
				</figure>
				<!-- Galery -->
				<h5 class="poppins-regular text-uppercase" style="padding-top: 70px;">Galería de imágenes</h5>
				<hr>
				<div class="galery-details full-box">
				<!--cover-->
				<figure class="full-box">
					<a data-fslightbox="gallery" href="../admin/<?php echo $imagenUrl; ?>">
						<img class="img-fluid" src="../admin/<?php echo $imagenUrl; ?>" alt="platillo_">
					</a>
				</figure>
				<!--otras-->
				<figure class="full-box">
					<a data-fslightbox="gallery" href="../admin/<?php echo $imagenUrl2; ?>">
						<img class="img-fluid" src="../admin/<?php echo $imagenUrl2; ?>" alt="platillo_">
					</a>
				</figure>
				<figure class="full-box">
					<a data-fslightbox="gallery" href="../admin/<?php echo $imagenUrl3; ?>">
						<img class="img-fluid" src="../admin/<?php echo $imagenUrl3; ?>" alt="platillo_">
					</a>
				</figure>
    		</div>
	    </div>
	        <div class="col-12 col-lg-7">
                <h4 class="font-weight-bold poppins-regular tittle-details"><?php echo $row['nomProd']; ?></h4>
	                <p class="text-justify lead" style="padding: 40px 0;">
	                    <span class="text-info lead font-weight-bold">Descripción:</span><br>
	                    <?php echo  $row['descripcion']; ?>
	                </p>
	                <p class="lead font-weight-bold"><?php echo '$'. $row['precio'].' '.'USD'; ?>
			<?php } ?>
					<form id="form_carrito" action="" style="padding-top: 70px;" method="post">
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<input type="hidden" name="id" value="<?php echo $idProd; ?>">
									<div class="form-outline mb-4">
										<input type="text" value="1" class="form-control text-center" id="product_cant" name="product_cant" pattern="[0-9]{1,10}" maxlength="10">
										<label for="product_cant" class="form-label">Cantidad</label>
									</div>
								</div>
								<div class="col-12 col-md-6 text-center">
	                                <button type="submit" class="btn btn-info"><i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar al carrito</button>
	                            </div>
							</div>
							<div class="col-xs-12" id="div_car"></div>
						</div>
					</form>
						<!-- actualizar al carrito -->
					<form id="upt_carrito" action="" style="padding-top: 70px;" method="post">
						<div class="container-fluid">
							<div class="row">
								<div class="col-12 col-md-6">
									<input type="hidden" name="id" value="<?php echo $idProd; ?>">
								</div>
								<div class="col-12 col-md-6 text-center">
									<a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal_carrito">
										<i class="fas fa-sync fa-fw"></i> &nbsp; Actualizar Carrito
									</a>
								</div>
								<div class="col-xs-12" id="upt_car"></div>
							</div>
						</div>
					</form>
	            </div>
	        </div>
	    </div>
	</div>
	<?php include_once 'home/footer.php' ?>
	<script src="./js/mdb.min.js" ></script>
	<script src="./js/fslightbox.js" ></script>
	<script src="./js/main.js" ></script>
	  <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
	<script src="../login/assets/template/admin/js/vendor/jquery.min.js"></script>
	<script src="../login/assets/template/admin/js/vendor/bootstrap.min.js"></script>
	<script src="../login/assets/template/admin/js/plugins.js"></script>
	<script src="../login/assets/template/admin/js/app.js"></script>
   <script src="../login/assets/template/admin/js/pages/login.js"></script>
        <script>$(function(){ Login.init(); });</script>
</body>
</html>
	<!-- MODAL PARA ACTUALIZAR EL PERFIL -->
	<div id="modal_carrito" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-center text-danger">Actualizar Cantidad<h2>
                </div>
                <div class="modal-body">
                    <form id="upt_carrito" class="form-horizontal form-bordered">
                        <div class="form-group"> 
						<input type="hidden" name="id" value="<?php echo $idProd; ?>">                                         
						<div class="col-md-8 text-center">
							<input type="text" name="cantidad" value="<?php echo $cantidad_actual; ?>" class="form-control" placeholder="Cantidad del producto">
							<small class="control-label label-sm">Cantidad</small>
						</div>
                        </div>
                        <div class="col-md-12" id="div_carrito"></div>
                        <div class="form-group form-actions">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>                                
            </div>
        </div>
    </div>
	<!-- Agrega los enlaces a las bibliotecas de Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="script.js?v=50923"></script>