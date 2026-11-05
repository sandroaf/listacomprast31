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
                <br>
                <br>
                <form action="index.php" method="GET">
                    <input type="text" id="busca" name="busca">
                    <label for="tbl">lista</label>
                    <input type="radio" id="tbl" name="tb" value="lista" checked>
                    <label for="tbi">itens</label>
                    <input type="radio" id="tbi" name="tb" value="itens">
                    <button type="submit">Buscar</button>
                </form>
            </nav>
        </header>
        <article>
            <?php
            require_once("conexao.php");
            if (isset($_GET["busca"]) && isset($_GET["tb"])) {
                if ($_GET["tb"] == "lista") {
                    $busca = "%" . $_GET["busca"] . "%";
                    $par = ["codigo" => $_GET["busca"], "nome" => $busca];
                    $stmt = $conn->prepare("SELECT * FROM lista WHERE codigo = :codigo OR nome like :nome");
                    $stmt->execute($par);
                } else {
                    $stmt = $conn->prepare("SELECT * FROM lista");
                    $stmt->execute();
                }
            } else {
                $stmt = $conn->prepare("SELECT * FROM lista");
                $stmt->execute();
            }
            if ($stmt->rowCount() > 0) {
                echo "<dl>";
                foreach ($stmt as $lista) {
                    echo "<dt>" . $lista["codigo"] . " - " . $lista["nome"];
                    //criando botão alterar
                    $botao = "<button id='alterar' name='alterar' onclick='redirecionar(\"alterarlista.php?codigo=%u&nome=%s\")'>Alterar</button>";
                    $botao = sprintf($botao, $lista["codigo"], htmlspecialchars($lista["nome"]));
                    echo "&nbsp;" . $botao;
                    //criando botão excluir
                    $botao = "<button id='excluir' name='excluir' onclick='confirmaexcluir(\"excluirlista.php\",%u,\"%s\")'>Excluir</button>";
                    $botao = sprintf($botao, $lista["codigo"], htmlspecialchars($lista["nome"]));
                    echo "&nbsp;" . $botao;
                    $botao = "&nbsp;<button onclick=\"redirecionar('incluiritem.php?lista=%u')\">Novo Item</button>";
                    $botao = sprintf($botao, $lista["codigo"]);
                    echo $botao;

                    //Itens da Lista
                    echo "</dt>";

                    if (isset($_GET["busca"]) && isset($_GET["tb"])) {
                        if ($_GET["tb"] == "itens") {
                            $busca = "%" . $_GET["busca"] . "%";
                            $par = ["codigo_lista" => $lista["codigo"],
                                "codigo" => $_GET["busca"], "descricao" => $busca];
                            $stmtitens = $conn->prepare("SELECT * FROM itens WHERE codigo_lista = :codigo_lista AND (codigo = :codigo OR descricao like :descricao)");
                            $stmtitens->execute($par);
                        } else {
                            $par = ["codigo" => $lista["codigo"]];
                            $stmtitens = $conn->prepare("SELECT * FROM itens WHERE codigo_lista = :codigo");
                        }
                    } else {
                        $par = ["codigo" => $lista["codigo"]];
                        $stmtitens = $conn->prepare("SELECT * FROM itens WHERE codigo_lista = :codigo");
                    }
                    $stmtitens->execute($par);
                    echo "<dd><br>";
                    if ($stmtitens->rowCount() > 0) {
                        echo "<ul>";
                        foreach ($stmtitens as $item) {
                            $datahora = new DateTime($item["datahora"]);
                            echo "<li>" . $item["codigo"] . " - " . $item["descricao"] . " - " . $item["quantidade"] . " - " . $datahora->format("d/m/Y H:i:s");
                            //criando botão alterar item
                            $botao = "<button id='alterar' name='alterar' onclick='redirecionar(\"alteraritem.php?codigo=%u\")'>Alterar</button>";
                            $botao = sprintf($botao, $item["codigo"]);
                            echo "&nbsp;" . $botao;
                            //criando botão excluir
                            $botao = "<button id='excluir' name='excluir' onclick='confirmaexcluir(\"excluiritem.php\",%u,\"%s\")'>Excluir</button>";
                            $botao = sprintf($botao, $item["codigo"], htmlspecialchars($item["descricao"]));
                            echo "&nbsp;" . $botao;
                            echo "</li>";
                        }
                        echo "</ul>";
                    } else {
                        echo "Lista não contém itens<br>";
                    }
                    echo "<br></dd>";
                }
                echo "</dl>";
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