<?php
require_once "../src/funcoes-fabricantes.php";
$listaDeFabricantes = lerFabricantes($conexao);
$quantidade = count($listaDeFabricantes);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - Visualização</title>
    <!-- Adicionar os links do Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Fabricantes | SELECT</h1>
        <a href="../index.php" class="mb-3 d-block">Home</a>
        <hr>
        <h2>Lendo e carregando todos os fabricantes.</h2>

        <a href="inserir.php" class="btn btn-primary mb-3">Inserir novo fabricante</a>

        <?php if(isset($_GET["status"]) && $_GET["status"] === "sucesso"){ ?>
            <h2 style="color:blue">Fabricante atualizado com sucesso!</h2>
        <?php } ?>

        <table class="table">
            <caption>Lista de Fabricantes (<?=$quantidade?>)</caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Operações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listaDeFabricantes as $fabricante) { ?>
                    <tr>
                        <td><?=$fabricante["id"]?></td>
                        <td><?=$fabricante["nome"]?></td>
                        <td>
                            <a href="atualizar.php?id=<?=$fabricante["id"]?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="excluir.php?id=<?=$fabricante["id"]?>" class="btn btn-danger btn-sm excluir">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <script src="../js/confirma-exclusao.js"></script>
    </div>

    <p><a href="visualizar.php" class="btn btn-secondary">Voltar</a></p>

    <!-- Adicionar os scripts do Bootstrap JS, se necessário -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
