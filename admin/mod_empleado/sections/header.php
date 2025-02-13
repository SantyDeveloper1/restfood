 <!-- In the PHP version you can set the following options from inc/config file -->
                    <!--
                        Available header.navbar classes:

                        'navbar-default'            for the default light header
                        'navbar-inverse'            for an alternative dark header

                        'navbar-fixed-top'          for a top fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar())
                            'header-fixed-top'      has to be added on #page-container only if the class 'navbar-fixed-top' was added

                        'navbar-fixed-bottom'       for a bottom fixed header (fixed sidebars with scroll will be auto initialized, functionality can be found in js/app.js - handleSidebar()))
                            'header-fixed-bottom'   has to be added on #page-container only if the class 'navbar-fixed-bottom' was added
                    -->
                    <header class="navbar navbar-inverse">
                        <!-- Left Header Navigation -->
                        <ul class="nav navbar-nav-custom">
                            <!-- Main Sidebar Toggle Button -->
                            <li>
                                <a href="javascript:void(0)" onclick="App.sidebar('toggle-sidebar');this.blur();">
                                    <i class="fa fa-bars fa-fw"></i>
                                </a>
                            </li>
                            <!-- END Main Sidebar Toggle Button -->

                            <!-- Template Options -->
                            <!-- Change Options functionality can be found in js/app.js - templateOptions() -->
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="gi gi-settings"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-custom dropdown-options">
                                    <li class="dropdown-header text-center">Header Style</li>
                                    <li>
                                        <div class="btn-group btn-group-justified btn-group-sm">
                                            <a href="javascript:void(0)" class="btn btn-primary" id="options-header-default">Light</a>
                                            <a href="javascript:void(0)" class="btn btn-primary" id="options-header-inverse">Dark</a>
                                        </div>
                                    </li>
                                    <li class="dropdown-header text-center">Page Style</li>
                                    <li>
                                        <div class="btn-group btn-group-justified btn-group-sm">
                                            <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style">Default</a>
                                            <a href="javascript:void(0)" class="btn btn-primary" id="options-main-style-alt">Alternative</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- END Template Options -->
                        </ul>
                        <!-- END Left Header Navigation -->

                        <!-- Search Form -->
                        <form action="page_ready_search_results.html" method="post" class="navbar-form-custom">
                            <div class="form-group">
                                <input type="text" id="top-search" name="top-search" class="form-control" placeholder="Search..">
                            </div>
                        </form>
                        <!-- END Search Form -->

                        <!-- Right Header Navigation -->
                        <ul class="nav navbar-nav-custom pull-right">
                            <!-- User Dropdown -->
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="../<?php echo $img_user;?>" alt="avatar"> <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-custom dropdown-menu-right"> 
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#modal-perfil">
                                            <i class="fa fa-user fa-fw pull-right"></i>
                                            Perfil
                                        </a>
                                        <!-- Opens the user settings modal that can be found at the bottom of each page (page_footer.html in PHP version) -->
                                        <a href="#" data-toggle="modal" data-target="#modal-password">
                                            <i class="fa fa-unlock-alt fa-fw pull-right"></i>
                                            Cambiar Contraseña
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="../lib/PHP_cerrar.php"><i class="fa fa-ban fa-fw pull-right"></i> Cerrar Sesión</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <!-- END User Dropdown -->
                        </ul>
                        <!-- END Right Header Navigation -->
                    </header>
                     <!-- MODAL PARA CAMBIAR CONTRASEÑA -->
                     <div id="modal-password" class="modal fade" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title text-center text-danger">Cambiar Contraseña<h2>
                                </div>
                                <div class="modal-body">
                                    <form id="form_password" class="form-horizontal form-bordered">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Contraseña Actual</label>
                                            <div class="col-md-8">
                                                <input type="password" name="pass" class="form-control" placeholder="Ingrese Contraseña Actual">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Contraseña Nueva</label>
                                            <div class="col-md-8">
                                                <input type="password" name="pass1" class="form-control" placeholder="Ingrese Contraseña Nueva">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Repite la Contraseña</label>
                                            <div class="col-md-8">
                                                <input type="password" name="pass2" class="form-control" placeholder="Repite Contraseña Nueva">
                                            </div>
                                        </div>
                                        <div class="col-md-12" id="div_pass"></div>
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
                    <!-- MODAL PARA ACTUALIZAR EL PERFIL -->
                    <div id="modal-perfil" class="modal fade" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title text-center text-danger">Actualizar Perfil de Usuario<h2>
                                </div>
                                <div class="modal-body">
                                    <form id="form_perfil" class="form-horizontal form-bordered">
                                        <div class="form-group"> 
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
                                            <div class="col-md-6 text-center">
                                                <input type="text" name="ema" value="<?php echo $ema_user;?>" class="form-control" placeholder="Correo Electronico">
                                                <small class="control-label label-sm">Correo Electronico</small>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <input type="text"  name="doc" value="<?php echo $doc_user;?>" class="form-control" placeholder="Documento">
                                                <small class="control-label label-sm">Documento</small>
                                            </div>
                                            
                                            <div class="col-md-8 text-center">
                                                <input type="text" pattern="[0-9]*" name="cel" value="<?php echo $cel_user;?>" class="form-control" placeholder="Celular">
                                                <small class="control-label label-sm">Celular</small>
                                            </div>
                                           
                                            <div class="col-md-8 text-center">
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" name="sex" value="M" class="form-check-input" <?php echo $masculino;?>> Masculino
                                                    <input type="radio" name="sex" value="F" class="form-check-input" <?php echo $feminino;?>> Feminino
                                                </div>
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