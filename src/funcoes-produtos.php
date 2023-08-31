<?php
require_once "conecta.php";


function lerProdutos(PDO $conexao): array
{
  //Versão 1 (dados somente da tabela produtos)
  //$sql = "SELECT nome, preco, quantidade FROM produtos ORDER BY nome";

  //versão 2(dados das duas tabelas: produtos e fabricantes)
  $sql = "SELECT 
          produtos.id,
          produtos.nome AS produto,
          produtos.preco,
          produtos.quantidade,
          fabricantes.nome AS fabricante,
          (produtos.preco * produtos.quantidade) AS total          
        FROM produtos INNER JOIN fabricantes
        ON produtos.fabricante_id = fabricantes.id
        ORDER BY produto";

  try {
    $consulta = $conexao->prepare($sql);
    $consulta->execute();
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
  } catch (Exception $erro) {
    die("Erro ao carregar produtos: " . $erro->getMessage());
  }

  return  $resultado;
}


function inserirproduto(
  PDO $conexao,
  string $nome,
  float $preco,
  int $quantidade,
  int $fabricanteId,
  string $descricao
): void {

  $sql = "INSERT INTO produtos(
      nome, preco, quantidade, descricao, fabricante_id)
       VALUES(
        :nome, :preco, :quantidade, :descricao, :fabricante_id
    )";

  try {
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);

    /*Ao trabalhar com valores quebrados, para os parametros nomeados, você
      usar a constante PARAM_STR. No momento não há outra forma do PDO de lidar com  valores deste tipo devido aos diferentes tipos de dados 
      que cada banco de dados suporta. */
    $consulta->bindValue(":preco", $preco, PDO::PARAM_STR);
    $consulta->bindValue(":quantidade", $quantidade, PDO::PARAM_INT);
    $consulta->bindValue(":descricao", $descricao, PDO::PARAM_STR);
    $consulta->bindValue(":fabricante_id", $fabricanteId, PDO::PARAM_INT);

    $consulta->execute();
  } catch (Exception $erro) {
    die("Erro ao inserir:" . $erro->getMessage());
  }
}

function lerUmProduto(PDO $conexao, int $id): array
{
  $sql = "SELECT * FROM produtos WHERE id = :id";


  try {
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":id", $id, PDO::PARAM_INT);
    $consulta->execute();
    $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
  } catch (Exception $erro) {
    die("Erro ao carregar dados:" . $erro->getMessage());
  }
  return $resultado;
}





function atualizarProduto(
  PDO $conexao,
  int $id,
  string $nome,
  float $preco,
  int $quantidade,
  string $descricao,
  int $fabricanteId
): void {

  $sql = "UPDATE  produtos SET
            nome = :nome,
            preco = :preco,
            quantidade = :quantidade,
            descricao = :descricao,
            fabricante_id = :fabricanteId
            WHERE id = :id";

  try {
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":nome", $nome, PDO::PARAM_STR);
    $consulta->bindValue(":preco", $preco, PDO::PARAM_STR);
    $consulta->bindValue(":quantidade", $quantidade, PDO::PARAM_INT);
    $consulta->bindValue(":descricao", $descricao, PDO::PARAM_STR);
    $consulta->bindValue(":fabricanteId", $fabricanteId, PDO::PARAM_INT);
    $consulta->bindValue(":id", $id, PDO::PARAM_INT);

    $consulta->execute();
  } catch (Exception $erro) {
    die("erro ao atualizar: " . $erro->getMessage());
  }
}

function excluirProduto(PDO $conexao, int $id):void {
  $sql = "DELETE FROM produtos WHERE id = :id";
  try {
      $consulta = $conexao->prepare($sql);
      $consulta->bindValue(":id", $id, PDO::PARAM_INT);
      $consulta->execute();
  } catch (Exception $erro) {
      die("Erro ao excluir: ".$erro->getMessage());
  }
}