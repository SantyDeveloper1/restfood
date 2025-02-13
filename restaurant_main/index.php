<?php 
    @session_start();
    include_once '../lib/config.php';
    include_once '../lib/functions.php';
    include_once '../admin/conexion/conectar.php';
	// Verificar si el cliente ha iniciado sesión
if (!isset($_SESSION['codCli'])) {
    // El cliente no ha iniciado sesión, redirigir a la página de inicio de sesión
    redireccionar2("../login.php");
    exit; // Importante: asegúrate de salir del script después de la redirección
}
    if(!empty($_SESSION['codCli'])){
       //$priv_user = $_SESSION['priUsu'];
       $id_user = $_SESSION['codCli'];
       $sql = "SELECT *FROM cliente WHERE codCli='".$id_user."' AND estCli=1";
       $consulta = $conector->query($sql);
       while($fila = $consulta->fetch_array()){
            $nom_user = $fila['nomCli'];
            $img_user = $fila['imgCli'];
            $app_user = $fila['appCli'];
            $apm_user = $fila['apmCli'];
       }
    }else{
        redireccionar2("../");
    }
	// Consulta para obtener los productos con precio menor a 20
		$sql_productos_populares = "SELECT * FROM producto WHERE precio < 20 AND estProd = 1";
		$resultado_productos_populares = $conector->query($sql_productos_populares);
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
	<link rel="stylesheet" href="./css/custom.css">
</head>
<body>
	<!-- Header -->
	<?php include_once 'home/header.php' ?>
	<!-- Content -->
	<div class="banner">
	    <div class="banner-body">
	        <h3 class="text-uppercase">Bienvenido a RESTAURANTE</h3>
	        <p>Los mejores platillos y la mejor calidad los encuentras en RESTAURANTE</p>
	        <a href="menu.php" class="btn btn-warning"><i class="fas fa-hamburger fa-fw"></i> &nbsp; Ir al menu</a>
	    </div>
	</div>
	<div class="container container-web-page">
	    <h3 class="text-center text-uppercase poppins-regular font-weight-bold">Nuestros servicios</h3>
	    <br>
	    <div class="row">
	        <div class="col-12 col-sm-6 col-md-4">
	            <p class="text-center"><i class="fas fa-shipping-fast fa-5x"></i></p>
	            <h5 class="text-center text-uppercase poppins-regular font-weight-bold">Envíos a domicilio</h5>
	            <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione ad possimus modi repellendus? Expedita, vitae rerum at aliquam eligendi soluta veniam ut dolor facere fugiat quod, maxime ad accusamus quisquam.</p>
	        </div>
	        <div class="col-12 col-sm-6 col-md-4">
	            <p class="text-center"><i class="fas fa-utensils fa-5x"></i></p>
	            <h5 class="text-center text-uppercase poppins-regular font-weight-bold">Ventas al por mayor</h5>
	            <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione ad possimus modi repellendus? Expedita, vitae rerum at aliquam eligendi soluta veniam ut dolor facere fugiat quod, maxime ad accusamus quisquam.</p>
	        </div>
	        <div class="col-12 col-sm-6 col-md-4">
	            <p class="text-center"><i class="fas fa-store-alt fa-5x"></i></p>
	            <h5 class="text-center text-uppercase poppins-regular font-weight-bold">Reservaciones de local</h5>
	            <p class="text-center">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ratione ad possimus modi repellendus? Expedita, vitae rerum at aliquam eligendi soluta veniam ut dolor facere fugiat quod, maxime ad accusamus quisquam.</p>
	        </div>
	    </div>
	</div>
	<hr>
	<div class="container-fluid container-web-page">
	    <h3 class="text-center text-uppercase poppins-regular font-weight-bold">Nuestros platillos más populares</h3>
	    <div class="container-cards full-box">
    <?php
    $productos_mostrados = 0; // Variable para contar los productos mostrados
    while ($productos_mostrados < 6 && ($fila_producto = $resultado_productos_populares->fetch_array())) {
        ?>
        <div class="card shadow-1-strong">
            <img class="card-img-top" src="../admin/<?php echo $fila_producto['imagen1']; ?>" alt="<?php echo $fila_producto['nomProd']; ?>">
            <div class="card-body text-center">
                <h5 class="card-title font-weight-bold"><?php echo $fila_producto['nomProd']; ?></h5>
                <p class="card-text lead"><span class="badge bg-rosado">$<?php echo $fila_producto['precio']; ?> USD</span></p>
            </div>
            <div class="card-body text-center">
			<button type="button" class="btn btn-success btn-sm agregar-al-carrito" data-id="<?php echo $fila_producto['idProd']; ?>"><i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar</button>
                &nbsp; &nbsp;
                <a href="details.php?id=<?php echo $fila_producto['idProd']; ?>" class="btn btn-info btn-sm"><i class="fas fa-utensils fa-fw"></i> &nbsp; Detalles</a>
            </div>
        </div>
        <?php
        $productos_mostrados++; // Incrementa el contador de productos mostrados
    }
    ?>
</div>
    </div>
	    <br>
	    <p class="text-center"><a href="menu.php" class="btn btn-primary"><i class="fas fa-hamburger fa-fw"></i> &nbsp; Ir al menu</a></p>
	</div>
	<hr>
	<?php include_once 'home/footer.php' ?>
	<script src="./js/mdb.min.js" ></script>
	<script src="./js/main.js" ></script>
<link rel="stylesheet" href="sweetAlert/sweetalert2.min.css">
<script src="sweetAlert/sweetalert2.all.min.js"></script>
	<script src="agregar_carrito.js?v=50923" ></script>
</body>
</html>