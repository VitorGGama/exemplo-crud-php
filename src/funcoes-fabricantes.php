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

}

/*teste 
$dados = lerFabricantes($conexao);
var_dump($dados);*/