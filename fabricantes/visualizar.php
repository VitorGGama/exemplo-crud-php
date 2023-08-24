<?php
/*Importando as funções de manipulação de fabricantes*/
require_once "../src/funcoes-fabricantes.php";
/*Guardando o retorno/resultado da função lerFabricantes*/
$listaDeFabricantes = lerFabricantes($conexao); 
?>
<pre><?=var_dump($listaDeFabricantes)?></pre>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes - visualização</title>
</head>
<body>
    <h1>Fabricantes | SELECT -</h1>
    <a href="../index.php">Home</a>
    <hr>
    <h2>Lendo e carregando todos os fabricantes.</h2>

    <a href="inserir.php">Inserir novo fabricante</a>

        
    <table> 
        <caption>Lista de Fabricantes</caption>  
             
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Operações</th>    
         </tr> 
        <?php foreach($listaDeFabricantes as $fabricante) { ?>
         <tr>
            <td> <?=$fabricante["id"] ?></td>
            <td> <?=$fabricante["nome"] ?></td>
            <td><a href="">Editar</a>
                <a href="">Excluir</a></td>
         </tr>
 <?php } ?>
    </table>

</body>
</html>