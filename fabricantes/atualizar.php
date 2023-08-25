<?php
require_once "../src/funcoes-fabricantes.php";

/*obtendo e sanitizando o valor do parametro de url(link dinamico)*/ 
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);


/*Chamando a função e recuperando os dados de um fabricante de acordo com o id passado*/ 
$fabricante = lerUmFabricante($conexao, $id); 

/* verificar se o formulario foi acionado */ 
if( isset($_POST['atualizar']) ){
    $nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    atualizarFabricante($conexao, $nome, $id);
    header("location:visualizar.php");

    
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabricantes | atualização</title>
</head>
<body>
    <h1>Fabricantes | SELECT/UPDATE</h1>
    <hr>
    <form action="" method="post">

    <!--Campo oculto usado apenas para registro no formulário od id do 
    fabricante que esta sendo visualizado-->
        <input type="hidden" name="id" value="<?=$fabricante?>">; 
        <p>
            <label for="">Nome:</label>
            <input value="<?=$fabricante['nome']?>" type="text" name="nome" id="nome">
        </p>
        <button type="submit" name="atualizar">atualizar fabricante </button>
    </form>

    <hr>
    <p><a href="visualizar.php">Voltar</a></p>
</body>
</html>