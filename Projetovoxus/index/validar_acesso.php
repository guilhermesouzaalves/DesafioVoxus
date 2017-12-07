<?php

session_start();
require_once '../config/config.php';

$usuario = $_POST['usuario'];;
$senha = md5($_POST['senha']);

$stmt = $conn->query("select*from usuario where nome='".$usuario."'and senha='".$senha."'");
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);
if(isset($resultado['nome'])){
    $_SESSION['nome'] = $resultado['nome'];
    $_SESSION['email'] = $resultado['email'];
    $_SESSION['id'] = $resultado['id'];
    header('Location:../principal/tela_dashboard.php');
} else {
    header('Location:../index/index.php?erro=1');   
}