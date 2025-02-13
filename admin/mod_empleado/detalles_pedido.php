<?php
include_once 'sections/t_inicio.php';

$id = $_GET['id'];

if (!empty($id)) {
    $sql_user = "SELECT * FROM pedido pe
        INNER JOIN detalle_pedido dp ON dp.codPedi = pe.codPedi
        INNER JOIN producto pr ON dp.codProd = pr.idProd
        INNER JOIN cliente cli ON cli.codCli = pe.codCli
        WHERE pe.codPedi = '" . $id . "'";
    $query_user = $conector->query($sql_user);
    $ver_user = $query_user->num_rows;

    if ($ver_user > 0) {
        // Restablecer el puntero a la primera fila
        $query_user->data_seek(0);

        while ($fila = $query_user->fetch_array()) {
            $nom_dprod = $fila['nomProd'];
            $cant_dprod = $fila['cantProd'];
            $sub_dtotal = $fila['totalProd'];
            $est_duser = $fila['estado'];
            $nom_duser = $fila['nomCli'];
            $app_duser = $fila['appCli'];
            $ema_dcli = $fila['emaCli'];
            $cel_dcli = $fila['celCli'];
            $dir_dcli = $fila['dirCli'];
            $precio_dprod = $fila['totalPrecio'];
            $latitud = $fila['latitud'];
            $longitud = $fila['longitud'];
        }

        // Restablecer el puntero a la primera fila
        $query_user->data_seek(0);
    } else {
        redireccionar2("pedidos.php");
    }
} else {
    redireccionar2("./");
}
?>
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
                                        <h1>Detalle de pedido de: <?php echo ' <strong>'.$nom_duser.' '.$app_duser.'</strong>';?></h1>
                                    </div>
                                    <!-- END Main Title -->

                                    <!-- Top Stats -->
                                    <div class="col-md-8 col-lg-6">
                                        <div class="row text-center">      
                                            <div class="col-xs-2 col-sm-12">
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
                            <style>
                                .thead-blue {
                                    background-color: blue;
                                    color: white;
                                }
                            </style>

                            <div class="col-md-8">
                                <div class="block">
                                    <div class="block-title">
                                        <h2><strong>Productos</strong> Registrados</h2>
                                    </div>
                                    <div class="block-body">
                                        <table id="usuariosTable" class="table table-bordered">
                                            <thead class="thead-blue">
                                                <tr>
                                                    <th>Imagen</th>
                                                    <th>Producto</th>
                                                    <th>Cantidad</th>
                                                    <th>Sub Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($fila = $query_user->fetch_array()) {
                                                    echo '<tr>';
                                                    echo '<td class="text-center"><img src="../'.$fila['imagen1'].'" style="width:50px;"</td>';
                                                    echo '<td>' . $fila['nomProd'] . '</td>';
                                                    echo '<td>' . $fila['cantProd'] . '</td>';
                                                    echo '<td>' .'s/. '. $fila['totalProd'] . '</td>';
                                                    echo '</tr>';
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <br />
                                        <button class="btn btn-primary" id="irGoogleMapsBtn">Ir a Google Maps</button>
                                            
                                        <hr>
                                    </div>
                                </div>
                            </div>
                                <style>
                                    .form-label {
                                        display: inline-block;
                                        margin-bottom: 0; /* Elimina el margen inferior predeterminado */
                                    }

                                    .form-hr {
                                        margin: 5px 0;
                                    }
                                    .datos-cliente-header {
                                        background-color: green; /* Cambia "green" al color que desees */
                                    }
                                </style>
                            <div class="col-12 col-md-5 col-lg-4">
                                <div class="full-box div-bordered">
                                    <h5 class="text-center text-uppercase bg-success datos-cliente-header" style="color: #FFF; padding: 10px 0;">Datos del Cliente</h5>
                                    <ul class="list-group bag-details">
                                        <a class="list-group-item d-flex justify-content-between align-items-center text-uppercase poppins-regular font-weight-bold">
                                            <strong>CLIENTE: </strong>
                                            <span><?php echo $nom_duser.' '. $app_duser;?></span>
                                        </a>
                                        <a class="list-group-item d-flex justify-content-between align-items-center text-uppercase poppins-regular font-weight-bold">
                                            <strong>EMAIL: </strong>
                                            <span><?php echo $ema_dcli;?></span>
                                        </a>
                                        
                                        <a class="list-group-item d-flex justify-content-between align-items-center text-uppercase poppins-regular font-weight-bold">
                                            <strong>TELEFONO: </strong>
                                            <span><?php echo $cel_dcli;?></span>
                                        </a>
                                        <a class="list-group-item d-flex justify-content-between align-items-center text-uppercase poppins-regular font-weight-bold">
                                            <strong>DIRECCION: </strong>
                                            <span><?php echo $dir_dcli;?></span>
                                        </a>
                                        <a class="list-group-item d-flex justify-content-between align-items-center text-uppercase poppins-regular font-weight-bold">
                                            <strong> TOTAL A PAGAR: </strong>
                                            <span>s/. <?php echo $precio_dprod;?></span>
                                        </a>
                                        <p class="text-center">
                                            <a class="list-group-item d-flex justify-content-between align-items-center" style="border-bottom: 1px solid #39EC64;">
                                                <button type="button" class="btn btn-primary" id="confirmarOrdenBtn">Confirmar orden</button>
                                            </a>
                                        </p>
                                    </ul>  
                                </div>
                            </div>
                            <!-- Fin de la Nueva Sección -->
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
        <script src="js/script.js?v=141123"></script>      
<?php include_once 'sections/t_fin.php';?>
<!-- Modal para mostrar el mapa -->
<div class="modal fade" id="modalMapa" tabindex="-1" role="dialog" aria-labelledby="modalMapaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                   <h1 class="modal-title text-center text-danger">Ubicacion exacta del Cliente<h1>

            </div>
            <div class="modal-body">
                <!-- Contenedor para el mapa -->
                <div id="mapa" style="height: 350px;"></div>
            </div>
            <div class="modal-footer">
                <!-- Botón para ver el mapa -->
                <button type="button" class="btn btn-primary" id="verMapaBtn">Ver Ubicación en el Mapa</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    // Manejar el clic en el botón "Ir a Google Maps"
    $('#irGoogleMapsBtn').on('click', function () {
        // Mostrar el modal al hacer clic en "Ir a Google Maps"
        $('#modalMapa').modal('show');
    });

    // Manejar el clic en el botón "Ver Ubicación en el Mapa"
    $('#verMapaBtn').on('click', function () {
        // Obtener las coordenadas de latitud y longitud
        var latitud = parseFloat('<?php echo $latitud; ?>');
        var longitud = parseFloat('<?php echo $longitud; ?>');

        // Crear un objeto LatLng con las coordenadas
        var ubicacion = new google.maps.LatLng(latitud, longitud);

        // Configurar opciones del mapa
        var mapOptions = {
            center: ubicacion,
            zoom: 15,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        // Crear un mapa en el elemento con el ID 'mapa'
        var mapa = new google.maps.Map(document.getElementById('mapa'), mapOptions);

        // Agregar un marcador en la ubicación
        var marcador = new google.maps.Marker({
            position: ubicacion,
            map: mapa,
            title: 'Ubicación del Cliente'
        });
    });
});
</script>


