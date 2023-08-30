<?php
require_once "../src/funcoes-fabricantes.php";
require_once "../src/funcoes-produtos.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$produtos = lerUmProduto($conexao, $id);

if(isset($_POST['atualizar'])){
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    atualizarProdutos($conexao, $nome, $descricao, $preco, $quantidade, $id);
    header("location:visualizar.php?status=sucesso");
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - atualização</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="mt-4">Produtos | UPDATE</h1>
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
                    
                </select>
            </div>
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" name="atualizar">Atualizar Produto</button>
        </form>

        <hr>
        <p><a href="visualizar.php">Voltar</a></p>
    </div>

   
</body>

</html>
