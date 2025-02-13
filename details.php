<?php
    //@session_start();
    error_reporting(0);
    include_once 'admin/conexion/conectar.php';
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
$sql_obtener_cantidad = "SELECT cantCar FROM carrito WHERE codCli = '$id_user' AND codProd = '$idProd'";
$resultado_obtener_cantidad = $conector->query($sql_obtener_cantidad);
if ($resultado_obtener_cantidad->num_rows > 0) {
    $fila_cantidad = $resultado_obtener_cantidad->fetch_assoc();
    $cantidad_actual = $fila_cantidad['cantCar'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>RESTAURANT | REST FOOD</title>
	<link rel="icon" href="assets/images/icono1.ico" type="image/x-icon">
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
						<img class="img-fluid" src="admin/<?php echo $imagenUrl; ?>" alt="platillo_">
					</figure>
					<!-- Galery -->
					<h5 class="poppins-regular text-uppercase" style="padding-top: 70px;">Galería de imágenes</h5>
					<hr>
					<div class="galery-details full-box">
					<!--cover-->
					<figure class="full-box">
						<a data-fslightbox="gallery" href="admin/<?php echo $imagenUrl; ?>">
							<img class="img-fluid" src="admin/<?php echo $imagenUrl; ?>" alt="platillo_">
						</a>
					</figure>
					<!--otras-->
					<figure class="full-box">
						<a data-fslightbox="gallery" href="admin/<?php echo $imagenUrl2; ?>">
							<img class="img-fluid" src="admin/<?php echo $imagenUrl2; ?>" alt="platillo_">
						</a>
					</figure>
					<figure class="full-box">
						<a data-fslightbox="gallery" href="admin/<?php echo $imagenUrl3; ?>">
							<img class="img-fluid" src="admin/<?php echo $imagenUrl3; ?>" alt="platillo_">
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
								    <a href="login.php"  class="btn btn-info"><i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar al carrito</a>
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
									<a href="login.php" class="btn btn-success" data-toggle="modal" data-target="#modal_carrito">
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
	<!-- Footer -->
	<?php include_once 'sections/footer.php' ?>
	<!-- MDBootstrap V5 -->
	<script src="restaurant_main/js/mdb.min.js" ></script>
	<!-- fslightbox -->
	<script src="restaurant_main/js/fslightbox.js" ></script>
	<!-- General scripts -->
	<script src="restaurant_main/js/main.js" ></script>
</body>
</html>