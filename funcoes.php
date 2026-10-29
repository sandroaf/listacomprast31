<?php 
    function redirecionar($destino, $msg = "") {
        $msg = htmlspecialchars($msg,ENT_QUOTES);
        header("Location: $destino/?msg=$msg");
        exit();
    }