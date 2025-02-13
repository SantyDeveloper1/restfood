<?php
@session_start();
include_once '../../lib/config.php';
include_once '../../lib/functions.php';
include_once '../../admin/conexion/conectar.php';

// Consulta SQL para obtener el estado del pedido
$sql = "SELECT estado FROM pedido WHERE codCli = $codCli";
$consulta = $conector->query($sql);
$ver = $consulta->num_rows;
?>