<script>
    document.getElementById('confirmarOrdenBtn').addEventListener('click', function () {
        // Mostrar una alerta de confirmación con SweetAlert2
        Swal.fire({
            title: '¿Estás seguro?',
            text: 'Una vez confirmada, no podrás revertir esta acción.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, confirmar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Realizar la solicitud AJAX para cambiar el estado del pedido
                var xmlhttp = new XMLHttpRequest();

                // Definir la función de devolución de llamada que se ejecutará cuando la solicitud esté completa
                xmlhttp.onreadystatechange = function () {
                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                        // La respuesta del servidor
                        console.log(xmlhttp.responseText);

                        // Mostrar una alerta de éxito con SweetAlert2
                        Swal.fire({
                            title: '¡Orden confirmada!',
                            text: 'El estado del pedido ha sido actualizado correctamente.',
                            icon: 'success'
                        }).then((result) => {
                            // Puedes redirigir o realizar otras acciones después de la confirmación si es necesario
                             // Redirigir a pedidos.php
                            window.location.href = "pedidos.php";
                        });
                    }
                };

                // Configurar la solicitud AJAX
                xmlhttp.open("GET", "actualizar_estado_pedido.php?id=<?php echo $id; ?>&estado=3", true);

                // Enviar la solicitud
                xmlhttp.send();
            }
        });
    });
</script>
<!-- Asegúrate de incluir SweetAlert2 en tu proyecto -->
<link rel="stylesheet" href="../../restaurant_main/sweetAlert/sweetalert2.min.css">
<script src="../../restaurant_main/sweetAlert/sweetalert2.all.min.js"></script>