<?php
    require_once("acessos.php");
    require_once("funcoes.php");

    try {
        $strbanco = "mysql:host=%s;dbname=%s;charset=UTF8";
        $banco = sprintf($strbanco,hostname,database);
        $conn = new PDO($banco,user,password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        //echo "Conexão bem sucedida";
    } catch (PDOException $e) {
        echo ("ERRO! Não foi possível conectar ao Banco de Dados ".$e->getMessage());
   exit();
    }
?>
