<?php
@session_start();
error_reporting(0);
include_once '../conexion/conectar.php';
include_once '../lib/functions.php';
include_once '..lib/config.php';  
$itemsPorPagina = 9;
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
// Validar que la página sea mayor o igual a 1
if ($paginaActual < 1) {
    echo '<div class="alert alert-danger">Página incorrecta. Por favor, selecciona una página válida.</div>';
    exit;
}
$offset = ($paginaActual - 1) * $itemsPorPagina;
// Establecer la categoría seleccionada por defecto a 'todos'
$categoriaSeleccionada = isset($_GET['categoria']) ? $_GET['categoria'] : 'todos';
// Establecer la opción de orden por defecto a vacío
$orden = isset($_GET['orden']) ? $_GET['orden'] : '';
// Establecer la cláusula de orden por defecto (si no se selecciona una opción de orden)
$ordenSQL = '';
if ($orden === 'asc') {
    $ordenSQL = 'ORDER BY nomProd ASC';
} elseif ($orden === 'desc') {
    $ordenSQL = 'ORDER BY nomProd DESC';
} elseif ($orden === 'menor') {
    $ordenSQL = 'ORDER BY precio ASC';
} elseif ($orden === 'mayor') {
    $ordenSQL = 'ORDER BY precio DESC';
}
// Construir la consulta SQL basada en la categoría seleccionada y la opción de orden
if ($categoriaSeleccionada === 'todos') {
    $sql = "SELECT * FROM producto $ordenSQL LIMIT $offset, $itemsPorPagina";
} else {
    $sql = "SELECT * FROM producto WHERE codCateg = '$categoriaSeleccionada' $ordenSQL LIMIT $offset, $itemsPorPagina";
}
// Realizar la consulta a la base de datos
$consulta = $conector->query($sql);
?>