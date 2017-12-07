<?php

require_once '../config/config.php';
$usuario = $_POST['nome'];
$email = $_POST['email'];
$senha = md5($_POST['senha']);

//Verifica email
$consulta = $conn->query("select*from usuario where email='" . $email . "'");
$resultado = $consulta->fetch(PDO::FETCH_ASSOC);
$emailexiste = false;
if (isset($resultado['email'])) {
    $emailexiste = true;
}if ($emailexiste) {
    $retorno_get = 'erro_email=1';
    header('Location:tela_cadastra.php?' . $retorno_get);
    die();
}
if ($usuario != '' || $email != '') {
    try {
        $stmt = $conn->prepare("insert into usuario(nome,email,senha) values(?,?,?)");
        $stmt->bindParam(1, $usuario);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $senha);
        $stmt->execute();
        echo 'Usuário cadastrado com sucesso';
        header('Location:../index/index.php');
    } catch (Exception $ex) {
        echo'Erro ao cadastrar usuário ' . $ex->getMessage();
    }
}else{
        header('Location:../index/index.php');
}
