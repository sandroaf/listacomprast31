<?php
if (isset($_GET["codigo"])) {
    try {
        require_once("conexao.php");
        $par = ["codigo" => $_GET["codigo"]];
        $stmt = $conn->prepare("DELETE FROM lista WHERE codigo = :codigo");
        if ($stmt->execute($par)) {
            redirecionar("index.php", "Lista excluída com sucesso");
        } else {
            redirecionar("index.php", "Erro ao excluir a lista");
        }
    } catch (PDOException $e) {
        redirecionar("index.php", "Erro ao excluir lista: " . $e->getMessage());
    }
} else {
    redirecionar("index.php");
}
