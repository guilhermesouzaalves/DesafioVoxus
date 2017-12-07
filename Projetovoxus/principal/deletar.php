<?php
session_start();

if(!isset($_SESSION['nome'])){
    header('Location:../index/index.php?erro=1');
}
require_once '../config/config.php';
$id = (int)filter_input(INPUT_GET,'id');

$stmt = $conn->prepare('DELETE FROM task WHERE id =?');
$stmt->bindParam(1, $id); 
$stmt->execute();

header('Location:tela_dashboard.php');

