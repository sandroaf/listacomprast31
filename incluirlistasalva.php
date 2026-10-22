<?php
if (isset($_POST["fnome"])) {
    try {
        require_once("conexao.php");
        $par = ["nome" => $_POST["fnome"]];
        $stmt = $conn->prepare("INSERT INTO lista (nome) VALUES (:nome)");
        if ($stmt->execute($par)) {
            redirecionar("index.php", "Lista incluída com sucesso");
        } else {
            redirecionar("index.php", "Erro ao incluir a lista");
        }
    } catch (PDOException $e) {
        redirecionar("index.php", "Erro ao incluir lista: " . $e->getMessage());
    }
} else {
    redirecionar("index.php");
}
