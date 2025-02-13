<?php 
    @session_start();
    include_once '../lib/config.php';
    include_once '../lib/functions.php';
    include_once '../admin/conexion/conectar.php';
    if(!empty($_SESSION['codCli'])){
       //$priv_user = $_SESSION['priUsu'];
       $id_user = $_SESSION['codCli'];
	   
       /*if($id_user <> 1){
            redireccionar2("../");
       }*/
       $sql = "SELECT *FROM cliente WHERE codCli='".$id_user."' AND estCli=1";
       $consulta = $conector->query($sql);
       while($fila = $consulta->fetch_array()){
            $nom_user = $fila['nomCli'];
            $img_user = $fila['imgCli'];
            $app_user = $fila['appCli'];
            $apm_user = $fila['apmCli'];
            $cel_cli = $fila['celCli'];
            $dni_cli = $fila['dni'];
       }
    }else{
        redireccionar2("../");
    }
    $codCli = $_SESSION['codCli'];
    // Consulta para contar la cantidad de productos en el carrito del usuario
    $sql_contar_carrito = "SELECT COUNT(*) as cantidad FROM carrito WHERE codCli = '$codCli'";
    $resultado_contar_carrito = $conector->query($sql_contar_carrito);
    $fila_contar_carrito = $resultado_contar_carrito->fetch_assoc();
    $cantidad_en_carrito = $fila_contar_carrito['cantidad'];

