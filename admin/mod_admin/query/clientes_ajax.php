<?php
    @session_start();
    include_once '../../lib/config.php';
    include_once '../../lib/functions.php';
    include_once '../../conexion/conectar.php';
   // $hoy = date('Y-m-d');
    $action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
    if($action == 'ajax'){
        // Hallar el stock disponible
        $sql ="SELECT *FROM cliente";
        $consulta = $conector->query($sql);
        $ver = $consulta->num_rows;
        if($ver<1){
            $error[]="No se registran <strong>Clientes en el Sistema</strong>";
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
                        <th class="text-center">Nombre</th>
                        <th class="text-center">Paterno</th>
                        <th class="text-center">Materno</th>
                        <th class="none text-center">Correo</th>
                        <th class="text-center">Celular</th>
                        <th class="text-center">Genero</th>
                        <th class="none text-center">Direccion</th>
                        <th class="text-center">Estado</th>
                        <th class="none text-center">Registrado</th>
                        <th class="all text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while ($fila = $consulta->fetch_array()){
                    /*if($fila['tdoUsu']==1){
                        $tdoc = '<label class="label label-info">DNI</label>';
                    }elseif($fila['tdoUsu']==2){
                        $tdoc = '<label class="label label-primary">PASAPORTE</label>';
                    }else{
                        $tdoc = '<label class="label label-warning">CARNET EXT.</label>';
                    }*/
                    // Para el Genero
                    if($fila['sexCli']=="M"){
                        $sexo = '<label class="label label-primary"><i class="fa fa-male"></i>  Masculino</label>';
                    }else{
                        $sexo = '<label class="label label-danger"><i class="fa fa-female"></i>  Femenino</label>';
                    }
                    // Para el Estado
                    if($fila['estCli']==0){
                        $est = '<label class="label label-danger"><i class="fa fa-times"></i>  Inactivo</label>';
                        $btn = "disabled";
                    }else{
                        $est = '<label class="label label-success"><i class="fa fa-check"></i>  Activo</label>';
                        $btn = "";
                    }
                    //Fecha de Nacimiento
                    //$fna = date("d/m/Y",strtotime($fila['fnaUsu']));
                    $reg = date("d/m/Y g:i A",strtotime($fila['regCli']));
                    echo '
                        <tr>
                            <td class="text-center">'.$i.'</td>
                            <td class="text-center">'.$fila['codCli'].'</td>
                            <td class="text-center">'.$fila['nomCli'].'</td>
                            <td class="text-center">'.$fila['appCli'].'</td>
                            <td class="text-center">'.$fila['apmCli'].'</td>
                            <td class="text-center">'.$fila['emaCli'].'</td>
                            <td class="text-center">'.$fila['celCli'].'</td>
                            <td class="text-center">'.$sexo.'</td>
                            <td class="text-center">'.$fila['dirCli'].'</td>
                            <td class="text-center">'.$est.'</td>
                            <td class="text-center">'.$reg.'</td>
                            <td class="text-center">
                                <div class="btn-group btn-group-xs">
                                    <a href="#" title="Editar Registro" class="btn btn-primary '.$btn.'"
                                    data-toggle="modal" data-target="#modal-UpdateCliente" 
                                    data-id="'.$fila['codCli'].'" data-nom="'.$fila['nomCli'].'"
                                    data-app="'.$fila['appCli'].'" data-apm="'.$fila['apmCli'].'"
                                    data-email="'.$fila['emaCli'].'"data-cel="'.$fila['celCli'].'"
                                    data-sex="'.$fila['sexCli'].'" data-dir="'.$fila['dirCli'].'">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="#" title="Editar Estado" class="btn btn-success"
                                    data-toggle="modal" data-target="#modal-EstadoCliente"
                                    data-id="'.$fila['codCli'].'" data-nom="'.$fila['nomCli'].'"
                                    data-app="'.$fila['appCli'].'" data-est="'.$fila['estCli'].'">
                                        <i class="fa fa-toggle-on"></i>
                                    </a>
                                    <a href="#" title="Eliminar Registro" class="btn btn-danger '.$btn.'"
                                    data-toggle="modal" data-target="#modal-DeleteCliente"
                                    data-id="'.$fila['codCli'].'" data-nom="'.$fila['nomCli'].'"
                                    data-app="'.$fila['appCli'].'">
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