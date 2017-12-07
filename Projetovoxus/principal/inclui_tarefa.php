<?php

session_start();

if (!isset($_SESSION['nome'])) {
    header('Location: ../index/index.php?erro=1');
}
require_once '../config/config.php';

$nome_tarefa = (string) filter_input(INPUT_POST, 'nome_tarefa'); //$_POST['nome_tarefa'];
$prioridade = (int) filter_input(INPUT_POST, 'prioridade'); //$_POST['prioridade'];
$desc_tarefa = (string) filter_input(INPUT_POST, 'desc_tarefa'); //$_POST['desc_tarefa'];
$autor = (string) filter_input(INPUT_POST, 'autor'); //$_POST['autor'];
$status = (string) filter_input(INPUT_POST, 'status'); //$_POST['status'];
$data = date('y/m/d');
$finalizada = "Tarefa não finalizada";
$id = $_SESSION['id'];

//Upload de arquivos
$file = $_FILES['file'];
if ($file['error']==4) {

    $file['name'] = 'Nenhum anexo adicionado';
} else {
    if ($file['error']) {
        throw new Exception('Error:' . $file['error']);
    }
    $diruploads = 'uploads';
    if (!is_dir($diruploads)) {
        mkdir($diruploads);
    }
    move_uploaded_file($file['tmp_name'], $diruploads . DIRECTORY_SEPARATOR . $file['name']);
}

//Verifica campos para adicionar tarefa e após insrimos no banco;

if ($nome_tarefa == '' || $desc_tarefa == '' || $status == '') {
    header('Location:tela_dashboard.php');
}
try {
    $stmt = $conn->prepare('insert into task (nome,descricao,prioridade,id_usuario,autor,data_inclusao,status,anexo,finalizada) values(?,?,?,?,?,?,?,?,?)');
    $stmt->bindParam(1, $nome_tarefa);
    $stmt->bindParam(2, $desc_tarefa);
    $stmt->bindParam(3, $prioridade);
    $stmt->bindParam(4, $id);
    $stmt->bindParam(5, $autor);
    $stmt->bindParam(6, $data);
    $stmt->bindParam(7, $status);
    $stmt->bindParam(8, $file['name']);
    $stmt->bindParam(9, $finalizada);
    $stmt->execute();
    header('Location:tela_dashboard.php');
} catch (Exception $ex) {
    
}
