<?php
   require_once("funcoes.php");
   if (!isset($_GET["lista"])) {
      redirecionar("index.php",htmlspecialchars("Erro ao incluir Item")); 
   } 
?>

<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/listacomprast31/funcoes.js"></script>
    <title>Lista de Compras - Novo Item</title>
</head>

<body>
    <main>
        <header>
            <h1>Lista de Compras - Novo Item</h1>
        </header>
        <article>
            <form action="incluiritemsalva.php" method="post">
                <input type="hidden" name="fcodigo_lista" id="fcodigo_lista" value="<?= $_GET["lista"] ?>">
                <label for="fdescricao">Descricao: </label>
                <input type="text" id="fdescricao" name="fdescricao" required>
                <br>
                <label for="fquantidade">Quantidade: </label>
                <input type="number" id="fquantidade" name="fquantidade" value="1" required>
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