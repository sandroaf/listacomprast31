<?php
if (isset($_GET["codigo"])) {
    try {
        require_once("conexao.php");
        $par = ["codigo" => $_GET["codigo"]];
        $stmt = $conn->prepare("DELETE FROM itens WHERE codigo = :codigo");
        if ($stmt->execute($par)) {
            redirecionar("index.php", "Item excluído com sucesso");
        } else {
            redirecionar("index.php", "Erro ao excluir o item");
        }
    } catch (PDOException $e) {
        redirecionar("index.php", "Erro ao excluir item: " . $e->getMessage());
    }
} else {
    redirecionar("index.php");
}
