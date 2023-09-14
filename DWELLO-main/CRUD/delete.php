<?php
    if(isset($_GET['codigo'])){
        include "../conexao.php";
        $codigo = $_GET['codigo'];
        $sql = "DELETE FROM produtos WHERE codigo = $codigo";
        $result = mysqli_query($conn, $sql);

        if($result){
            header("Location: ../index.php");
            exit();
        } else {
            echo "Erro ao excluir o livro";
        }
    }

?>
