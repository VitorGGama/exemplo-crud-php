<?php 
// conecta.php
/*Script de conexão ao servidor de banco de dados */
//Parâmetros 

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "vendas";


/*Configurações para conexão (API/DRIVER de conexão:
 PDO (PHP data object)) */
//Instacia/objeto PDO para conexão

try {
$conexao = new PDO(
    "mysql:host=$servidor;dbname=$banco;charset=utf8",
    $usuario, $senha
); 
//Habilitar a verificação e sinalização de erros(exceções)
$conexao->setAttribute(
    PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION
);
}catch(Exception $erro){
    /*Excepition é uma classe/tipo de dados
    voltado para tratamento de exceções (erros)*/
    die("Deu ruim!".$erro->getMessage());


}




