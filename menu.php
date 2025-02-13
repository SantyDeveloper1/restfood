
<?php
    //@session_start();
    error_reporting(0);
    include_once 'admin/conexion/conectar.php';
    include_once 'functions.php';
    include_once 'config.php';  
	
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
	    <h3 class="font-weight-bold poppins-regular text-uppercase">Menú de platillos</h3>
	    <p class="text-justify">Bienvenido al menú de platillos, acá encontrara todos los platillos disponibles en el restaurante. Puede ordenar los platillos por categoría en el botón "<i class="fas fa-hamburger fa-fw"></i> CATEGORIA" y también ordenarlos por orden alfabético o por precio en el botón "<i class="fas fa-sort-alpha-down fa-fw"></i> ORDENAR POR". </p>

	    <div class="container-fluid" style="border-top: 1px solid #E1E1E1; padding: 20px; 0">
	        <div class="row align-items-center">
			    <div class="col-12 col-sm-4 text-center text-sm-start">
                    <div class="dropdown">
                        <button class="btn btn-link dropdown-toggle" type="button" id="categorySubMenu" data-mdb-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-hamburger fa-fw"></i> &nbsp; Categorias
                        </button>
                            <div class="dropdown-menu" aria-labelledby="categorySubMenu">
                                <a class="dropdown-item" href="?categoria=todos">Mostrar Todos</a> <!-- Opción para mostrar todos los productos -->
                                <?php
                      			$sql = "SELECT * FROM categoria";
            					$consulta = $conector->query($sql);
            					while ($fila = $consulta->fetch_array()) {
                					echo '<a class="dropdown-item" href="?categoria=' . $fila['codCateg'] . '">' . $fila['nomCateg'] . '</a>';
            					}
            					?>
        					</div>
    					</div>
					</div>
				
					<div class="col-12 col-sm-4 text-center">
					<!--<button type="button" class="btn btn-link" data-mdb-toggle="modal" data-mdb-target="#saucerModal">
						<i class="fas fa-search fa-fw"></i> &nbsp; Buscar
					</button>-->
					<h3 class="font-weight-bold poppins-regular text-uppercase">PEDIDOS ONLINE</h3>
				</div>

				<?php
        		include_once 'controller_productos.php';
       			 ?>

				<div class="col-12 col-sm-4 text-center text-sm-end">
    				<div class="dropdown">
        				<button class="btn btn-link dropdown-toggle" type="button" id="OrderSubMenu" data-mdb-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            				<i class="fas fa-sort-alpha-down fa-fw"></i> &nbsp; Ordenar por
        				</button>
						<div class="dropdown-menu" aria-labelledby="OrderSubMenu">
							<a class="dropdown-item" href="?categoria=<?php echo $categoriaSeleccionada; ?>&orden=asc">Ascendente (A-Z)</a>
							<a class="dropdown-item" href="?categoria=<?php echo $categoriaSeleccionada; ?>&orden=desc">Descendente (Z-A)</a>
							<a class="dropdown-item" href="?categoria=<?php echo $categoriaSeleccionada; ?>&orden=menor">Precio (Menor a Mayor)</a>
							<a class="dropdown-item" href="?categoria=<?php echo $categoriaSeleccionada; ?>&orden=mayor">Precio (Mayor a Menor)</a>
						</div>
    				</div>
				</div>
	        </div>
	    </div>

	    <!--<div class="container-fluid" style="padding: 20px 0;">
	        <div class="row">
	            <div class="col-12 col-md-8">
	                <p class="text-left lead"><i class="fas fa-search fa-fw"></i> &nbsp; Resultados de la búsqueda: <span class="font-weight-bold poppins-regular text-uppercase">Platillo</span></p>
	            </div>
	            <div class="col-12 col-md-4">
	                <button type="button" class="btn btn-danger">
	                    <i class="fas fa-times fa-fw"></i> &nbsp; Eliminar busqueda
	                </button>
	            </div>
	        </div>
	    </div>-->

			<div class="container-cards full-box" style="padding-bottom: 40px;">
		<?php
		if ($consulta->num_rows > 0) {
			while ($row = $consulta->fetch_assoc()) {
				if ($row['estProd'] == 1) { // Verifica el estado del producto
					$imagenUrl = !empty($row['imagen1']) ? $row['imagen1'] : 'assets/img/noimagen.jpg'; // Cambia 'ruta' a la URL de tu imagen por defecto
					?>
					<div class="card shadow-1-strong">
					<img class="card-img-top" src="admin/<?php echo $imagenUrl; ?>" alt="<?php echo $row['nomProd']; ?>">
						<div class="card-body text-center">
							<h5 class="card-title font-weight-bold"><?php echo $row['nomProd']; ?></h5>
							<p class="card-text lead"><span class="badge bg-rosado"><?php echo '$' . $row['precio'] . ' USD'; ?></span></p>
						</div>
						<div class="card-body text-center">
						<a  href="login.php" class="btn btn-success btn-sm agregar-al-carrito" data-id="<?php echo $row['idProd']; ?>"><i class="fas fa-shopping-bag fa-fw"></i> &nbsp; Agregar</a>

							&nbsp; &nbsp;
							<a href="details.php?id=<?php echo $row['idProd']; ?>" class="btn btn-info btn-sm"><i class="fas fa-utensils fa-fw"></i> &nbsp; Detalles</a>
						</div>
					</div>
					<?php
				}
			}
		} else {
			echo '<div class="alert alert-warning">No se encontraron productos.</div>';
		}
		?>
	</div>


		<nav aria-label="Navegación de páginas">
			<ul class="pagination justify-content-center">
				<li class="page-item">
					<a class="page-link" href="?categoria=<?php echo $categoriaSeleccionada; ?>&pagina=<?php echo $paginaActual - 1; ?>">Anterior</a>
				</li>
				<?php
				// Calcular el número total de páginas para la categoría seleccionada
				$sqlTotal = $categoriaSeleccionada === 'todos' ? "SELECT COUNT(*) as total FROM producto" : "SELECT COUNT(*) as total FROM producto WHERE codCateg = '$categoriaSeleccionada'";
				$resultadoTotal = $conector->query($sqlTotal);
				$totalItems = $resultadoTotal->fetch_assoc()['total'];
				$totalPaginas = ceil($totalItems / $itemsPorPagina);

				for ($i = 1; $i <= $totalPaginas; $i++) {
					echo '<li class="page-item';
					if ($i == $paginaActual) {
						echo ' active';
					}
					echo '"><a class="page-link" href="?categoria=' . $categoriaSeleccionada . '&pagina=' . $i . '">' . $i . '</a></li>';
				}
				?>
				<li class="page-item">
					<a class="page-link" href="?categoria=<?php echo $categoriaSeleccionada; ?>&pagina=<?php echo $paginaActual + 1; ?>">Siguiente</a>
				</li>
			</ul>
		</nav>
		
	</div>

	<!-- Footer -->
	<?php include_once 'sections/footer.php' ?>

	<!-- MDBootstrap V5 -->
	<script src="restaurant_main/js/mdb.min.js" ></script>

	<!-- General scripts -->
	<script src="restaurant_main/js/main.js" ></script>
</body>
</html>