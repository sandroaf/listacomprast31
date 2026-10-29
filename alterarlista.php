<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/listacomprast31/funcoes.js"></script>
    <title>Lista de Compras - Alterar Lista</title>
</head>

<body>
    <main>
        <header>
            <h1>Lista de Compras - Alterar Lista</h1>
        </header>
        <article>
            <form action="alterarlistasalva.php" method="post">
                <input id="fcodigo" name="fcodigo" type="hidden" value="<?= $_GET["codigo"] ?>">
                <label for="fnome">Nome: </label>
                <input id="fnome" name="fnome"  value="<?= $_GET["nome"] ?>" required>
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