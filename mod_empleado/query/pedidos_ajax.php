<?php
@session_start();
include_once '../../lib/config.php';
include_once '../../lib/functions.php';
include_once '../../conexion/conectar.php';

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';

        if ($action == 'ajax') {
            // Consulta para obtener los clientes que realizaron pedidos
            $sql = "SELECT pe.*, cli.nomCli, cli.appCli, pe.latitud, pe.longitud FROM pedido pe
                    INNER JOIN cliente cli ON pe.codCli = cli.codCli
                    WHERE estado <= '2'";
            $consulta = $conector->query($sql);
            $ver = $consulta->num_rows;

            if ($ver < 1) {
                $error[] = "No se registran <strong>clientes que realizaron pedidos</strong>";
            } else {
        ?>
        <div class="">
            <style>
                th {
                    background-color: blue;
                    color: white;
                }
            </style>
            <div class="">
                <table id="example" class="table table-striped table-bordered table-hover dt-responsive" style="width: 100%;">
                    <thead>
                        <tr class="odd">
                            <th class="all text-center">Nro.</th>
                            <th class="none text-center">Cuenta</th>
                            <th class="all text-center">Cliente</th>
                            <th class="text-center">Apellido</th>
                            <th class="all text-center">Total</th>
                            <th class="text-center">envio</th>
                            <th class="text-center">Estado</th>
                            <th class="all text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($fila = $consulta->fetch_array()) {
                            if ($fila['estado'] == 1) {
                                $est = '<label class="label label-danger"><i class="fa fa-check"></i>  Sin Confirmar</label>';
                                $btn = " ";
                            } else if ($fila['estado'] == 2) {
                                $est = '<label class="label label-success"><i class="fa fa-check"></i>  En Proceso</label>';
                                $btn = "";
                            } else {
                                $est = '<label class="label label-info"><i class="fa fa-check"></i> Entregado</label>';
                                $btn = "";
                            }
                            echo '
                            <tr>
                                <td class="text-center">'.$i.'</td>
                                <td class="text-center">'.$fila['codPedi'].'</td>
                                <td class="text-center">' .$fila['nomCli'].'</td>
                                <td class="text-center">' .$fila['appCli'].'</td>
                                <td class="text-center">' .$fila['totalPrecio'].'</td>
                                <td class="text-center">'.$fila['envio'].'</td>
                                <td class="text-center">' .$est.'</td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-xs">
                                        <a href="detalles_pedido.php?id='.$fila['codPedi'].'" title="Ver Detalle" class="btn btn-info">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="#" title="Editar el Estado del pedido" class="btn btn-success"
                                            data-toggle="modal" data-target="#modal-EstadoPedido"
                                            data-id="'.$fila['codPedi'].'" data-nom="' .$fila['nomCli'].'"
                                            data-est="'.$fila['estado'].'">
                                            <i class="fa fa-toggle-on"></i>
                                        </a>

                                        <a href="#" title="Eliminar Registro" class="btn btn-danger '.$btn.'"
                                            data-toggle="modal" data-target="#modal-DeletePedido"
                                            data-id="'.$fila['codPedi'].'" data-nom="'.$fila['nomCli'].'">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>';
                            $i++;
                        }
                        ?>
                        </tbody>
                    </table>
                    </div>
                <?php
                }
            }

            if(isset($error)){
                echo'<div class="alert alert-warning alert-dismissible text-center">
                <h5><i class="icon fas fa-exclamation-triangle"></i> Comunicado!</h5>';
                    foreach($error as $err){
                    echo $err;
                }
                echo'</div>';
            }
            if(isset($message)){
                echo'<div class="alert alert-success" role="alert">';
                echo '<b>Bien!</b> ';
                foreach($message as $sms){
                    echo $sms;
                }
                echo '</div>';
            }
            ?>
<link href="../assets/template/datatables/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="../assets/template/datatables/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="../assets/template/datatables/datatable.js" type="text/javascript"></script>
<script src="../assets/template/datatables/datatables/datatables.min.js" type="text/javascript"></script>
<script src="../assets/template/datatables/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="../assets/template/datatables/table-datatables-responsive.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            responsive: true
         } );
    } );
</script>