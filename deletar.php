<?php


$host = "tccaut0match.mysql.dbaas.com.br"; 
$usuario = "tccaut0match"; 
$senha = "CP-Freitas1!"; 
$banco = "tccaut0match"; 


$conexao = new mysqli($host, $usuario, $senha, $banco);


if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // SQL para deletar o registro com base no ID
    $sql = "DELETE FROM cadastro WHERE id = $id";

    if ($conexao->query($sql) === TRUE) {
        echo "Registro deletado com sucesso!";
    } else {
        echo "Erro ao deletar registro: " . $conexao->error;
    }
} else {
    echo "ID não fornecido para exclusão.";
}

// Fecha a conexão
$conexao->close();
?>
