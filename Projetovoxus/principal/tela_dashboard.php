<?php
session_start();

if (!isset($_SESSION['nome'])) {
    header('Location: ../index/index.php?erro=1');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="css/dash.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" ></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>        
        <title>Painel Principal</title>
        <script>
            //Ajax para trazer e imprimir as <td> na table 
            $(document).ready(function () {
                function attTarefas() {
                    $.ajax({
                        url: 'get_tarefas.php',
                        success: function (data) {
                            $('#tabela').html(data);
                        }
                    });
                }
                attTarefas();
            });
        </script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="tela_dashboard.php">Painel Voxus</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul id="menu_dash" class="navbar-nav ml-auto" >
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
            <div class="col-md">
                <a href="tela_cadastra_tarefa.php"<button id="btn-cadastra"class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>
                        Cadastrar</button></a>

                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tarefa</th>
                            <th scope="col">Data</th>
                            <th scope="col">Autor</th>
                            <th scope="col">Prioridade</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody id="tabela">
                    </tbody>
                </table>
            </div>
            <div class="col-md-3"></div>
        </div>
    </body>
</html>