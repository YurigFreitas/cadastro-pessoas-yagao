<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <title>Cadastro de Pessoas</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="style/cadastrado.css">
    
</head>
<body>


    <script> // Aqui é a validação dos campos em javascript
        function validarFormulario() {
    let nome = document.getElementById("nome").value;
    let endereco = document.getElementById("endereco").value;
    let telefone = document.getElementById("telefone").value;

    if (nome === "") {
        alert("Por favor, preencha o campo Nome.");
        return false; 
    }
    
    if (endereco === "") {
        alert("Por favor, preencha o campo Endereço.");
        return false; 
    }
    
    if (telefone === "") {
        alert("Por favor, preencha o campo Telefone.");
        return false; 
    }
    
    return true; 
}
    </script>







    <h1>Cadastro de Pessoas</h1>
    
    <form action="cadastro.php" method="post" onsubmit= "return validarFormulario();">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" > 
        <!-- Formulário de cadastro das pessoas aqui -->
        <br>
        
        <label for="endereco">Endereço:</label>
        <input type="text" name="endereco" id="endereco" >
        
        <br>
        
        <label for="telefone">Telefone:</label>
        <input type="tel" name="telefone" id="telefone" >
        
        <br>
        
        <input type="submit" value="Cadastrar">
        <a href="consultar.php">Consultar</a> 
    </form>
</body>
</html>

<?php
$host = "tccaut0match.mysql.dbaas.com.br"; 
$usuario = "tccaut0match"; 
$senha = "CP-Freitas1!"; 
$banco = "tccaut0match"; 


$conexao = new mysqli($host, $usuario, $senha, $banco);


if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];

    
    $sql = "INSERT INTO cadastro (nome, endereco, telefone) VALUES ('$nome', '$endereco', '$telefone')";

    if ($conexao->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";

    } else {
        echo "Erro ao cadastrar: " . $conexao->error;
    }
    
}

// Fecha a conexão
$conexao->close();
?>

