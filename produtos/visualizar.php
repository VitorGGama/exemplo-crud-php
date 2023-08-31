<?php
require_once "../src/funcoes-produtos.php";
require_once "../src/funcoes-utilitarias.php";

$listaDeProdutos = lerProdutos($conexao);

$produtos = count($listaDeProdutos);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Visualização</title>
    <style>
        * { box-sizing: border-box; }
        .produtos {
            font-family: 'Segoe UI';
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            width: 80%;
            margin: auto;
        }
        .produto {
            background-color: #FFF5EE;
            padding: 1rem;
            width: 49%;
            box-shadow: rgba(0,0,0,0.3) 0 0 3px 1px;
        }
    </style>
</head>
<body>
    <h1>Produtos | SELECT - <a href="../index.php">Home</a> </h1>
    <hr>
    <h2>Lendo e carregando todos os produtos.</h2>
    <p><a href="inserir.php">
        Inserir novo produto</a></p>
    <div class="produtos">

    <?php foreach( $listaDeProdutos as $produto ){  ?>  
        <article class="produto">
            <h3><?=$produto["produto"]?></h3>
            <h4><?=$produto["fabricante"]?></h4>
            <p><b>Preço:</b> <?=formatarPrecos($produto["preco"]) ?> </p>
            <p><b>Quantidade:</b> <?=$produto["quantidade"]?> </p>
            <p><b>Total:</b> <?=formatarPrecos($produto["quantidade"] * $produto["preco"])?> </p>
            <p><b>Total:</b> <?=formatarPrecos($produto ["total"])?></p>

            <hr>
            <p>
                <a  href="atualizar.php?id=<?=$produto["id"]?>">Editar</a> | <a class="excluir"href="excluir.php?id=<?=$produto["id"]?>">Excluir</a>
            </p>
        </article>
    <?php
    }
    ?>
    </div>

    <script src="../js/confirma-exclusao.js"></script>
</body>
</html>