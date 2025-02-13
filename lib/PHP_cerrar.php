<?php
    @session_start();
    include_once '../lib/functions.php';
    if(!empty($_SESSION['codCli'])){
       session_destroy();
       redireccionar2("../");
    }else{
        redireccionar2("../");
    }
?>