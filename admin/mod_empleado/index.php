<?php include_once 'sections/t_inicio.php';?>    
    <body>
        <!-- Page Wrapper -->
        <div id="page-wrapper">
            <!-- Preloader -->
            <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
            <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
            <div class="preloader themed-background">
                <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
                <div class="inner">
                    <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
                    <div class="preloader-spinner hidden-lt-ie10"></div>
                </div>
            </div>
            <!-- END Preloader -->
            <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
               
                <!-- Main Sidebar MENU-->
                <?php include_once 'sections/menu.php';?>
                <!-- END Main Sidebar -->

                <!-- Main Container -->
                <div id="main-container">
                    <!-- Header -->
                    <?php include_once 'sections/header.php';?>
                    <!-- END Header -->

                    <!-- Page content -->
                    <div id="page-content">
                        <!-- Dashboard Header -->
                        <!-- For an image header add the class 'content-header-media' and an image as in the following example -->
                        <div class="content-header content-header-media">
                            <div class="header-section">
                                <div class="row">
                                    <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                        <h1>Bienvenido <strong>Usuario</strong><br><small>You Look Awesome!</small></h1>
                                    </div>
                                    <!-- END Main Title -->

                                    <!-- Top Stats -->
                                    <!--<div class="col-md-8 col-lg-6">
                                        <div class="row text-center">
                                            <div class="col-xs-4 col-sm-3">
                                                <h2 class="animation-hatch">
                                                    $<strong>93.7k</strong><br>
                                                    <small><i class="fa fa-thumbs-o-up"></i> Great</small>
                                                </h2>
                                            </div>
                                            <div class="col-xs-4 col-sm-3">
                                                <h2 class="animation-hatch">
                                                    <strong>167k</strong><br>
                                                    <small><i class="fa fa-heart-o"></i> Likes</small>
                                                </h2>
                                            </div>
                                            <div class="col-xs-4 col-sm-3">
                                                <h2 class="animation-hatch">
                                                    <strong>101</strong><br>
                                                    <small><i class="fa fa-calendar-o"></i> Events</small>
                                                </h2>
                                            </div>
                                           
                                            <div class="col-sm-3 hidden-xs">
                                                <h2 class="animation-hatch">
                                                    <strong>27&deg; C</strong><br>
                                                    <small><i class="fa fa-map-marker"></i> Sydney</small>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>-->
                                    <!-- END Top Stats -->
                                </div>
                            </div>
                            <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
                            <!--<img src="../img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">-->
                        </div>
                        <!-- END Dashboard Header -->

                        <!-- Mini Top Stats Row -->
                        <div class="row">
                            
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a href="./" class="widget widget-hover-effect1">
                                    <div class="widget-simple" style="background-color: #32F481;"> <!-- Cambiando el fondo al color #32F481 -->
                                        <h3 class="box-title"><strong>Usuarios</strong></h3>
                                        <div class="widget-icon pull-left themed-background-spring animation-fadeIn">
                                            <i class="fa fa-users"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                            <?php
                                                $sql = "SELECT * FROM usuario WHERE priUsu=1";
                                                $consulta = $conector->query($sql);
                                                $total_user = $consulta->num_rows;
                                            ?>
                                                <strong><?php echo $total_user;?></strong><br>
                                            <small>Usuarios Registrados</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>

                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a href="./" class="widget widget-hover-effect1">
                                    <div class="widget-simple"style="background-color: #E532F4;"> <!-- Cambiando el fondo al color #32F481 -->
                                        <h3 class="box-title"><strong> Motoqueros</strong></h3>
                                        <div class="widget-icon pull-left themed-background-fire animation-fadeIn">
                                            <i class="fa fa-motorcycle"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                        <?php
                                                $sql = "SELECT * FROM usuario where  priUsu=2";
                                                $consulta = $conector->query($sql);
                                                $total_user = $consulta->num_rows;
                                            ?>
                                                <strong><?php echo $total_user;?></strong><br>
                                            <small>Motoqueros Registrados</small>
                                        </h3>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a href="./" class="widget widget-hover-effect1">
                                    <div class="widget-simple "style="background-color: #E6EE47;"> <!-- Cambiando el fondo al color #32F481 -->
                                        <h3 class="box-title"><strong> Clientes</strong></h3>
                                        <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                                            <i class="fa fa-user-circle-o"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                        <?php
                                                $sql = "SELECT * FROM cliente";
                                                $consulta = $conector->query($sql);
                                                $total_user = $consulta->num_rows;
                                            ?>
                                                <strong><?php echo $total_user;?></strong><br>
                                            <small>Clientes Registrados</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                            <div class="col-sm-6 col-lg-3 ">
                                <!-- Widget -->
                                <a href="productos.php" class="widget widget-hover-effect1">
                                    <div class="widget-simple "style="background-color: #EE47B6;"> <!-- Cambiando el fondo al color #32F481 -->
                                        <h3 class="box-title"><strong>Productos</strong></h3>
                                        <div class="widget-icon pull-left themed-background animation-fadeIn">
                                            <i class="fa fa-cutlery"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                        <?php
                                                $sql = "SELECT * FROM producto";
                                                $consulta = $conector->query($sql);
                                                $total_user = $consulta->num_rows;
                                            ?>
                                                <strong><?php echo $total_user;?></strong><br>
                                            <small>Productos Registrados</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                            <div class="col-sm-6 col-lg-3 ">
                                <!-- Widget -->
                                <a href="pedidos.php" class="widget widget-hover-effect1">
                                    <div class="widget-simple "style="background-color: #0D7806;"> <!-- Cambiando el fondo al color #32F481 -->
                                        <h3 class="box-title"><strong>Pedidos</strong></h3>
                                        <div class="widget-icon pull-left themed-background animation-fadeIn">
                                            <i class="fa fa-cutlery"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                        <?php
                                                $sql = "SELECT * FROM pedido WHERE estado = 3";
                                                $consulta = $conector->query($sql);
                                                $total_user = $consulta->num_rows;
                                            ?>
                                                <strong><?php echo $total_user;?></strong><br>
                                            <small>Pedido Realizados</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a href="categorias.php" class="widget widget-hover-effect1">
                                    <div class="widget-simple "style="background-color: #EE7247;"> <!-- Cambiando el fondo al color #32F481 -->
                                        <h3 class="box-title"><strong>Categoria</strong></h3>
                                        <div class="widget-icon pull-left themed-background-amethyst animation-fadeIn">
                                            <i class="fa fa-align-justify"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                        <?php
                                                $sql = "SELECT * FROM categoria";
                                                $consulta = $conector->query($sql);
                                                $total_user = $consulta->num_rows;
                                            ?>
                                                <strong><?php echo $total_user;?></strong><br>
                                            <small>Categorias Registrados</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                            
                        </div>
                        <!-- END Mini Top Stats Row -->

                        
                    <!-- END Page Content -->

                    <!-- Footer -->
                    <?php include_once 'sections/footer.php';?>                           
                    <!-- END Footer -->
                </div>
                <!-- END Main Container -->
            </div>
            <!-- END Page Container -->
        </div>
        <!-- END Page Wrapper -->

        <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>
        <?php include_once 'sections/script.php';?> 
        <script src="js/script.js?v=180823"></script>       
<?php include_once 'sections/t_fin.php';?>