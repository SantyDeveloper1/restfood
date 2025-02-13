<?php
    @session_start();
    include_once '../lib/functions.php';
    if(!empty($_SESSION['codUsu'])){
       session_destroy();
       redireccionar2("../");
    }else{
        redireccionar2("../");
    }
?>