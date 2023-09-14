<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include "../conexao.php";

        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $valor = $_POST['valor'];
        $cor = $_POST['cor'];
        $material = $_POST['material'];
        $tamanho = $_POST['tamanho'];
        $formato = $_POST['formato'];
        $peso = $_POST['peso'];
        $qnt_estoque = $_POST['qnt_estoque'];

        $sql = "UPDATE produtos SET nome = '$nome', valor = '$valor', cor='$cor', material = '$material', tamanho = '$tamanho', formato = '$formato', peso = '$peso', qnt_estoque = '$qnt_estoque' WHERE codigo = '$codigo'";
        echo $sql; 
        $result = mysqli_query($conn, $sql);

        if($result){
        header('Location: ../index.php');
        exit();
        }else{
            echo "Erro ao atualizar dados do produto";
            die(mysqli_error($conn));
        }
    }elseif(isset($_GET['codigo'])){
        include "../conexao.php";

        $codigo = $_GET['codigo'];
        $sql = "SELECT * FROM produtos WHERE codigo = $codigo";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/css/bootstrap.min.css">
    <title>Editar Mercadoria</title>
</head>
<body class="container p-3 mb-2 bg-warning text-dark">
    <div class="p-3 mb-2 bg-light text-dark" style= "border-radius: 10px;">
        <?php if($row): ?>
            <h2>Atualizar Dados da Mercadoria <?php echo $row['nome']?></h2>
            <form action="" method="POST" style="margin-top:2%; font-size: 20px; font-weight:bold;">
            <div>
                <label for="codigo">Código</label><br>
                <input type="text" type="hidden" name="codigo" value="<?php echo $row['codigo']?>" readonly>
            </div>
            <div>
                <label for="nome" >Nome</label><br>
                <input maxlength="40" type="text" value="<?php echo $row['nome']?>" name="nome">
            </div>
            <div>
                <label for="valor">Valor</label><br>
                <input type="text" maxlength="30" value="<?php echo $row['valor']?>" name="valor">
            </div>
            <div>
                <label for="cor">Cor</label><br>
                <input type="text" maxlength="30" value="<?php echo $row['cor']?>" name="cor">
            </div>
            <div>
                <label for="material">Material</label><br>
                <input type="text" maxlength="30" value="<?php echo $row['material']?>" name="material">
            </div>
            <div>
                <label for="tamanho">Tamanho</label><br>
                <input type="text" maxlength="30" value="<?php echo $row['tamanho']?>" name="tamanho">
            </div>
            <div>
                <label for="formato">Formato</label><br>
                <input type="text" maxlength="30" value="<?php echo $row['formato']?>" name="formato">
            </div>
            <div>
                <label for="peso">Peso</label><br>
                <input type="text" maxlength="30" value="<?php echo $row['peso']?>" name="peso">
            </div>
            <div>
                <label for="qnt_estoque">Quantidade no estoque</label><br>
                <input type="number" maxlength="30" value="<?php echo $row['qnt_estoque']?>" name="qnt_estoque">
            </div>
            <div style="margin-top: 2%;">
                <input class="btn btn-warning btn-lg" type="submit" value="Atualizar Mercadoria">
                <a href="../index.php" style="margin-left:2%;">Voltar</a>
            </div>
                
        </form>
        <?php else: ?>
            <p>Erro ao atualizar a mercadoria</p>
        <?php endif; ?>
    </div>
</body>
</html>