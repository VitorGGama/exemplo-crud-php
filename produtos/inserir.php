<?php
require_once "../src/funcoes-fabricantes.php";
$listaDeFabricantes = lerFabricantes($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Inserção</title>
    <!-- Adicione os links para os arquivos CSS do Bootstrap -->
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

    <!-- Adicione o link para o arquivo JavaScript do Bootstrap, se necessário -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>
