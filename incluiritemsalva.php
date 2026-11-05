<?php
if (isset($_POST["fdescricao"])) {
    try {
        require_once("conexao.php");
        $par = ["codigo_lista" => $_POST["fcodigo_lista"]
               ,"descricao" => $_POST["fdescricao"]
               ,"quantidade" => $_POST["fquantidade"]];
        $stmt = $conn->prepare("INSERT INTO itens (descricao, quantidade, codigo_lista) VALUES (:descricao, :quantidade, :codigo_lista)");
        if ($stmt->execute($par)) {
            redirecionar("index.php", "Item incluído com sucesso");
        } else {
            redirecionar("index.php", "Erro ao incluir o item");
        }
    } catch (PDOException $e) {
        redirecionar("index.php", "Erro ao incluir item: " . $e->getMessage());
    }
} else {
    redirecionar("index.php");
}
