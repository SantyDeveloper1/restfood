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
                        <div class="content-header">
                            <div class="header-section">
                                <div class="row">
                                    <!-- Main Title (hidden on small devices for the statistics to fit) -->
                                    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
                                        <h1>Menu de <strong>Productos</strong></h1>
                                    </div>
                                    <!-- END Main Title -->

                                    <!-- Top Stats -->
                                    <div class="col-md-8 col-lg-6">
                                        <div class="row text-center">
                                            <div class="col-xs-4 col-sm-3">
                                                <h2 class="animation-hatch">
                                                    <?php
                                                        $sql = "SELECT * FROM producto";
                                                        $consulta = $conector->query($sql);
                                                        $total_user = $consulta->num_rows;
                                                    ?>
                                                    <strong><?php echo $total_user;?></strong><br>
                                                    <small><i class="fa fa-cutlery"></i> 
                                                    productos</small>
                                                </h2>
                                            </div>
                                            
                                            <div class="col-xs-2 col-sm-8">
                                                <h2 class="animation-hatch">
                                                    <strong><?php echo date('d/m/Y'); ?></strong><br>
                                                    <small><i class="fa fa-calendar-o"></i> Fecha Actual</small>
                                                </h2>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <!-- END Top Stats -->
                                </div>
                            </div>
                            <!-- For best results use an image with a resolution of 2560x248 pixels (You can also use a blurred image with ratio 10:1 - eg: 1000x100 pixels - it will adjust and look great!) -->
                            
                        </div>
                        <!-- END Dashboard Header -->
                        <div class="row">
                                <div class="col-md-12">
                                    <div class="block">
                                        <div class="block-title">
                                            <div class="block-options pull-right">
                                            <a href="#" class="btn btn-alt btn-sm btn-primary" 
                                                data-toggle="modal" data-target="#modal-InsertProductos" 
                                                title="Nuevo Registro Producto">
                                             <i  class="fa fa-plus"></i> Nuevo
                                             </a>
                                            </div>
                                            <h2><strong>Productos</strong> Registrados</h2>
                                        </div>
                                         <div class="block-body">
                                            <div class="outer_div_productos"></div><!-- Datos ajax Final -->
                                        </div>
                                    </div>
                                </div> 
                        </div>
                        <div id="modal-InsertProductos" class="modal fade" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title text-center text-danger">Inserta Nuevo Usuario<h2>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_Inser_producto" class="form-horizontal form-bordered">
                                            <div class="form-group">  
                                                <div class="col-md-12 text-center">
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Imagen 1</b></small>
                                                    <input type="file" name="imagen1"  class="form-control" id="imagen1" accept="image/jpg, image/png, image/gif, image/jpeg" >
                                                </div>
                                                <div class="col-md-6 text-center">
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Imagen 2</b></small>
                                                    <input type="file" name="imagen2"  class="form-control" id="imagen2" accept="image/jpg, image/png, image/gif, image/jpeg" >
                                                </div>  
                                                <div class="col-md-6 text-center">
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Imagen 3</b></small>
                                                    <input type="file" name="imagen3"  class="form-control" id="imagen3" accept="image/jpg, image/png, image/gif, image/jpeg" >
                                                </div>                                                                                          
                                                <div class="col-md-4 text-center">
                                                    <input type="hidden" name="id" id="id" >
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Nombres del producto</b></small>
                                                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Nombre del Producto">
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Descripcion</b></small>
                                                    <input type="text" name="des" class="form-control" id="des" placeholder="Descripcion">
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Precio</b></small>
                                                    <input type="text" name="precio" class="form-control" id="precio" placeholder="precio">
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Stock</b></small>
                                                    <input type="text" name="stock" class="form-control" id="stock" placeholder="Stock">
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Stock minimo</b></small>
                                                    <input type="text" name="stock_minimo" class="form-control" id="stock_minimo" placeholder="Stock minimo">
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group form-check">
                                                        <input type="checkbox" name="estado" id="estado" class="border border-success form-check-input" >
                                                        <label class="form-check-label" for="exampleCheck1">Estado</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Seleccione la Categoria</b></small>
                                                    <select name="categ" class="form-control">
                                                        <option value="">Seleccione</option>
                                                        <option value="1">Desayuno</option>
                                                        <option value="2">Almuerzo</option>
                                                        <option value="3">cena</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="div_insert_producto"></div>
                                            <div class="form-group form-actions">
                                                <div class="col-md-12 text-center">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                        <div id="modal-UpdateProducto" class="modal fade" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title text-center text-danger">Inserta Nuevo Usuario<h2>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_Upd_Producto" class="form-horizontal form-bordered">
                                            <div class="form-group">  
                                                <div class="col-md-12 text-center">
                                                
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Imagen 1</b></small>
                                                    <input type="hidden" name="id" id="id">
                                                    <input type="file" name="imagen1"  class="form-control" id="imagen1" accept="image/jpg, image/png, image/gif, image/jpeg" >
                                                </div>
                                                <div class="col-md-6 text-center">
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Imagen 2</b></small>
                                                    <input type="file" name="imagen2"  class="form-control" id="imagen2" accept="image/jpg, image/png, image/gif, image/jpeg" >
                                                </div>  
                                                <div class="col-md-6 text-center">
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Imagen 3</b></small>
                                                    <input type="file" name="imagen3"  class="form-control" id="imagen3" accept="image/jpg, image/png, image/gif, image/jpeg" >
                                                </div>                                                                                          
                                                <div class="col-md-4 text-center">
                                                    
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Nombres del producto</b></small>
                                                    <input type="text" name="nom" class="form-control" id="nom" placeholder="Nombre del Producto">
                                                </div>
                                                <div class="col-md-8 text-center">
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Descripcion</b></small>
                                                    <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion">
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Precio</b></small>
                                                    <input type="text" name="precio" class="form-control" id="precio" placeholder="precio">
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Stock</b></small>
                                                    <input type="text" name="stock" class="form-control" id="stock" placeholder="Stock">
                                                </div>
                                                <div class="col-md-4 text-center">
                                                    <small class="control-label label-sm"><b style="font-size: larger;">Stock minimo</b></small>
                                                    <input type="text" name="stock_minimo" class="form-control" id="stock_minimo" placeholder="Stock minimo">
                                                </div>
                                                <div class="col-md-4 text-center"style="margin-top: 18px;">
                                                    <label class="radio-inline">
                                                        <input class="form-check-input" type="checkbox" name="est" id="est" value="1">
                                                        <label class="form-check-label" ><b style="font-size: larger;">Estado</b></label>
                                                    </label>   
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="div_update_producto"></div>
                                            <div class="form-group form-actions">
                                                <div class="col-md-12 text-center">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                        <div id="modal-DeleteProducto" class="modal fade" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title text-center text-danger"><h2>
                                    </div>
                                    <div class="modal-body">
                                        <form id="form_del_producto" class="form-horizontal form-bordered">
                                            <div class="form-group">                                                                                         
                                                <div class="col-md-12 text-center">
                                                    <input type="hidden" name="id" id="id" >
                                                    <div class="alert alert-warning alert-dismissible text-center">
                                                         <h5><i class="fa fa-exclamation"></i> Comunicado!</h5>
                                                         Esta Acción borrara de manera permanente el registro. Si desea continuar
                                                         hacer CLICK en el boton de eliminar.
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="div_del_producto"></div>
                                            <div class="form-group form-actions">
                                                <div class="col-md-12 text-center">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </div>
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
        <script src="js/script.js?v=170823"></script> 
        <script>
        $(document).ready(function(){
            productos(1);
        });
        </script>      
<?php include_once 'sections/t_fin.php';?>