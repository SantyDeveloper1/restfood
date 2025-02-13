<div id="sidebar">
    <!-- Wrapper for scrolling functionality -->    
    <div id="sidebar-scroll">
        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Brand -->
            <a href="./" class="sidebar-brand">
                <i class="fa fa-superpowers"></i>
                <span class="sidebar-nav-mini-hide"><strong><?php echo $template['nom_proyecto']?></strong>
            </span>
            </a>
            <!-- END Brand -->

            <!-- User Info -->
            <div class="sidebar-section sidebar-user clearfix sidebar-nav-mini-hide">
                <div class="sidebar-user-avatar">
                    <a href="#">
                        <img src="../<?php echo $img_user;?>" alt="avatar">
                     </a>
                </div>
                <div class="sidebar-user-name"><?php echo $nom_user;?></div>
                <div class="sidebar-user-links">
                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Profile"><i class="gi gi-user"></i></a>
                    <a href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="Messages"><i class="gi gi-envelope"></i></a>
                    <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                    <a href="javascript:void(0)" class="enable-tooltip" data-placement="bottom" title="Settings" onclick="$('#modal-user-settings').modal('show');"><i class="gi gi-cogwheel"></i></a>
                    <a href="../lib/PHP_cerrar.php" data-toggle="tooltip" data-placement="bottom" title="Cerrar Sesion"><i class="gi gi-exit"></i></a>
                </div>
            </div>
            <!-- END User Info -->

            <!-- Sidebar Navigation -->
            <ul class="sidebar-nav">
                <li>
                    <a href="./" class="">                    
                        <i class="fa fa-home sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Inicio</span>
                    </a>
                </li>
                <li class="sidebar-header">
                     <span class="sidebar-header-title">MENU</span>
                </li>
  
                <li>
                    <a href="productos.php" class="">                    
                        <i class="fa fa-book sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Productos</span>
                    </a>
                </li> 

                <li>
                    <a href="pedidos.php" class="notification-link">
                        <i class="fa fa-shopping-cart sidebar-nav-icon"></i>
                        <span class="sidebar-nav-mini-hide">Pedidos</span>
                        <?php
                        // Realiza una consulta SQL para contar los pedidos
                    $sql = "SELECT COUNT(*) AS numPedidos FROM pedido WHERE estado IN (1, 2)";
                    $resultado = $conector->query($sql);

                    if ($resultado) {
                        $fila = $resultado->fetch_assoc();
                        $numPedidos = $fila['numPedidos'];

                        // Muestra la notificación solo si hay pedidos
                        if ($numPedidos > 0) {
                            echo '<span class="label label-danger">' . $numPedidos . '</span>';
                        }
                    } else {
                        // Manejo de errores si la consulta falla
                        echo 'Error en la consulta: ' . $conector->error;
                    }
                        ?>
                    </a>
                </li>

                <li>
                    <a href="categorias.php" class="">                    
                        <i class="fa fa-align-justify"></i>
                        <span class="sidebar-nav-mini-hide">Categorias</span>
                    </a>
                </li>
                           
            </ul>
            <!-- END Sidebar Navigation -->
        </div>
                        <!-- END Sidebar Content -->
     </div>    <!-- END Wrapper for scrolling functionality -->
</div>