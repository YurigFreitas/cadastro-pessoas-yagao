<?php
$host = "tccaut0match.mysql.dbaas.com.br"; 
$usuario = "tccaut0match"; 
$senha = "CP-Freitas1!"; 
$banco = "tccaut0match"; 


$conexao = new mysqli($host, $usuario, $senha, $banco);


if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}


$sql = "SELECT * FROM cadastro";

$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consultar Cadastros</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
    <style>
        

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
}

.consulta {
    max-width: 800px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
}

a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    text-decoration: none;
    color: #fff;
    background-color: #007bff;
    border-radius: 5px;
    transition: background-color 0.3s;
}

a:hover {
    background-color: #0056b3;
}

        </style>
    <div class="consulta">
        <h1>Consulta de Cadastros</h1>

    

       <?php
        if ($resultado->num_rows > 0) {
            
            echo "<table>";
            echo "<tr><th>ID</th><th>Nome</th><th>Endereço</th><th>Telefone</th><th>Ações</th></tr>";

            while ($row = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nome"] . "</td>";
                echo "<td>" . $row["endereco"] . "</td>";
                echo "<td>" . $row["telefone"] . "</td>";
                
                
                echo "<td><a href='deletar.php?id=" . $row["id"] . "' onclick='return confirm(\"Deseja realmente deletar?\")'>Deletar</a></td>";

                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Nenhum registro encontrado.";
        }

       
        ?>


        <br>
        <a href="index.php">Voltar</a> <!-- "Voltar" para a página index.php -->
    </div>
</body>
</html>
