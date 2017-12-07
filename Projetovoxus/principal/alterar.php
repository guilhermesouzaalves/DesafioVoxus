<?php
//Inicio da sessão
session_start();

if (!isset($_SESSION['nome'])) {
    header('Location: ../index/index.php?erro=1');
}
//conexão banco;
require_once '../config/config.php';

$nome_tarefa = (string) filter_input(INPUT_POST, 'nome_tarefa'); //$_POST['nome_tarefa'];
$prioridade = (int) filter_input(INPUT_POST, 'prioridade'); //$_POST['prioridade'];
$desc_tarefa = (string) filter_input(INPUT_POST, 'desc_tarefa'); //$_POST['desc_tarefa'];
$status = (string) filter_input(INPUT_POST, 'status'); //$_POST['status'];
$id = (int) filter_input(INPUT_POST, 'id_tarefa');

 //Verificação do status para adicionar que finalizou
if ($status == "Finalizada") {
    $finalizador = $_SESSION['nome'];
} else {
    $finalizador = "Tarefa não finalizada";
}
if ($nome_tarefa == '' || $desc_tarefa == '' || $status == '') {
    header('Location:tela_dashboard.php');
}
try {
    $stmt = $conn->prepare("UPDATE task SET nome=?,descricao=?,prioridade=?,status=?,finalizada=? WHERE id=?");
    $stmt->bindParam(1, $nome_tarefa);
    $stmt->bindParam(2, $desc_tarefa);
    $stmt->bindParam(3, $prioridade);
    $stmt->bindParam(4, $status);
    $stmt->bindParam(5, $finalizador);
    $stmt->bindParam(6, $id);
    $stmt->execute();
    header('Location:tela_dashboard.php');
} catch (Exception $ex) {
    
}