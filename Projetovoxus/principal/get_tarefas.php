<?php

session_start();

if(!isset($_SESSION['nome'])){
    header('Location:../index/index.php?erro=1');
}
require_once '../config/config.php';

//Inserção das <td> na tabela da tela_dashboard.php e sendo ordenada por prioridade;
$sql=("SELECT id,nome,data_inclusao,autor,status,prioridade FROM task ORDER BY prioridade");

foreach ($conn->query($sql) as $resultado) {
    echo '<tr>';
        echo'<th scope="col">'.$resultado['id'].'</th>';
        echo'<th scope="col">'.$resultado['nome'].'</th>';
        echo'<th scope="col">'.$resultado['data_inclusao'].'</th>';
        echo'<th scope="col">'.$resultado['autor'].'</th>';
        echo'<th scope="col">'.$resultado['prioridade'].'</th>';
        echo'<th scope="col">'.$resultado['status'].'</th>';
        echo'<th scope="col"><a href="tela_visualizar.php?id='.$resultado['id'].'"><button id="visu" class="btn btn-success"title="Visualizar"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                <a href="tela_alterar.php?id='.$resultado['id'].'"><button class="btn btn-warning"title="Alterar"><i class="fa fa-exchange" aria-hidden="true"></i></button></a>
                                <a href="deletar.php?id='.$resultado['id'].'"><button class="btn btn-danger" title="Deletar"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a></th>';
    echo'</tr>';
    }