<!DOCTYPE html>
<html lang="pt_BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="/listacomprast31/funcoes.js"></script>
    <title>Lista de Compras</title>
</head>

<body>
    <main>
        <header>
            <h1>Lista de Compras</h1>
            <nav>
                <button onclick="redirecionar('incluirlista.php')">Nova Lista</button>
            </nav>
        </header>
        <article>
            <?php
            require_once("conexao.php");
            $stmt = $conn->prepare("SELECT * FROM lista");
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                echo "<ul>";
                foreach ($stmt as $lista) {
                    echo "<li>" . $lista["codigo"] . " - " . $lista["nome"];
                    //criando botão alterar
                    $botao = "<button id='alterar' name='alterar' onclick='redirecionar(\"alterarlista.php?codigo=%u&nome=%s\")'>Alterar</button>";
                    $botao = sprintf($botao,$lista["codigo"],htmlspecialchars($lista["nome"]));
                    echo "&nbsp".$botao;
                    //criando botão excluir
                    $botao = "<button id='excluir' name='excluir' onclick='confirmaexcluir(%u,\"%s\")'>Excluir</button>";
                    $botao = sprintf($botao,$lista["codigo"],htmlspecialchars($lista["nome"]));
                    echo "&nbsp".$botao;
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo ("<p>Não há listas cadastradas</p>");
            }
            ?>
        </article>
        <footer>
            <p id="msg">
                <?php
                   if (isset($_GET["msg"])) {
                        echo $_GET["msg"];
                        echo "<script>limpamsg('msg');</script>";
                   }
                ?>
            </p>
        </footer>
    </main>

</body>

</html>