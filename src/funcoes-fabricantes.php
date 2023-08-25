<?php
/*Importando o script de conexão 
require_once garante que a importação 
é feita somente uma vez*/
require_once "conecta.php";

//usada em fabricantes/visualizar.php
function lerFabricantes( PDO $conexao ){
    $sql = "SELECT * FROM fabricantes ORDER BY nome";

    try {/*Método prepare():
    Faz uma preparação/pré-config do comando sql e guarda em memória 
    (variavel consulta).*/
    $consulta = $conexao->prepare($sql);

    /*método execute():
    Executa o comando SQL no banco de dados*/
    $consulta->execute(); 

      /*Método fetchALL()
    Buscar todos os dados da consulta como uma array assosciativo*/
    $resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
        //code...
    } catch (Exception $erro) {
        die("erro".$erro->getMessage());
        
    }     

    return $resultado;
    //fim fabricantes

}

//usada em fabricantes/inserir.php
function inserirFabricantes(PDO $conexao, string $nomeDoFabricante){
    /*  :qualqueCoisa  -> isso indica um "named parameter" (parametro nomeado)*/
    $sql = "INSERT INTO fabricantes(nome) VALUES(:nome)";
    
    try {
        $consulta = $conexao ->prepare($sql);

        /*bindValue() -> permite vincular o valor existente no parâmetro nomeado
         (:nome) à consulta que será executada.
         É necessario indicar qual é o parâmetro (:nome), de onde vem o valor
         ($nomeDoFabricante) e de que tipo ele é (PDO::PARAM_STR)*/
        $consulta->bindValue(":nome", $nomeDoFabricante, PDO::PARAM_STR);

        $consulta->execute();
    } catch (Exception $erro) {
        die("Erro ao inserir: ".$erro ->getMessage()); 
        
    }



} //fim inserir fabricante 

function lerUmFabricante(PDO $conexao, int $idFabricante){
    $sql = "SELECT * FROM fabricantes WHERE id = :id";

    try {
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(":id", $idFabricante, PDO::PARAM_INT);
        $consulta->execute();
        $resultado = $consulta->fetch(PDO::FETCH_ASSOC);
        
        
    } catch (Exception $erro) {
        die("Erro ao carregar: ".$erro->getMessage());
        
    }

} //fim lerUmFabricante

/*teste 
$dados = lerFabricantes($conexao);
var_dump($dados);*/