?>
    <header class="header full-box" style="background-color: #6281F7;">
	    <div class="header-brand text-center full-box">
	        <a href="index.php">
	            <img src="./assets/img/logo.png" alt="logo" class="img-fluid">
	        </a>
	    </div>
	    <div class="header-options full-box" >
	        <nav class="header-navbar full-box poppins-regular font-weight-bold" >
	            <ul class="list-unstyled full-box">
	                <li>
	                    <a href="index.php" >Inicio<span class="full-box" ></span></a>
	                </li>
	                <li>
	                    <a href="menu.php" >Menú<span class="full-box" ></span></a>
	                </li>
	            </ul>
	        </nav>
	        <div class="header-button full-box text-center btn-login-menu" >
	            <i class="fas fa-user-check" onclick="show_popup_login()" data-mdb-toggle="tooltip" data-mdb-placement="bottom" title="Login" ></i>
	            <div class="div-bordered popup-login">
	                <!-- Cerrar sesion -->
					<div class="text-center full-box">
    					<img src="../<?php echo $img_user; ?>" alt="Imagen de usuario" class="img-fluid rounded-circle border border-5 border-primary" style="width: 100px; height: 100px;">
					</div>
	                <span class="poppins-regular font-weight-bold"><?php echo $nom_user . ' ' . $app_user; ?></span>
	                <div class="text-center full-box">
					<a href="#" class="btn btn-info btn-sm w-100" data-toggle="modal" data-target="#modal-perfil">
                        <i class="fas fa-user-cog fa-fw"></i> &nbsp; Mi cuenta
                    </a>
	                </div>
	                <div class="text-center full-box">
	                    <a href="#" class="btn btn-raised btn-primary btn-sm w-100" data-toggle="modal" data-target="#modal-estado">
                            <i class="fab fa-dashcube fa-fw"></i> &nbsp; Estado del Pedido</a>
	                </div>
	                <form class="full-box" action="../lib/PHP_cerrar.php">
	                    <button  class="btn btn-danger btn-sm w-100" ><i class="fas fa-door-open fa-fw"></i> &nbsp; Cerrar sesión</button>
	                </form>
	                
	            </div>
	        </div>
	        <!-- El enlace al carrito con el ícono y el contador -->
            <a href="bag.php" class="header-button full-box text-center" data-mdb-toggle="tooltip" data-mdb-placement="bottom" title="Carrito">
                <i class="fas fa-shopping-bag"></i>
                <span class="badge bg-warning rounded-pill bag-count"><?php echo $cantidad_en_carrito; ?></span>
            </a>
	    </div>
	</header>
	<!-- MODAL PARA ACTUALIZAR EL PERFIL -->
	<div id="modal-perfil" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-center text-danger">Actualizar Perfil de Usuario<h2>
                </div>
                <div class="modal-body">
                    <form id="form_perfil" class="form-horizontal form-bordered">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <input type="file" name="foto"  class="form-control" accept="image/jpg, image/png, image/gif, image/jpeg" >
                                <small class="control-label label-sm">Foto de Perfil</small>
                            </div>                                           
                            <div class="col-md-4 text-center">
                                <input type="text" name="nom" value="<?php echo $nom_user;?>" class="form-control" placeholder="Nombre del Usuario">
                                <small class="control-label label-sm">Nombres</small>
                            </div>
                            <div class="col-md-4 text-center">
                                <input type="text" name="app" value="<?php echo $app_user;?>" class="form-control" placeholder="Apellido Paterno">
                                <small class="control-label label-sm">Apellido Parterno</small>
                            </div>
                            <div class="col-md-4 text-center">
                                <input type="text" name="apm" value="<?php echo $apm_user;?>" class="form-control" placeholder="Apellido Materno">
                                <small class="control-label label-sm">Apellido Marterno</small>
                            </div>
                            <div class="col-md-4 text-center">
                                <input type="text" name="dni" value="<?php echo $dni_cli;?>" class="form-control" placeholder="Numero de DNI">
                                <small class="control-label label-sm">Numero de DNI</small>
                            </div>
							<div class="col-md-4 text-center">
                                <input type="text" name="cel" value="<?php echo $cel_cli;?>" class="form-control" placeholder="Numero de celular">
                                <small class="control-label label-sm">Numero de celular</small>
                            </div>
                        </div>
                        <div class="col-md-12" id="div_perfil"></div>
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
    <!-- MODAL PARA VER EL ESTADO DEL CLIENTE -->
    <div id="modal-estado" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title text-center text-danger">Estado de tu Pedido</h2>
                </div>
                <div class="modal-body">
                    <!-- Aquí puedes mostrar la información del estado del pedido -->
                    <div class="form-group">
                        <div class="col-md-10 text-center">
                            <small class="control-label label-sm">
                                <?php
                                // Realiza una consulta para obtener los estados de los pedidos
                                $sql_pedidos = "SELECT estado FROM pedido WHERE codCli = '$codCli'";
                                $resultado_pedidos = $conector->query($sql_pedidos);

                                // Variable para rastrear si hay al menos un pedido en proceso o sin confirmar
                                $pedidoEnProceso = false;

                                if ($resultado_pedidos->num_rows > 0) {
                                    while ($fila_pedido = $resultado_pedidos->fetch_assoc()) {
                                        $estado_pedido = $fila_pedido['estado'];

                                        // Define etiquetas o mensajes según el estado con clases CSS
                                        if ($estado_pedido == 1 || $estado_pedido == 2) {
                                            $pedidoEnProceso = true;
                                            echo '<p style="font-size: 24px;"><strong>Estado actual del pedido:</strong> ';

                                            if ($estado_pedido == 1) {
                                                echo '<label class="label label-danger" style="background-color: red; font-size: 24px;"><i class="fa fa-times"></i> Sin Confirmar</label>';
                                            } elseif ($estado_pedido == 2) {
                                                echo '<label class="label label-success" style="background-color: blue; font-size: 24px;"><i class="fa fa-check"></i> En Proceso</label>';
                                            }

                                            echo '</p>';
                                        }
                                    }
                                }
                                // Si no se encontró ningún pedido en proceso o sin confirmar, muestra el mensaje predeterminado
                                if (!$pedidoEnProceso) {
                                    echo '<p><strong>No has realizado ningún pedido.</strong></p>';
                                }
                                ?>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
	<!-- Agrega los enlaces a las bibliotecas de Bootstrap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="script.js"></script> 