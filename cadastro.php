<?php
$host = "tccaut0match.mysql.dbaas.com.br"; 
$usuario = "tccaut0match"; 
$senha = "CP-Freitas1!"; 
$banco = "tccaut0match";


$conexao = new mysqli($host, $usuario, $senha, $banco);


if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}


$nome = $_POST["nome"];
$endereco = $_POST["endereco"];
$telefone = $_POST["telefone"];

// Insere os dados na tabela "cadastro"
$sql = "INSERT INTO cadastro (nome, endereco, telefone) VALUES ('$nome', '$endereco', '$telefone')";

if ($conexao->query($sql) === TRUE) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . $conexao->error;
}


$conexao->close();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <title>Cadastrado com SUCESSO!</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="style/cadastrado.css">
    
</head>
<body>
    <style>
    *{
    margin-top: 3%;
}
    </style>
<div class="sucesso">
 <a href="index.php">Voltar</a> <!-- "Voltar" para a página index.php -->
 <a href="consultar.php">Consultar</a>
</div>