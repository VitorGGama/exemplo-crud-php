<?php
/* Importando as funções de manipulação de fabricantes */
require_once "../src/funcoes-fabricantes.php";
/* Guardando o retorno/resultado da função lerFabricantes */
$listaDeFabricantes = lerFabricantes($conexao); 

/*contando quantos fabricantes temos na matriz*/ 
$quantidade = count($listaDeFabricantes);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - visualização</title>
    <!-- Adicionando o link para o CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Fabricantes | SELECT -</h1>
        <a href="../index.php" class="mb-3 d-block">Home</a>
        <hr>
        <h2>Lendo e carregando todos os fabricantes.</h2>

        <a href="inserir.php" class="btn btn-primary mb-3">Inserir novo fabricante <?=$quantidade = count($listaDeFabricantes);?></a>

        <table class="table">
            <caption>Lista de Fabricantes </caption>
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
                        <td> <?=$fabricante["id"] ?></td>
                        <td> <?=$fabricante["nome"] ?></td>
                        <td>
                            <!-- Link dinamico 
                            A URL do href de parametro vom dados dinamicos (no caso, ID de cada fabricante)-->
                            <a href="atualizar.php?id=<?=$fabricante["id"]?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="#" class="btn btn-danger btn-sm">Excluir</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <p><a href="visualizar.php">Voltar</a></p>

    <!-- Adicionando os scripts JavaScript do Bootstrap (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
