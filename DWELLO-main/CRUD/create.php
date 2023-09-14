<?php
    include "../conexao.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $cor = $_POST['cor'];
        $material = $_POST['material'];
        $tamanho = $_POST['tamanho'];
        $formato = $_POST['formato'];
        $peso = $_POST['peso'];
        $qnt_estoque = $_POST['qnt_estoque'];

        $sql = "INSERT INTO produtos (nome, valor, cor, material, tamanho, formato, peso, qnt_estoque) VALUES ('$nome', '$valor', '$cor', '$material', '$tamanho', '$formato', '$peso', '$qnt_estoque')";

        $result = mysqli_query($conn, $sql);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Registrar Mercadoria</title>
    
</head>
<body class="p-3 mb-2 bg-warning text-dark">


    <div class="container p-3 mb-2 bg-light text-dark" style="border-radius: 10px;"> 
        <h2>Adicionar Nova Mercadoria</h2>
        <form method="POST" action="" style="font-size: 20px; font-weight:bold;">

            <div>
                <label for="nome">Nome:</label><br>
                <input type="text" name="nome" maxlength="40" required><br>
            </div>

            <div>
                <label for="valor">Valor:</label><br>
                <input type="number" name="valor" maxlength="30" required><br>
            </div>

            <div>
                <label for="cor">Cor:</label><br>
                <input type="text" name="cor" required><br>
            </div>

            <div>
                <label for="material">Material:</label><br>
                <input type="text" name="material" maxlength="40" required><br>
            </div>

            <div>
                <label for="tamanho">Tamanho:</label><br>
                <input type="text" name="tamanho" maxlength="40" required><br>
            </div>

            <div>
                <label for="formato">Formato:</label><br>
                <input type="text" name="formato" maxlength="40" required><br>
            </div>

            <div>
                <label for="peso">Peso (em Kg):</label><br>
                <input type="number" name="peso" maxlength="40" required><br>
            </div>

            <div>
                <label for="qnt_estoque">Quantidade no estoque:</label><br>
                <input type="number" name="qnt_estoque" maxlength="40" required><br>
            </div>
            
            <div style="margin-top: 2%;">
                <input class="btn btn-primary btn-lg" type="submit" value="Adicionar Mercadoria">
                <a href="../index.php" style="margin-left:2%">Voltar</a>
            </div>
            
        </form>
    </div>
</body>
</html>