<?php
if (isset($_POST["fdescricao"])) {
    try {
        require_once("conexao.php");
        $par = ["codigo" => $_POST["fcodigo"]
               ,"descricao" => $_POST["fdescricao"]
               ,"quantidade" => $_POST["fquantidade"]];
        $stmt = $conn->prepare("UPDATE itens SET descricao = :descricao, quantidade = :quantidade, datahora = current_timestamp() WHERE codigo = :codigo");
        if ($stmt->execute($par)) {
            redirecionar("index.php", htmlspecialchars("Item alterado com sucesso"));
        } else {
            redirecionar("index.php", htmlspecialchars("Erro ao alterar o item"));
        }
    } catch (PDOException $e) {
        redirecionar("index.php", htmlspecialchars("Erro ao alterar lista: " . $e->getMessage()));
    }
} else {
    redirecionar("index.php");
}
