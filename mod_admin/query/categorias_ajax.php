<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';
   // $hoy = date('Y-m-d');
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    if($action == 'ajax'){
        // Hallar el stock disponible
        $sql ="SELECT * FROM categoria";
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
                        <th class="all text-center">Nombre Categoria</th>
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
                    echo '
                        <tr>
                            <td class="text-center">'.$i.'</td>
                            <td class="text-center">'.$fila['codCateg'].'</td>
                            <td class="text-center">'.$fila['nomCateg'].'</td>
                            
                            <td class="text-center">
                                <div class="btn-group btn-group-xs">
                                    <a href="#" title="Editar Registro" class="btn btn-primary"
                                    data-toggle="modal" data-target="#modal-UpdateCategoria" 
                                    data-id="'.$fila['codCateg'].'" data-nom="'.$fila['nomCateg'].'">
                                        <i class="fa fa-pencil"></i>
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