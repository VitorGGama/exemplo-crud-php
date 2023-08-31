<?php
require_once "../src/funcoes-fabricantes.php";

$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
$fabricante = lerUmFabricante($conexao, $id);

if (isset($_POST['atualizar'])) {
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    atualizarFabricante($conexao, $nome, $id);
    header("location:visualizar.php?status=sucesso");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes | Atualização</title>
    <!-- Adicionar os links do Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
            border: 1px solid #ccc;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mb-4">Fabricantes | SELECT/UPDATE</h1>
        <hr>

        <form action="" method="post">
            <input type="hidden" name="id" value="<?=$fabricante['id']?>"> <!-- Corrigir o campo oculto -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input value="<?=$fabricante['nome']?>" type="text" name="nome" id="nome" class="form-control">
            </div>
            <button type="submit" name="atualizar" class="btn btn-primary">Atualizar fabricante</button>
        </form>

        <hr>
        <p><a href="visualizar.php" class="btn btn-secondary">Voltar</a></p>
    </div>

    <!-- Adicionar os scripts do Bootstrap JS, se necessário -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>
