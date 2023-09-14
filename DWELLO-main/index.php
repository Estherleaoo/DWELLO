<?php
include "conexao.php";

if(isset($_GET['filter'])){
    $key = $_GET['filter'];
    $sql = "SELECT * FROM produtos where nome LIKE '$key%'";
}
elseif(isset($_GET['hasSubmitted'])){
$preco_l = $_GET['preco_l'];
$preco_r = $_GET['preco_r'];
$tamanho_l = $_GET['tamanho_l'];
$tamanho_r = $_GET['tamanho_r'];
$cor = $_GET['cor'];
$material = $_GET['material'];
$peso_l = $_GET['peso_l'];
$peso_r = $_GET['peso_r'];

$sql = "SELECT * FROM produtos";

if (!empty($preco_l) && !empty($preco_r)) {
    $sql .= " WHERE valor BETWEEN $preco_l AND $preco_r";
}

if (!empty($tamanho_l) && !empty($tamanho_r)) {
    if (strpos($sql, 'WHERE') !== false) {
        $sql .= " AND tamanho BETWEEN $tamanho_l AND $tamanho_r";
    } else {
        $sql .= " WHERE tamanho BETWEEN $tamanho_l AND $tamanho_r";
    }
}

if (!empty($cor)) {
    if (strpos($sql, 'WHERE') !== false) {
        $sql .= " AND cor = '$cor'";
    } else {
        $sql .= " WHERE cor = '$cor'";
    }
}

if (!empty($material)) {
    if (strpos($sql, 'WHERE') !== false) {
        $sql .= " AND material = '$material'";
    } else {
        $sql .= " WHERE material = '$material'";
    }
}

if (!empty($peso_l) && !empty($peso_r)) {
    if (strpos($sql, 'WHERE') !== false) {
        $sql .= " AND peso BETWEEN $peso_l AND $peso_r";
    } else {
        $sql .= " WHERE peso BETWEEN $peso_l AND $peso_r";
    }
}
}
else{
    $sql = "SELECT * FROM produtos";
}

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Erro na consulta: " . mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>DWELLO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/dwello-logo.svg" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
</head>
<body class="p-3 mb-2 bg-warning text-dark">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>

    <!--<div class="p-3 mb-2 bg-warning text-dark">-->
    <div class="container-xl" style="margin-top: 2%;">

    <nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand">
            <img src="assets/dwello-logo.svg" alt="Logo" width="132" height="88">
            <span class='h2'>DWELLO</span>
        </a>
        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Produto" aria-label="Produto" name='filter'>
            <button class="btn btn-outline-dark" type="submit"> Pesquisar </button>
        </form>
    </div>
    <div class="imagem.d-flex" style="position:relative; margin-top: 1%; width: 100%; height: 100%; margin-bottom: 1%;">
        <img class="d-flex.align-self-center" src="assets/DWELLO-image-4.jpg" alt="DWELLO STORE" height="100%" width="100%">
        <div class="texto-dwello" style="position:absolute; background-color: rgba(0, 0, 0, 0.5); color: #fff; top:0%; width:100%; height: 100%">
            <h1 style="font-size: 320%; margin-top:3%; margin-left: 3%;">Controle de Estoque</h1>
        </div>
    </div>
    </nav>

        <ul class="nav nav-tabs bg-body-tertiary">
        <li class="nav-item">
            <a class="nav-link active" href="#"> Visualizar estoque </a>
        <li class="nav-item">
            <a class="nav-link" href="CRUD/create.php"> Registrar produto </a>
        </li>
        <li class="nav-item">
            <button class="nav-link" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
  Filtrar estoque
</button>
        </li>
        </ul>


    <div class="table-responsive-sm">
    <table class="table table-hover shadow-sm   ">
        <tr>
            <th>Nome</th>
            <th>Valor</th>
            <th>Cor</th>
            <th>Material</th>
            <th>Formato</th>
            <th>Estoque</th>
            <th>Operações</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?php echo $row['nome']; ?></td>
                <td>R$ <?php echo $row['valor']; ?></td>
                <td><?php echo $row['cor']; ?></td>
                <td><?php echo $row['material']; ?></td>
                <td><?php echo $row['formato']; ?></td>
                <td><?php echo $row['qnt_estoque']; ?></td>
                <td class='d-grid gap-2 d-md-block'>
                        <a href="Inventory/sell.php?codigo=<?php echo $row['codigo']; ?>"><button class="btn btn-success btn-sm">Vender</button></a>
                        <a href="Inventory/add.php?codigo=<?php echo $row['codigo']; ?>"><button class="btn btn-secondary btn-sm">Adicionar</button></a>
                        <a href="CRUD/read.php?codigo=<?php echo $row['codigo']; ?>"><button class="btn btn-primary btn-sm">Detalhes</button></a>
                        <a href="CRUD/update.php?codigo=<?php echo $row['codigo']; ?>"><button class="btn btn-warning btn-sm">Editar</button></a>
                        <a href="CRUD/delete.php?codigo=<?php echo $row['codigo']; ?>"><button type="button" class="btn btn-outline-danger btn-sm">Excluir</button></a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    </div>
    </div>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Filtro de estoque</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <form action="" method='GET' class='container'>

<div class="row row-cols-4 text-left align-items-center g-3 p-2">
    <div class="col"><label for="" class='form-label'>Preço:</label></div>
    <div class="col"><input type="number" name="preco_l" id="" placeholder='0.00' class='form-control form-control-sm' step="any"></div>
    <div class="col"><label for="" class='form-label'>  entre </label></div>
    <div class="col"><input type="number" name="preco_r" id="" placeholder='0.00' class='form-control form-control-sm' step="any"></div>
</div>


<div class="row row-cols-4 text-left align-items-center g-3 p-2">
    <div class="col"><label for="" class='form-label'>Tamanho:</label></div>
    <div class="col"><input type="number" name="tamanho_l" id="" placeholder='0.00' class='form-control form-control-sm' step="any"></div>
    <div class="col"><label for="" class='form-label'>  entre </label></div>
    <div class="col"><input type="number" name="tamanho_r" id="" placeholder='0.00' class='form-control form-control-sm' step="any"></div>
</div>


<div class="row row-cols-4 text-left align-items-center g-3 p-2">
    <div class="col"><label for="" class='form-label'>Cor:</label></div>
    <div class="col"><input type="text" name="cor" id="" placeholder='branco' class='form-control form-control-sm'></div>
    <div class="col"><label for="" class='form-label'>Material:</label></div>
    <div class="col"><input type="text" name="material" id="" placeholder='madeira' class='form-control form-control-sm'></div>
</div>


<div class="row row-cols-4 text-left align-items-center g-3 p-2">
    <div class="col"><label for="" class='form-label'>Peso:</label></div>
    <div class="col"><input type="number" name="peso_l" id="" placeholder='0.00' class='form-control form-control-sm' step="any"></div>
    <div class="col"><label for="" class='form-label'>  entre </label></div>
    <div class="col"><input type="number" name="peso_r" id="" placeholder='0.00' class='form-control form-control-sm' step="any"></div>
</div>

<input type="hidden" name="hasSubmitted" value="1">

<div class="d-grid gap-2">
  <button class="btn btn-outline-warning" type="submit">Filtrar</button>
</div>

            </form>
        </div>
        </div>
    <!--</div>-->
</body>
</html>