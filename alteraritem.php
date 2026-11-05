<?php
   require_once("conexao.php");
   if (!isset($_GET["codigo"])) {
      redirecionar("index.php",htmlspecialchars("Erro ao alterar Item")); 
   } 
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/listacomprast31/funcoes.js"></script>
    <title>Lista de Compras - Alterar Item</title>
</head>

<body>
    <main>
        <header>
            <h1>Lista de Compras - Alterar Item</h1>
        </header>
        <article>
            <?php
               $par = ["codigo" => $_GET["codigo"]];
               $stmt = $conn->prepare("SELECT * FROM itens WHERE codigo=:codigo");
               $stmt->execute($par);
               $item = $stmt->fetch(PDO::FETCH_ASSOC);
            ?>
            <form action="alteraritemsalva.php" method="post">
                <input type="hidden" name="fcodigo" id="fcodigo" value="<?= $item["codigo"] ?>">
                <label for="fdescricao">Descricao: </label>
                <input type="text" id="fdescricao" name="fdescricao" value="<?= $item["descricao"] ?>" required>
                <br>
                <label for="fquantidade">Quantidade: </label>
                <input type="number" id="fquantidade" name="fquantidade" value="<?= $item["quantidade"] ?>" required>
                <br>
                <br>
                <button type="submit">Salvar</button>
                <button type="reset" onclick="redirecionar('index.php')">Cancelar</button>
            </form>
        </article>
        <footer>
            <p id="msg"></p>
        </footer>
    </main>

</body>

</html>