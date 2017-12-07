<?php
session_start();

if (!isset($_SESSION['nome'])) {
    header('Location: ../index/index.php?erro=1');
}
require_once '../config/config.php';
//Pegar os dados para imprimir na tela

$id = (int) filter_input(INPUT_GET, 'id');
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
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/alterar.css"
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
        <title>Cadastra Tarefas</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="tela_dashboard.php">Painel Voxus</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto" >
                    <li class="nav-item">
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
        <h1>Alteração de tarefas</h1>
        <hr>
        <div class="container">
            <div class="altera_principal">
                <form action="alterar.php" method="POST">
                    <label for="nome_tarefa">Titulo:</label><input type="text" name="nome_tarefa" id="nome_tarefa" value="<?= $resultado['nome'] ?>"><br>
                    <label for="file">Anexo:</label><input class="btn btn-primary" type="file" name="file" id="file">
                    <label for="prioridade">Prioridade:</label><select name="prioridade" id="prioridade">
                        <option selected value="<?= $resultado['prioridade'] ?>"><?= $resultado['prioridade'] ?></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <label for="status">Status:</label><select name="status" id="status">
                        <option selected value="<?= $resultado['status'] ?>"><?= $resultado['status'] ?></option>
                        <option value="Não iniciada">Não iniciada</option>
                        <option value="Processada">Processada</option>
                        <option value="Finalizada">Finalizada</option>
                    </select><br>
                    <label for="autor">Autor da tarefa:</label><input name="autor" id="autor" type="text" readonly="true" value="<?= $resultado['autor'] ?>"><br>
                    <label for="desc_tarefa">Descrição:</label><br>
                    <textarea resize="none" name="desc_tarefa" id="desc_tarefa"><?= $resultado['descricao'] ?></textarea><br>
                    <input type="hidden" name="id_tarefa" readonly id="id_tarefa" value="<?= $_GET['id'] ?>">
                    <div class="btn-group">
                        <button type="submit" class="botao btn btn-success">Alterar</button>
                        <a href="tela_dashboard.php"><button type="button" class=" botao btn btn-danger">Voltar</button></a>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>