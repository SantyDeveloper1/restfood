<?php 
@session_start();
include_once '../lib/config.php';
include_once '../lib/functions.php';
include_once '../admin/conexion/conectar.php';

if(!empty($_SESSION['codCli'])){
    $id_user = $_SESSION['codCli'];

    $sql = "
        SELECT c.*, p.nomProd, p.imagen1, p.precio
        FROM carrito c
        INNER JOIN producto p ON c.codProd = p.idProd
        WHERE c.codCli = '$id_user'
    ";
    $result = $conector->query($sql);

    if (!$result) {
        die("Error en la consulta: " . $conector->error);
    }
}else{
    redireccionar2("../");
}
?>
 <?php include_once 'procesar_pedido.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>RESTAURANT | REST FOOD</title>
	<link rel="icon" href="../assets/images/icono1.ico" type="image/x-icon">
	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="./css/normalize.css">
	<!-- Normalize V8.0.1 -->
	<link rel="stylesheet" href="./css/normalize.css">
	<!-- MDBootstrap V5 -->
	<link rel="stylesheet" href="./css/mdb.min.css">
	<!-- Font Awesome V5.15.1 -->
	<link rel="stylesheet" href="./css/all.css">
	<!-- Sweet Alert V10.13.0 -->
	<script src="./js/sweetalert2.js" ></script>
	<!-- General Styles -->
	<link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php include_once 'home/header.php' ?>
	<!-- Content -->
	<section class="container-cart ">
	    <div class="container container-web-page">
	        <h3 class="font-weight-bold poppins-regular text-uppercase">Carrito de compras</h3>
	        <hr>
	    </div>
	    <div class="container" style="padding-top: 40px;">
			<div class="row">
				<div class="col-12 col-md-7 col-lg-8">
					<div class="container-fluid">
						<?php 
							$total = 0; // Inicializa la variable total antes del bucle
							$totalConEnvio = 0; // Inicializa la variable totalConEnvio antes del bucle
							$costoEnvio = 0; // Inicializa la variable costoEnvio antes del bucle
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									$subtotal = $row['precio'] * $row['cantCar'];
									$total += $subtotal; // Agrega el subtotal al total
									$costoEnvio = 10.00; // Define el costo del envío
									$totalConEnvio = $total + $costoEnvio; // Calcula el total sumando el envío
						?>		
						<h5 class="poppins-regular font-weight-bold full-box text-center"><?php echo $row['nomProd']; ?></h5>
						<div class="bag-item full-box">
							<figure class="full-box">
								<img src="../admin/<?php echo $row['imagen1']; ?>" class="img-fluid" alt="platillo_nombre">
							</figure>
							<div class="full-box">
								<div class="container-fluid">
									<div class="row">
										<div class="col-12 col-lg-6 text-center mb-4">
											<div class="row justify-content-center">
												<div class="col-auto col-6">
													<div class="form-outline mb-4">
														<input type="text" value="<?php echo $row['cantCar']; ?>" class="form-control text-center" id="product_cant_<?php echo $row['codCar']; ?>" >
														<label for="product_cant_<?php echo $row['codCar']; ?>" class="form-label">Cantidad</label>
													</div>
												</div>
												<div class="col-auto">
													<button type="button" class="btn btn-success actualizar-cantidad" data-idcarrito="<?php echo $row['codCar']; ?>">
														<i class="fas fa-sync-alt fa-fw"></i>
													</button>
												</div>
											</div>
										</div>
										<div class="col-12 col-lg-4 text-center mb-4">
											<span class="poppins-regular font-weight-bold">SUBTOTAL: $<?php echo number_format($subtotal, 2); ?></span>
										</div>
										<div class="col-12 col-lg-2 text-center text-lg-end mb-4">
											<button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#eliminarProductoModal_<?php echo $row['codCar']; ?>">
												<span aria-hidden="true"><i class="far fa-trash-alt"></i></span>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="eliminarProductoModal_<?php echo $row['codCar']; ?>" tabindex="-1" aria-labelledby="eliminarProductoModalLabel_<?php echo $row['codCar']; ?>" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="eliminarProductoModalLabel_<?php echo $row['codCar']; ?>">Confirmar eliminación</h5>
										<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										¿Estás seguro de que deseas eliminar este producto del carrito?
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Cancelar</button>
										<button type="button" class="btn btn-danger delete-product-btn" data-idcarrito="<?php echo $row['codCar']; ?>">Eliminar</button>
									</div>
								</div>
							</div>
						</div>
						<hr>		
						<?php  
								} // Fin del bucle while
							} else {
								echo '
								<div class="container">
									<p class="text-center" ><i class="fas fa-shopping-bag fa-5x"></i></p>
									<h4 class="text-center poppins-regular font-weight-bold" >Carrito de compras vacío</h4>
								</div>';
							}
						?> 
					</div> 
				</div>
				<!-- Luego del bucle, muestra el total en la sección "Resumen de la orden" -->
				<div class="col-12 col-md-5 col-lg-4">
					<div class="full-box div-bordered">
						<h5 class="text-center text-uppercase bg-success" style="color: #FFF; padding: 10px 0;">Resumen de la orden</h5>
						<ul class="list-group bag-details">
							<a class="list-group-item d-flex justify-content-between align-items-center text-uppercase poppins-regular font-weight-bold">
								Subtotal
								<span>$<?php echo number_format($total, 2); ?></span>
							</a>
							<a class="list-group-item d-flex justify-content-between align-items-center text-uppercase poppins-regular font-weight-bold">
							<a class="list-group-item d-flex justify-content-between align-items-center text-uppercase poppins-regular font-weight-bold">
								Envío
								<span>$10.00</span>
							</a>
							</a>
							<a class="list-group-item d-flex justify-content-between align-items-center" style="border-bottom: 1px solid #E1E1E1;"></a>
							<a class="list-group-item d-flex justify-content-between align-items-center text-uppercase poppins-regular font-weight-bold">
								Total
								<span>$<?php echo number_format($totalConEnvio, 2); ?></span>
							</a>
						</ul>
						<form method="post" name="order_form">
							<input type="hidden" id="latitud" name="latitud" value="">
							<input type="hidden" id="longitud" name="longitud" value="">
    						<button type="submit" name="confirm_order" class="btn btn-primary" >Finalizar pedido</button>
						</form>
					</div>
				</div>
		    </div>
	    </div>
	</section>
	<?php include_once 'home/footer.php' ?>
	<script src="./js/mdb.min.js" ></script>
	<script src="./js/main.js" ></script>
	<script src="script.js"></script>
	  <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
	  <script src="../login/assets/template/admin/js/vendor/jquery.min.js"></script>
	<script src="../login/assets/template/admin/js/vendor/bootstrap.min.js"></script>
	<script src="../login/assets/template/admin/js/plugins.js"></script>
	<script src="../login/assets/template/admin/js/app.js"></script>
   <script src="../login/assets/template/admin/js/pages/login.js"></script>
</body>
</html>
<!-- Agrega los enlaces a las bibliotecas de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="script.js?v=281023"></script>
	<script>
	navigator.geolocation.getCurrentPosition(function(position) {
    const latitud = position.coords.latitude;
    const longitud = position.coords.longitude;
    // Actualiza los campos de entrada con las coordenadas
    document.getElementById('latitud').value = latitud;
    document.getElementById('longitud').value = longitud;
});
</script>