<?php
if (isset($_POST["fnome"])) {
    try {
        require_once("conexao.php");
        $par = ["codigo" => $_POST["fcodigo"], "nome" => $_POST["fnome"]];
        $stmt = $conn->prepare("UPDATE lista SET nome = :nome WHERE codigo = :codigo");
        if ($stmt->execute($par)) {
            redirecionar("index.php", "Lista alterada com sucesso");
        } else {
            redirecionar("index.php", "Erro ao alterar a lista");
        }
    } catch (PDOException $e) {
        redirecionar("index.php", "Erro ao alterar lista: " . $e->getMessage());
    }
} else {
    redirecionar("index.php");
}
