<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';
   // $hoy = date('Y-m-d');
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    if($action == 'ajax'){
        // Hallar el stock disponible
        $sql ="SELECT * FROM producto";
        $consulta = $conector->query($sql);
        $ver = $consulta->num_rows;
        if($ver<1){
            $error[]="No se registran <strong>productos en el Sistema</strong>";
        }else{
        ?>
            <div class="">
            <style>
        th {
            background-color: blue;
            color: white;
        }
    </style>
            <table id="example" class="table table-striped table-bordered table-hover dt-responsive" style="width: 100%;">
                <thead>
                    <tr class="odd">
                        <th class="all text-center">Nro.</th>
                        <th class="none text-center">Cuenta</th>
                        <th class="all text-center">Nombre producto</th>
                        <th class="text-center">Descripcion</th>
                        <th class="all text-center">Precio</th>
                        <th class="text-center">Stock</th>
                        <th class="all text-center">Imagen</th>
                        <th class="all text-center">Estado</th>
                        <th class="all text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                    //Fecha de Nacimiento
                    //$freg = date("d/m/Y",strtotime($fila['regProd']));
                    $reg = date("d/m/Y g:i A");
                    while ($fila = $consulta->fetch_array()){ 
                        if($fila['estProd']==0){
                            $est = '<label class="label label-danger"><i class="fa fa-times"></i>  Agotado</label>';
                        }else{
                            $est = '<label class="label label-success"><i class="fa fa-check"></i>  Disponible</label>';
                        }                      
                    echo '
                        <tr>
                            <td class="text-center">'.$i.'</td>
                            <td class="text-center">'.$fila['idProd'].'</td>
                            <td class="text-center">'.$fila['nomProd'].'</td>
                            <td class="text-center">'.$fila['descripcion'].'</td>
                            <td class="text-center">'.$fila['precio'].' s/'.'</td>
                            <td class="text-center">'.$fila['stok'].'.00'.'</td>
                            <td class="text-center"><img src="../'.$fila['imagen1'].'" style="width:50px;"</td>
                            <td class="text-center">'.$est.'</td>
                            
                            <td class="text-center">
                                <div class="btn-group btn-group-xs">
                                    <a href="#" title="Editar Registro" class="btn btn-primary"
                                    data-toggle="modal" data-target="#modal-UpdateProducto" 
                                    data-id="'.$fila['idProd'].'" data-nom="'.$fila['nomProd'].'"
                                    data-descripcion="'.$fila['descripcion'].'" data-precio="'.$fila['precio'].'"
                                    data-stock="'.$fila['stok'].'"data-stock_minimo="'.$fila['stok_min'].'"
                                    data-est="'.$fila['estProd'].'">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#" title="Eliminar Registro" class="btn btn-danger"
                                    data-toggle="modal" data-target="#modal-DeleteProducto"
                                    data-id="'.$fila['idProd'].'" data-nom="'.$fila['nomProd'].'">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>

                        </tr>';
                    
                    $i++;
                    }
                }
                ?>
                </tbody>
            </table>
            </div>
        <?php
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