<?php
require_once "../src/funcoes-fabricantes.php";
require_once "../src/funcoes-produtos.php";

$listaDeFabricantes = lerFabricantes($conexao);

if(isset($_POST['inserir'])){
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $preco = filter_input(
        INPUT_POST, "preco",
        FILTER_SANITIZE_NUMBER_FLOAT,
        FILTER_FLAG_ALLOW_FRACTION
    );

    $quantidade = filter_input(
        INPUT_POST, "quantidade", FILTER_SANITIZE_NUMBER_INT
    );

    $fabricanteId = filter_input(
        INPUT_POST, "fabricante", FILTER_SANITIZE_NUMBER_INT
    );

    $descricao = filter_input(INPUT_POST, "descricao",
    FILTER_SANITIZE_SPECIAL_CHARS);

   


    inserirproduto(
        $conexao, $nome, $preco, $quantidade, $fabricanteId, $descricao);

    header("location:visualizar.php");

}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserção</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Produtos | Inserção</h1>
        <hr>

        <form action="" method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" id="nome" required>
            </div>
            <div class="mb-3">
                <label for="preco" class="form-label">Preço:</label>
                <input type="number" min="10" max="1000" step="0.01" class="form-control" name="preco" id="preco" required>
            </div>
            <div class="mb-3">
                <label for="quantidade" class="form-label">Quantidade:</label>
                <input type="number" min="1" max="100" class="form-control" name="quantidade" id="quantidade" required>
            </div>
            <div class="mb-3">
                <label for="fabricante" class="form-label">Fabricante:</label>
                <select class="form-select" name="fabricante" id="fabricante">
                    <option value=""></option>
                    <?php foreach ($listaDeFabricantes as $fabricante) { ?>
                        <option value="<?= $fabricante['id'] ?>"><?= $fabricante['nome'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="inserir">Inserir Produto</button>
        </form>

        <hr>
        <p><a href="visualizar.php">Voltar</a></p>
    </div>

   
</body>

</html>
