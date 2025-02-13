<?php
// Inicio de PHP
@session_start();
include_once '../../lib/config.php';
include_once '../../lib/functions.php';
include_once '../../conexion/conectar.php';

if (!empty($_SESSION['codUsu'])) {
    $priv_user = $_SESSION['priUsu'];
    $id_user = $_SESSION['codUsu'];
    if ($priv_user <> 1) {
        redireccionar2("../mod_empleado/");
    }
    $doc = 'empleados.pdf';
} else {
    redireccionar2("../");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>prueba</title>
    <style>
        body {
            width: 95%;
            margin: auto;
            font-family: "helvetica";
            font-size: 16px;
            color: #444;
        }

        table {
            width: 90%;
        }

        .wrapper-page {
            page-break-after: always;
        }

        .wrapper-page:last-child {
            page-break-after: avoid;
        }
    </style>
</head>

<body>
<div class="wrapper-page">
    <center><strong>RELACIÓN DE USUARIOS DEL SISTEMA</strong></center>
    <hr>
    <table>
        <thead>
        <tr>
            <th>Nro</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Celulares</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM usuario";
        $query = $conector->query($sql);
        $i = 1;
        while ($fila = $query->fetch_array()) {
            echo '<tr>';
            echo '<td>' . $i . '</td>';
            echo '<td>' . $fila['nomUsu'] . '</td>';
            echo '<td>' . $fila['appUsu'] . ' ' . $fila['apmUsu'] . '</td>';
            echo '<td>' . $fila['celUsu'] . '</td>';
            echo '</tr>';
            $i++;
        }
        ?>
        </tbody>
    </table>
    <br>
    <center>Abancay, <?php echo fechaEs(date('Y-m-d')); ?></center>
</div>

</body>
</html>

<?php
require_once '../../assets/dompdf/autoload.inc.php'; // Ubicación de la librería
use Dompdf\Dompdf;
function fechaEs($fecha) {
    setlocale(LC_ALL, 'es_ES');
    return strftime("%d de %B de %Y", strtotime($fecha));
}
$dompdf = new DOMPDF();
$dompdf->load_html(ob_get_clean());
$dompdf->set_paper('A4', 'portrait');
$dompdf->render();
$pdf = $dompdf->output();
$filename = $doc;
$dompdf->stream($filename);
ob_end_flush();
?>