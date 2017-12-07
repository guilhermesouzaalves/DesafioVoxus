<?php
require_once '../config/config.php';
session_start();
if (!isset($_SESSION['nome'])) {
    header('Location: ../index/index.php?erro=1');
}
$id = (string) filter_input(INPUT_GET, 'id');
$sql = ("select * from task where id='" . $id . "'");
foreach ($conn->query($sql) as $resultado) {
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/visualizar.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">        
        <title>Visualizar <?= $resultado['nome'] ?></title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="tela_dashboard.php">Painel Voxus</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><?= $_SESSION['nome'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><?= $_SESSION['email'] ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sair.php">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="col-md-10 divs esq">
                <h1 class="titulo prin"><?= $resultado['nome'] ?></h1>
            </div>
            <div class="col-md-2 divs dir">
                <h4 class="">Status:</h4>
                <h5><?= $resultado['status'] ?></h5>
                <hr>
                <h5>Finalizada por:</h5>
                <h5><?= $resultado['finalizada'] ?></h5>
            </div>
        </div>
        <div class="container">
            <div class="col-md-8 divs esq">
                <h4>Descrição:</h4>
                <p id="desc_txt"><?= $resultado['descricao'] ?></p>
            </div>
            <div class="col-md-4 divs dir">
                <h4>Anexo:</h4>
                <a href="uploads/<?= $resultado['anexo'] ?>"download><?= $resultado['anexo'] ?></a>                
            </div>
            <a href="tela_dashboard.php"><button type="button" class="botao btn btn-primary btn-lg btn-block">Voltar</button></a>
        </div>        
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    </body>
</html>