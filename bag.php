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
	<section class="container-cart ">
	    <div class="container container-web-page">
	        <h3 class="font-weight-bold poppins-regular text-uppercase">Carrito de compras</h3>
	        <hr>
	    </div>
	    <div class="container" style="padding-top: 40px;">
	        <div class="row">
	            <div class="col-12 col-md-7 col-lg-8">
	                <div class="container-fluid">
						<!-- Carrito vacio -->
						<div class="container">
							<p class="text-center" ><i class="fas fa-shopping-bag fa-5x"></i></p>
							<h4 class="text-center poppins-regular font-weight-bold" >Carrito de compras vacío</h4>
						</div> 
	                </div> 
	            </div>
	            <div class="col-12 col-md-5 col-lg-4">
	                <div class="full-box div-bordered">
	                    <h5 class="text-center text-uppercase bg-success" style="color: #FFF; padding: 10px 0;">Resumen de la orden</h5>
	                    <ul class="list-group bag-details">
	                        <a class="list-group-item d-flex justify-content-between align-items-center text-uppercase poppins-regular font-weight-bold">
	                            Subtotal
	                            <span>$0.00</span>
	                        </a>
	                        <a class="list-group-item d-flex justify-content-between align-items-center text-uppercase poppins-regular font-weight-bold">
	                            Envio
	                            <span>$10.00</span>
	                        </a>
	                        <a class="list-group-item d-flex justify-content-between align-items-center" style="border-bottom: 1px solid #E1E1E1;"></a>
	                        <a class="list-group-item d-flex justify-content-between align-items-center text-uppercase poppins-regular font-weight-bold">
	                            Total
	                            <span>$0.00</span>
	                        </a>
	                    </ul>
	                    <p class="text-center">
	                        <button type="button" class="btn btn-primary">Confirmar orden</button>
	                    </p>
	                </div>
	            </div>
	        </div>
	    </div> 
	</section>
	<!-- Footer -->
		<?php include_once 'sections/footer.php' ?>
	<!-- MDBootstrap V5 -->
	<script src="restaurant_main/js/mdb.min.js" ></script>
	<!-- General scripts -->
	<script src="restaurant_main/js/main.js" ></script>
</body>
</html>