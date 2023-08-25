<?php
/*obtendo e sanitizando o valor do parametro de url(link dinamico)*/ 
$id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
echo $id;
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
        <p>
            <label for="">Nome:</label>
            <input type="text" name="nome" id="nome">
        </p>
        <button type="submit" name="atualizar">atualizar fabricante </button>
    </form>

    <hr>
    <p><a href="visualizar.php">Voltar</a></p>
</body>
</html>