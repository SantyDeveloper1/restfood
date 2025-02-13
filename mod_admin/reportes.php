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
                                        <h1>Menu <strong>Reportes</strong><br><small></small></h1>
                                    </div>
                                    <!-- END Main Title -->

                                    <!-- Top Stats -->
                                    <div class="col-md-8 col-lg-6">
                                        <div class="row text-center">
                                            <!--<div class="col-xs-4 col-sm-3">
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
                                            </div>-->
                                            <div class="col-xs-2 col-sm-8">
                                                <h2 class="animation-hatch">
                                                    <strong><?php echo date('d/m/Y'); ?></strong><br>
                                                    <small><i class="fa fa-calendar-o"></i> Fecha Actual</small>
                                                </h2>
                                            </div>
                                            <!-- We hide the last stat to fit the other 3 on small devices -->
                                            
                                        </div>
                                    </div>
                                    <!-- END Top Stats -->
                                </div>
                            </div>
                            <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
                            <img src="img/placeholders/headers/dashboard_header.jpg" alt="header image" class="animation-pulseSlow">
                        </div>
                        <!-- END Dashboard Header -->

                        <!-- Mini Top Stats Row -->
                        <div class="row">
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a href="reporte/listar_productos_mas_venta.php" class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                                        <i class="fa fa-line-chart" aria-hidden="true"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                            Relacion de <strong>Productos Top 5</strong><br>
                                            <small>General</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a href="reporte/listar_clientes.php" class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                            Relacion de <strong>Usuarios</strong><br>
                                            <small>General</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a href="#" data-toggle="modal" data-target="#modal-report-user" class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                                        <i class="fa fa-area-chart" aria-hidden="true"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                            Relacion de <strong>Usuarios</strong><br>
                                            <small>por fechas</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <!-- Widget -->
                                <a href="reporte/listar_pedidos.php" class="widget widget-hover-effect1">
                                    <div class="widget-simple">
                                        <div class="widget-icon pull-left themed-background-autumn animation-fadeIn">
                                        <i class="fa fa-bar-chart" aria-hidden="true"></i>
                                        </div>
                                        <h3 class="widget-content text-right animation-pullDown">
                                            Relacion de <strong>Pedidos</strong><br>
                                            <small>Entregados</small>
                                        </h3>
                                    </div>
                                </a>
                                <!-- END Widget -->
                            </div>
                        </div>
                        <!-- END Mini Top Stats Row -->

                    </div>
                    <!-- END Page Content -->
                    <div id="modal-report-user" class="modal fade" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title text-center text-danger">Reporte de Usuarios por Fechas<h2>
                                </div>
                                <div class="modal-body">
                                    <form action="reporte/listar_clientes_fecha.php" method="POST" class="form-horizontal form-bordered">
                                        <div class="form-group"> 
                                            <div class="col-md-12 text-center">
                                                <input type="date" name="fecha"  class="form-control">
                                                <small class="control-label label-sm">Seleccione Fecha de Reporte</small>
                                            </div>  
                                        </div>
                                        <div class="form-group form-actions">
                                            <div class="col-md-12 text-center">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Exportar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>                                
                            </div>
                        </div>
                    </div>
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
        <script src="js/script.js"></script>       
<?php include_once 'sections/t_fin.php';?>