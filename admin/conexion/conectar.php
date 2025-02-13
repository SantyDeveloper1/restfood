<?php
    include_once 'data_base.php';
    $conector = new mysqli($servidor,$usuario,$password,$basededatos);
    if($conector->connect_error){
        echo "Base de Datos no conectada";
    }
    //else{
    //    echo "Felicidades Base de Datos Conectada";
    //}

?>